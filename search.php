<?php get_header(); ?>
<!-- Contents -->
<?php
    $args = array( 'post_type' => 'post' );
    $total_results = new WP_Query( $args );
    // $total_results = $wp_query($args)->found_posts;
    $search_query = get_search_query();
?>
<div id="contents">
        <div class="post">
 <div class="newentry">
 <?php if ($search_query == "") { //アイキャッチ画像を設定している場合?>
    All Articles
    <?php
    } else {?>
        Result of <?php echo $search_query; ?><span>（<?php echo $total_results; ?> results）</span>
    <?php } ?>
</div>
 
<?php
    if( $total_results > 0 ):
        if($total_results->have_posts()):
            while(have_posts()): the_post();
?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">  
                    <div class="l-card">
                        <div class="l-thumbnail">
                            <figure class="thumbnail-wrapper">
                            <?php if (has_post_thumbnail()) { //アイキャッチ画像を設定している場合
                                the_post_thumbnail(array(360, 360));
                                } else { //アイキャッチ画像を設定していない場合 ?>
                                <img src="<?php echo get_bloginfo('template_directory'); ?>/images/eyecatch.png" alt="アイキャッチ画像" width="360" height="240" />
                            <?php } ?>
                            </figure>
                            <span class="more-text">Read More</span>
                        </div>
                        <div class="text-content">
                            <p class="caption"><?php the_title(); ?></p>
                            <div class="content-meta">
                                <span class="date"><i class="far fa-clock" aria-hidden="true"></i> <?php the_date(); ?> <?php the_time(); ?></span>
                            </div>
                        </div>
                    </div>
                </a> 
            <?php endwhile; 
        endif; 
    else: ?>
 
        <?php echo $search_query; ?> に一致する情報は見つかりませんでした。
        <div class="notfound-navi"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home" aria-hidden="true"></i> Home へ戻る</a></div>
    <?php 
        query_posts('showposts=20');
        if (have_posts()) : 
            while (have_posts()) : 
            the_post();
            ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">  
                <div class="l-card">
                    <div class="l-thumbnail">
                        <figure class="thumbnail-wrapper">
                        <?php if (has_post_thumbnail()) { //アイキャッチ画像を設定している場合
                            the_post_thumbnail(array(360, 360));
                            } else { //アイキャッチ画像を設定していない場合 ?>
                            <img src="<?php echo get_bloginfo('template_directory'); ?>/images/eyecatch.png" alt="アイキャッチ画像" width="360" height="240" />
                        <?php } ?>
                        </figure>
                        <span class="more-text">Read More</span>
                    </div>
                    <div class="text-content">
                        <p class="caption"><?php the_title(); ?></p>
                        <div class="content-meta">
                        <span class="date"><i class="far fa-clock" aria-hidden="true"></i> <?php the_date(); ?> <?php the_time(); ?></span>
                        </div>
                    </div>
                </div>
            </a> 
            <?php
            endwhile;
        endif;
    ?>
    <?php endif;    // 条件分岐終了 ?>
    <div class="newentry"></div>
    </div>
    </div>
        </div>
    </div><!-- /#main -->
<?php get_footer(); ?>