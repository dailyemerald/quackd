<!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9 lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5, minimum-scale=0.5">
		<title><?php wp_title( 'by', true, 'right' ); bloginfo( 'name' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?php

			if ( is_singular() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );

			$options = get_option ( 'svbtle_options' ); 

			echo $options['google_analytics'];
 
			if( isset( $options['color'] ) && '' != $options['color'] )
				$color = $options['color'];
			else 
				$color = "#b2d234";
	
		?>

		<?php emg_head_fb_open_graph(); ?>

		<style>
			blockquote {
				border-color: <?php echo $color ?>;
			}
			/*aside#logo,
			aside#logo div a,*/
			ul#user_meta a:hover span.link_logo_inside,
			ul#user_meta a:hover span.link_logo,
			aside.kudo.complete span.circle {
				background-color: <?php echo $color ?>;
			}

			section.preview header#begin h2,
			ul#user_meta a:hover,
			nav.pagination span.next a,
			nav.pagination span.prev a {
				color: <?php echo $color ?>;
			}

			ul#user_meta a:hover,
			nav.pagination span.next a,nav.pagination span.prev a {border-color: <?php echo $color ?>;}::-moz-selection { background: <?php echo $color ?>; color: #fff; text-shadow: none;}::selection { background: <?php echo $color ?>; color: #fff; text-shadow: none;}
		</style>
		<script type="text/javascript" src="//use.typekit.net/apy5owh.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<?php wp_head();  ?>

		
	</head>
	<body <?php body_class(); ?>>


	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

		<header id="sidebar">
		  <aside id="logo" class="clearfix">
		    <div class="clearfix">
		      <a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a>
		    </div>
		  </aside>
		  <ul id="user_meta">
		    <li class="blog_name">  
		      <h1 id="blog_name">
			      <a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a>
		      </h1>
		    </li>
				<li class="blog_owner">  
		      <h2 id="blog_owner">
		        <a href="<?php echo home_url( '/' ); ?>"><?php echo $options['theme_username'] ?></a>
		      </h2>
		    </li>
		    <li class="tagline">
		      <h2 id="tagline">
		        <?php bloginfo( 'description' ); ?>
		      </h2>
		    </li>
		
		
				<?php
					$mypages = get_pages( );

					foreach( $mypages as $page ) {		
						$content = $page->post_content;
						if ( ! $content ) // Check for empty page
							continue;

						$content = apply_filters( 'the_content', $content );
					?>
						<li class="link">
							<a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a>
						</li>
						
					<?php
					}	
				?>
				
				<?php if (!empty($options['twitter_username'])): ?>
					<li class="link twitter">
						<a target="_blank" href="http://twitter.com/<?php echo $options['twitter_username'] ?>">@<?php echo $options['twitter_username'] ?></a>
					</li>
				<?php endif ?>
				
				<?php if (!empty($options['github_username'])): ?>
					<li class="link github">
						<a target="_blank" href="http://github.com/<?php echo $options['github_username'] ?>">Github</a>
					</li>
				<?php endif ?>
				
				<?php if (!empty($options['contact_email'])): ?>
					<li class="link email">
						<a href="mailto:<?php echo $options['contact_email'] ?>">						
							say hello</a> 
					</li>
				<?php endif ?>
			
				<?php if ($options['rss-link']): ?>
					<li class="link feed">
				      <a href="<?php bloginfo('rss_url'); ?>">feed</a>
				    </li>		
				<?php endif ?>	

					<li class="link">
					  <a href="#">
				      <div class="fb-like" data-href="http://facebook.com/quackdcom" data-send="false" data-layout="button_count" data-width="90" data-show-faces="true"></div>
				  	 </a>
				    </li>
				<?php if ( is_active_sidebar( 'sidebar' ) ) dynamic_sidebar( 'sidebar' ); ?>

		  </ul>
		</header>
		
		<section id="river" role="main">
        
        <?php if ($_GET['not_found']): ?>
        <div id="notice"><span>:(</span><br><br>Not found.</div>
        <?php endif; ?>
