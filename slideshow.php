<script type="text/javascript" src="<?php bloginfo('template_url');?>/scripts/jquery.cycle.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var $js=jQuery.noConflict();
		    $js('.loperslideshow').cycle({ 
			fx:    'fade', 
			prev:   '.slideprev',
			next:   '.slidenext',
			delay: 2000,
			timeout: 6000
			
			});
			
	});
</script>		
<div class="slideshowbg">
<a class="slideprev" href="#">Prev</a> <a class="slidenext" href="#">Next</a>
	<div class="loperslideshow">
		<?php $options = get_option('loper_options'); ?>
		<?php if($options['slideshow1']): ?> 
            <div>
				<div class="slidefade">
					<div class="slideimg">
						<img src="<?php echo($options['slideshow1_img']); ?>" width="190" height="80">
					</div>
					<div class="slidecontent">
						<h3><a href="<?php echo($options['slideshow1_link']); ?>" title="<?php echo($options['slideshow1_title']); ?>"><?php echo($options['slideshow1_title']); ?></a></h3>
						<section class="slidetext">
						<?php echo($options['slideshow1_text']); ?>
						</section>	
						
						<a class="slidelink" href="<?php echo($options['slideshow1_link']); ?>" title="<?php echo($options['slideshow1_title']); ?>"  rel="nofollow">more</a>
					</div>
				</div>
				
            </div>
		<?php endif; ?>	
		
				<?php if($options['slideshow2']): ?> 
            <div>
				<div class="slidefade">
					<div class="slideimg">
						<img src="<?php echo($options['slideshow2_img']); ?>" width="190" height="80">
					</div>
					<div class="slidecontent">
						<h3><a href="<?php echo($options['slideshow2_link']); ?>" title="<?php echo($options['slideshow2_title']); ?>"><?php echo($options['slideshow2_title']); ?></a></h3>
						<section class="slidetext">
						<?php echo($options['slideshow2_text']); ?>
						</section>	
						
						<a class="slidelink" href="<?php echo($options['slideshow2_link']); ?>" title="<?php echo($options['slideshow2_title']); ?>"  rel="nofollow">more</a>
					
					</div>
				</div>
			
            </div>
		<?php endif; ?>	
		
		
		<?php if($options['slideshow3']): ?> 
            <div>
				<div class="slidefade">
					<div class="slideimg">
						<img src="<?php echo($options['slideshow3_img']); ?>" width="190" height="80">
					</div>
					<div class="slidecontent">
						<h3><a href="<?php echo($options['slideshow3_link']); ?>" title="<?php echo($options['slideshow3_title']); ?>"><?php echo($options['slideshow3_title']); ?></a></h3>
						<section class="slidetext">
						<?php echo($options['slideshow3_text']); ?>
						</section>	
						
						<a class="slidelink" href="<?php echo($options['slideshow3_link']); ?>" title="<?php echo($options['slideshow3_title']); ?>"  rel="nofollow">more</a>
					
					</div>
				</div>
            </div>
		<?php endif; ?>	
		
		<?php if($options['slideshow4']): ?> 
            <div>
				<div class="slidefade">
					<div class="slideimg">
						<img src="<?php echo($options['slideshow4_img']); ?>" width="190" height="80">
					</div>
					<div class="slidecontent">
						<h3><a href="<?php echo($options['slideshow4_link']); ?>" title="<?php echo($options['slideshow4_title']); ?>"><?php echo($options['slideshow4_title']); ?></a></h3>
						<section class="slidetext">
						<?php echo($options['slideshow4_text']); ?>
						</section>	
						
						<a class="slidelink" href="<?php echo($options['slideshow4_link']); ?>" title="<?php echo($options['slideshow4_title']); ?>"  rel="nofollow">more</a>
					
					</div>
				</div>
            </div>
		<?php endif; ?>	
		
		<?php if($options['slideshow5']): ?> 
            <div>
				<div class="slidefade">
					<div class="slideimg">
						<img src="<?php echo($options['slideshow5_img']); ?>" width="190" height="80">
					</div>
					<div class="slidecontent">
						<h3><a href="<?php echo($options['slideshow5_link']); ?>" title="<?php echo($options['slideshow5_title']); ?>"><?php echo($options['slideshow5_title']); ?></a></h3>
						<section class="slidetext">
						<?php echo($options['slideshow5_text']); ?>
						</section>	
						
						<a class="slidelink" href="<?php echo($options['slideshow5_link']); ?>" title="<?php echo($options['slideshow5_title']); ?>"  rel="nofollow">more</a>
					</div>
				</div>
            </div>
		<?php endif; ?>	
		
		<?php if($options['slideshow6']): ?> 
            <div>
			<div class="slidefade">
					<div class="slideimg">
						<img src="<?php echo($options['slideshow6_img']); ?>" width="190" height="80">
					</div>
					<div class="slidecontent">
						<h3><a href="<?php echo($options['slideshow6_link']); ?>" title="<?php echo($options['slideshow6_title']); ?>"><?php echo($options['slideshow6_title']); ?></a></h3>
						<section class="slidetext">
						<?php echo($options['slideshow6_text']); ?>
						</section>	
						
						<a class="slidelink" href="<?php echo($options['slideshow6_link']); ?>" title="<?php echo($options['slideshow6_title']); ?>"  rel="nofollow">more</a>
					
					</div>
				</div>
			</div>
		<?php endif; ?>	
	</div>
</div>

 <div class="slidebottom"></div>