<div class="single-page">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="common-section">
    <div class="container">
        <div class="row row-reverse">
            <div class="common-text-block col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="box-blok">
                    <div class="ommon-img"><?php echo get_the_post_thumbnail(NULL, 'full', array('class' => 'img-responsive img-centered')); ?></div>
                    <div class="bottom-box">
                         <?php the_title('<h1 class="post_title">', '</h1>'); ?>
                        <div class="post_meta_at">
                            <div class="date-comment"><span class="date"><i class="fa fa-calendar-o" aria-hidden="true"></i> <?= get_the_date() ?></span> | <span class="comment"><i class="fa fa-comment" aria-hidden="true"></i> <?= get_comments_number() . ' ' . __('Comments', "lb-opts") ?></span></div>
                        </div>
                        
                        <div class="entry-content">
                            <?php
                            the_content();
                            ?>
                        </div>
                    </div>
                </div>

                <?php // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                comments_template();
                endif; ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sticky-top">
                <div id="sidebar" class="sidebar-menu block" >
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
        </div>

    </div>
</article>
</div>
