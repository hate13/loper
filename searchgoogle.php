<?php
/*
Template Name:google自定义搜索
*/
?>


<?php get_header(); ?>
<?php $options = get_option('loper_options'); ?>
<div id="content">
	<section class="layout">

	<article class="index">
	
	<h1 class="searchicon"><?php the_title();?></h1>
		<div class="indexsearch">

					<div id="cse">正在搜索...</div>

			<script src="http://www.google.com/jsapi" type="text/javascript"></script>
			<script type="text/javascript">
			  google.load('search', '1', {language : 'zh-CN', style : google.loader.themes.MINIMALIST});
			  google.setOnLoadCallback(function() {
				var customSearchControl = new google.search.CustomSearchControl
			('000541308798378468038:d7g1pdu2oqa');
				customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
				customSearchControl.draw('cse');
				var match = location.search.match(/q=([^&]*)(&|$)/);
				if(match && match[1]){
				var search = decodeURIComponent(match[1]);
				customSearchControl.execute(search);
				}

			  }, true);
			</script>
			<style type="text/css">
			  .gsc-control-cse {
				font-family: 'Century Gothic',"Microsoft YaHei", Trebuchet MS ,sans-serif;
				border-color: #F0F0F0;
				background-color:transparent;
			  }
			  input.gsc-input {
				border-color: #777777;
			  }
			  input.gsc-search-button {
				border-color: #333333;
				background-color: #333333;
			  }
			  .gsc-tabHeader.gsc-tabhInactive {
				border-color: #777777;
				background-color: #c0c0c0;
			  }
			  .gsc-tabHeader.gsc-tabhActive {
				border-color: #333333;
				background-color: #333333;
			  }
			  .gsc-tabsArea {
				border-color: #333333;
			  }
			  .gsc-webResult.gsc-result {
				border-color: #F0F0F0;
				background-color: #F0F0F0;
			  }
			  .gsc-webResult.gsc-result:hover {
				border-color: #F0F0F0;
				background-color: #F0F0F0;
			  }
			  .gs-webResult.gs-result a.gs-title:link,
			  .gs-webResult.gs-result a.gs-title:link b {
				color: #444444; font-size:14px
			  }
			  .gs-webResult.gs-result a.gs-title:visited,
			  .gs-webResult.gs-result a.gs-title:visited b {
				color: #444444;
			  }
			  .gs-webResult.gs-result a.gs-title:hover,
			  .gs-webResult.gs-result a.gs-title:hover b {
				color: #444444;
			  }
			  .gs-webResult.gs-result a.gs-title:active,
			  .gs-webResult.gs-result a.gs-title:active b {
				color: #777777;
			  }
			  .gsc-cursor-page {
				color: #444444;
			  }
			  a.gsc-trailing-more-results:link {
				color: #444444;
			  }
			  .gs-webResult.gs-result .gs-snippet {
				color: #333333;
			  }
			  .gs-webResult.gs-result .gs-visibleUrl {
				color: #ccc;
			  }
			  .gs-webResult.gs-result .gs-visibleUrl-short {
				color: #ccc;
			  }
			  .gs-webResult.gs-result .gs-visibleUrl-short {
				display: block;
			  }
			  .gs-webResult.gs-result .gs-visibleUrl-long {
				display: none;
			  }
			  .gsc-cursor-box {
				border-color: #F0F0F0;
			  }
			  .gsc-results .gsc-cursor-page {
				border-color: #777777;
				background-color: #F0F0F0;
			  }
			  .gsc-results .gsc-cursor-page.gsc-cursor-current-page {
				border-color: #333333;
				background-color: #333333;
			  }
			  .gs-promotion.gs-result {
				border-color: #CCCCCC;
				background-color: #E6E6E6;
			  }
			  .gs-promotion.gs-result a.gs-title:link {
				color: #666666;
			  }
			  .gs-promotion.gs-result a.gs-title:visited {
				color: #333333;
			  }
			  .gs-promotion.gs-result a.gs-title:hover {
				color: #444444;
			  }
			  .gs-promotion.gs-result a.gs-title:active {
				color: #00CC00;
			  }
			  .gs-promotion.gs-result .gs-snippet {
				color: #333333;
			  }
			  .gs-promotion.gs-result .gs-visibleUrl,
			  .gs-promotion.gs-result .gs-visibleUrl-short {
				color: #ccc;
			  }
			</style> 

		</div>
			</article>	
		</section>


	<?php get_sidebar(); ?>
	</div><!--#content-->
<?php get_footer(); ?>