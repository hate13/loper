<?php
	
///////////////////////////短代码///////////////////////////
				//////////////警示/////////////
				function warningbox($atts, $content=null, $code="") {
					$return = '<div class="warning shortcodestyle">';
					$return .= $content;
					$return .= '</div>';
					return $return;
				}
				add_shortcode('warning' , 'warningbox' );
				//////////////禁止/////////////
				function nowaybox($atts, $content=null, $code="") {
					$return = '<div class="noway shortcodestyle">';
					$return .= $content;
					$return .= '</div>';
					return $return;
				}
				add_shortcode('noway' , 'nowaybox' );
				//////////////购买/////////////
				function buybox($atts, $content=null, $code="") {
					$return = '<div class="buy shortcodestyle">';
					$return .= $content;
					$return .= '</div>';
					return $return;
				}
				add_shortcode('buy' , 'buybox' );
				//////////////项目版/////////////
				function taskbox($atts, $content=null, $code="") {
					$return = '<div class="task shortcodestyle">';
					$return .= $content;
					$return .= '</div>';
					return $return;
				}
				add_shortcode('task' , 'taskbox' );
				//////////////豆瓣播放器/////////////
				function doubanplayer($atts, $content=null){
				extract(shortcode_atts(array("auto"=>'0'),$atts));
				return '<embed src="'.get_bloginfo("template_url").'/shortcode/doubanplayer.swf?url='.$content.'&amp;autoplay='.$auto.'" type="application/x-shockwave-flash" wmode="transparent" allowscriptaccess="always" width="400" height="30">';
				}
				add_shortcode('music','doubanplayer');
				
				////////////////////////
				function wp_embed_handler_youku( $matches, $attr, $url, $rawattr ) { return apply_filters( 'embed_youku', '<embed src="http://player.youku.com/player.php/sid/' . esc_attr($matches[1]) . '/v.swf" quality="high" width="620" height="390" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>', $matches, $attr, $url, $rawattr ); }
				wp_embed_register_handler( 'youku', '#http://v.youku.com/v_show/id_(.*?).html#i', 'wp_embed_handler_youku' );
				
				function wp_embed_handler_tudou( $matches, $attr, $url, $rawattr ) { return apply_filters( 'embed_tudou', '<embed src="http://www.tudou.com/v/' . esc_attr($matches[1]) . '/v.swf"  quality="high" width="620" height="390" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>', $matches, $attr, $url, $rawattr );}
				wp_embed_register_handler( 'tudou', '#http://www.tudou.com/programs/view/(.*?)/#i', 'wp_embed_handler_tudou' );
				
				function wp_embed_handler_ku6( $matches, $attr, $url, $rawattr ) { return apply_filters( 'embed_ku6', '<embed src="http://player.ku6.com/refer/' . esc_attr($matches[1]) . '/v.swf" quality="high" width="620" height="390" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>', $matches, $attr, $url, $rawattr ); }
				wp_embed_register_handler( 'ku6', '#http://v.ku6.com/show/(.*?).html#i', 'wp_embed_handler_ku6' );
				
				/* conflect with wordpress function wp_embed_handler_youtube( $matches, $attr, $url, $rawattr ) { return apply_filters( 'embed_youtube', '<embed src="http://www.youtube.com/v/' . esc_attr($matches[1]) . '?&amp;hl=zh_CN&amp;rel=0" width="620" height="390" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>', $matches, $attr, $url, $rawattr ); }*/
				wp_embed_register_handler( 'youtube', '#http://youtu.be/(.*?)/#i', 'wp_embed_handler_youtube' );
			
				function wp_embed_handler_56 ($matches, $attr, $url, $rawattr ) { return apply_filters( 'embed_56', '<embed src="http://player.56.com/v_' . esc_attr($matches[1]) . '.swf" quality="high" width="620" height="390" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>', $matches, $attr, $url, $rawattr ); }
				wp_embed_register_handler( '56', '#http://player.56.com/v_(.*?).swf#i', 'wp_embed_handler_56' );
			
				function wp_embed_handler_sohu( $matches, $attr, $url, $rawattr ) { return apply_filters( 'embed_sohu', '<embed src="http://share.vrs.sohu.com/' . esc_attr($matches[1]) . '/v.swf" quality="high" width="620" height="390" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>', $matches, $attr, $url, $rawattr ); }
				wp_embed_register_handler( 'sohu', '#http://share.vrs.sohu.com/(.*?)/v.swf#i', 'wp_embed_handler_sohu' );

				function wp_embed_handler_6cn( $matches, $attr, $url, $rawattr ) { return apply_filters( 'embed_6cn', '<embed src="http://6.cn/p/' . esc_attr($matches[1]) . '.swf" quality="high" width="480" height="385" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>', $matches, $attr, $url, $rawattr ); }
				wp_embed_register_handler( '6cn', '#http://6.cn/p/(.*?).swf#i', 'wp_embed_handler_6cn' );
				
				function wp_embed_handler_letv( $matches, $attr, $url, $rawattr ) { return apply_filters( 'embed_letv', '<embed src="http://www.letv.com/player/' . esc_attr($matches[1]) . '.swf" quality="high" width="620" height="390" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>', $matches, $attr, $url, $rawattr ); }
				wp_embed_register_handler( 'letv', '#http://www.letv.com/player/(.*?).swf#i', 'wp_embed_handler_letv' );
				
				function wp_embed_handler_sina( $matches, $attr, $url, $rawattr ) { return apply_filters( 'embed_sina', '<embed src="http://you.video.sina.com.cn/api/sinawebApi/outplayrefer.php/vid=' . esc_attr($matches[1]) . '/s.swf" quality="high" width="620" height="390" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>', $matches, $attr, $url, $rawattr ); }
				wp_embed_register_handler( 'sina', '#http://you.video.sina.com.cn/api/sinawebApi/outplayrefer.php/vid=(.*?)/s.swf#i', 'wp_embed_handler_sina' );
				
				//////////////istudio短代码支持（改良）/////////////
				function downlink($atts,$content=null){
					extract(shortcode_atts(array("href"=>'http://'),$atts));
				return '<div class="but_down"><a href="'.$href.'" target="_blank"><span>'.$content.'</span></a><div class="clear"></div></div>';
				}
				add_shortcode('Downlink','downlink');
				function flvlink($atts,$content=null){
				extract(shortcode_atts(array("auto"=>'0'),$atts));
				return'<embed src="'.get_bloginfo("template_url").'/shortcode/flvideo.swf?auto='.$auto.'&flv='.$content.'" menu="false" quality="high" wmode="transparent" bgcolor="#ffffff" width="560" height="315" name="flvideo" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer_cn" />';
				}
				add_shortcode('flv','flvlink');
				function mp3link($atts, $content=null){
				extract(shortcode_atts(array("auto"=>'0',"replay"=>'0',),$atts));	
				return '<embed src="'.get_bloginfo("template_url").'/shortcode/dewplayer.swf?mp3='.$content.'&amp;autostart='.$auto.'&amp;autoreplay='.$replay.'" wmode="transparent" height="20" width="240" type="application/x-shockwave-flash" />';
				}
				add_shortcode('mp3','mp3link');
				///////////////////////
				//////
				function docsGoogle($atts, $content=null){
				return '<p style="text-align: center;"><iframe style="border: 1px solid #ccc;" src="http://docs.google.com/viewer?url='.$content.'&amp;embedded=true" width="610" height="350"></iframe></p>';}
				add_shortcode('docs','docsGoogle');

				function enable_more_buttons($buttons) { $buttons[] = 'hr'; return $buttons; }  
				add_filter("mce_buttons", "enable_more_buttons");
				
				//////////
				
				function googleMaps($atts, $content = null) {
					extract(shortcode_atts(array(
					"width" => '600',
					"height" => '400',
					"src" => ''
					), $atts));
				 return '<iframe style="display:block;margin:auto;border: 1px solid #ccc;padding:5px;background:#FFF" width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src. '&amp;output=embed" ></iframe>';}
				add_shortcode("googlemap", "googleMaps");
				
				
				
				function baidumap_shortcode( $atts ) {
					extract(shortcode_atts(array(
						'width' => '600',
						'height' => '400',
						'center' => '',
						'zoom' => '13'
					), $atts));
 
						return '<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>

						<div style="width:'.$width.'px;height:'.$height.'px;display:block;margin:auto;border:1px solid #ccc;padding:5px;background:#FFF"><div style="width:'.$width.'px;height:'.$height.'px" id="dituContent"></div></div>
							<script type="text/javascript">
								function initMap(){createMap(); setMapEvent();addMapControl();}function createMap(){ var map = new BMap.Map("dituContent");var point = new BMap.Point('.$center.'); map.centerAndZoom(point,'.$zoom.'); window.map = map; }function setMapEvent(){ map.enableDragging();map.enableScrollWheelZoom(); map.enableDoubleClickZoom(); map.enableKeyboard();} function addMapControl(){var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_SMALL});map.addControl(ctrl_nav);}initMap();
							</script>';
					}
				add_shortcode('baidumap', 'baidumap_shortcode');

				////////
				add_filter('widget_text', 'do_shortcode');
				function one_half( $atts, $content = null ) {
					return '<div class="one_half">' . do_shortcode($content) . '</div>';}
				add_shortcode('one_half', 'one_half');
				
				function one_half_last( $atts, $content = null ) {
					return '<div class="one_half halfend">' . do_shortcode($content) . '</div><div class="clear"></div>';}
				add_shortcode('one_half_last', 'one_half_last');
			
			
/////////////////////////////////////////////////////////////

function loper_Shortpage(){?>
<style type="text/css">
.wrap{padding:10px; font-size:12px; line-height:24px;color:#383838;}
.devetable td{vertical-align:top;text-align: left; }
.top td{vertical-align: middle;text-align: left; }
pre{white-space: pre;overflow: auto;padding:0px;line-height:19px;font-size:12px;color:#898989;}
strong{ color:#666}
.none{display:none;}
fieldset{ border:1px solid #ddd;margin:5px 0 10px;padding:10px 10px 20px 10px;-moz-border-radius:5px;-khtml-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;}
fieldset:hover{border-color:#bbb;}
fieldset legend{padding:0 5px;color:#777;font-size:14px;font-weight:700;cursor:pointer}
fieldset .line{border-bottom:1px solid #e5e5e5;padding-bottom:15px;}
</style>

<script type="text/javascript">
jQuery(document).ready(function($){  
$(".toggle").click(function(){$(this).next().slideToggle('slow')});
});
</script>

<div class="wrap">
<div id="icon-themes" class="icon32"><br></div>
<h2>loper主题短代码</h2>

 
    <div style="padding-left:20px;">
	
	<p>写文章时如果需要可以加入下列短代码（虽然编辑时“可视化”与“HTML”两种模式均可直接加入，但还是推荐在“HTML”模式下插入）</p>
	
    <p><span style="color: #993300;">*切换至HTML模式，编辑器有相应的按钮方便插入。</span></p>
    
<fieldset>
<legend class="toggle">各种短代码面板</legend>
	<div class="none">
      <table width="850" border="1" class="devetable">
      	<tr><td width="120">灰色项目面板：</td><td width="464"><code>[task]文字内容[/task]</code></td></tr>
  		<tr><td width="120">红色禁止面板：</td><td width="464"><code>[noway]文字内容[/noway]</code></td></tr>
        <tr><td width="120">黄色警告面板：</td><td width="464"><code>[warning]文字内容[/warning]</code></td></tr>
        <tr><td width="120">绿色购买面板：</td><td width="464"><code>[buy]文字内容[/buy]</code></td></tr>
        <tr><td width="120">Doc、Pdf文件查看器：</td><td width="464"><code>[docs]http://www.xxx.com/xxx.doc[/docs]</code> (后缀文件名可为.doc或.pdf,使用的是google doc服务可能被墙)</td></tr>
        <tr><td width="120">&nbsp;</td><td width="464">&nbsp;</td></tr>
        <tr><td width="120">双栏版块</td><td width="464"><code>[one_half]左栏内容[/one_half]</code>&nbsp;<code>[one_half_last]右栏内容[/one_half_last]</code> </td></tr>
       </table>
       <p><span style="color: #808000;">注意：双栏版块的内容可以插入其他的短代码。（单栏宽度290px）</span></p>
      </div>
</fieldset>

<fieldset>
<legend class="toggle">视频网站Flash嵌入</legend>
	<div class="none">
    <br>
      <table width="600" border="1" class="devetable">
      	<tr><td width="100"><span style="color: #993300;"> &nbsp;&nbsp;通用代码：</span></td><td width="504"><code>[embed]视频播放页面网址或Flash地址[/embed]</code></td></tr>
      </table>
       <br>
       
        <fieldset>
        <legend>使用视频播放页面网址的网站</legend>
        
            <p><span style="color: #808000;">以下网站中的视频，直接复制浏览器中的地址，粘贴到短代码中即可 </span></p>
            
              <table width="810" border="1" class="devetable">
               <tr><td width="80">优酷网：</td><td width="714"><code>[embed]http://v.youku.com/v_show/id_XMjgyNDk1NTYw.html[/embed]</code></td></tr>
               
               <tr><td width="80">土豆网：</td><td width="714"><code>[embed]http://www.tudou.com/programs/view/tFny-0UbTEM/[/embed]</code>&nbsp;&nbsp;(注意:网址的最后有个斜杠不能漏掉)</td></tr>
               <tr><td width="80">酷6网：</td><td width="714"><code>[embed]http://v.ku6.com/show/7eenXUV4xNfiUsSu.html[/embed]</code></td></tr>
               <tr><td width="80">Youtube：</td><td width="714"><code>[embed]http://youtu.be/vtjJe4elifI/[/embed]</code>&nbsp;&nbsp;(此为分享中给出的分享网址,记得在网址的最后加上斜杠)</td></tr>
              

              </table>
               
        </fieldset>  
           <br>   
       <fieldset>
        <legend>使用Flash地址的网站</legend>
        
            <p><span style="color: #808000;">以下网站中的视频，需要复制视频给出的分享中的flash地址，粘贴到短代码中即可 </span></p>
            
              <table width="810" border="1" class="devetable">
               <tr><td width="80">56.com：</td><td width="714"><code>[embed]http://player.56.com/v_NTM4ODY0NjY.swf[/embed]</code></td></tr>
               
               <tr><td width="80">搜狐视频：</td><td width="714"><code>[embed]http://share.vrs.sohu.com/374302/v.swf[/embed]</code> </td></tr>
               <tr><td width="80">6房间：</td><td width="714"><code>[embed]http://6.cn/p/1/n4WbeuI_Gn7GBxCVccLQ.swf[/embed]</code></td></tr>
               <tr><td width="80">乐视网：</td><td width="714"><code>[embed]http://www.letv.com/player/x725792.swf [/embed]</code></td></tr>
               
               <tr><td width="80">新浪视频：</td><td width="714"><code>[embed]http://you.video.sina.com.cn/api/sinawebApi/outplayrefer.php/vid=XXX/s.swf[/embed]</code></td></tr>
            
           </table>
               
        </fieldset 
      </div>
</fieldset>   

<fieldset>
<legend class="toggle">嵌入地图</legend>
	<div class="none">
  
      <table width="850" border="1" class="devetable">
          <tr><td width="120"><strong>百度地图</strong></td><td>&nbsp;<a href="http://openapi.baidu.com/map/createMap.html" title="百度地图" target="_blank">到百度创建地图</a> (注意：文章中只能插入1个百度地图)</td></tr>
          <tr><td width="120">默认使用：</td><td><code>[baidumap zoom="地图级别"  center="X坐标,Y坐标"]</code></td></tr>
          <tr><td width="120">自定义宽度：</td><td><code>[baidumap zoom="地图级别"  center="X坐标,Y坐标" width="400" height="300"]</code></td></tr>
      
       <tr><td width="120">&nbsp;</td><td>&nbsp;</td></tr>
       <tr><td width="120"><strong>谷歌地图</strong></td><td>&nbsp;<a href="http://ditu.google.cn/maps?hl=zh-CN" title="谷歌地图" target="_blank">到谷歌获取地图分享网址</a></td></tr>
        <tr><td width="120">默认使用：</td><td><code>[googlemap src="URL"]</code></td></tr>
        <tr><td width="120">自定义宽度：</td><td><code>[googlemap width="400" height="300" src="URL"]</code></td></tr>
       </table>
       
         <p><span style="color:#808000;">注意：地图样式里有上下左右5px的留空宽度，所以设定的宽度最大值为600px （如果应用到双栏版块，设定的宽度最大值为280px）。</span></p>
      </div>
</fieldset>   
    
<fieldset>
<legend class="toggle">音乐播放器</legend>
	<div class="none">
      <table width="600" border="1" class="devetable">
      	<tr><td width="120">默认不自动播放：</td><td width="463"><code>[music]http://www.xxx.com/xxx.mp3[/music]</code></td></tr>
  
        <tr><td width="120">自动播放:</td><td><code>[music auto=1]http://www.xxx.com/xxx.mp3[/music]</code></td></tr>
       </table>

      </div>
</fieldset> 
    
    
    <fieldset>
<legend class="toggle">兼容iStudio短代码：</legend>
	<div class="none">
      <table width="800" border="1" class="devetable">
      	<tr><td width="200"><strong>下载样式</strong></td><td width="584"><code>[Downlink href="http://www.xxx.com/xxx.zip"]download xxx.zip[/Downlink]</code></td></tr>
   		<tr><td width="200">&nbsp;</td><td>&nbsp;</td></tr>
  
        <tr><td width="200"><strong>Mp3播放器</strong></td><td>&nbsp;</td></tr>
        <tr><td width="200">默认不循环不自动播放：</td><td><code>[mp3]http://www.xxx.com/xxx.mp3[/mp3]</code></td></tr>
         <tr><td width="200">自动播放：　</td><td><code>[mp3 auto="1"]http://www.xxx.com/xxx.mp3[/mp3]</code></td></tr>  
         <tr><td width="200">循环播放：	</td><td><code>[mp3 replay="1"]http://www.xxx.com/xxx.mp3[/mp3]</code></td></tr>
         <tr><td width="200">自动及循环播放：</td><td><code>[mp3 auto="1" replay="1"]http://www.xxx.com/xxx.mp3[/mp3]</code></td></tr>
         
         <tr><td width="200">&nbsp;</td><td>&nbsp;</td></tr>
         <tr><td width="200"><strong>Flv播放器</strong></td><td>&nbsp;</td></tr>
         <tr><td width="200">默认不自动播放：</td><td><code>[flv]http://www.xxx.com/xxx.flv[/flv]</code></td></tr>
         <tr><td width="200">自动播放：</td><td><code>[flv auto="1"]http://www.xxx.com/xxx.flv[/flv]</code></td></tr>
       </table>
       <p><span style="color: #808000;">注意：如果要使用这个播放器，一定要添加flv格式的视频文件</span></p>
      </div>
</fieldset> 
    </div>
  
</div>
<?php }
function loper_shortcode_page(){
  add_theme_page("Loper 短代码提示","Loper 短代码提示",'edit_themes','loper_shortcode_page','loper_Shortpage'); 
}
add_action('admin_menu','loper_shortcode_page');

/////////////////////
///////////面板插入代码///////////
add_action('admin_footer', 'shortcode_footer_admin');
function shortcode_footer_admin() {
	global $wp_version;
	$deveshortcodehacker = ($wp_version == '2.7.1') ? ".lastChild.lastChild" : "";
	?>

	
<script type="text/javascript">
if(e2h_toolbar = document.getElementById("ed_toolbar")<?php echo $deveshortcodehacker ?>){
		embedNr = edButtons.length;
		edButtons[embedNr] = 
		new edButton('ed_embed'
		,'embed'
		,'[embed]视频网址或者视频flash网址[/embed]'
		,''
		,'h'
		,-1
		);
		var taskBut = e2h_toolbar.lastChild;
	
		while (taskBut.nodeType != 1){
			taskBut = taskBut.previousSibling;
		}

		taskBut = taskBut.cloneNode(true);
		taskBut.value = "embed";
		taskBut.title = "视频Flash短代码";
		taskBut.onclick = function () {edInsertTag(edCanvas,parseInt(embedNr));}
		e2h_toolbar.appendChild(taskBut);
		taskBut.id = "ed_embed";
	}
	
	if(e2h_toolbar = document.getElementById("ed_toolbar")<?php echo $deveshortcodehacker ?>){
		taskNr = edButtons.length;
		edButtons[taskNr] = 
		new edButton('ed_task'
		,'task'
		,'[task]请输入内容[/task]'
		,''
		,'h'
		,-1
		);
		var taskBut = e2h_toolbar.lastChild;
	
		while (taskBut.nodeType != 1){
			taskBut = taskBut.previousSibling;
		}

		taskBut = taskBut.cloneNode(true);
		taskBut.value = "task";
		taskBut.title = "项目面板短代码";
		taskBut.onclick = function () {edInsertTag(edCanvas,parseInt(taskNr));}
		e2h_toolbar.appendChild(taskBut);
		taskBut.id = "ed_task";
	}

	if(e2h_toolbar = document.getElementById("ed_toolbar")<?php echo $deveshortcodehacker ?>){
		nowayNr = edButtons.length;
		edButtons[nowayNr] = 
		new edButton('ed_noway'
		,'noway'
		,'[noway]请输入内容[/noway]'
		,''
		,'h'
		,-1
		);
		var nowayBut = e2h_toolbar.lastChild;
	
		while (nowayBut.nodeType != 1){
			nowayBut = nowayBut.previousSibling;
		}

		nowayBut = nowayBut.cloneNode(true);
		nowayBut.value = "noway";
		nowayBut.title = "禁止面板短代码";
		nowayBut.onclick = function () {edInsertTag(edCanvas,parseInt(nowayNr));}
		e2h_toolbar.appendChild(nowayBut);
		nowayBut.id = "ed_noway";
	}

	if(e2h_toolbar = document.getElementById("ed_toolbar")<?php echo $deveshortcodehacker ?>){
		warningNr = edButtons.length;
		edButtons[warningNr] = 
		new edButton('ed_warning'
		,'warning'
		,'[warning]请输入内容[/warning]'
		,''
		,'h'
		,-1
		);
		var warningBut = e2h_toolbar.lastChild;
	
		while (warningBut.nodeType != 1){
			warningBut = warningBut.previousSibling;
		}

		warningBut = warningBut.cloneNode(true);
		warningBut.value = "warning";
		warningBut.title = "警告面板短代码";
		warningBut.onclick = function () {edInsertTag(edCanvas,parseInt(warningNr));}
		e2h_toolbar.appendChild(warningBut);
		warningBut.id = "ed_warning";
	}

	if(e2h_toolbar = document.getElementById("ed_toolbar")<?php echo $deveshortcodehacker ?>){
		buyNr = edButtons.length;
		edButtons[buyNr] = 
		new edButton('ed_buy'
		,'buy'
		,'[buy]请输入内容[/buy]'
		,''
		,'h'
		,-1
		);
		var buyBut = e2h_toolbar.lastChild;
	
		while (buyBut.nodeType != 1){
			buyBut = buyBut.previousSibling;
		}

		buyBut = buyBut.cloneNode(true);
		buyBut.value = "buy";
		buyBut.title = "购买面板短代码";
		buyBut.onclick = function () {edInsertTag(edCanvas,parseInt(buyNr));}
		e2h_toolbar.appendChild(buyBut);
		buyBut.id = "ed_buy";
	}

	if(e2h_toolbar = document.getElementById("ed_toolbar")<?php echo $deveshortcodehacker ?>){
		mp3Nr = edButtons.length;
		edButtons[mp3Nr] = 
		new edButton('ed_mp3'
		,'mp3'
		,'[mp3]音乐文件地址[/mp3]'
		,''
		,'h'
		,-1
		);
		var mp3But = e2h_toolbar.lastChild;
	
		while (mp3But.nodeType != 1){
			mp3But = mp3But.previousSibling;
		}

		mp3But = mp3But.cloneNode(true);
		mp3But.value = "MP3播放器";
		mp3But.title = "Mp3播放器短代码";
		mp3But.onclick = function () {edInsertTag(edCanvas,parseInt(mp3Nr));}
		e2h_toolbar.appendChild(mp3But);
		mp3But.id = "ed_mp3";
	}

	if(e2h_toolbar = document.getElementById("ed_toolbar")<?php echo $deveshortcodehacker ?>){
		downlNr = edButtons.length;
		edButtons[downlNr] = 
		new edButton('ed_downl'
		,'downl'
		,'[Downlink href="文件URL"]文件名字[/Downlink]'
		,''
		,'h'
		,-1
		);
		var downlBut = e2h_toolbar.lastChild;
	
		while (downlBut.nodeType != 1){
			downlBut = downlBut.previousSibling;
		}

		downlBut = downlBut.cloneNode(true);
		downlBut.value = "下载按钮";
		downlBut.title = "下载按钮样式";
		downlBut.onclick = function () {edInsertTag(edCanvas,parseInt(downlNr));}
		e2h_toolbar.appendChild(downlBut);
		downlBut.id = "ed_downl";
	}

	if(e2h_toolbar = document.getElementById("ed_toolbar")<?php echo $deveshortcodehacker ?>){
		docNr = edButtons.length;
		edButtons[docNr] = 
		new edButton('ed_doc'
		,'docs'
		,'[docs]doc或pdf文件地址[/docs]'
		,''
		,'h'
		,-1
		);
		var docBut = e2h_toolbar.lastChild;
	
		while (docBut.nodeType != 1){
			docBut = docBut.previousSibling;
		}

		docBut = docBut.cloneNode(true);
		docBut.value = "Doc文件";
		docBut.title = "插入doc、pdf文件";
		docBut.onclick = function () {edInsertTag(edCanvas,parseInt(docNr));}
		e2h_toolbar.appendChild(docBut);
		docBut.id = "ed_doc";
	}
	
	if(e2h_toolbar = document.getElementById("ed_toolbar")<?php echo $deveshortcodehacker ?>){
		one_halfNr = edButtons.length;
		edButtons[one_halfNr] = 
		new edButton('ed_one_half'
		,'one_half'
		,'[one_half]左栏内容[/one_half][one_half_last]右栏内容[/one_half_last]'
		,''
		,'h'
		,-1
		);
		var one_halfBut = e2h_toolbar.lastChild;
	
		while (one_halfBut.nodeType != 1){
			one_halfBut = one_halfBut.previousSibling;
		}
		one_halfBut = one_halfBut.cloneNode(true);
		one_halfBut.value = "双栏版块";
		one_halfBut.title = "插入双栏版块";
		one_halfBut.onclick = function () {edInsertTag(edCanvas,parseInt(one_halfNr));}
		e2h_toolbar.appendChild(one_halfBut);
		one_halfBut.id = "ed_one_half";
	}

	if(e2h_toolbar = document.getElementById("ed_toolbar")<?php echo $deveshortcodehacker ?>){
		musicNr = edButtons.length;
		edButtons[musicNr] = 
		new edButton('ed_music'
		,'music'
		,'[music]音乐文件地址[/music]'
		,''
		,'h'
		,-1
		);
		var musicBut = e2h_toolbar.lastChild;
	
		while (musicBut.nodeType != 1){
			musicBut = musicBut.previousSibling;
		}

		musicBut = musicBut.cloneNode(true);
		musicBut.value = "豆瓣播放器";
		musicBut.title = "豆瓣mp3播放器短代码";
		musicBut.onclick = function () {edInsertTag(edCanvas,parseInt(musicNr));}
		e2h_toolbar.appendChild(musicBut);
		musicBut.id = "ed_music";
	}

	if(e2h_toolbar = document.getElementById("ed_toolbar")<?php echo $deveshortcodehacker ?>){
		FlvNr = edButtons.length;
		edButtons[FlvNr] = 
		new edButton('ed_Flv'
		,'Flv'
		,'[flv]flv文件地址[/flv]'
		,''
		,'h'
		,-1
		);
		var FlvBut = e2h_toolbar.lastChild;
	
		while (FlvBut.nodeType != 1){
			FlvBut = FlvBut.previousSibling;
		}

		FlvBut = FlvBut.cloneNode(true);
		FlvBut.value = "flv";
		FlvBut.title = "Flv播放器短代码";
		FlvBut.onclick = function () {edInsertTag(edCanvas,parseInt(FlvNr));}
		e2h_toolbar.appendChild(FlvBut);
		FlvBut.id = "ed_Flv";
	}
	
	if(e2h_toolbar = document.getElementById("ed_toolbar")<?php echo $deveshortcodehacker ?>){
		baidumapNr = edButtons.length;
		edButtons[baidumapNr] = 
		new edButton('ed_baidumap'
		,'baidumap'
		,'[baidumap zoom="地图级别" center="X坐标,Y坐标"]'
		,''
		,'h'
		,-1
		);
		var baidumapBut = e2h_toolbar.lastChild;
	
		while (baidumapBut.nodeType != 1){
			baidumapBut = baidumapBut.previousSibling;
		}
		baidumapBut = baidumapBut.cloneNode(true);
		baidumapBut.value = "百度地图";
		baidumapBut.title = "插入百度地图";
		baidumapBut.onclick = function () {edInsertTag(edCanvas,parseInt(baidumapNr));}
		e2h_toolbar.appendChild(baidumapBut);
		baidumapBut.id = "ed_baidumap";
	}

	if(e2h_toolbar = document.getElementById("ed_toolbar")<?php echo $deveshortcodehacker ?>){
		googlemapNr = edButtons.length;
		edButtons[googlemapNr] = 
		new edButton('ed_googlemap'
		,'googlemap'
		,'[googlemap src="URL"]'
		,''
		,'h'
		,-1
		);
		var googlemapBut = e2h_toolbar.lastChild;
	
		while (googlemapBut.nodeType != 1){
			googlemapBut = googlemapBut.previousSibling;
		}

		googlemapBut = googlemapBut.cloneNode(true);
		googlemapBut.value = "谷歌地图";
		googlemapBut.title = "插入谷歌地图";
		googlemapBut.onclick = function () {edInsertTag(edCanvas,parseInt(googlemapNr));}
		e2h_toolbar.appendChild(googlemapBut);
		googlemapBut.id = "ed_googlemap";
	}

</script>

<?php }

?>