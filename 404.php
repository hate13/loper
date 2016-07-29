<!DOCTYPE html>
<html <?php language_attributes(); ?>  class="error">
<head>
	<title>出错了，这里是404</title>
		
	<?php $options = get_option('loper_options'); ?>
	
	<?php
		if (is_single()) {
		if ($post->post_excerpt) {
			$description = $post->post_excerpt;
		} else {
			$description = cut_str(strip_tags(
			apply_filters('the_content',$post->post_content)
			),220);
			}
			$keywords = "";
			$tags = wp_get_post_tags($post->ID);
			foreach ($tags as $tag ) {
			$keywords = $keywords . $tag->name . ",";
			}
	} else if (is_category()) {
		$description = category_description();
	}
	?>
	<meta name="keywords" content="<?php if (is_home()) { echo ($options['keyword_content']);} else echo $keywords;?>" />
	<meta name="description" content="<?php if (is_home()) { echo ($options['description_content']);} else echo $description;?>" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php if( is_home() ){ ?>
    <link rel="canonical" href="<?php bloginfo("url"); ?>" />
	<?php } ?>
	<link rel="index" title="<?php bloginfo( 'name' ); ?>" href="<?php echo get_option('home'); ?>/" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--网站图标-->
	<link rel="Shortcut Icon" href="<?php bloginfo('template_directory');?>/images/favicon.ico" type="image/x-icon" />
	<?php if($options['feedrss'] && $options['feedrss_content']) : ?> 
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php echo($options['feedrss_content']); ?>" />
	<?php else : ?>	
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<?php endif; ?>
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<?php if($options['headcode']) : ?> 
			<?php echo($options['headcode']); ?>
	<?php endif; ?>
	<?php wp_head(); ?>
	<?php if ( is_singular() ){ ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/comments-ajax.js"></script>
	<?php } ?>
</head>

<body class="errorbg">

<div class="errorpic">
</div>

<div class="errorfooter">
	<p><a href="<?php echo home_url('/');?>/"><strong>Go back home!</strong></a></p>
	<p><a href="<?php echo get_option('home');?>/"><?php bloginfo('name');?></a> , Powered by <a href="http://wordpress.org/">WordPress <?php bloginfo('version');?></a></p>
  <!--<?php echo get_num_queries();?> queries. <?php timer_stop(1);?> seconds. -->
</div>

<?php wp_footer(); ?>
</body>
</html>