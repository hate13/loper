<?php

/* hate13.2016.5.20.注释滑动解锁
//滑动验证
	function my_preprocess_comment($comment) {
		if (!is_user_logged_in()) {
			if(!session_id()) session_start();
			if(isset($_POST['iQapTcha']) && empty($_POST['iQapTcha']) && isset($_SESSION['iQaptcha']) && $_SESSION['iQaptcha']) {
				unset($_SESSION['iQaptcha']);
				return($comment);
			} else err("抱歉，你没有通过验证。");//提示语自行修改
		} else
			return($comment);
	}
	add_action('preprocess_comment', 'my_preprocess_comment');
*/
	// 注册sidebar
	if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Sidebar',
		'before_widget' => '<div class="widgit-area">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'单篇文章的Sidebar',
		'before_widget' => '<div class="widgit-area">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	// 文章样式
	add_theme_support( 'post-formats', array( 'audio') );
	
	// WP菜单
	add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {register_nav_menus(array( 'header_menu' => 'Header Menu',));}
	
	foreach(array('rsd_link','index_rel_link','start_post_rel_link', 'wlwmanifest_link' ) as $xx)
	remove_action('wp_head',$xx);
	function the_category_filter($thelist){return preg_replace('/rel=".*?"/','rel="tag"',$thelist);} 
	add_filter('the_category','the_category_filter');
	
	
	
	// 加入缩略图
	add_theme_support( 'post-thumbnails' );
	function post_thumbnail( $width = 120,$height = 100 ){
    global $post;
    if( has_post_thumbnail() ){    //如果有缩略图，则显示缩略图
        $timthumb_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
        $post_timthumb = '<img src="'.get_bloginfo("template_url").'/timthumb.php?src='.$timthumb_src[0].'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="'.$post->post_title.'" class="thumb" />';
        echo $post_timthumb;
    } else {
        $post_timthumb = '';
        ob_start();
        ob_end_clean();
        $output = preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $index_matches);   
        $first_img_src = $index_matches [1];    
        if( !empty($first_img_src) ){    
            $path_parts = pathinfo($first_img_src);   
            $first_img_name = $path_parts["basename"];  
            $first_img_pic = get_bloginfo('wpurl'). '/cache/'.$first_img_name; 
            $first_img_file = ABSPATH. 'cache/'.$first_img_name;   
            $expired = 604800;   
            if ( !is_file($first_img_file) || (time() - filemtime($first_img_file)) > $expired ){
                copy($first_img_src, $first_img_file);   
                $post_timthumb = '<img src="'.$first_img_src.'" alt="'.$post->post_title.'" class="thumb" />';  
            }
            $post_timthumb = '<img src="'.get_bloginfo("template_url").'/timthumb.php?src='.$first_img_pic.'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="'.$post->post_title.'" class="thumb" />';
        } else {$post_timthumb = '<img src="'.get_bloginfo("template_url").'/images/default_thumb.jpg" alt="'.$post->post_title.'" class="thumb" />'; }
        echo $post_timthumb;
		}
	}
	// 截断文字
	function cut_str($string, $sublen, $start = 0, $code = 'UTF-8')
	{
	 if($code == 'UTF-8')
	 {
	 $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
	 preg_match_all($pa, $string, $t_string);
	 if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen))."...";
	 return join('', array_slice($t_string[0], $start, $sublen));
	 }
	 else
	 {
	 $start = $start*2;
	 $sublen = $sublen*2;
	 $strlen = strlen($string);
	 $tmpstr = '';
	 for($i=0; $i<$strlen; $i++)
	 {
	 if($i>=$start && $i<($start+$sublen))
	 {
	 if(ord(substr($string, $i, 1))>129) $tmpstr.= substr($string, $i, 2);
	 else $tmpstr.= substr($string, $i, 1);
	 }
	 if(ord(substr($string, $i, 1))>129) $i++;
	 }
	 if(strlen($tmpstr)<$strlen ) $tmpstr.= "...";
	 return $tmpstr;
	 }
	}


	// 清除评论里的Track计数
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
			return count($comments_by_type['comment']);
		} else {
			return $count;
		}
	}
	//翻页代码
	 function par_pagenavi($range = 5){
		global $paged, $wp_query;
		if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
		if($max_page >= 1){if(!$paged){$paged = 1;}
		if($max_page > $range){
			if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){echo "<a href='" . get_pagenum_link($i) ."'";
			if($i==$paged)echo " class='current'";echo ">$i</a>";}}
		elseif($paged >= ($max_page - ceil(($range/2)))){
			for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
			if($i==$paged)echo " class='current'";echo ">$i</a>";}}
		elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
			for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
		else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
		}
	}
	

	//加入评论表情
	add_filter('smilies_src','custom_smilies_src',1,10);
	function custom_smilies_src ($img_src, $img, $siteurl){
    return get_bloginfo('template_directory').'/images/smilies/'.$img;}
	
	function wp_smilies() {
		global $wpsmiliestrans;
		if ( !get_option('use_smilies') or (empty($wpsmiliestrans))) return;
		$smilies = array_unique($wpsmiliestrans);
		$link='';
		foreach ($smilies as $key => $smile) {
			$file = get_bloginfo('template_directory').'/images/smilies/'.$smile;
			$value = " ".$key." ";
			$img = "<img src=\"{$file}\" alt=\"{$smile}\"/>";
			$imglink = htmlspecialchars($img);
			$link .= "<a href=\"#commentform\" title=\"{$smile}\" onclick=\"document.getElementById('comment').value += '{$value}'\">{$img}</a>&nbsp;";
		}
		echo '<div class="wp_smilies">'.$link.'</div>';
	}
	//面包屑导航
	function get_breadcrumbs()
	{
		global $wp_query;
		if ( !is_home() ){
			
			if ( is_single() ){
				echo '<ul class="breadcrumbs">';
				echo '<li> <a href="'. get_settings('home') .'">Home&nbsp;</a></li>';
				$category = get_the_category();
				$category_id = get_cat_ID( $category[0]->cat_name );
				echo '<li> &gt; Categories &gt; '. get_category_parents( $category_id, TRUE, " &gt; " );
				echo the_title('','', FALSE) ."</li>";
			}
			echo "</ul>";
		}
	}
	
	//禁用半角符号自动转换为全角
	remove_filter('the_content', 'wptexturize');
	// 移除wordpress登陆漏洞
	add_filter('login_errors',create_function('$a', "return null;"));
	// 只搜索文章，排除页面
	add_filter('pre_get_posts','search_filter');
	function search_filter($query) {
	if ($query->is_search) {$query->set('post_type', 'post');}
	return $query;}
	// Read More的截断及跳转(虽然没有用上)
	function custom_excerpt_more($more) {
		return 'Read More &raquo;';
	}
	add_filter('excerpt_more', 'custom_excerpt_more');
	function no_more_jumping($post) {
		return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
	}
	add_filter('excerpt_more', 'no_more_jumping');
	// 加入body和category的class(虽然没有用上)
	function category_id_class($classes) {
		global $post;
		foreach((get_the_category($post->ID)) as $category)
			$classes [] = 'cat-' . $category->cat_ID . '-id';
			return $classes;
	}
	add_filter('post_class', 'category_id_class');
	add_filter('body_class', 'category_id_class');
	//评论邮件回复
	/* comment_mail_notify v1.0 by willin kan. (無勾選欄) */
	function comment_mail_notify($comment_id) {
	  $admin_email = get_bloginfo ('admin_email'); // $admin_email 可改為你指定的 e-mail.
	  $comment = get_comment($comment_id);
	  $comment_author_email = trim($comment->comment_author_email);
	  $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
	  $to = $parent_id ? trim(get_comment($parent_id)->comment_author_email) : '';
	  $spam_confirmed = $comment->comment_approved;
	  if (($parent_id != '') && ($spam_confirmed != 'spam') && ($to != $admin_email)) {
		$wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])); // e-mail 發出點, no-reply 可改為可用的 e-mail.
		$subject = '您在 [' . get_option("blogname") . '] 的留言有了新回复';
		$message = '
		<div style="background-color:#eef2fa; border:1px solid #d8e3e8; color:#111; padding:0 15px; -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px; border-radius:5px;">
		  <p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
		  <p>您在《' . get_the_title($comment->comment_post_ID) . '》的留言:<br />'
		   . trim(get_comment($parent_id)->comment_content) . '</p>
		  <p>' . trim($comment->comment_author) . ' 给你的回复:<br />'
		   . trim($comment->comment_content) . '<br /></p>
		  <p>你可以点击<a href="' . htmlspecialchars(get_comment_link($parent_id, array('type' => 'comment'))) . '">查看完整内容</a></p>
		  <p>欢迎再度光临<a href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
		  <p>(此邮件由系统自动发出, 请勿回复.)</p>
		</div>';
		$from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
		$headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
		wp_mail( $to, $subject, $message, $headers );
		//echo 'mail to ', $to, '<br/> ' , $subject, $message; // for testing
	  }
	}
	add_action('comment_post', 'comment_mail_notify');
	// -- END ----------------------------------------
	
	
	include_once('functions/setting.php');
	include_once('functions/loperwidget.php');
	include_once('functions/shortcode.php');
	include_once('functions/function-user.php');
////////////////////////////////////////////////////////////
////////////////////////隐藏文章图片////////////////////////
		$options = get_option('loper_options'); 
		if($options['noimg']) : 
					
		add_filter('the_content','wpi_image_content_filter',11);
		function wpi_image_content_filter($content){
			if (is_home() || is_front_page()){
			  $content = preg_replace("/<img[^>]+\>/i", "", $content);
			}
			return $content;
		}	 
		 endif; 

////////////////////////////////////////////////////////////
//////////////START wp highslide picture code  /////////////
$options = get_option('loper_options'); 
	if($options['highslide']) :
add_filter('the_content', 'hlHighSlide_replace', '99');
add_action('wp_head', 'highslide_head');

    function highslide_head()
    {
    $hlHighslide_wp_url=get_bloginfo('template_url').'/';
    $defaults_javascript =  
    "\n\t<link href='{$hlHighslide_wp_url}highslide.css' rel='stylesheet' type='text/css' />
		<!--[if IE 6]>
		<link href='{$hlHighslide_wp_url}highslide-ie6.css' rel='stylesheet' type='text/css' />
		<![endif]-->
        <script type='text/javascript' src='{$hlHighslide_wp_url}highslide.js'></script>
    <script type='text/javascript'>
	hs.showCredits = false;  
    hs.graphicsDir = '{$hlHighslide_wp_url}graphics/';
	hs.wrapperClassName = 'wide-border';
    hs.align = 'center';
        hs.transitions = ['expand', 'crossfade'];
        hs.fadeInOut = true;
        hs.dimmingOpacity = 0.3;
		//hs.padToMinWidth = true;
        if (hs.addSlideshow) hs.addSlideshow({
            interval: 5000,
            repeat: false,
            useControls: true,
            fixedControls: 'fit',
            overlayOptions: {
                opacity: .6,
                position: 'bottom center',
                hideOnMouseOut: true
            }
        });
        hs.lang={
    loadingText :     '图片加载中...',
    loadingTitle :    '正在加载图片',
        closeText :       '关闭',
    closeTitle :      '关闭 (Esc)',
        moveTitle :       '移动图片',
        moveText :        '移动',
        restoreTitle :    '点击可关闭或拖动',
        fullExpandTitle : '点击查看原图',
        fullExpandText :  '查看原图'
        };
        hs.registerOverlay({
    html: '<div class=\"closebutton\" onclick=\"return hs.close(this)\" title=\"Close\"></div>',
    position: 'top right',
    fade: 2 // fading the semi-transparent overlay looks bad in IE
        });
        hs.Expander.prototype.onMouseOut = function (sender) {
        sender.close();
        };
        hs.Expander.prototype.onAfterExpand = function (sender) {
        if (!sender.mouseIsOver) sender.close();
         }
         </script>";
 echo $defaults_javascript;
 }
//add onclick event 
function add_onclick_replace ($content)
{ 
$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
$replacement = '<a$1href=$2$3.$4$5 class="highslide"  onclick="return hs.expand(this)" $6>$7 </a>';
$content = preg_replace($pattern, $replacement, $content);
return $content;
}
function hlHighSlide_replace($content)
{
        global $post;
        $defaults = array();
        $defaults['quicktags'] = 'y';
        $defaults['alt'] = 'Enter ALT Tag Description';
        $defaults['title'] = 'Enter Caption Text';
        $defaults['thumbid'] = 'thumb1';
        $defaults['show_caption'] = 'y';
        $defaults['show_close'] = 'y';
        $content=add_onclick_replace($content);
        $HSVars = array("SRC", "ALT", "TITLE", "WIDTH", "HEIGHT","THUMBID");
        $HSVals = array($defaults['href'], $defaults['src'], $defaults['alt'], $defaults['title'], $defaults['thumbid']);
        preg_match_all ('!<img([^>]*)[ ]*[/]{1}>!i', $content, $matches);
        $HSStrings = $matches[0];
        $HSAttributes = $matches[1];
        for ($i = 0; $i < count($HSAttributes); $i++)
        { preg_match_all('!(src|alt|title|width|height|class)="([^"]*)"!i',$HSAttributes[$i],$matches);
          $HSSetVars = $HSSetVals = array();
          for ($j = 0; $j < count($matches[1]); $j++)
            { $HSSetVars[$j] = strtoupper($matches[1][$j]);
              $HSSetVals[$j] = $matches[2][$j];}
		}
        $HSClose = <<<EOT
                <a href="#" onclick="hs.close(this);return false;" class="highslide-close"  title="关闭">Close</a>  
EOT;
                $HSCaption = <<<EOT
                <div class='highslide-caption' id='caption-for-%THUMBID%'>
                {$HSPrvNextLinks}           
                {$HSClose}  
                <div style="clear:both">%TITLE%</div>
                </div>
EOT;
            $HSCode = <<<EOT
<img id="%THUMBID%" src="%SRC%" alt="%ALT%" title="%TITLE%" width="%WIDTH%"  height="%HEIGHT%" />{$HSCaption}
EOT;
          $content = str_replace($HSStrings[$i], $HSCode, $content);
        return $content;
    }
	endif; 
 ////////END wp highslide picture   code////////////////////////
////////////////////////////////////////////////////////////////

/////////////////////////// Commentlist ////////////////////////
function lopercomment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
	global $commentcount;
	if(!$commentcount) { 
		$page = get_query_var('cpage')-1;
		$cpp=get_option('comments_per_page');
		$commentcount = $cpp * $page;
	}
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class('commenttips',$comment_id,$comment_post_ID); ?> >
	<div class="comment-body">
	
			<div class="commenttext">
	
				<div class="gravatar">
					<?php echo get_avatar( get_comment_author_email(), '32'); ?>
				</div><!-- comment-author -->
				<div class="comment-meta">
					<span class="commentid"><?php comment_author_link();?></span>
					<?php get_author_class($comment->comment_author_email,$comment->user_id); ?>
					<?php if(user_can($comment->user_id, 1)){
						echo "<a title='博主' class='vip'></a>";}; 
					?>

					<span class="commenttime">　( <?php comment_date('Y.m.j') ?> <?php comment_time('H:i'); ?> ) </span>
					<span class="editpost"> <?php edit_comment_link(' [edit]'); ?></span>
					<span class="commentidnext"> : </span>
					
					<?php $options = get_option('loper_options'); ?>	
					<?php if(is_page($options['guestname'])):?>
					<?php else: ?>
					<span class="commentcount"><a href="#comment-<?php comment_ID() ?>"><?php if(!$parent_id = $comment->comment_parent) {printf('#%1$s', ++$commentcount);} ?></a></span>
					<?php endif;?>
					
					
				</div><!--comment-meta-->
				<div class="commentp">
					<?php if ($comment->comment_approved == '0') : ?>
					<em>
						<span class="moderation"><?php _e('Your comment is awaiting moderation.') ?></span>
					</em> <br />
					<?php endif; ?>
					<?php comment_text() ?>
					<span class="reply"><?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply','depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
				</div>
			</div><!-- commenttext -->
		<div class="clearline"></div>
	</div><!-- [div-comment] -->
	
  <?php
}
		////////嵌套ping
		function loperpings($comment, $args, $depth) {
			   $GLOBALS['comment'] = $comment;
		?>
			<li id="comment-<?php comment_ID(); ?>">
				<div class="pingdiv">
					<?php comment_author_link(); ?>
<?php get_author_class($comment->comment_author_email,$comment->user_id); ?><?php if(user_can($comment->user_id, 1)){echo "<a title='博主' class='vip'></a>";}; ?>

				</div>
		<?php }
///////////////////// Commentlist结束////////////////////////

				
			
		
/////////////无觅代码预留////////////////
$options = get_option('loper_options'); 
		if($options['wumiopen']) : 


function wumii_get_related_items() {
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
   
    $is_enabled = true;
    
    global $post, $wumii_should_display;
    $wumii_should_display = $is_enabled && !is_plugin_active('wumii-related-posts/wumii-related-posts.php') &&
                     get_post_status($post->ID) == 'publish' && get_post_type() == 'post' &&
                     empty($post->post_password) && !is_preview();
    if (!$wumii_should_display) {
        return;
    }
    $escapedUrl = wumii_html_escape(get_permalink());
    $escapedTitle = wumii_html_escape(the_title('', '', false));
    $escapedPic = wumii_html_escape(wumii_get_thumbnail_src());
    
    echo <<<WUMII_HOOK
    
<div class="wumii-hook">
    <input type="hidden" name="wurl" value="$escapedUrl" />
    <input type="hidden" name="wtitle" value="$escapedTitle" />
    <input type="hidden" name="wpic" value="$escapedPic" />
</div>
WUMII_HOOK;
}

function wumii_add_load_script($num = 4, $mode = 3) {
    global $wumii_should_display;
    
    if (!$wumii_should_display) {
        return;
    }
    
    $sitePrefix = function_exists('home_url') ? home_url() : get_bloginfo('url');
    $themeName = urlencode(get_current_theme());
    echo <<< WUMII_SCRIPT

<p style="margin:0;padding:0;height:1px;">
    <script type="text/javascript"><!--
        var wumiiSitePrefix = "$sitePrefix";
		var wumiiEnableCustomPos = true;
    //--></script>
    <script type="text/javascript" src="http://widget.wumii.com/ext/relatedItemsWidget.htm?type=1&amp;num=$num&amp;mode=$mode&amp;pf=WordPress&amp;theme=$themeName"></script>
    <a href="http://www.wumii.com/widget/relatedItems.htm" style="border:0;">
        <img src="http://static.wumii.com/images/pixel.png" alt="无觅相关文章插件" style="border:0;padding:0;margin:0;" />
    </a>
</p>
WUMII_SCRIPT;
}

function wumii_html_escape($str) {
    return htmlspecialchars(html_entity_decode($str, ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8');
}


function wumii_get_thumbnail_src() {
    if (!function_exists('get_post_thumbnail_id')) {
        return;
    }
    $image_info = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
    if ($image_info) {
        return $image_info[0];
    }
}
endif; 
////////////////////////////////////////////////////////////

//2016.5.20.hate13.修复4.2表情bug
function disable_emoji9s_tinymce($plugins) {
    if (is_array($plugins)) {
        return array_diff($plugins, array(
            'wpemoji'
        ));
    } else {
        return array();
    }
}

/* hate13.2016.5.20.修正表情加载失败 */
//取当前主题下images\smilies\下表情图片路径
function custom_gitsmilie_src($old, $img) {
    return get_stylesheet_directory_uri() . '/images/smilies/' . $img;
}
function init_gitsmilie() {
    global $wpsmiliestrans;
    //默认表情文本与表情图片的对应关系(可自定义修改)
    $wpsmiliestrans = array(
        ':mrgreen:' => 'icon_mrgreen.gif',
        ':neutral:' => 'icon_neutral.gif',
        ':twisted:' => 'icon_twisted.gif',
        ':arrow:' => 'icon_arrow.gif',
        ':shock:' => 'icon_eek.gif',
        ':smile:' => 'icon_smile.gif',
        ':???:' => 'icon_confused.gif',
        ':cool:' => 'icon_cool.gif',
        ':evil:' => 'icon_evil.gif',
        ':grin:' => 'icon_biggrin.gif',
        ':idea:' => 'icon_idea.gif',
        ':oops:' => 'icon_redface.gif',
        ':razz:' => 'icon_razz.gif',
        ':roll:' => 'icon_rolleyes.gif',
        ':wink:' => 'icon_wink.gif',
        ':cry:' => 'icon_cry.gif',
        ':eek:' => 'icon_surprised.gif',
        ':lol:' => 'icon_lol.gif',
        ':mad:' => 'icon_mad.gif',
        ':sad:' => 'icon_sad.gif',
        '8-)' => 'icon_cool.gif',
        '8-O' => 'icon_eek.gif',
        ':-(' => 'icon_sad.gif',
        ':-)' => 'icon_smile.gif',
        ':-?' => 'icon_confused.gif',
        ':-D' => 'icon_biggrin.gif',
        ':-P' => 'icon_razz.gif',
        ':-o' => 'icon_surprised.gif',
        ':-x' => 'icon_mad.gif',
        ':-|' => 'icon_neutral.gif',
        ';-)' => 'icon_wink.gif',
        '8O' => 'icon_eek.gif',
        ':(' => 'icon_sad.gif',
        ':)' => 'icon_smile.gif',
        ':?' => 'icon_confused.gif',
        ':D' => 'icon_biggrin.gif',
        ':P' => 'icon_razz.gif',
        ':o' => 'icon_surprised.gif',
        ':x' => 'icon_mad.gif',
        ':|' => 'icon_neutral.gif',
        ';)' => 'icon_wink.gif',
        ':!:' => 'icon_exclaim.gif',
        ':?:' => 'icon_question.gif',
    );
    //移除WordPress4.2版本更新所带来的Emoji钩子同时挂上主题自带的表情路径
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emoji9s_tinymce');
    add_filter('smilies_src', 'custom_gitsmilie_src', 10, 2);
}
add_action('init', 'init_gitsmilie', 5);

/* hate13.2016.5.20.添加访客VIP样式 */
function get_author_class($comment_author_email,$user_id){
	global $wpdb;
	$author_count = count($wpdb->get_results(
	"SELECT comment_ID as author_count FROM $wpdb->comments WHERE comment_author_email = '$comment_author_email' "));

	/*如果不需要管理员显示VIP标签，就把下面一行的”//“去掉*/
	//$adminEmail = get_option('admin_email');if($comment_author_email ==$adminEmail) return;
	if($author_count>=1 && $author_count<10)
	echo '<a class="vip1" title="评论达人 LV.1"></a>';
	else if($author_count>=10 && $author_count<20) 
	echo '<a class="vip2" title="评论达人 LV.2"></a>';
	else if($author_count>=40 && $author_count<80)
	echo '<a class="vip3" title="评论达人 LV.3"></a>'; 
	else if($author_count>=80 && $author_count<160) 
	echo '<a class="vip4" title="评论达人 LV.4"></a>'; 
	else if($author_count>=160 &&$author_count<320) 
	echo '<a class="vip5" title="评论达人 LV.5"></a>'; 
	else if($author_count>=320 && $author_count<640) 
	echo '<a class="vip6" title="评论达人 LV.6"></a>'; 
	else if($author_count>=640) 
	echo '<a class="vip7" title="评论达人 LV.7"></a>'; 
}