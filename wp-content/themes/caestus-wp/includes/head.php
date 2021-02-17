<?php global $theme_setting; ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="<?php echo $theme_setting['site-description']; ?>">
<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
<title><?php echo $theme_setting['site-title']; ?></title>
<meta name="keywords"
    content="<?php echo $theme_setting['site-keywords']; ?>">
<meta name="author" content="Caestus Studios">
<!-- Favicons -->
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri();?>/assets/images/Untitled-1-ConvertImage.ico">
<!-- <link rel="icon" href="<?php echo get_template_directory_uri();?>/assets/images/Untitled-1-ConvertImage.ico"> -->
<link rel="icon" href="<?php echo $theme_setting['favicon-url']['url']; ?>">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<?php wp_head(); ?>
<link   rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<style>
    h1::selection,
    h2::selection,
    strong::selection,
    p::selection,
    li::selection,
    a::selection,
    div::selection {
        background-color: <?php echo $theme_setting['selector-color']; ?>;
    }

    ::-webkit-scrollbar-thumb {
        background: <?php echo $theme_setting['scroll-color'] ?>;
    }

</style>