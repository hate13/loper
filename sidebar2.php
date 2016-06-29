<?php $options = get_option('loper_options'); ?>

<div id="sidebar">
	<div class="id-bar">
	
		<h3>ID : <?php echo($options['sideid']); ?></h3>
		<span class="id_description"><?php echo($options['sidedes']); ?></span>
		<div class="clear"></div>
	</div>

	<div id="sidebarwidgit">
	<?php if ( ! dynamic_sidebar( '单篇文章的Sidebar' )) : ?>
	
	<?php endif; ?>
	</div>
	
	
	<?php if($options['sideads'] && $options['sideadcode']) : ?> 
	<div class="sidead">
		<div class="sideadcon">
			<?php echo($options['sideadcode']); ?>
		</div>
	</div>
	<?php endif; ?>
	
</div><!--sidebar-->