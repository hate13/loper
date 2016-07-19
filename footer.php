	</div><!--.container-->
	<div class="clear"></div>
	<?php $options = get_option('loper_options'); ?>
	<?php if($options['updown']) : ?> 
	<?php else : ?>	
	<div id="updown"><div class="loperupwards"></div><div class="lopercomments"></div><div class="loperdownwards"></div></div>
	<?php endif; ?>
	<footer>	
	<div class="footertop">
	
	<?php if($options['footerswitch']) : ?> 
	<div class="footerwidgitswitch"></div>
		<div class="footerwidgitopen">
			<div class="container-footer">
				<div class="footerwidgitair">
<!--.设置分类名称1-->			
					<div class="footerwidgit">
					<h3>日志</h3>   
					<ul>
					<?php query_posts('cat=4&showposts=5'); ?>   
					<?php while (have_posts()) : the_post(); ?>   
					<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>  
					<?php endwhile; ?></ul>  
					</div>
					
<!--.设置分类名称2-->
					<div class="footerwidgit">
					<h3>音乐</h3>   
					<ul>					
					<?php query_posts('cat=5&showposts=5'); ?>   
					<?php while (have_posts()) : the_post(); ?>   
					<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>  
					<?php endwhile; ?></ul>  
					</div>					
					
<!--.设置分类名称3-->			
					<div class="footerwidgit">
					<h3>视频</h3>   
					<ul>					
					<?php query_posts('cat=6&showposts=5'); ?>   
					<?php while (have_posts()) : the_post(); ?>   
					<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>  
					<?php endwhile; ?></ul>  
					</div>	
					
<!--.设置分类名称4-->			
					<div class="footerwidgit">
					<h3>相册</h3>   
					<ul>					
					<?php query_posts('cat=37&showposts=5'); ?>   
					<?php while (have_posts()) : the_post(); ?>   
					<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>  
					<?php endwhile; ?></ul>  
					</div>							
				</div>
			</div>
		</div>
		<?php endif; ?>
<?php wp_reset_query(); ?><!--hate13.2016.5.20.添加-->
<!--.分类文章结束-->	
	
		
		<div class="footerinfo">
			<div class="container-footer">
				<div class="footerinfotext">
				<p><a href="<?php echo get_option('home');?>/"><?php bloginfo('name');?></a>  © 2015-<?php echo date("Y");echo " ";?> 版权所有 | <a href="http://www.miibeian.gov.cn" target="_blank">蜀ICP备15025043号</a> | <a title="网站地图" href="http://hate13.com/sitemap">网站地图</a> |<a title="管理" href="<?php bloginfo('url'); ?>/wp-admin/" target="_blank">管理</a></p>
				<p>基于 <a href="http://wordpress.org/">WordPress</a> 技术构建 | <a title="阿里云虚拟主机" href="https://www.aliyun.com/" target="_blank">阿里云虚拟主机</a> | <a title="百度云加速" href="http://su.baidu.com/" target="_blank">百度云加速</a> | 共<?php echo get_num_queries(); ?> 次查询,用时 <?php timer_stop(1); ?> 秒 </p>
				</div>
 
				<div id="bottomlogo"><a href="https://github.com/hate13/loper.git" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/githublogo.svg" width="42" /></a></div>
				<div class="clear"></div>
			</div>
		</div><!--.contasoeiner-->	
		
		<?php if($options['footercode']) : ?> 
			<div class="footercodediv"><?php echo($options['footercode']); ?></div>
	<?php endif; ?>
	</div>

	<script  src="<?php bloginfo('template_url');?>/scripts/jquery.lavalamp-1.3.4.js"></script>	
	<script  src="<?php bloginfo('template_url');?>/scripts/loperjs.js"></script>
	<?php if($options['lazyload']) : ?>
		<script  src="<?php bloginfo('template_url');?>/scripts/jquery.lazyload.mini.js"></script>	
	<?php endif; ?>	

	</footer>

</div><!--#main-->
<?php wp_footer(); ?>
</body>
</html>