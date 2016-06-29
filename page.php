<?php get_header(); ?>
	<div id="content">
	<section class="layout">	
		<article class="pages">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="clear"></div>
						<section class="title">
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<div class="clear"></div>
						<span class="cate left"><?php echo get_post_meta( $post->ID, '_loper_short-text', true ); ?></span> 
						<span class="time right" ><?php edit_post_link('<span class="edit">[edit]　</span>');?></span>
						</section>
						<div class="clear"></div>
						<?php if ( has_post_thumbnail() ) {
							echo '<div class="thumbnailbg">';echo '<a href="';the_permalink() ;echo '" rel="nofollow">';post_thumbnail( 120,100 );echo '</a>';echo '</div>';
							} else { } 
							?>
						<div class="post-content">
							<?php the_content(__(''));?>
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
		</article>	
	</section>

	<?php get_sidebar(); ?>
	</div><!--#content-->
<?php get_footer(); ?>
