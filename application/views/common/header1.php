<!DOCTYPE html>
<!-- <html> -->
<html manifest="<?php echo URL . 'config/' . ENVIRONMENT . '/frontrow/meet.appcache' ?>">
<head>
	<!-- Don't ever take this out, never, ever, ever -> this makes the korean symbols magically appear in the browser - FHM -->
	<meta http-equiv="Content-Type" content="text/html;charset=utf8">

    <!-- STYLESHEET-->
    <link rel="stylesheet" href="<?php echo URL . 'public/css/main.css'; ?>">
    <link rel="stylesheet" href="<?php echo URL . 'public/css/confirm.css'; ?>">
    <!-- SCRIPTS -->
    <script src="<?php echo URL . 'public/js/jquery-1.8.3.min.js'; ?>"></script>
    <script src="<?php echo URL . 'public/js/jstorage.js'; ?>"></script>
    <script src="<?php echo URL . 'public/js/slides.min.jquery.js';?>"></script>
    <script src="<?php echo URL . 'public/js/jquery.simplemodal.js'; ?>"></script>
    <script src="<?php echo URL . 'config/' . ENVIRONMENT . '/settings.js'; ?>"></script>
    <script src="<?php echo URL . 'public/js/analytics.js'; ?>"></script>
    <script src="<?php echo URL . 'public/js/main.js'; ?>"></script>
</head>	
<body>
    <script>

    </script>
	<div style="display:none;"><video id="noSleepVid" loop="loop" autoplay="autoplay"><source src="<?php echo URL . 'public/vid/nosleep.mp4'; ?>" /></video ></div>
	<div id="sleepSlideshow">
        <div class="slides_container">
            <!--
            <div>
                <img id="1#kamjatang#dishes" class="promoSlide" src="<?php //echo URL . 'public/img/sleep/slide6.jpg'?>"></a>
            </div>
            <div>
                <img id="21#cutlet(kasu)#dishes" class="promoSlide" src="<?php //echo URL . 'public/img/sleep/slide7.jpg'?>">;
            </div>
            -->
            <div>
                <img src="<?php echo URL . 'public/img/sleep/slide1.jpg'?>">;
            </div>
            <div>
                <img src="<?php echo URL . 'public/img/sleep/slide2.jpg'?>">;
            </div>
            <div>
                <img src="<?php echo URL . 'public/img/sleep/slide3.jpg'?>">;
            </div>
            <div>
                <img src="<?php echo URL . 'public/img/sleep/slide4.jpg'?>">;
            </div>
            <div>
                <img src="<?php echo URL . 'public/img/sleep/slide5.jpg'?>">;
            </div>
        </div>
    </div>
	<div class="playbook">
		<div class="content">
            <!-- modal content -->
            <div id='confirm'>
                <div class='header'></div>
                <div class='message'></div>
                <div class='buttons'>
                    <div class='no simplemodal-close'>No</div>
                    <div class='yes'>Yes</div>
                </div>
            </div>