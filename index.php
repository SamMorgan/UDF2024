<?php get_header(); ?>

<?php 
/* 
    Public Interest = 8
    Knowledge Sharing = 10
    Public Conversations = 22
    Research & Advocacy = 12
    Education = 14
    Mentorship & Support = 16
    Change = 18
    Australia = 20 
*/
//global $post;

$pages = get_pages(
    array(
        'sort_column' => 'menu_order',
        'include' => array(8,10,12,14,16,18,20,22)
    )
);
$open_pages = null;
if(isset($_COOKIE['openPages'])) {
    $open_pages_paths = explode(',',$_COOKIE['openPages']);
    $open_pages = array();
    foreach($open_pages_paths as $open_page_path){
        if(get_page_by_path($open_page_path)){
            $open_pages[] =  get_page_by_path($open_page_path)->ID;
        }
    } 
} 
?>

<div class="aoc"><?php the_field('aoc','options');?></div>

<div class="mobile-header section-header"><span class="h1">Urban Design</span></div>

<?php foreach($pages as $page) { ?>
    <section id="<?php echo $page->post_name;?>" class="section-wrap<?php 
        $page_id = $page->ID;
        if(is_page($page->ID) || is_singular('event') && $page->ID === 22 || $open_pages && in_array($page->ID,$open_pages)){ echo ' open';}?>" style="--section-color:<?php the_field('section_colour',$page->ID);?>">
        <div class="section-header h1">
            <a class="section-link" href="<?php echo get_permalink($page->ID);?>">
                <?php if($page->ID === 20){
                    //echo '<h1>'.$page->post_title.'</h1>';
                    echo '<h1><span>Urban Design </span>Forum Australia</h1>';
                }else{ 
                    echo '<h2>'.$page->post_title.'</h2>'; 
                }
                ?>
                <div class="rollover"><?php the_field('rollover_text',$page->ID);?></div>
            </a>
            <a class="close-section" href="<?php echo home_url('/');?>" data-path="/<?php echo $page->post_name;?>/"></a>    
        </div> 
        <div class="section-content">
            <?php 
                //if($open_pages && in_array(8,$open_pages) && $page_id === 8 || $page_id === 8 && is_page(8)){ 
                if($page_id === 8){   
                    include 'includes/content-public-interest.php';
                }
                //if($open_pages && in_array(10,$open_pages) && $page_id === 10 || $page_id === 10 && is_page(10)){
                if($page_id === 10){
                    include 'includes/content-knowledge-sharing.php';
                }
                //if($open_pages && in_array(22,$open_pages) && $page_id === 22 || $page_id === 22 && is_page(22)){ 
                if($page_id === 22){   
                    include 'includes/content-public-conversations.php';
                }
                //if($open_pages && in_array(12,$open_pages) && $page_id === 12 || $page_id === 12 && is_page(12)){
                if($page_id === 12){
                    include 'includes/content-research-advocacy.php';
                }
                //if($open_pages && in_array(14,$open_pages) && $page_id === 14 || $page_id === 14 && is_page(14)){
                if($page_id === 14){
                    include 'includes/content-education.php';
                }
                //if($open_pages && in_array(16,$open_pages) && $page_id === 16 || $page_id === 16 && is_page(16)){
                if($page_id === 16){
                    include 'includes/content-mentorship-support.php';
                }
                //if($open_pages && in_array(18,$open_pages) && $page_id === 18 || $page_id === 18 && is_page(18)){
                if($page_id === 18){
                    include 'includes/content-change.php';
                }
                //if($open_pages && in_array(20,$open_pages) && $page_id === 20 || $page_id === 20 && is_page(20) || $page_id === 20 && $post->post_parent === 20){
                if($page_id === 20){
                    include 'includes/content-udf-australia.php';
                }
            ?>
        </div>       
    </section>
<?php } ?> 

<?php if(is_singular('event')){ ?>
    <div class="popup-page event-content<?php if(is_singular('event')){ echo ' open'; }?>" style="--section-color:<?php the_field('section_colour',22);?>">
    
        <div class="section-content-wrap">
            <a href="<?php echo get_permalink(22);?>" class="close-popup close-x"><svg viewBox="0 0 34.94 35.38"><polygon points="34.94 3.65 31.1 0 17.57 13.87 4.18 0.05 0.38 3.84 13.82 17.62 0 31.59 3.74 35.38 17.42 21.41 31.06 35.33 34.9 31.59 21.12 17.62 34.94 3.65"/></svg></a> 
            <?php include 'includes/content-event.php';?>
        </div>    
    
    </div>
<?php }?>

<?php // newsletter archive page ID 369 //
if(is_page() && !in_array($post->ID, array(8,10,12,14,16,18,20,22,369))){ ?>
<div class="popup-page subpage-content" style="--section-color:<?php 
    $color = get_field('section_colour',$post->ID) ? get_field('section_colour',$post->ID) : '#e6e6e6';
    echo $color;
    ?>">
    <?php if($post->post_parent){ echo '<h1 class="section-header">'.get_the_title($post->post_parent).'</h1>';}?>
    <a href="<?php echo get_permalink($post->post_parent);?>" class="close-popup close-x"><svg viewBox="0 0 34.94 35.38"><polygon points="34.94 3.65 31.1 0 17.57 13.87 4.18 0.05 0.38 3.84 13.82 17.62 0 31.59 3.74 35.38 17.42 21.41 31.06 35.33 34.9 31.59 21.12 17.62 34.94 3.65"/></svg></a> 
    <div class="section-content-wrap">
        <?php while (have_posts()) : the_post(); ?>
            <div class="lrg-txt"><?php the_content();?></div>
            <?php $id = $post->ID; include 'includes/modules.php';?>
        <?php endwhile;?>      
    </div>    
</div>
<?php } ?>

<?php if(is_paged() || isset($_GET['view-more']) || is_page('newsletter-archive')){
    if($post->ID === 10){
        include 'includes/content-knowledge-sharing-paged.php';
    }
    if($post->ID === 22){
        include 'includes/content-public-conversations-paged.php';
    }
    if(is_page('newsletter-archive')){
        include 'includes/content-newsletter-archive.php';
    }
}?>

        
<?php get_footer(); ?>