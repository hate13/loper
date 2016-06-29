<div id="comments">
	<!-- 这是必须的…… -->
	<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>
	    <?php die('貌似你做了些不该做的……Big brother is watching you！'); ?>
	<?php endif; ?>
	
	<!-- 如果需要密码-->
	<?php if(!empty($post->post_password)) : ?>
	    <?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
	    <?php endif; ?>
	<?php endif; ?>
	
	<?php $i++; ?>
	
	
	
	<?php
	// for WordPress 2.7 or higher
	if (function_exists('wp_list_comments')) {
		$trackbacks = $comments_by_type['pings'];
	// for WordPress 2.6.3 or lower
	} else {
		$trackbacks = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->comments WHERE comment_post_ID = %d AND comment_approved = '1' AND (comment_type = 'pingback' OR comment_type = 'trackback') ORDER BY comment_date", $post->ID));
	}
?>

				
	
	
				
				
		<?php if($comments) : ?><!-- 如果有评论 -->
		
			<div id="commnents" class="commentsorping">
			
			<div class="commentsays"><?php comments_number('暂时没有回复', '现在只有1个回复', '已经有%个回复' );?></div>
			
				<div class="commentpart"><span class="commentparttri"></span>Comment<?php echo (' (' . (count($comments)-count($trackbacks)) . ')'); ?></div>
				<div class="pingpart"><span class="pingparttri"></span>Trackbacks<?php echo (' (' . count($trackbacks) . ')');?></div>
			</div>
	
			<!-- 嵌套评论 -->
			<?php if ( function_exists('wp_list_comments') ) : ?>
			<div class="commentshow">
				<ol class="commentlist">
				<?php wp_list_comments('type=comment&callback=lopercomment&max_depth=10000'); ?>
				</ol>
				
				<nav class="commentnav">
					<?php paginate_comments_links('prev_text=上一页&next_text=下一页');?>
				</nav>
			</div>
			<?php else : ?>
					
			<?php endif; ?>
			
			
			<!-- 嵌套ping -->
			<?php if ( ! empty($comments_by_type['pings']) ) : ?>
			<ol class="pingtlist">
					<?php wp_list_comments('type=pings&callback=loperpings'); ?>
			</ol>
			<?php else : ?>
			  <ol class="pingtlist">
			  <li>
				<div class="pingdiv">
					还没有Trackbacks
				</div>
				</li>
			  </ol>
			<?php endif; ?>
									
	<?php else : ?>
	  
	<?php endif; ?>
	


	
	<?php if(comments_open()) : ?>
		
		<div id="respond">
		
			<div id="cancel-comment-reply">
				<?php cancel_comment_reply_link('取消回复') ?>
			</div>
			
		    <?php if(get_option('comment_registration') && !$user_ID) : ?>
			
		        <div class="writerinfodiv">You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</div><?php else : ?>
		        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" name="comm_frm">
				
				
		            <?php if($user_ID) : ?>
		                <div class="writerinfodiv">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></div>
		    <?php else : ?>

				<?php if ( $comment_author != "" ) : ?>
					<script type="text/javascript">function setStyleDisplay(id, status){document.getElementById(id).style.display = status;}</script>
					<div class="writerinfodiv">	
								<?php printf(__('哟，<strong>%s</strong>，欢迎回来！'), $comment_author) ?>
								<span id="show_author_info"><a href="javascript:setStyleDisplay('author_info','');setStyleDisplay('show_author_info','none');setStyleDisplay('hide_author_info','');">( 换个马甲 )</a></span>
								<span id="hide_author_info"><a href="javascript:setStyleDisplay('author_info','none');setStyleDisplay('show_author_info','');setStyleDisplay('hide_author_info','none');">( 关闭 )</a></span>
					</div>
				<?php endif; ?>
				 
				
				<div id="author_info">
					
					<div class="writerinfodiv">
						<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" /><label for="author" ><?php _e('昵称'); ?> <?php if ($req) _e('(必填)'); ?></label>
					</div>
					
					<div class="writerinfodiv">
						<input type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" /><label for="email" ><?php _e('邮箱');?> <?php if ($req) _e('(用于显<a href="http://www.gravatar.com" target="_blank">Gravata</a>头像，必填)'); ?></label>
					</div>	
					
					<div class="writerinfodiv">
						<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" /><label for="url" ><?php _e('Website'); ?></label>
					</div>
				 
				</div>
				 
				
				<?php if ( $comment_author != "" ) : ?>
					<script type="text/javascript">setStyleDisplay('hide_author_info','none');setStyleDisplay('author_info','none');</script>
				<?php endif; ?>

	

			<?php endif; ?>
					<div id="QapTcha"></div>
					<?php wp_smilies();?>
		            <p>
		            	<textarea name="comment" id="comment" rows="8" tabindex="4"></textarea>
		            </p>
		
								
					<script type="text/javascript">
						document.getElementById("comment").onkeydown = function (moz_ev)
						{var ev = null;if (window.event){ev = window.event;}else{ev = moz_ev;}if (ev != null && ev.ctrlKey && ev.keyCode == 13){document.getElementById("submit").click();}}
					</script>

		            <p>
		            	<input name="submit" type="submit" id="submit" class="submitstyle normal" tabindex="5" value="Submit Comment　(Ctrl+Enter)"/>
						
		            	<?php comment_id_fields(); ?>
		            </p>
		            <?php do_action('comment_form', $post->ID); ?>
		        </form>
				
			
		</div><!--#respond-->	
	    <?php endif; ?>
		
	<?php else : ?>
	<?php endif; ?>
	
</div><!--#comments-->