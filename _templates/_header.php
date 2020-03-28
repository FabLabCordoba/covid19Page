<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
    <title><?php echo $titulo; ?></title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-162077776-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-162077776-1');
    </script>
</head>

<body>
    <div class="background-container background-container--purple">
        <div class="container">
            <div class="nav">
                <a href="<?php echo $homepage; ?>" class='homepage'>
                    <div class="nav--logo">
                        Makers Argentina
                    </div>
                </a>
                <div class="nav--button">
                    <a href="/colaborar" class="button button--white">Colaborar</a>
                </div>
            </div>
            <div class="hero">
                <?php
                $img = '<div class="hero--img"><img src="' . $hero_picture . '" /></div>';
                echo ($hero_picture_position == 'left') ? $img : NULL;
                ?>
                <div class="hero--info">
                    <div class="hero--title">
                        <?php echo $hero_title; ?>
                    </div>
                    <div class="hero--text">
                        <?php echo $hero_description; ?>
                    </div>
                    <?php if(isset($hero_cta)) { ?>
                    <a href="<?php echo $hero_cta_link; ?>" class="button"><?php echo $hero_cta; ?></a>
                    <?php } ?>
                </div>
                <?php echo ($hero_picture_position == 'right') ? $img : NULL; ?>
            </div>
        </div>
    </div>