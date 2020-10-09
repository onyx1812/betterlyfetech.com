<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="keywords" content="<?php bloginfo('keywords'); ?>"/>
    <meta name="description" content="<?php bloginfo('description'); ?>"/>
    <meta name="copyright" content="<?php bloginfo('copyright'); ?>">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, user-scalable=no, user-scalable=0, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0 user-scalable=0">
    <meta name="author" content="MaxGloba">
    <meta name="theme-color" content="#fff">
    <meta name="format-detection" content="telephone=no">

    <?php if( get_field('page_title') ): ?>
      <title><?php the_field('page_title'); ?></title>
    <?php else: ?>
      <title><?php echo get_bloginfo('name'); ?></title>
    <?php endif; ?>

    <?php if( get_field('favicon') ): ?>
      <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_field('favicon'); ?>" />
    <?php else: ?>
      <link rel="shortcut icon" type="image/x-icon" href="<?php echo IMG; ?>/favicon.ico" />
    <?php endif; ?>

    <script>
      let vh = window.innerHeight * 0.01;
      document.documentElement.style.setProperty('--vh', `${vh}px`);
    </script>
<!-- 111 -->
    <?php wp_head(); ?>
<!-- 222 -->
    <?php
      if( get_field('header_scripts') ):
        the_field('header_scripts');
      endif;
    ?>

    <?php if( get_field('fonts') ): ?>
      <?php if( get_field('fonts') === 'BrandonText' ): ?>
        <link rel="stylesheet" href="https://betterlyfetech.com/fonts/BrandonText/brandon-text.min.css">
        <style>html,body{font-family:'BrandonText'}</style>
      <?php elseif( get_field('fonts') === 'Lato' ): ?>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">
        <style>body{font-family: 'Lato', sans-serif;}</style>
      <?php elseif( get_field('fonts') === 'Montserrat' ): ?>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
        <style>body{ font-family: 'Montserrat', sans-serif; }</style>
      <?php endif; ?>
    <?php endif; ?>
  </head>
  <body <?php body_class(); ?> >
    <?php get_template_part( 'partials/block', 'header' ); ?>