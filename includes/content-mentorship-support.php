<div class="mentorship-support-content section-content-wrap">  
    <div class="lrg-txt"><?php get_content_by_id(16);?></div>
    <div class="two-cols stack-mob">
        <div class="col"><?php the_field('column_1',16);?></div>
        <div class="col"><?php 
            $img = get_field('column_2',16);
            if($img){
                $padding = $img['height']/$img['width']*100;
                echo '<div class="imgwrap tinted-img" style="padding-bottom:'.$padding.'%"><img src="'.$img['url'].'"></div>';
            }
        ?></div>
    </div> 

    <section id="become-a-member">
        <?php 
            $member = get_field('become_a_member',20);
            $member_heading = $member['heading']; 
            $member_text = $member['text'];
            $member_col_1 = $member['column_1'];
            $member_paypal_links = $member['paypal_links'];

            if($member_heading){
                echo '<h3 class="subheading">'.$member_heading.'</h3>';
            }
            if($member_text){
                echo '<div class="lrg-txt">'.$member_text.'</div>';
            }

        ?>
        <div class="two-cols stack-mob">
            <div class="col richtext">
                <?php echo $member_col_1;?>
            </div>
            <div class="col">
                <?php 
                    foreach( $member_paypal_links as $member_paypal_link ) {
                        $heading = $member_paypal_link['heading'];
                        $details = $member_paypal_link['details'];
                        $link = $member_paypal_link['link'];?>
                        <div class="paypal-link">
                            <a href="<?php echo $link;?>" target="_blank">
                                <h6><?php echo $heading;?></h6>
                                <span><?php echo $details;?></span>
                            </a>
                        </div>   
                        
                    <?php }
                ?>
            </div>
        </div>        
    </section> 
    <?php $id = 16; include 'modules.php';?>
</div> 