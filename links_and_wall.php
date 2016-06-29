<?php
/*
Template Name:Links and wall(友情链接+读者墙)
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
							  
							<h3>读者墙</h3>
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