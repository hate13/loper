<?php

	////////////////////////////////////////////////////////
	////////////////    LOPER Opinion   ////////////////////
	////////////////////////////////////////////////////////
	class loperOptions {
	function getOptions() {
		$options = get_option('loper_options');
		if (!is_array($options)) {
			$options['notice'] = false;
			$options['notice_content'] = '';
			$options['feedrss'] = false;
			$options['feedrss_content'] = '';
			$options['description_content'] = '';
			$options['keyword_content'] = '';
			$options['headcode'] = '';
			$options['footercode'] = '';
			$options['imageLogo'] = false;
			$options['thumbnail'] = false;
			$options['noimg'] = false;
			$options['lazyload'] = false;
			$options['highslide'] = false;
				/**幻灯片的**/
				$options['slideshowornot'] = false;
				$options['slideshow1'] = false;
				$options['slideshow1_link'] = '';
				$options['slideshow1_img'] = '';
				$options['slideshow1_title'] = '';
				$options['slideshow1_h3'] = '';
				$options['slideshow1_text'] = '';
				$options['slideshow2'] = false;
				$options['slideshow2_link'] = '';
				$options['slideshow2_img'] = '';
				$options['slideshow2_title'] = '';
				$options['slideshow2_h3'] = '';
				$options['slideshow2_text'] = '';
				$options['slideshow3'] = false;
				$options['slideshow3_link'] = '';
				$options['slideshow3_img'] = '';
				$options['slideshow3_title'] = '';
				$options['slideshow3_h3'] = '';
				$options['slideshow3_text'] = '';
				$options['slideshow4'] = false;
				$options['slideshow4_link'] = '';
				$options['slideshow4_img'] = '';
				$options['slideshow4_title'] = '';
				$options['slideshow4_h3'] = '';
				$options['slideshow4_text'] = '';
				$options['slideshow5'] = false;
				$options['slideshow5_link'] = '';
				$options['slideshow5_img'] = '';
				$options['slideshow5_title'] = '';
				$options['slideshow5_h3'] = '';
				$options['slideshow5_text'] = '';
				$options['slideshow6'] = false;
				$options['slideshow6_link'] = '';
				$options['slideshow6_img'] = '';
				$options['slideshow6_title'] = '';
				$options['slideshow6_h3'] = '';
				$options['slideshow6_text'] = '';
				/**幻灯片end**/
			$options['singlead'] = false;
			$options['singleadcode'] = '';
			$options['sideads'] = false;
			$options['sideadcode'] = '';
			$options['endads'] = false;
			$options['endadcode'] = '';
			$options['postviewopen'] = false;
			$options['tagcloudsopen'] = false;
			$options['wumiopen'] = false;
			$options['updown'] = false;
			$options['footerswitch'] = false;
			$options['jqueryurl'] = false;
			$options['sideid'] = '';
			$options['sidedes'] = '';
			$options['googlesearch'] = false;
			$options['twittercheck'] = false;
			$options['twitter_sns'] = '';
			$options['sinacheck'] = false;
			$options['sina_sns'] = '';
			$options['qqcheck'] = false;
			$options['qq_sns'] = '';
			$options['feedsnscheck'] = false;
			$options['cms'] = false;
			$options['guestname'] = '';
			// TODO: 在这里追加其他选项
			update_option('loper_options', $options);
		}
		return $options;
	}
	/* -- 初始化 -- */
	function init() {
		if(isset($_POST['loper_save'])) {
			$options = loperOptions::getOptions();
			// 数据限制
			if ($_POST['notice']) { $options['notice'] = (bool)true;} else {$options['notice'] = (bool)false;}
			if ($_POST['imageLogo']) { $options['imageLogo'] = (bool)true; } else { $options['imageLogo'] = (bool)false; }			
			$options['notice_content'] = stripslashes($_POST['notice_content']);
			$options['description_content'] = stripslashes($_POST['description_content']);
			$options['keyword_content'] = stripslashes($_POST['keyword_content']);
			if ($_POST['feedrss']) { $options['feedrss'] = (bool)true; } else { $options['feedrss'] = (bool)false; }		
			$options['feedrss_content'] = stripslashes($_POST['feedrss_content']);
			$options['headcode'] = stripslashes($_POST['headcode']);
			$options['footercode'] = stripslashes($_POST['footercode']);
			if ($_POST['thumbnail']) { $options['thumbnail'] = (bool)true; } else { $options['thumbnail'] = (bool)false; }
			if ($_POST['noimg']) { $options['noimg'] = (bool)true; } else { $options['noimg'] = (bool)false; }
			if ($_POST['lazyload']) { $options['lazyload'] = (bool)true; } else { $options['lazyload'] = (bool)false; }
			if ($_POST['highslide']) { $options['highslide'] = (bool)true; } else { $options['highslide'] = (bool)false; }
				/**幻灯片的**/
				if ($_POST['slideshowornot']) { $options['slideshowornot'] = (bool)true; } else { $options['slideshowornot'] = (bool)false; }
				if ($_POST['slideshow1']) { $options['slideshow1'] = (bool)true; } else { $options['slideshow1'] = (bool)false; }
				$options['slideshow1_link'] = stripslashes($_POST['slideshow1_link']);
				$options['slideshow1_img'] = stripslashes($_POST['slideshow1_img']);
				$options['slideshow1_title'] = stripslashes($_POST['slideshow1_title']);
				$options['slideshow1_h3'] = stripslashes($_POST['slideshow1_h3']);
				$options['slideshow1_text'] = stripslashes($_POST['slideshow1_text']);
				if ($_POST['slideshow2']) { $options['slideshow2'] = (bool)true; } else { $options['slideshow2'] = (bool)false; }
				$options['slideshow2_link'] = stripslashes($_POST['slideshow2_link']);
				$options['slideshow2_img'] = stripslashes($_POST['slideshow2_img']);
				$options['slideshow2_title'] = stripslashes($_POST['slideshow2_title']);
				$options['slideshow2_h3'] = stripslashes($_POST['slideshow2_h3']);
				$options['slideshow2_text'] = stripslashes($_POST['slideshow2_text']);
				if ($_POST['slideshow3']) { $options['slideshow3'] = (bool)true; } else { $options['slideshow3'] = (bool)false; }
				$options['slideshow3_link'] = stripslashes($_POST['slideshow3_link']);
				$options['slideshow3_img'] = stripslashes($_POST['slideshow3_img']);
				$options['slideshow3_title'] = stripslashes($_POST['slideshow3_title']);
				$options['slideshow3_h3'] = stripslashes($_POST['slideshow3_h3']);
				$options['slideshow3_text'] = stripslashes($_POST['slideshow3_text']);
				if ($_POST['slideshow4']) { $options['slideshow4'] = (bool)true; } else { $options['slideshow4'] = (bool)false; }
				$options['slideshow4_link'] = stripslashes($_POST['slideshow4_link']);
				$options['slideshow4_img'] = stripslashes($_POST['slideshow4_img']);
				$options['slideshow4_title'] = stripslashes($_POST['slideshow4_title']);
				$options['slideshow4_h3'] = stripslashes($_POST['slideshow4_h3']);
				$options['slideshow4_text'] = stripslashes($_POST['slideshow4_text']);
				if ($_POST['slideshow4']) { $options['slideshow4'] = (bool)true; } else { $options['slideshow4'] = (bool)false; }
				$options['slideshow4_link'] = stripslashes($_POST['slideshow4_link']);
				$options['slideshow4_img'] = stripslashes($_POST['slideshow4_img']);
				$options['slideshow4_title'] = stripslashes($_POST['slideshow4_title']);
				$options['slideshow4_h3'] = stripslashes($_POST['slideshow4_h3']);
				$options['slideshow4_text'] = stripslashes($_POST['slideshow4_text']);
				if ($_POST['slideshow5']) { $options['slideshow5'] = (bool)true; } else { $options['slideshow5'] = (bool)false; }
				$options['slideshow5_link'] = stripslashes($_POST['slideshow5_link']);
				$options['slideshow5_img'] = stripslashes($_POST['slideshow5_img']);
				$options['slideshow5_title'] = stripslashes($_POST['slideshow5_title']);
				$options['slideshow5_h3'] = stripslashes($_POST['slideshow5_h3']);
				$options['slideshow5_text'] = stripslashes($_POST['slideshow5_text']);
				if ($_POST['slideshow6']) { $options['slideshow6'] = (bool)true; } else { $options['slideshow6'] = (bool)false; }
				$options['slideshow6_link'] = stripslashes($_POST['slideshow6_link']);
				$options['slideshow6_img'] = stripslashes($_POST['slideshow6_img']);
				$options['slideshow6_title'] = stripslashes($_POST['slideshow6_title']);
				$options['slideshow6_h3'] = stripslashes($_POST['slideshow6_h3']);
				$options['slideshow6_text'] = stripslashes($_POST['slideshow6_text']);
				/**幻灯片end**/
			if ($_POST['singlead']) { $options['singlead'] = (bool)true; } else { $options['singlead'] = (bool)false; };
			$options['singleadcode'] = stripslashes($_POST['singleadcode']);
			if ($_POST['sideads']) { $options['sideads'] = (bool)true; } else { $options['sideads'] = (bool)false; };
			$options['sideadcode'] = stripslashes($_POST['sideadcode']);
			if ($_POST['endads']) { $options['endads'] = (bool)true; } else { $options['endads'] = (bool)false; };
			$options['endadcode'] = stripslashes($_POST['endadcode']);		
			if ($_POST['postviewopen']) { $options['postviewopen'] = (bool)true; } else { $options['postviewopen'] = (bool)false; };
			if ($_POST['tagcloudsopen']) { $options['tagcloudsopen'] = (bool)true; } else { $options['tagcloudsopen'] = (bool)false; };
			if ($_POST['wumiopen']) { $options['wumiopen'] = (bool)true; } else { $options['wumiopen'] = (bool)false; };
			if ($_POST['updown']) { $options['updown'] = (bool)true; } else { $options['updown'] = (bool)false; };
			if ($_POST['footerswitch']) { $options['footerswitch'] = (bool)true; } else { $options['footerswitch'] = (bool)false; };	
			if ($_POST['jqueryurl']) { $options['jqueryurl'] = (bool)true; } else { $options['jqueryurl'] = (bool)false; };		
			$options['sideid'] = stripslashes($_POST['sideid']);
			$options['sidedes'] = stripslashes($_POST['sidedes']);
			if ($_POST['googlesearch']) { $options['googlesearch'] = (bool)true; } else { $options['googlesearch'] = (bool)false; }
			if ($_POST['twittercheck']) { $options['twittercheck'] = (bool)true; } else { $options['twittercheck'] = (bool)false; }
			$options['twitter_sns'] = stripslashes($_POST['twitter_sns']);
			if ($_POST['sinacheck']) { $options['sinacheck'] = (bool)true; } else { $options['sinacheck'] = (bool)false; }
			$options['sina_sns'] = stripslashes($_POST['sina_sns']);
			if ($_POST['qqcheck']) { $options['qqcheck'] = (bool)true; } else { $options['qqcheck'] = (bool)false; }
			$options['qq_sns'] = stripslashes($_POST['qq_sns']);
			if ($_POST['feedsnscheck']) { $options['feedsnscheck'] = (bool)true; } else { $options['feedsnscheck'] = (bool)false; }
			if ($_POST['cms']) { $options['cms'] = (bool)true; } else { $options['cms'] = (bool)false; }
			$options['guestname'] = stripslashes($_POST['guestname']);
			// TODO: 在这追加其他选项的限制处理
			
			update_option('loper_options', $options);
			echo "<div id='message' class='updated fade'><p><strong>数据已更新</strong></p></div>";
		} else {loperOptions::getOptions();	}
		
		add_theme_page("Loper设置", "Loper设置", 'edit_themes', basename(__FILE__), array('loperOptions', 'display'));
	}

	/* -- 标签页 -- */
	function display() {
		$options = loperOptions::getOptions();
?>



 <style type="text/css">
.wrap{padding:10px; font-size:12px; line-height:24px;}
.wrap p{}
strong{ color:#666}
textarea{ width:100%; margin:0 20px 0 0;  overflow:auto}
.none{display:none;}
fieldset{ border:1px solid #ddd;margin:5px 0 10px;padding:20px 15px 15px;-moz-border-radius:5px;-khtml-border-radius:5px;-webkit-border-radius:5px;border-radius:5px; width:600px}
fieldset fieldset{ width:500px;} 
fieldset:hover{border-color:#bbb;}
fieldset legend{padding:0 5px;color:#777;font-size:14px;font-weight:700;cursor:pointer}
fieldset .line{border-bottom:1px solid #e5e5e5;padding-bottom:15px;}
</style>


<script type="text/javascript">
jQuery(document).ready(function($){  
$(".toggle").click(function(){$(this).next().slideToggle('slow')});
});
</script>



<form action="#" method="post" enctype="multipart/form-data" name="loper_form" id="loper_form" />

	<div class="wrap">
	<div id="icon-options-general" class="icon32"><br></div>
					<h2>Loper设置</h2>
					<br/>
					<br/>
		
					<fieldset>
					<legend class="toggle">站点信息设置</legend>
						<div class="none">
						网站首页描述 （最好200字以内）<br/><label><textarea name="description_content"  rows="2"  id="description_content" style="width:310px;"  ><?php echo($options['description_content']); ?></textarea></label><br/><br/>
						
						网站首页关键词 （多个关键词用英文的逗号隔开）<br/><label><textarea name="keyword_content"  rows="1"  id="keyword_content" style="width:310px;" ><?php echo($options['keyword_content']); ?></textarea></label><br/><br/>
						
						<label><input name="imageLogo" type="checkbox" value="checkbox" <?php if($options['imageLogo']) echo "checked='checked'"; ?> />使用图片logo。（编辑主题images文件夹的logo.psd，保存图片为logo.png，替换默认图片）</label><br/><br/>
						
				
						<label><input name="feedrss" type="checkbox" value="checkbox" <?php if($options['feedrss']) echo "checked='checked'"; ?> />使用其他feed地址，填写feed地址，（加上http://）</label><br/>
						<label><textarea name="feedrss_content"  rows="1"  id="feedrss_content" style="width:310px;"  ><?php echo($options['feedrss_content']); ?></textarea></label>	<br/><br/>	

						留言本模板标题（请看相关说明）<br/><label><textarea name="guestname"  rows="1" style="width:310px;"  ><?php echo($options['guestname']); ?></textarea></label><br/><br/>					
						
						<fieldset>
						<legend class="toggle">侧边栏ID信息</legend>
							<div class="none">
							注意：描述信息如果需要换行，请使用全角空格进行填充直到换行。<br/>
							<br/>
							
							ID昵称<br/>
							<label><textarea name="sideid"  rows="1"  id="sideid" style="width:310px;"  ><?php echo($options['sideid']); ?></textarea></label>
							<br/><br/>
							
							ID描述（相对于边栏显示两行）<br/>
							<label><textarea name="sidedes"  rows="2"  id="sidedes" style="width:310px;"  ><?php echo($options['sidedes']); ?></textarea></label>		
							<br/><br/>
							</div>
						</fieldset>
						

						
						
						<fieldset>
						<legend class="toggle">统计代码添加栏</legend>
							<div class="none">
							向网页的<code>&lt;head&gt;</code>内和<code>&lt;footer&gt;</code>内添加内容。通常用来放置Google Analytics等分析统计代码或其他验证信息。<br/>
							<br/>
							
							<code>&lt;head&gt;区</code><br/>
							<label><textarea name="headcode"  rows="6"  id="headcode" style="width:400px;"  ><?php echo($options['headcode']); ?></textarea></label>
							<br/><br/>
							
							<code>&lt;footer&gt;</code>区<br/>
							<label><textarea name="footercode"  rows="6"  id="footercode" style="width:400px;"  ><?php echo($options['footercode']); ?></textarea></label>		
							<br/><br/>
							</div>
						</fieldset>
							
						</div>
					</fieldset>
					
					<fieldset>
						<legend class="toggle">顶部公告栏</legend>
							<div class="none">
							注意：公告栏在博主登陆后会显示管理模式。如果需要查看公告信息，请退出登陆模式或者使用其他浏览器。<br/><br/>
							<label><input name="notice" type="checkbox" value="checkbox" <?php if($options['notice']) echo "checked='checked'"; ?> />开启顶部公告栏,并填写公告信息</label><br/>
							<label><textarea name="notice_content"  rows="4"  id="notice_content" style="width:400px;"  ><?php echo($options['notice_content']); ?></textarea></label>
							<br/><br/>
							
							<fieldset>
								<legend class="toggle">SNS站点信息设置</legend>
							<div class="none">
							<label><input name="notice" type="checkbox" value="checkbox" <?php if($options['notice']) echo "checked='checked'"; ?> />开启顶部公告栏右边的SNS信息</label><br/>
							<br/>	
							<label><input name="twittercheck" type="checkbox" value="checkbox" <?php if($options['twittercheck']) echo "checked='checked'"; ?> />开启twitter图标，并填入你的twitter网址（加上http://）</label><br/>
							<label><textarea name="twitter_sns"  rows="1"  id="twitter_sns" style="width:310px;"  ><?php echo($options['twitter_sns']); ?></textarea></label>
							<br/><br/>	
							<label><input name="sinacheck" type="checkbox" value="checkbox" <?php if($options['sinacheck']) echo "checked='checked'"; ?> />开启新浪微博图标，并填入你的新浪微博网址（加上http://）</label><br/>
							<label><textarea name="sina_sns"  rows="1"  id="sina_sns" style="width:310px;"  ><?php echo($options['sina_sns']); ?></textarea></label>
							<br/><br/>	
							<label><input name="qqcheck" type="checkbox" value="checkbox" <?php if($options['qqcheck']) echo "checked='checked'"; ?> />开启知乎社区图标，并填入你的知乎社区网址（加上http://）</label><br/>
							<label><textarea name="qq_sns"  rows="1"  id="qq_sns" style="width:310px;"  ><?php echo($options['qq_sns']); ?></textarea></label>
							<br/><br/>	
							<label><input name="feedsnscheck" type="checkbox" value="checkbox" <?php if($options['feedsnscheck']) echo "checked='checked'"; ?> />开启feed订阅图标</label><br/>
							
							<br/>

							</div>
							</fieldset>
					
					
							</div>
					</fieldset>
						
						
					
					
					<fieldset>
					<legend class="toggle">首页缩略图设置</legend>
						<div class="none">
						缩略图尺寸为120x100，如果图片大于或小于该尺寸，则等比例拉伸。<br/>
						
						默认状态为：文章设定了特色图片才显示缩略图。<br/>
						<br/>
						你可以选择“强制显示缩略图”。即当没有设置文章特色图片，则自动获取文章第一张图片。如果文章没有图片，则显示主题images文件夹中的default_thumb.jpg<br/>
						注意：需要在wordpress的根目录建立一个“cache”文件夹，最好设置权限是777
						<br/><label><input name="thumbnail" type="checkbox" value="checkbox" <?php if($options['thumbnail']) echo "checked='checked'"; ?> />开启强制显示缩略图</label><br/>
						
						<br/>你还可以选择首页隐藏文章图片，这样可以避免缩略图和文章图片重复显示。
						<br/><label><input name="noimg" type="checkbox" value="checkbox" <?php if($options['noimg']) echo "checked='checked'"; ?> />首页隐藏文章图片</label><br/>		
						<br/>	
						
						<br/>或者可以选择自动截取文章，即自动截取文章前180个字（字数为配合缩略图高度）
						<br/><label><input name="cms" type="checkbox" value="checkbox" <?php if($options['cms']) echo "checked='checked'"; ?> />自动截取文章</label><br/>		
						<br/>
						</div>
					</fieldset>
					
					
					<fieldset>
					<legend class="toggle">jQuery特效设置</legend>
						<div class="none">
						主题集成了lazyload、highslide等效果。可以代替同类wordpress插件，减少插件使用量。
						<br/>
						PS:使用了主题集成的效果就要把相关的插件停用。
						<br/><br/>
						lazyload可以延迟加载图片，提高网站载入速度。<br/>
						<br/><label><input name="lazyload" type="checkbox" value="checkbox" <?php if($options['lazyload']) echo "checked='checked'"; ?> />开启lazyload延迟加载图片</label><br/>
						
						<br/><br/>如果你有使用Auto HighSlide等图片特效插件，可以试试主题集成的这个HighSlide。<br/>
						<label><input name="highslide" type="checkbox" value="checkbox" <?php if($options['highslide']) echo "checked='checked'"; ?> />开启highslide图片特效</label><br/>	
							
						<br/><br/>主题默认开启了向上向下的滑动条。只在文章和页面出现。不过不喜欢可以关闭。<br/>
						<label><input name="updown" type="checkbox" value="checkbox" <?php if($options['updown']) echo "checked='checked'"; ?> />关闭定位滑动条</label><br/>
						
						<br/><br/>主题的footer可以显示分类文章的伸缩效果。你需要详细阅读说明才能开启。<br/>
						<label><input name="footerswitch" type="checkbox" value="checkbox" <?php if($options['footerswitch']) echo "checked='checked'"; ?> />开启footer伸缩分类文章</label><br/>
						
						
						<br/><br/>主题默认调用自带的jQuery1.4.4版。你可以选择在线调用google提供的jQuery库，减少主机空间负担。<br/>
						<label><input name="jqueryurl" type="checkbox" value="checkbox" <?php if($options['jqueryurl']) echo "checked='checked'"; ?> />调用google提供的jquery库</label><br/>
						
						
						<br/>	
						</div>
					</fieldset>
					
					<fieldset>
					<legend class="toggle">首页幻灯片设置</legend>
						<div class="none">
						<label><input name="slideshowornot" type="checkbox" value="checkbox" <?php if($options['slideshowornot']) echo "checked='checked'"; ?> />开启首页幻灯片</label>
						<br/><br/>
						幻灯片图片尺寸为190x80，如果图片大于或小于该尺寸，则会被拉伸。<br/>
					
						<br/>
						简介内容最多为4行，如果填写内容超过输入框则将截断。<br/>
						如果中途需要换行，请使用换行符<code>&lt;br&gt;</code>
						<br/><br/>
						<fieldset>
						<legend class="toggle">幻灯片 No.1</legend>
							<div class="none">
							<label><input name="slideshow1" type="checkbox" value="checkbox" <?php if($options['slideshow1']) echo "checked='checked'"; ?> />使用第1张幻灯片</label>
							<br/>
							<br/>
							标题：<br/><label><textarea name="slideshow1_title"  rows="1"  id="slideshow1_title" style="width:310px;" ><?php echo($options['slideshow1_title']); ?></textarea></label>	
							<br/><br/>文章链接：<br/><label><textarea name="slideshow1_link"  rows="2"  id="slideshow1_link" style="width:310px;" ><?php echo($options['slideshow1_link']); ?></textarea></label>	
							<br/><br/>图片地址：<br/><label><textarea name="slideshow1_img"  rows="2"  id="slideshow1_img" style="width:310px;"  ><?php echo($options['slideshow1_img']); ?></textarea></label>					
							<br/>
							<br/>		 
							简介内容:<br/><label>
							<textarea name="slideshow1_text"   id="slideshow1_text" style="width:346px; height:100px;line-height:22px; font-size:13px;font-family: "\5FAE\8F6F\96C5\9ED1",sans-serif;" class="code"><?php echo($options['slideshow1_text']); ?></textarea></label>
							<br/>					
							</div>
						</fieldset>
						
						<fieldset>
						<legend class="toggle">幻灯片 No.2</legend>
							<div class="none">
							<label><input name="slideshow2" type="checkbox" value="checkbox" <?php if($options['slideshow2']) echo "checked='checked'"; ?> />使用第2张幻灯片</label>
							<br/>
							<br/>
							标题：<br/><label><textarea name="slideshow2_title"  rows="1"  id="slideshow1_title" style="width:310px;" ><?php echo($options['slideshow2_title']); ?></textarea></label>	
							<br/><br/>文章链接：<br/><label><textarea name="slideshow2_link"  rows="2"  id="slideshow2_link" style="width:310px;" ><?php echo($options['slideshow2_link']); ?></textarea></label>	
							<br/><br/>图片地址：<br/><label><textarea name="slideshow2_img"  rows="2"  id="slideshow2_img" style="width:310px;"  ><?php echo($options['slideshow2_img']); ?></textarea></label>					
							<br/>
							<br/>		 
							简介内容:<br/><label>
							<textarea name="slideshow2_text"   id="slideshow2_text" style="width:346px; height:100px;line-height:22px; font-size:13px;font-family: "\5FAE\8F6F\96C5\9ED1",sans-serif;" class="code"><?php echo($options['slideshow2_text']); ?></textarea></label>
							<br/>					
							</div>
						</fieldset>
						
						<fieldset>
						<legend class="toggle">幻灯片 No.3</legend>
							<div class="none">
							<label><input name="slideshow3" type="checkbox" value="checkbox" <?php if($options['slideshow3']) echo "checked='checked'"; ?> />使用第3张幻灯片</label>
							<br/>
							<br/>
							标题：<br/><label><textarea name="slideshow3_title"  rows="1"  id="slideshow3_title" style="width:310px;" ><?php echo($options['slideshow3_title']); ?></textarea></label>	
							<br/><br/>文章链接：<br/><label><textarea name="slideshow3_link"  rows="2"  id="slideshow3_link" style="width:310px;" ><?php echo($options['slideshow3_link']); ?></textarea></label>	
							<br/><br/>图片地址：<br/><label><textarea name="slideshow3_img"  rows="2"  id="slideshow3_img" style="width:310px;"  ><?php echo($options['slideshow3_img']); ?></textarea></label>					
							<br/>
							<br/>		 
							简介内容:<br/><label>
							<textarea name="slideshow3_text"   id="slideshow3_text" style="width:346px; height:100px;line-height:22px; font-size:13px;font-family: "\5FAE\8F6F\96C5\9ED1",sans-serif;" class="code"><?php echo($options['slideshow3_text']); ?></textarea></label>
							<br/>					
							</div>
						</fieldset>
						
						<fieldset>
						<legend class="toggle">幻灯片 No.4</legend>
							<div class="none">
							<label><input name="slideshow4" type="checkbox" value="checkbox" <?php if($options['slideshow4']) echo "checked='checked'"; ?> />使用第4张幻灯片</label>
							<br/>
							<br/>
							标题：<br/><label><textarea name="slideshow4_title"  rows="1"  id="slideshow4_title" style="width:310px;" ><?php echo($options['slideshow4_title']); ?></textarea></label>	
							<br/><br/>文章链接：<br/><label><textarea name="slideshow4_link"  rows="2"  id="slideshow4_link" style="width:310px;" ><?php echo($options['slideshow4_link']); ?></textarea></label>	
							<br/><br/>图片地址：<br/><label><textarea name="slideshow4_img"  rows="2"  id="slideshow4_img" style="width:310px;"  ><?php echo($options['slideshow4_img']); ?></textarea></label>					
							<br/>
							<br/>		 
							简介内容:<br/><label>
							<textarea name="slideshow4_text"   id="slideshow4_text" style="width:346px; height:100px;line-height:22px; font-size:13px;font-family: "\5FAE\8F6F\96C5\9ED1",sans-serif;" class="code"><?php echo($options['slideshow4_text']); ?></textarea></label>
							<br/>					
							</div>
						</fieldset>
						
						<fieldset>
						<legend class="toggle">幻灯片 No.5</legend>
							<div class="none">
							<label><input name="slideshow5" type="checkbox" value="checkbox" <?php if($options['slideshow5']) echo "checked='checked'"; ?> />使用第5张幻灯片</label>
							<br/>
							<br/>
							标题：<br/><label><textarea name="slideshow5_title"  rows="1"  id="slideshow5_title" style="width:310px;" ><?php echo($options['slideshow5_title']); ?></textarea></label>	
							<br/><br/>文章链接：<br/><label><textarea name="slideshow5_link"  rows="2"  id="slideshow5_link" style="width:310px;" ><?php echo($options['slideshow5_link']); ?></textarea></label>	
							<br/><br/>图片地址：<br/><label><textarea name="slideshow5_img"  rows="2"  id="slideshow5_img" style="width:310px;"  ><?php echo($options['slideshow5_img']); ?></textarea></label>					
							<br/>
							<br/>		 
							简介内容:<br/><label>
							<textarea name="slideshow5_text"   id="slideshow5_text" style="width:346px; height:100px;line-height:22px; font-size:13px;font-family: "\5FAE\8F6F\96C5\9ED1",sans-serif;" class="code"><?php echo($options['slideshow5_text']); ?></textarea></label>
							<br/>					
							</div>
						</fieldset>
						
						<fieldset>
						<legend class="toggle">幻灯片 No.6</legend>
							<div class="none">
							<label><input name="slideshow6" type="checkbox" value="checkbox" <?php if($options['slideshow6']) echo "checked='checked'"; ?> />使用第6张幻灯片</label>
							<br/>
							<br/>
							标题：<br/><label><textarea name="slideshow6_title"  rows="1"  id="slideshow6_title" style="width:310px;" ><?php echo($options['slideshow6_title']); ?></textarea></label>	
							<br/><br/>文章链接：<br/><label><textarea name="slideshow6_link"  rows="2"  id="slideshow6_link" style="width:310px;" ><?php echo($options['slideshow6_link']); ?></textarea></label>	
							<br/><br/>图片地址：<br/><label><textarea name="slideshow6_img"  rows="2"  id="slideshow6_img" style="width:310px;"  ><?php echo($options['slideshow6_img']); ?></textarea></label>					
							<br/>
							<br/>		 
							简介内容:<br/><label>
							<textarea name="slideshow6_text"   id="slideshow6_text" style="width:346px; height:100px;line-height:22px; font-size:13px;font-family: "\5FAE\8F6F\96C5\9ED1",sans-serif;" class="code"><?php echo($options['slideshow6_text']); ?></textarea></label>
							<br/>					
							</div>
						</fieldset>
					  </div>
					</fieldset>
              
					<fieldset>
					<legend class="toggle">广告位设置</legend>
						<div class="none">
							
							在这里你可以添加一些广告代码。<br/>
							其中侧边栏的广告大小为234x60，（Google Adsense等都有这个尺寸）<br/>
							其余的广告位则没有大小限制。<br/>
							<br/>
							
							<label><input name="singlead" type="checkbox" value="checkbox" <?php if($options['singlead']) echo "checked='checked'"; ?> />开启单篇文章广告位。（下面填入广告代码）</label><br/>
							<label><textarea name="singleadcode"  rows="4"  id="singleadcode" style="width:400px;"  ><?php echo($options['singleadcode']); ?></textarea></label>
							<br/><br/>
							
							<label><input name="sideads" type="checkbox" value="checkbox" <?php if($options['sideads']) echo "checked='checked'"; ?> />开启侧边栏广告位。（下面填入广告代码）</label><br/>
							<label><textarea name="sideadcode"  rows="4"  id="sideadcode" style="width:400px;"  ><?php echo($options['sideadcode']); ?></textarea></label>		
							<br/><br/>
							
							<label><input name="endads" type="checkbox" value="checkbox" <?php if($options['endads']) echo "checked='checked'"; ?> />开启文章结尾广告位。（下面填入广告代码）</label><br/>
							<label><textarea name="endadcode"  rows="4"  id="endadcode" style="width:400px;"  ><?php echo($options['endadcode']); ?></textarea></label>
							<br/>
							
							</div>
					</fieldset>
								
					<fieldset>
						<legend class="toggle">插件预留接口设置</legend>
							<div class="none">
							1、WP-PostViews。这是一个访问量统计插件。可以直观的查看页面的访问量，以及一些装饰。<br/>
							单篇文章的标题下预留了插件接口。<br/>
							<br/>
							<label><input name="postviewopen" type="checkbox" value="checkbox" <?php if($options['postviewopen']) echo "checked='checked'"; ?> />开启WP-PostViews插件接口</label><br/>
							<br/><br/>
							2、WP-Cumulus。这是一个flash的标签展示插件。<br/>
							用于页面的“Tags(标签页)”模板中预留了插件接口。
							<br/><br/>
							<label><input name="tagcloudsopen" type="checkbox" value="checkbox" <?php if($options['tagcloudsopen']) echo "checked='checked'"; ?> />开启WP-Cumulus插件接口</label><br/>
							<br/><br/>
							3、无觅相关文章<br/>
							位于文章结尾的relate。如果使用无觅相关文显示则会替代主题自带的相关文章显示。<br/>
							<br/>
							<label><input name="wumiopen" type="checkbox" value="checkbox" <?php if($options['wumiopen']) echo "checked='checked'"; ?> />使用无觅相关文章服务</label><br/>
							
							<blockquote><strong>无觅相关文章介绍： </strong>无觅相关文章服务依托无觅精准的内容分析和推荐算法，系统分析文章内容、标签、用户行为、时间等参数，生成关联推荐结果，并在当前文章底部进行图文展示。可有效增加增加网站的浏览量、点击率和用户停留时间。
							<br/> <a href="http://www.wumii.com/site/index.htm" target="_blank">博客主可登录无觅网站管理中心进行详细的自定义设置，查看网站的收录情况，申请加入无觅网络</a> 
							</blockquote>
							
							
							
							<br/>
							4、Google自定义搜索。<br/>
							你需要详细阅读说明，才能开启。
							<br/><br/>
							<label><input name="googlesearch" type="checkbox" value="checkbox" <?php if($options['googlesearch']) echo "checked='checked'"; ?> />Google自定义搜索。</label><br/>
							</div>
					</fieldset>
				
 
		<!-- TODO: 在这里追加其他选项内容 -->
 
		<!-- 提交按钮 -->
		<p class="submit">
			<input type="submit" name="loper_save" value="更新设置" />
		</p>
	</div>
 
</form>
 
<?php
	}
}
 
/**
 * 登记初始化方法
 */
add_action('admin_menu', array('loperOptions', 'init'));

/////////////////////

///////////Loper page opinion //////////////			
if ( !class_exists('myCustomFields') ) {
class myCustomFields {
var $prefix = '_loper_';
var $postTypes = array( "page");
var $customFields =    array(
array(
"name"            => "short-text",
"title"            => "标题下的简介",
"description"    => "",
"type"            =>    "text",
"scope"            =>    array( "page" ),
"capability"    => "edit_posts"
),
);
function myCustomFields() { $this->__construct(); }
function __construct() {
add_action( 'admin_menu', array( &$this, 'createCustomFields' ) );
add_action( 'save_post', array( &$this, 'saveCustomFields' ), 1, 2 );
}
function createCustomFields() {
if ( function_exists( 'add_meta_box' ) ) {
foreach ( $this->postTypes as $postType ) {
add_meta_box( 'my-custom-fields', 'Loper主题页面设置', array( &$this, 'displayCustomFields' ), $postType, 'normal', 'high' );}}}
function displayCustomFields() {
global $post;
?>
 <style type="text/css">
#my-custom-fields label{line-height: 20px; position:relative; bottom:3px;}
#my-custom-fields  input#_loper_short-text {margin:10px 0 10px 10px;width:400px}
</style>
<div>
<?php
wp_nonce_field( 'my-custom-fields', 'my-custom-fields_wpnonce', false, true );
foreach ( $this->customFields as $customField ) {
$scope = $customField[ 'scope' ];
$output = false;
foreach ( $scope as $scopeItem ) {
if ( $post->post_type == $scopeItem ) {
$output = true;
break;
}
}
if ( !current_user_can( $customField['capability'], $post->ID ) )
$output = false;
if ( $output ) { ?>
<div>
<?php
switch ( $customField[ 'type' ] ) {
default: {
// 输出单行文本框
echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
echo '<input type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
break;
}
}
?>
<?php if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>'; ?>
</div>
<?php
}
} ?>
</div>
<?php
}
/**保存自定义栏目的值*/
function saveCustomFields( $post_id, $post ) {
if ( !wp_verify_nonce( $_POST[ 'my-custom-fields_wpnonce' ], 'my-custom-fields' ) )
return;
if ( !current_user_can( 'edit_post', $post_id ) )
return;
if ( ! in_array( $post->post_type, $this->postTypes ) )
return;
foreach ( $this->customFields as $customField ) {
if ( current_user_can( $customField['capability'], $post_id ) ) 
{
if ( isset( $_POST[ $this->prefix . $customField['name'] ] ) && trim( $_POST[ $this->prefix . $customField['name'] ] ) ) {
$value = $_POST[ $this->prefix . $customField['name'] ];
// 为富文本框的文本自动分段
if ( $customField['type'] == "wysiwyg" ) $value = wpautop( $value );
update_post_meta( $post_id, $this->prefix . $customField[ 'name' ], $value );
} else {
delete_post_meta( $post_id, $this->prefix . $customField[ 'name' ] );
}}}} } // End Class
} // End if class exists statement
 
// 实例化类
if ( class_exists('myCustomFields') ) {
$myCustomFields_var = new myCustomFields();
} 
/////////////////////////////////////////
	
?>