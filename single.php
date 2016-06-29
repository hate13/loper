<?php get_header(); ?>

<?php $options = get_option('loper_options'); ?>
	<div id="content">
		
		<section class="layout">
		
		
			<?php $options = get_option('loper_options'); ?>
			
					
			<article class="single">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<div class="breadcrumbsclear"><?php if (function_exists('get_breadcrumbs')){get_breadcrumbs();} ?></div>
					<div class="clear"></div>
						<section class="singletitle">
						<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1> 
						<div class="clear"></div>		
							<div class="singleinfo">
								<span class="singletime"><?php the_time('Y.m.j'); ?></span>
								<span class="singlecom"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>
								
								<?php if($options['postviewopen']) : ?>
								<span class='singleview'><?php if(function_exists('the_views')) {the_views();} ?></span>
								<?php endif; ?>			
								
								<?php edit_post_link("<span class='singleedit'>edit</span>");?>
							</div>
				 
					 
						</section>
						<div class="clear"></div>						
						
							<?php if($options['singlead'] && $options['singleadcode']) : ?> 
							<div class="singlead left">
							<?php echo($options['singleadcode']); ?>
							</div>
							<?php endif; ?>
							
						<div class="post-content">
						
							
							<?php if($options['wumiopen']) : ?>
							<?php the_content(); wumii_get_related_items(); ?>
							<?php else : ?>	
							<?php the_content(); ?>
							<?php endif; ?>	
							
							
							<?php wp_link_pages( $args = array(
							'before'           => "<p class='singlepagestyle'>",
							'after'            => '</p>',
							'next_or_number'   => 'next',
							'pagelink'         => '%'
							) ); ?> 
							
							<?php if($options['endads'] && $options['endadcode']) : ?> 
							<div class="endads">
							<?php echo($options['endadcode']); ?>
							</div>
							<?php endif; ?>
							
						</div>
						<div class="clear"></div>	
						<div class="postinfo">
							<div class="postinfocontent">
								<span class="singletag left"><?php if (the_tags('Tags: ', ', ', ' ')); ?></span>
								<span class="singlerelate right">相关文章</span>
								<span class="singleshare right">分享</span>
								<div class="clear"></div>
									<div class="sharebar"> 
										<a rel="nofollow" id="twitter-share" title="Twitter">Twitter</a>
										<a rel="nofollow" id="kaixin001-share" title="开心网">开心网</a>
										<a rel="nofollow" id="renren-share" title="人人网">人人网</a>
										<a rel="nofollow" id="douban-share" title="豆瓣">豆瓣</a>
										<a rel="nofollow" id="fanfou-share" title="饭否">饭否</a>
										<a rel="nofollow" id="sina-share" title="新浪微博">新浪微博</a>
										<a rel="nofollow" id="tencent-share" title="腾讯微博">腾讯微博</a>
									</div>
									
									<div class="relatebar">
									<?php if($options['wumiopen']) : ?>
									    <div id="wumiiDisplayDiv"></div>
									<?php else : ?>	
											<ul>
												<?php
													$post_tags = wp_get_post_tags($post->ID);
													if ($post_tags) {
													foreach ($post_tags as $tag) 
													{$tag_list[] .= $tag->term_id;}
													$post_tag = $tag_list[ mt_rand(0, count($tag_list) - 1) ];	
													$args = array(
													'tag__in' => array($post_tag),
													'category__not_in' => array(NULL),
													'post__not_in' => array($post->ID),
													'showposts' => 6, 
													'caller_get_posts' => 1
													);
													query_posts($args);
													if (have_posts()) : 
													while (have_posts()) : the_post(); update_post_caches($posts); ?>
													<li><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
												<?php endwhile; else : ?>
													<li>暂无相关文章</li>
												<?php endif; wp_reset_query(); } ?>
											</ul>
									<?php endif; ?>
											
									</div>
								
									<nav class="postnav">
										<span class="postprevious left"><?php  if (get_next_post()) {next_post_link('%link');} else {echo "（已经是最新的）"; }; ?> </span>
										<span class="postnext right"><?php previous_post_link('%link');?></span>
									</nav><!-- post-nav -->
		 
							</div>	
							<div class="clear"></div>
							<div class="postinfoend"></div>		
						</div>
				
		<?php if($options['wumiopen']) : ?>
		<?php wumii_add_load_script(); ?> 
		<?php endif; ?>		
				
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


	<?php include_once("sidebar2.php"); ?>
	</div><!--#content-->
<?php get_footer(); ?>
