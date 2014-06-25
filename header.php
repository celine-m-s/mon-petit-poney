<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title(); ?></title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>

	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css">
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,900' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css">

</head>

<body>
	<div class="container">
		<header>
			<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png"></a></div> 
			<h2><a href="<?php echo home_url(); ?>"><?php bloginfo('description'); ?></a></h2>
			






			<nav class="navbar navbar-default" role="navigation">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			  	</div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <!-- Ajouter un menu (étape 3 avec Bootstrap) et gérée par WordPress.  -->
			    <?php
	          wp_nav_menu( array(
	              'menu'              => 'primary',
	              'theme_location'    => 'primary',
	              'depth'             => 2,
	              'container'         => 'div',
	              'container_class'   => 'collapse navbar-collapse row',
	      				'container_id'      => 'bs-example-navbar-collapse-1',
	              'menu_class'        => 'nav navbar-nav',
	              'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
	              'walker'            => new wp_bootstrap_navwalker())
	          );
	     			 ?>
		
			  </div><!-- /.container-fluid -->
			</nav>
			<!-- ajouter un menu : étape 2 || Puis on va le créer dans l'interface d'administration (apparence > menus > créez un nouveau menu)  -->
		 <?php 
		 wp_nav_menu( array(
		 'theme_location' 			=> 'secondary-nav', 
		 'menu_class'					  => 'secondary-nav',) 
		 ); 
		 ?>




		</header>