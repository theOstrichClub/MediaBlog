<?php get_header(); ?>
<!-- Contents -->
<?php
    global $wp_query;
    $total_results = $wp_query->found_posts;
    $search_query = get_search_query();
?>
 
<h1><?php echo $search_query; ?>の検索結果<span>（<?php echo $total_results; ?>件）</span></h1>
 
<?php
    if( $total_results >0 ):
        if(have_posts()):
            while(have_posts()): the_post();
?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">  
                    <div class="l-card">
                        <div class="l-thumbnail">
                            <figure class="thumbnail-wrapper"><?php the_post_thumbnail(array(360, 360)); ?></figure>
                            <span class="more-text">Read More</span>
                        </div>
                        <div class="text-content">
                            <p class="caption"><?php the_title(); ?></p>
                            <div class="content-meta">
                                <span class="date"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?php the_time('Y.n.j H:m'); ?></span>
                            </div>
                        </div>
                    </div>
                </a> 
            <?php endwhile; 
        endif; 
    else: ?>
 
        <?php echo $search_query; ?> に一致する情報は見つかりませんでした。
        <div class="notfound-navi"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="glyphicon glyphicon-home" aria-hidden="true"></i> Home へ戻る</a></div>
    <?php 
        query_posts('showposts=20');
        if (have_posts()) : 
            while (have_posts()) : 
            the_post();
            ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">  
                <div class="l-card">
                    <div class="l-thumbnail">
                        <figure class="thumbnail-wrapper"><?php the_post_thumbnail(array(360, 360)); ?></figure>
                        <span class="more-text">Read More</span>
                    </div>
                    <div class="text-content">
                        <p class="caption"><?php the_title(); ?></p>
                        <div class="content-meta">
                            <span class="date">
                            <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?php the_time('Y.n.j H:m'); ?></span>
                        </div>
                    </div>
                </div>
            </a> 
            <?php
            endwhile;
        endif;
    ?>
    <?php endif;    // 条件分岐終了 ?>
        </div>
    </div><!-- /#main -->
<?php get_footer(); ?>