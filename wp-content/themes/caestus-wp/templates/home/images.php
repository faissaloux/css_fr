<?php global $theme_setting; ?>

<section>

    <div class="">
        <!-- Main Content -->
        <main class="main-content" id='materialSection'>
            <div class="row qkj">
                <div class="col-md-61 home-image show-desktop">
                    <a href="<?php echo get_home_url().$theme_setting['image1-url']; ?>">
                        <div class="boxImageCamera">
                            <img src="<?php print_r($theme_setting['image1']['url']); ?>"
                                class="d-md-none  images-img d-lg-none d-sm-none phoneonly" />

                            <img class="images-img" src="<?php print_r($theme_setting['image1']['url']); ?>" />
                            <div class="ghakteb"><?php echo $theme_setting['image1-title']; ?></div>
                        </div>
                    </a>
                </div>
                <?php if( !empty($theme_setting['image1-mobile']['url']) ): ?>
                    <div class="col-md-61 home-image show-mobile">
                        <a href="<?php echo get_home_url().$theme_setting['image1-mobile-url']; ?>">
                            <div class="boxImageCamera">
                                <img src="<?php print_r($theme_setting['image1-mobile']['url']); ?>"
                                    class="d-md-none  images-img d-lg-none d-sm-none phoneonly" />

                                <img class="images-img" src="<?php print_r($theme_setting['image1-mobile']['url']); ?>" />
                                <div class="ghakteb"><?php echo $theme_setting['image1-mobile-title']; ?></div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="col-md-61 home-image show-desktop">
                    <a href="<?php echo get_home_url().$theme_setting['image2-url']; ?>">
                        <div class="boxImageCamera">
                            <img src="<?php print_r($theme_setting['image2']['url']); ?>"
                                class=" d-md-none images-img d-lg-none d-sm-none phoneonly" />
                            <img class="images-img" src="<?php print_r($theme_setting['image2']['url']); ?>" />
                            <div class="ghakteb"><?php echo $theme_setting['image2-title']; ?></div>
                        </div>
                    </a>
                </div>
                <?php if( !empty($theme_setting['image2-mobile']['url']) ): ?>
                    <div class="col-md-61 home-image show-mobile">
                        <a href="<?php echo get_home_url().$theme_setting['image2-mobile-url']; ?>">
                            <div class="boxImageCamera">
                                <img src="<?php print_r($theme_setting['image2-mobile']['url']); ?>"
                                    class=" d-md-none images-img d-lg-none d-sm-none phoneonly" />
                                <img class="images-img" src="<?php print_r($theme_setting['image2-mobile']['url']); ?>" />
                                <div class="ghakteb"><?php echo $theme_setting['image2-mobile-title']; ?></div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row qkj">
                <div class="col-md-31 home-image show-desktop">
                    <a href="<?php echo get_home_url().$theme_setting['image3-url']; ?>">
                        <div class="boxImageCamera"><img class="images-img" src="<?php print_r($theme_setting['image3']['url']); ?>" />
                            <div class="ghakteb"><?php echo $theme_setting['image3-title']; ?></div>
                        </div>
                    </a>
                </div>
                <?php if( !empty($theme_setting['image3-mobile']['url']) ): ?>
                    <div class="col-md-31 home-image show-mobile">
                        <a href="<?php echo get_home_url().$theme_setting['image3-mobile-url']; ?>">
                            <div class="boxImageCamera"><img class="images-img" src="<?php print_r($theme_setting['image3-mobile']['url']); ?>" />
                                <div class="ghakteb"><?php echo $theme_setting['image3-mobile-title']; ?></div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>

                <div class="col-md-31 home-image show-desktop">
                    <a href="<?php echo get_home_url().$theme_setting['image4-url']; ?>">
                        <div class="boxImageCamera"><img class="images-img" src="<?php print_r($theme_setting['image4']['url']); ?>" />
                            <div class="ghakteb"><?php echo $theme_setting['image4-title']; ?></div>
                        </div>
                    </a>
                </div>
                <?php if( !empty($theme_setting['image4-mobile']['url']) ): ?>
                    <div class="col-md-31 home-image show-mobile">
                        <a href="<?php echo get_home_url().$theme_setting['image4-mobile-url']; ?>">
                            <div class="boxImageCamera"><img class="images-img" src="<?php print_r($theme_setting['image4-mobile']['url']); ?>" />
                                <div class="ghakteb"><?php echo $theme_setting['image4-mobile-title']; ?></div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>

                <div class="col-md-31 home-image show-desktop">
                    <a href="<?php echo get_home_url().$theme_setting['image5-url']; ?>">
                        <div class="boxImageCamera"><img class="images-img" src="<?php print_r($theme_setting['image5']['url']); ?>" />
                            <div class="ghakteb"><?php echo $theme_setting['image5-title']; ?></div>
                        </div>
                    </a>
                </div>
                <?php if( !empty($theme_setting['image5-mobile']['url']) ): ?>
                    <div class="col-md-31 home-image show-mobile">
                        <a href="<?php echo get_home_url().$theme_setting['image5-mobile-url']; ?>">
                            <div class="boxImageCamera"><img class="images-img" src="<?php print_r($theme_setting['image5-mobile']['url']); ?>" />
                                <div class="ghakteb"><?php echo $theme_setting['image5-mobile-title']; ?></div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>

                <div class="col-md-31 home-image show-desktop">
                    <a href="<?php echo get_home_url().$theme_setting['image6-url']; ?>">
                        <div class="boxImageCamera"><img class="images-img" src="<?php print_r($theme_setting['image6']['url']); ?>" />
                            <div class="ghakteb"><?php echo $theme_setting['image6-title']; ?></div>
                        </div>
                    </a>
                </div>
                <?php if( !empty($theme_setting['image6-mobile']['url']) ): ?>
                    <div class="col-md-31 home-image show-mobile">
                        <a href="<?php echo get_home_url().$theme_setting['image6-mobile-url']; ?>">
                            <div class="boxImageCamera"><img class="images-img" src="<?php print_r($theme_setting['image6-mobile']['url']); ?>" />
                                <div class="ghakteb"><?php echo $theme_setting['image6-mobile-title']; ?></div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>
</section>