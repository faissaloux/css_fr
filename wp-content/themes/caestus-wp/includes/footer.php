<?php global $theme_setting; ?>

<!-- Footer -->
<footer class="footer white_color" style="background-color: <?php echo $theme_setting['footer-color']; ?>;">
    <div class="container">
        <div class="row gap-y">
            <div class="col-md-5 col-xl-4">
                <h6 class="about-title-footer"><strong><?php echo $theme_setting['footer-about-title']; ?></strong></h6>
                <p><?php echo $theme_setting['footer-about']; ?></p>
            </div>
            <div class="col-md-1 col-xl-1"></div>
            <div class=" col-md-4">
                <h6 class="contact_title_footer"><strong><?php echo $theme_setting['footer-contact-title']; ?></strong></h6>
                <div class="nav flex-column ml-4">
                    <ul class='footer_more_ul'>
                        <li>Tel: <?php echo $theme_setting['footer-phone']; ?></li>
                        <li>Email : <?php echo $theme_setting['footer-email']; ?></li>
                        <li> Adresse : <?php echo $theme_setting['footer-address']; ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <h6 class="mb-4"><strong><?php echo $theme_setting['footer-social-media-title']; ?></strong></h6>
                <div class="social text-center text-lg-left">
                <?php if (!empty($theme_setting['facebook'])): ?>
                    <span class="over-hidden" style="background-color: <?php echo $theme_setting['social-media-background']; ?>;">
                        <a class="social social-facebook" href="<?php echo $theme_setting['facebook']; ?>">
                            <div class="up d-flex justify-content-center align-items-center"><i class="fab fa-facebook"></i></div>
                            <div class="down d-flex justify-content-center align-items-center"><i class="fab fa-facebook"></i></div>
                        </a>
                    </span>
                <?php endif ?>
                <?php if (!empty($theme_setting['twitter'])): ?>
                    <span class="over-hidden" style="background-color: <?php echo $theme_setting['social-media-background']; ?>;">
                        <a class="social social-twitter" href="<?php echo $theme_setting['twitter']; ?>">
                            <div class="up d-flex justify-content-center align-items-center"><i class="fab fa-twitter"></i></div>
                            <div class="down d-flex justify-content-center align-items-center"><i class="fab fa-twitter"></i></div>
                        </a>
                    </span>
                <?php endif ?>
                <?php if (!empty($theme_setting['instagram'])): ?>
                    <span class="over-hidden" style="background-color: <?php echo $theme_setting['social-media-background']; ?>;">
                        <a class="social social-instagram" href="<?php echo $theme_setting['instagram']; ?>">
                            <div class="up d-flex justify-content-center align-items-center"><i class="fab fa-instagram"></i></div>
                            <div class="down d-flex justify-content-center align-items-center"><i class="fab fa-instagram"></i></div>
                        </a>
                    </span>
                <?php endif ?>
                <?php if (!empty($theme_setting['youtube'])): ?>
                    <span class="over-hidden" style="background-color: <?php echo $theme_setting['social-media-background']; ?>;">
                        <a class="social social-youtube" href="<?php echo $theme_setting['youtube']; ?>">
                            <div class="up d-flex justify-content-center align-items-center"><i class="fab fa-youtube"></i></div>
                            <div class="down d-flex justify-content-center align-items-center"><i class="fab fa-youtube"></i></div>
                        </a>
                    </span>
                <?php endif ?>
                <?php if (!empty($theme_setting['linkedin'])): ?>
                    <span class="over-hidden" style="background-color: <?php echo $theme_setting['social-media-background']; ?>;">
                        <a class="social social-linkedin" href="<?php echo $theme_setting['linkedin']; ?>">
                            <div class="up d-flex justify-content-center align-items-center"><i class="fab fa-linkedin"></i></div>
                            <div class="down d-flex justify-content-center align-items-center"><i class="fab fa-linkedin"></i></div>
                        </a>
                    </span>
                <?php endif ?>
                <?php if (!empty($theme_setting['pinterest'])): ?>
                    <span class="over-hidden" style="background-color: <?php echo $theme_setting['social-media-background']; ?>;">
                        <a class="social social-pinterest" href="<?php echo $theme_setting['pinterest']; ?>">
                            <div class="up d-flex justify-content-center align-items-center"><i class="fab fa-pinterest"></i></div>
                            <div class="down d-flex justify-content-center align-items-center"><i class="fab fa-pinterest"></i></div>
                        </a>
                    </span>
                <?php endif ?>
                <?php if (!empty($theme_setting['googleplus'])): ?>
                    <span class="over-hidden" style="background-color: <?php echo $theme_setting['social-media-background']; ?>;">
                        <a class="social social-googleplus" href="<?php echo $theme_setting['googleplus']; ?>">
                            <div class="up d-flex justify-content-center align-items-center"><i class="fab fa-google"></i></div>
                            <div class="down d-flex justify-content-center align-items-center"><i class="fab fa-google"></i></div>
                        </a>
                    </span>
                <?php endif ?>
                <?php if (!empty($theme_setting['soundcloud'])): ?>
                    <span class="over-hidden" style="background-color: <?php echo $theme_setting['social-media-background']; ?>;">
                        <a class="social social-soundcloud" href="<?php echo $theme_setting['soundcloud']; ?>">
                            <div class="up d-flex justify-content-center align-items-center"><i class="fab fa-soundcloud"></i></div>
                            <div class="down d-flex justify-content-center align-items-center"><i class="fab fa-soundcloud"></i></div>
                        </a>
                    </span>
                <?php endif ?>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <?php echo $theme_setting['footer-copy-rights']; ?>
            </div>
        </div>
    </div>
</footer>
<!-- /.footer -->
<span class='searjhcj' style='display:none;'>
    <input type="text" class='SearchBarPhone sidbarPhoneSearch' placeholder='Recherche' />
    <ul class="list-group searchPhoneSidbarResutls" style='display:none;'>
    </ul>
</span>
<div class="menudkdjd">
    <ul id="menudydydymenu" style='display:none;'>
        <li class="nav-item">
            <a class="" href="/#materialSection"> Location <span class="arrow"></span></a>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="/pack-production">Packs Production</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cameralist">Cameras <span class="arrow"></span> </a>
                    <ul class="nav">
                        <a class="nav-link" href="/red"> RED </a>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/optiques">Optiques <span class="arrow"></span> </a>
                    <ul class="nav">
                        <a class="nav-link" href="/optiques#sigma"> SIGMA </a>
                        <a class="nav-link" href="/optiques#canoon"> CANON </a>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Steadicams-Stabilisateurs">Steadicams / Stabilisateurs <span
                            class="arrow"></span></a>
                    <ul class="nav">
                        <a class="nav-link" href="/category/25"> Steadicams </a>
                        <a class="nav-link" href="/category/24">Stabilisateurs </a>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Trepieds-SupportsCamera">Supports Camera / Trepieds<span
                            class="arrow"></span></a>
                    <ul class="nav">
                        <a class="nav-link" href="/category/26"> Supports Camera </a>
                        <a class="nav-link" href="/category/27"> Trepieds </a>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/accessoires">Accessoires <span class="arrow"></span></a>
                    <ul class="nav">
                        <a class="nav-link" href="/category/14"> Accessoires RED </a>
                        <a class="nav-link" href="/category/13"> Accessoires Camera </a>
                        <a class="nav-link" href="/category/19"> Moniteurs Enregistreurs </a>
                        <a class="nav-link" href="/category/17"> Follow Focus </a>
                        <a class="nav-link" href="/category/15"> Alimentation Et Batteries </a>
                        <a class="nav-link" href="/category/18"> Media Cartes Mémoires </a>
                        <a class="nav-link" href="/category/16">Filtres</a>
                        <a class="nav-link" href="/category/20">Roulante ADICAM MAX </a>
                    </ul>
                </li>
            </ul>
        </li>
        </a>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo get_home_url().'/services'; ?>"> <span>Prestation</span> <span
                    class="arrow"></span>
            </a>
            <ul class="nav">
                <a class="nav-link" href="/prestation/8">Opérateur Steadicam</a>
                <a class="nav-link" href="/prestation/7">Opérateur Dji Ronin 2</a>
                <a class="nav-link" href="/prestation/6">Techniciens/Accompagnateur</a>
                <a class="nav-link" href="/prestation/5">Transport</a>
            </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="<?php echo get_home_url().'/a-propos'; ?>"> <span>A propos</span> </a>
        </li>
    </ul>
</div>

