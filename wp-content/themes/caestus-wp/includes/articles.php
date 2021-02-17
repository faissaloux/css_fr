<?php global $theme_setting; ?>

<!-- Footer -->
<section class="articles">
    <div class="container">
        <h2 class="page-title text-center"><?php the_title(); ?></h2>
        <div class="row">
            <?php foreach($blogPosts as $post): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mt-3">
                    <a href="<?php the_permalink(); ?>" class="__post-link">
                        <img src="<?php echo get_the_post_thumbnail_url() ;?>" class="img-fluid __img-rounded shadow-lg" alt="">
                    </a>
                    <div class="mt-2 text-center d-flex justify-content-between">
                        <h6>
                            <a href="<?php the_permalink(); ?>" class="__post-link"><?php the_title(); ?></a>
                        </h6>
                        <small class="text-black-50 __small-text"><?php the_time('M j, Y'); ?></small>
                    </div>
                </div>
            <?php endforeach; ?> 
        </div>
    </div>
</section>
