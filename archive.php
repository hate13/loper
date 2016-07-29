<?php get_header(); ?>
<div id="content">
	<section class="layout">

	<article class="index">

	<h1 class="archive">
		<?php if ( is_day() ) : ?> <!-- if the daily archive is loaded -->
			<?php printf( __( 'Daily Archives: <span>%s</span>' ), get_the_date() ); ?>
		<?php elseif ( is_month() ) : ?> <!-- if the montly archive is loaded -->
			<?php printf( __( 'Monthly Archives: <span>%s</span>' ), get_the_date('Y年F') ); ?>
		<?php elseif ( is_year() ) : ?> <!-- if the yearly archive is loaded -->
			<?php printf( __( 'Yearly Archives: <span>%s</span>' ), get_the_date('Y') ); ?>
		<?php else : ?> <!-- if anything else is loaded, ex. if the tags or categories template is missing this page will load -->
			Blog Archives
		<?php endif; ?>
	</h1>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<?php if ( has_post_format( 'audio' )): ?> 
					<div class="clear"></div>
						<section class="tune">
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<div class="clear"></div>
						<span class="catemusic left"><?php the_content(__(''));?></span> <span class="time right" ><?php edit_post_link('<span class="edit">[edit]　</span>');?></span>
						</section>
						<div class="clear"></div>
						<div class="postmusic"></div>
				<?php  else: ?>
					<!--一般-->	
					<div class="clear"></div>
						<section class="title">
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<div class="clear"></div>
						<span class="cate left"><?php the_time('Y.m.d'); ?> , <?php the_category(', '); ?> , <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> , <?php if(function_exists('the_views')) {the_views();} ?></span> <span class="time right" ><?php edit_post_link('<span class="edit">[edit]　</span>');?></span>
						</section>
						<section class="postcontents cf">
							<?php if($options['thumbnail']) : ?> 
								<?php 
								echo '<div class="thumbnailbg">';echo '<a href="';the_permalink() ;echo '" rel="nofollow">';post_thumbnail( 120,100 );echo '</a>';echo '</div>';
								?>
							<?php else : ?>
								<?php if ( has_post_thumbnail() ) {
								echo '<div class="thumbnailbg">';echo '<a href="';the_permalink() ;echo '" rel="nofollow">';post_thumbnail( 120,100 );echo '</a>';echo '</div>';
								} else { } 
								?>
							<?php endif; ?>
						<div class="post-content">
							<?php if($options['cms']) : ?> 
							<p>
							<?php echo cut_str(strip_tags(apply_filters('the_content',$post->post_content)),185); ?></p>
							<?php else : ?>
							<?php the_content(__(''));?>
							<?php endif; ?>	
							<div class="post-meta" >
								<a class="post-more" href="<?php the_permalink() ?>" title="continue" rel="nofollow"></a>
								<span class="post-tags"><?php if (the_tags('Tags: ', ', ', ' ')); ?></span>
								<div class="clear"></div>	
							</div><!--.postMeta-->
						</div>
						</section>
						<!--一般-->	
						
				<?php endif; ?>
				
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
				<nav id="oldernewer">
					<table>
						<tbody>
							<tr>
								<td><span class=pageprevious><?php previous_posts_link('上一页')?></span></td>
								<td class="pagenumber"><?php par_pagenavi(9); ?></td>
								<td><span class=pagenext><?php next_posts_link('下一页')?></span></td>
							</tr>
						</tbody>
					</table>
				</nav>
			
			</article>	
		</section>


	<?php get_sidebar(); ?>
	</div><!--#content-->
<?php get_footer(); ?>