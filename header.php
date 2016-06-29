<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php if ( is_tag() ) {
			echo wp_title('Tag:');if($paged > 1) printf(' - 第%s页',$paged);echo ' | '; bloginfo( 'name' );
		} elseif ( is_archive() ) {
			echo wp_title('');  if($paged > 1) printf(' - 第%s页',$paged);    echo ' | ';    bloginfo( 'name' );
		} elseif ( is_search() ) {
			echo '&quot;'.wp_specialchars($s).'&quot;的搜索结果 | '; bloginfo( 'name' );
		} elseif ( is_home() ) {
			bloginfo( 'name' );$paged = get_query_var('paged'); if($paged > 1) printf(' - 第%s页',$paged);
		}  elseif ( is_404() ) {
			echo '页面不存在！ | '; bloginfo( 'name' );
		} else {
			echo wp_title( ' | ', false, right )  ; bloginfo( 'name' );
		} ?></title>
		
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
	<meta name="keywords" content="<?php if (is_home()) { echo ($options['keyword_content']);} else echo $keywords;?>"/>
	<meta name="description" content="<?php if (is_home()) { echo ($options['description_content']);} else echo $description;?>"/>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php if( is_home() ){ ?>
    <link rel="canonical" href="<?php bloginfo("url"); ?>" />
	<?php } ?>
	<?php if( is_singular() ){ ?>
	<link rel="canonical" href="<?php the_permalink(); ?>" />
	<?php } ?>

	<link rel="index" title="<?php bloginfo( 'name' ); ?>" href="<?php echo get_option('home'); ?>/" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--网站图标 -->
	<link rel="Shortcut Icon" href="<?php bloginfo('template_directory');?>/images/favicon.ico" type="image/x-icon"/>
	<?php if($options['feedrss'] && $options['feedrss_content']) : ?> 
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php echo($options['feedrss_content']); ?>" />
	<?php else : ?>	
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<?php endif; ?>
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	
	
	<?php if($options['jqueryurl']) : ?> 
	<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js "></script>
	<?php else : ?>	
	<script  src="<?php bloginfo('template_url');?>/scripts/jquery-1.4.4.min.js"></script>
	<?php endif; ?>

	<?php if($options['headcode']) : ?> 
			<?php echo($options['headcode']); ?>
	<?php endif; ?>

	<!--[if lt IE 9]>
		<script src="<?php bloginfo('template_url');?>/scripts/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	
	<!--[if IE 6]>
		<script src="<?php bloginfo('template_url');?>/scripts/DD_belatedPNG.js"></script>
		<script>
		  DD_belatedPNG.fix('ul.menu li.backLava,ul.menu li.backLava div.leftLava,ul.menu li.backLava .bottomLava,.searchbar,.slideshowbg,.thumbnailbg,.post-more,.title,.id-bar,#comments ol li,.warning,.noway ,.buy,.task,.index h1.category,.index h1.archive,.index h1.tags,.index h1.searchicon,.index h1.links,footer,.footertop,#loperlogo')
		</script>
	<![endif]-->
	
	<!--[if IE]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url');?>/hack/ie6_8.css" />
	<![endif]-->

	<!--[if IE 9]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url');?>/hack/ie9.css" />
	<![endif]-->

<?php  /* hate13.2016.5.20.注释滑动解锁 if (is_singular() && !is_user_logged_in()) : ?> 
	<script src="<?php bloginfo('template_url');?>/qaptcha/jquery/jquery-ui.js"></script>
	<script src="<?php bloginfo('template_url');?>/qaptcha/jquery/jquery.ui.touch.js"></script>
	<script src="<?php bloginfo('template_url');?>/qaptcha/jquery/QapTcha.jquery.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url');?>/qaptcha/jquery/QapTcha.jquery.css" />
	<script type="text/javascript">    
			$(document).ready(function(){
        			$("#QapTcha").QapTcha({disabledSubmit:true});
   	});
	</script>
	<?php endif; */?>
	
	<?php wp_head(); ?>
	<?php if ( is_singular() ){ ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/comments-ajax.js"></script>
	<?php } ?>
</head>
<body>

<?php  if (is_user_logged_in()) : ?> 
<div id="if-logged-in">
	<div class="container">
		<p class="left">
			<a href="<?php bloginfo('url'); ?>/wp-admin/">控制面板</a>
			<a href="<?php bloginfo('url'); ?>/wp-admin/edit.php">文章</a>
			<a href="<?php bloginfo('url'); ?>/wp-admin/edit.php?post_type=page">页面</a>
			<a href="<?php bloginfo('url'); ?>/wp-admin/edit-comments.php">评论</a>
			<a href="<?php bloginfo('url'); ?>/wp-admin/upload.php">媒体库</a> 
			<a href="<?php bloginfo('url'); ?>/wp-admin/themes.php?page=setting.php">主题设置</a> 
		</p>
		<p class="right"><?php wp_loginout() ?></p>
	</div>
</div>
<?php else : ?>	
	<?php if($options['notice']) : ?>
	<div id="if-logged-in">
		<div class="container">
			<p class="noticebar">
			
				
					<?php echo($options['notice_content']); ?>
			</p>
			<p class="snsright">
			
			<?php if($options['feedsnscheck']) : ?>
				<?php if($options['feedrss'] && $options['feedrss_content']) : ?>
					<a href="<?php echo($options['feedrss_content']); ?>" title="<?php bloginfo('name');?> RSS Feed" class="feedsns" rel="nofollow">feed订阅</a>
				<?php else : ?>	
					<a href="<?php bloginfo( 'rss2_url' ); ?>" title="<?php bloginfo('name');?> RSS Feed" class="feedsns" rel="nofollow">feed订阅</a>
				<?php endif; ?>
			<?php else : ?>	
			<?php endif; ?>
			
			<?php if($options['qqcheck'] && $options['qq_sns']) : ?>
			<a href="<?php echo($options['qq_sns']); ?>" title="腾讯微博" class="qqsns" rel="nofollow">腾讯微博</a>
			<?php else : ?>	
			<?php endif; ?>
			
			<?php if($options['sinacheck'] && $options['sina_sns']) : ?>
			<a href="<?php echo($options['sina_sns']); ?>" title="新浪微博" class="sinasns" rel="nofollow">新浪微博</a>
			<?php else : ?>	
			<?php endif; ?>
			
			<?php if($options['twittercheck'] && $options['twitter_sns']) : ?>
			<a href="<?php echo($options['twitter_sns']); ?>" title="twitter" class="twittersns" rel="nofollow">twitter</a> 
			<?php else : ?>	
			<?php endif; ?>	

			<span class="right">
			<?php
				if (!$user_ID) {
				if($_COOKIE["comment_author_" . COOKIEHASH]!=""){
				echo "呦！ ".$_COOKIE["comment_author_" . COOKIEHASH].", 又来啦，随便看看吧。　";
			  } else {
			    echo "你好，欢迎光临！　"; }
			  } else {
				echo ""; } ?>
			</span>
							
			</p>
		</div>
	</div>
	<?php else : ?>	
	<?php endif; ?>

<?php endif; ?>

<div id="main">

	<header>
		<div class="container">
			<div class="hgroup">
				<?php if($options['imageLogo']) : ?>
				
					<?php if( is_front_page() || is_home() ) { ?>
						<h1 class="hidden"><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
						<a class="logo" href="<?php bloginfo('url'); ?>/"></a>
					<?php } else { ?>
						<h2 class="hidden"><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h2>
							<a class="logo" href="<?php bloginfo('url'); ?>/"></a>
					<?php } ?>	
					
				<?php else : ?>	
					<?php if( is_front_page() || is_home() ) { ?>
						<h1><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
					<?php } else { ?>
						<h2><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h2>
					<?php } ?>		
				<?php endif; ?>
			</div>
			<div class="searchbarswitch"></div>
			<div class="searchbar"><div class="searchfade"><?php get_search_form(); ?></div></div>
			
			<div class="clear"></div>
				<nav class="primary">
					<?php if($options['feedrss'] && $options['feedrss_content']) : ?> 
						<a class="feedrss" href="<?php echo($options['feedrss_content']); ?>" title="<?php bloginfo('name');?> RSS Feed">rss</a>
					<?php else : ?>	
						<a class="feedrss" href="<?php bloginfo( 'rss2_url' ); ?>" title="<?php bloginfo('name');?> RSS Feed">rss</a>
					<?php endif; ?>
					<?php wp_nav_menu( array('menu' => 'Header Menu','container'=>'')); ?> 
				</nav><!--soeprimary-->
				
				
			<div class="clear"></div>
			
			<div class="feedtips"></div>
		</div><!-- contasoeiner-->
	</header>
	<div class="clear"></div>
	<div class="container">