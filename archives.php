<?php
/*
Template Name: Archives(存档页)
*/
?>


<?php get_header(); ?>
<div id="content">
	<section class="layout">

	<article class="index">

	<h1 class="archive"><?php the_title(); ?></h1>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="clear"></div>					
						<div class="post-content">
								<div class="archivelist">
								<span class="arc-collapse">展开所有月份</span>
									<?php
									// 声明变量
									$previous_year = $year = 0;
									$previous_month = $month = 0;
									$ul_open = false;
									// 获取文章
									$myposts = get_posts('numberposts=-1&amp;orderby=post_date&amp;order=DESC');
									?>
									<?php foreach($myposts as $post) : ?>
										<?php
										global $post;
										// Setup the post variables
									
										setup_postdata($post);
										$year = mysql2date('Y', $post->post_date);
										$month = mysql2date('n', $post->post_date);
										$day = mysql2date('d', $post->post_date);
										
										?>
										<?php if($year != $previous_year || $month != $previous_month) : ?>
											<?php if($ul_open == true) : ?>
											</ul>
											<?php endif; ?>
											<h3><?php the_time('Y年m月'); ?></h3>
											<ul>
											<?php $ul_open = true; ?>
										<?php endif; ?>
										<?php $previous_year = $year; $previous_month = $month; ?>
										<li><span class="the_article"><?php echo $day ?>日 : <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></li>
									<?php endforeach; ?>
										</ul>
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
		
	<div class="clear"></div>
			
	</article>	
	</section>


	<?php get_sidebar(); ?>
	</div><!--#content-->
<?php get_footer(); ?>