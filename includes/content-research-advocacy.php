<?php $filters = check_filters(array('report-tag'),12);?>
<div class="research-advocacy-content section-content-wrap sidebar-layout">  
    <div class="sidebar filters desktop-filters">
        <?php tag_filters('tag');?>
    </div>
    <div class="sidebar-layout-main">
        <div class="lrg-txt">
            <?php get_content_by_id(12);?>
        </div> 
        <div class="filters mobile-filters">
            <div class="filters-wrap">
                <?php tag_filters('tag');?>
            </div>    
        </div> 
        <?php 
            $reports_arr = array(
                'post_type' => 'report',
                //'paged' => $paged,
                'orderby' => 'menu_order', 
                'order'	=> 'ASC',
                'posts_per_page' => -1
            );
            //if(isset($_GET['tag'])){
            if(isset($filters) && isset($_GET['report-tag'])){    
                $reports_arr['tax_query'] = array(
                    array(
                        'taxonomy' => 'report-tag',
                        'field'    => 'slug',
                        'terms'    => $_GET['report-tag'],
                    )    
                );
            } 

            $reports_query = new WP_Query($reports_arr); 

            if($reports_query->have_posts()) : ?>
                <div class="reports filter-content index<?php //if($reports_query->post_count === 1){ echo ' single-report'; }?>">
                    <?php while ( $reports_query->have_posts() ) : $reports_query->the_post(); ?>
                        <article class="report">
                            <?php $pdf = get_field('pdf');?>
                            <a href="<?php echo $pdf;?>" target="_blank">
                                <div class="report-cover">
                                    <?php if(has_post_thumbnail()){
                                        $thumb_data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); 
                                        echo '<div class="imgwrap" style="--bg-img:url('.$thumb_data[0].')"><img src="'.$thumb_data[0].'"></div>';
                                    }else{
                                        echo '<div class="imgwrap placeholder"></div>'; 
                                    }?> 
                                </div>                
                                <div class="details">  
                                    <h4><?php the_title();?></h4>
                                    <div class="excerpt"><?php the_excerpt();?></div>
                                    <div class="dl-pdf">→ <span href="<?php echo $pdf;?>" target="_blank">Download PDF</span></div>
                                </div> 
                            </a>       
                        </article>   
                    <?php endwhile;?>
                </div>          
            <?php endif;
            wp_reset_query();
        ?>
    </div> 
</div>    