<?php

/////////////loper主题分类目录/////////
class loper_widget1 extends WP_Widget{
     function loper_widget1() {
         $widget_ops = array('description' => '双栏的分类目录');
         $this->WP_Widget('loper_widget1', 'loper主题分类目录', $widget_ops);
     }
     function widget($args, $instance) {
         extract($args);
         $title = apply_filters('widget_title',esc_attr($instance['title']));
         $limit = strip_tags($instance['limit']);
		 $orderby = strip_tags($instance['orderby']);
         echo $before_widget.$before_title.$title.$after_title;
?> 
         <ul  class="cate2row cf">
			<?php wp_list_categories( array(
			'style' => 'list',
			'show_count' => $limit,
			'hide_empty' => 1,
			'hierarchical' => ture,
			'title_li' => '',
			'orderby' => $orderby,
			'order' => 'ASC',
			'echo' => 1
			)
			);
		?>
		</ul>		
		 
<?php		 
         echo $after_widget;
     }
     function update($new_instance, $old_instance) {
         if (!isset($new_instance['submit'])) {
             return false;
         }
         $instance = $old_instance;
         $instance['title'] = strip_tags($new_instance['title']);
         $instance['limit'] = strip_tags($new_instance['limit']);
		 $instance['orderby'] = strip_tags($new_instance['orderby']);
         return $instance;
     }
     function form($instance) {
         global $wpdb;
         $instance = wp_parse_args((array) $instance, array('title'=> '', 'limit' => '', 'orderby' => ''));
         $title = esc_attr($instance['title']);
         $limit = strip_tags($instance['limit']);
		 $orderby = strip_tags($instance['orderby']);
 ?>
         <p>
             <label for="<?php echo $this->get_field_id('title'); ?>">标题：<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
         </p>
         <p>
             <label for="<?php echo $this->get_field_id('limit'); ?>">是否显示文章统计：<br>输入“1”为显示，输入“0”为不显示<input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo $limit; ?>" /></label>
         </p>
		 <p>
             <label for="<?php echo $this->get_field_id('orderby'); ?>">排序：<br>● 使用普通排序，输入“name”<br>● 使用 My Category Order 插件排序，输入“order”<input class="widefat" id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>" type="text" value="<?php echo $orderby; ?>" /></label>
         </p>
         <input type="hidden" id="<?php echo $this->get_field_id('submit'); ?>" name="<?php echo $this->get_field_name('submit'); ?>" value="1" />
 <?php
     }
 }
 add_action('widgets_init', 'loper_widget1_init');
 function loper_widget1_init() {
     register_widget('loper_widget1');
 }
 

///////////////////
class loper_widget2 extends WP_Widget {
     function loper_widget2() {
         $widget_ops = array('description' => '显示带有头像的最新评论');
         $this->WP_Widget('loper_widget2', 'loper主题最新评论', $widget_ops);
     }
     function widget($args, $instance) {
         extract($args);
         $title = apply_filters('widget_title',esc_attr($instance['title']));
         $limit = strip_tags($instance['limit']);
		 $email = strip_tags($instance['email']);
         echo $before_widget.$before_title.$title.$after_title;
?> 
         <ul class="commm">
						<?php
						global $wpdb;
						$my_email ="'" . $email . "'";
						$rc_comms = $wpdb->get_results("
						 SELECT ID, post_title, comment_ID, comment_author,comment_author_email, comment_content
						 FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts
						 ON ($wpdb->comments.comment_post_ID  = $wpdb->posts.ID)
						 WHERE comment_approved = '1'
						 AND comment_type = ''
						 AND post_password = ''
						 AND comment_author_email != $my_email
						 ORDER BY comment_date_gmt
						 DESC LIMIT $limit
						 ");
						$rc_comments = '';
						foreach ($rc_comms as $rc_comm) { //get_avatar($rc_comm,$size='50')
						$rc_comments .= "<li><a href='"
						. get_permalink($rc_comm->ID) . "#comment-" . $rc_comm->comment_ID
						. "' title='在 " . $rc_comm->post_title . " 发表的评论'><span class='comer'>".$rc_comm->comment_author." : </span>".cut_str(strip_tags($rc_comm->comment_content),14)."</a><span class='comeravatar'>" . get_avatar($rc_comm,$size='25') ."</span></li>\n";
						}
						$rc_comments = convert_smilies($rc_comments);
						echo $rc_comments;
						?>	

		</ul>
		 
<?php		 
         echo $after_widget;
     }
     function update($new_instance, $old_instance) {
         if (!isset($new_instance['submit'])) {
             return false;
         }
         $instance = $old_instance;
         $instance['title'] = strip_tags($new_instance['title']);
         $instance['limit'] = strip_tags($new_instance['limit']);
		 $instance['email'] = strip_tags($new_instance['email']);
         return $instance;
     }
     function form($instance) {
         global $wpdb;
         $instance = wp_parse_args((array) $instance, array('title'=> '', 'limit' => '', 'email' => ''));
         $title = esc_attr($instance['title']);
         $limit = strip_tags($instance['limit']);
		 $email = strip_tags($instance['email']);
 ?>
         <p>
             <label for="<?php echo $this->get_field_id('title'); ?>">标题：<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
         </p>
         <p>
             <label for="<?php echo $this->get_field_id('limit'); ?>">显示数量：<input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo $limit; ?>" /></label>
         </p>
		 <p>
             <label for="<?php echo $this->get_field_id('email'); ?>">输入你的邮箱以排除显示你的回复: <br>（留空则不排除）<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" /></label>
         </p>
         <input type="hidden" id="<?php echo $this->get_field_id('submit'); ?>" name="<?php echo $this->get_field_name('submit'); ?>" value="1" />
 <?php
     }
 }
 add_action('widgets_init', 'loper_widget2_init');
 function loper_widget2_init() {
     register_widget('loper_widget2');
 }
 


   ///////////////////最新文章////////////

class loper_widget3 extends WP_Widget {
     function loper_widget3() {
         $widget_ops = array('description' => '配合主题样式，多了个悬停箭头出现');
         $this->WP_Widget('loper_widget3', 'loper主题最新文章', $widget_ops);
     }
     function widget($args, $instance) {
         extract($args);
         $title = apply_filters('widget_title',esc_attr($instance['title']));
         $limit = strip_tags($instance['limit']);
         echo $before_widget.$before_title.$title.$after_title;
?> 
         <ul class="ulstyle">
					<?php $posts = query_posts($query_string . "orderby=date&showposts=$limit" ); ?>  
					<?php while(have_posts()) : the_post(); ?> 
					<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a><span class="sidebaraction"></span></li> 
					<?php endwhile; ?> 		
					</ul>	
		 
<?php		 
         echo $after_widget;
     }
     function update($new_instance, $old_instance) {
         if (!isset($new_instance['submit'])) {
             return false;
         }
         $instance = $old_instance;
         $instance['title'] = strip_tags($new_instance['title']);
         $instance['limit'] = strip_tags($new_instance['limit']);
         return $instance;
     }
     function form($instance) {
         global $wpdb;
         $instance = wp_parse_args((array) $instance, array('title'=> '', 'limit' => ''));
         $title = esc_attr($instance['title']);
         $limit = strip_tags($instance['limit']);
 ?>
         <p>
             <label for="<?php echo $this->get_field_id('title'); ?>">标题：<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
         </p>
         <p>
             <label for="<?php echo $this->get_field_id('limit'); ?>">显示数量：<input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo $limit; ?>" /></label>
         </p>
         <input type="hidden" id="<?php echo $this->get_field_id('submit'); ?>" name="<?php echo $this->get_field_name('submit'); ?>" value="1" />
 <?php
     }
 }
 add_action('widgets_init', 'loper_widget3_init');
 function loper_widget3_init() {
     register_widget('loper_widget3');
 }
 /////////////////
 
 
/////////////随机文章////////////

class loper_widget4 extends WP_Widget {
     function loper_widget4() {
         $widget_ops = array('description' => '配合主题样式，多了个悬停箭头出现');
         $this->WP_Widget('loper_widget4', 'loper主题随机文章', $widget_ops);
     }
     function widget($args, $instance) {
         extract($args);
         $title = apply_filters('widget_title',esc_attr($instance['title']));
         $limit = strip_tags($instance['limit']);
         echo $before_widget.$before_title.$title.$after_title;
?> 
		<ul class="ulstyle">
		<?php $posts = query_posts($query_string . "orderby=rand&showposts=$limit()" ); ?>  
				<?php while(have_posts()) : the_post(); ?> 
                <li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a><span class="sidebaraction"></span></li> 
        <?php endwhile; ?> 
		</ul>
		 
<?php		 
         echo $after_widget;
     }
     function update($new_instance, $old_instance) {
         if (!isset($new_instance['submit'])) {
             return false;
         }
         $instance = $old_instance;
         $instance['title'] = strip_tags($new_instance['title']);
         $instance['limit'] = strip_tags($new_instance['limit']);
         return $instance;
     }
     function form($instance) {
         global $wpdb;
         $instance = wp_parse_args((array) $instance, array('title'=> '', 'limit' => ''));
         $title = esc_attr($instance['title']);
         $limit = strip_tags($instance['limit']);
 ?>
         <p>
             <label for="<?php echo $this->get_field_id('title'); ?>">标题：<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
         </p>
         <p>
             <label for="<?php echo $this->get_field_id('limit'); ?>">显示数量：<input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo $limit; ?>" /></label>
         </p>
         <input type="hidden" id="<?php echo $this->get_field_id('submit'); ?>" name="<?php echo $this->get_field_name('submit'); ?>" value="1" />
 <?php
     }
 }
 add_action('widgets_init', 'loper_widget4_init');
 function loper_widget4_init() {
     register_widget('loper_widget4');
 }
 /////////////////
 
 
/////////////随机文章////////////

class loper_widget5 extends WP_Widget {
     function loper_widget5() {
         $widget_ops = array('description' => '仅仅是双栏的而已');
         $this->WP_Widget('loper_widget5', 'loper主题友情链接', $widget_ops);
     }
     function widget($args, $instance) {
         extract($args);
         $title = apply_filters('widget_title',esc_attr($instance['title']));
        
         echo $before_widget.$before_title.$title.$after_title;
?> 
		<ul  class="cate2row link2">
						   <?php wp_list_bookmarks('title_li=&categorize=0'); ?>
		</ul>
<?php		 
         echo $after_widget;
     }
     function update($new_instance, $old_instance) {
         if (!isset($new_instance['submit'])) {
             return false;
         }
         $instance = $old_instance;
         $instance['title'] = strip_tags($new_instance['title']);
      
         return $instance;
     }
     function form($instance) {
         global $wpdb;
         $instance = wp_parse_args((array) $instance, array('title'=> ''));
         $title = esc_attr($instance['title']);
       
 ?>
         <p>
             <label for="<?php echo $this->get_field_id('title'); ?>">标题：<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
         </p>
         <input type="hidden" id="<?php echo $this->get_field_id('submit'); ?>" name="<?php echo $this->get_field_name('submit'); ?>" value="1" />
 <?php
     }
 }
 add_action('widgets_init', 'loper_widget5_init');
 function loper_widget5_init() {
     register_widget('loper_widget5');
 }
 /////////////////

?>