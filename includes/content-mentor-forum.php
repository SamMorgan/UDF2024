<div class="popup-page section-wrap" style="--section-color:<?php the_field('section_colour',1322);?>">
    <div class="section-header h1">
        <?php echo '<h2>'.get_the_title(1322).'</h2>';?>
    </div>
    <a href="<?php echo get_permalink(16);?>" class="close-popup close-x"><svg viewBox="0 0 34.94 35.38"><polygon points="34.94 3.65 31.1 0 17.57 13.87 4.18 0.05 0.38 3.84 13.82 17.62 0 31.59 3.74 35.38 17.42 21.41 31.06 35.33 34.9 31.59 21.12 17.62 34.94 3.65"/></svg></a> 
    <div class="section-content">

        <?php get_content_by_id(1322);?>
        <?php $id = 1322; include 'modules.php';?>
    
    </div>    
</div>