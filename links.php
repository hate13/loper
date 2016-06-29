<?php
/*
Template Name:Links(友情链接)
*/
?>


<?php get_header(); ?>
<div id="content">
	<section class="layout">

	<article class="index">

	<h1 class="links"><?php the_title(); ?><span class="pageedit"><?php edit_post_link('<span class="edit">[edit]　</span>');?></span> </h1>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="post-content">
						<div class="link-content">
							
								<?php the_content(__(''));?>
						</div>
					</div>
				<div class="clear"></div>	
					<?php comments_template( '', true ); ?>
	<?php endwhile; else: ?>
		<!--错误页面-->	
					<div class="no-results">
						<h3>出错了，你查看的内容不存在。</h3>
						<p>请试试搜索。另外你可以点击导航栏的Archives或Tags以找到你想要的东西。 </p>
						<p>以下是<strong>最近10篇文章</strong>，或许你会感兴趣。 </p>
						<ul><?php get_archives('postbypost', 10); ?></ul>
					</div>
	<?php endif; ?>
		
	<div class="clear"></div>
			
	</article>	
	</section>


	<?php get_sidebar(); ?>
	</div><!--#content-->
<?php get_footer(); ?>