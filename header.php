<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Multicolor - Donde las ideas brillan.</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,600,400i,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/normalize.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/skeleton.css">
  <link rel='stylesheet' href='<?php bloginfo('template_directory');?>/css/style.css'  type='text/css'>
    
  <!-- Favicon & Browser theme
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
 
  <link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory');?>/images/icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_directory');?>/images/icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory');?>/images/icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory');?>/images/icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory');?>/images/icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory');?>/images/icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory');?>/images/icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory');?>/images/icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory');?>/images/icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php bloginfo('template_directory');?>/images/icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory');?>/images/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('template_directory');?>/images/icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory');?>/images/icons/favicon-16x16.png">

<link rel="manifest" href="<?php bloginfo('template_directory');?>/images/icons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php bloginfo('template_directory');?>/images/icons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
  <?php wp_head(); ?>
  <script>
  var cat_id = "<?php $cur_cat_id = get_cat_id( single_cat_title("",false) ); echo $cur_cat_id;?>";
  
  </script>
</head>
<body class="<?php 
             if(is_singular()){
            $cat = get_the_category();
                $catp = $cat[0]->category_parent; 
                $class = get_term( $catp, 'category' );
                if($catp==""){ $class = get_term( $cat[0], 'category' );}
               
                echo $class->slug;
             }?>">

<header class="row"><div>
<a href="#" id="menuBtn"></a><a href="<?php $home = home_url(); echo $home;?>" class="header-link"></a><span id="logo"><i></i><b></b></span><span class="title">MULTICOLOR</span><span class="tagline">Donde las ideas brillan.</span><div class="mobile-menu"><span></span><span></span><span></span></div></div>
</header>
<nav id="menu" class="row"><a class="two columns rojo" href="<?php echo $home; ?>/category/red">ROJO</a><a class="two columns naranja" href="<?php echo $home; ?>/category/orange">NARANJA</a><a class="two columns amarillo" href="<?php echo $home; ?>/category/yellow">AMARILLO</a><a class="two columns verde" href="<?php echo $home; ?>/category/green">VERDE</a><a class="two columns azul" href="<?php echo $home; ?>/category/blue">AZUL</a><a class="two columns violeta" href="<?php echo $home; ?>/category/purple">VIOLETA</a></nav>
