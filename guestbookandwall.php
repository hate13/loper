<?php 
/*
Template Name: GuestBook and wall(留言本+读者墙)
*/ 
?>


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
						<!--读者墙-->			
						<?php  
									 $identity="comment_author";
									 $passwordpost = " AND post_password=''";
									 $userexclude = " AND user_id='0'";
									 $approved = " AND comment_approved='1'";
									 $interval = 30;
									 $shownumber = 20;
									 $counts = $wpdb->get_results("SELECT COUNT(" . $identity . ") AS cnt, comment_author, comment_author_url,comment_author_email
									  FROM (SELECT * FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts
									 ON ($wpdb->posts.ID=$wpdb->comments.comment_post_ID)
									 WHERE MONTH(comment_date)=MONTH(now()) and YEAR(comment_date)=YEAR(now())" .
									  $userexclude . $passwordpost . $approved . ") AS tempcmt
									  GROUP BY " . $identity . " ORDER BY cnt DESC LIMIT " . $shownumber); ?>
							  
								 <ul class="avatarsul">
								 <?php if ( $counts ) : foreach ($counts as $count) :
								 echo  '<li class="avatarsli">' . '<a href="'. $count->comment_author_url .
									'" target="_blank" title="' . $count->comment_author . ' ('. $count->cnt . '条评论)">' .get_avatar($count->comment_author_email,32).' </a></li>';
								 endforeach; endif;
								 ?>
								 </ul>
									 <script type="text/javascript">    
											jQuery(document).ready(function($) {
												$(".avatarsli img").hover(				
													function() {				　
													$(this).animate({marginTop:"0px"},200);
													}, 
													function() {  
													$(this).animate({marginTop:"5px"},150);   });
												});
									</script>
									
							<!--读者墙结束-->	
							<div class="clear"></div>
							<?php the_content(__(''));?>
						</div>
				<div class="clear"></div>	
				 <?php comments_template( '/guestcomments.php', true ); ?>

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
