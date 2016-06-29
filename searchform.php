<?php $options = get_option('loper_options'); ?>
<?php if($options['googlesearch']) : ?> 
<form method="get" id="searchform" class="search" action="<?php bloginfo('home');?>/search">
	<input name="q" type="text"  class="search_text"  onblur="if(this.value =='')this.value='Search...and Enter';" onfocus="this.value='';" onclick="if(this.value=='Search...and Enter')this.value=''" value="Search...and Enter" />
  <input type="submit" value="" class="search_submit" />
</form>
<?php else : ?>	
<form method="get" id="searchform" class="search" action="<?php bloginfo('home');?>/">
	<input name="s" type="text"  class="search_text"  onblur="if(this.value =='')this.value='Search...and Enter';" onfocus="this.value='';" onclick="if(this.value=='Search...and Enter')this.value=''" value="Search...and Enter" />
  <input type="submit" name="button"  value="" class="search_submit" />
</form>
<?php endif; ?>