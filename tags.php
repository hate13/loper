<?php
/*
Template Name: Tags(标签页)
*/
?>



<?php get_header(); ?>
<div id="content">
	<section class="layout">
	<article class="index">
	<?php $options = get_option('loper_options'); ?>

	<h1 class="tags"><?php the_title(); ?><span class="pageedit"><?php edit_post_link('<span class="edit">[edit]　</span>');?></span> </h1>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="post-content">
							<div class="tag-content">
							<?php wp_tag_cloud('smallest=13&largest=13&unit=px&number=100&format=flat&orderby=count&order=DESC'); ?>
							<?php if($options['tagcloudsopen']) : ?>
							<?php wp_cumulus_insert(); ?>
							<?php endif; ?>
							
							
							</div>
						</div>
	<?php endwhile; else: ?>
		<!--错误页面-->	
					<div class="no-results">
						<h3>出错了，你查看的内容不存在。</h3>
						<p>请试试搜索。另外你可以点击导航栏的Archives或Tags以找到你想要的东西。 </p>
						<p>以下是<strong>最近10篇文章</strong>，或许你会感兴趣。 </p>
						<ul><?php get_archives('postbypost', 10); ?></ul>
					</div>
	<?php endif; ?>
		

			
			</article>	
		</section>


	<?php get_sidebar(); ?>
	</div><!--#content-->
<?php get_footer(); ?>