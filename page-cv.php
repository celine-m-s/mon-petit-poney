<?php
/*
Template Name: CV
*/
?>

<?php get_header(); ?>

	<div class="container" style="text-align:center">
		<div class="row">
			<div class="col-md-9" id="content" role="main">
				<section>


					<?php get_calendar();?>
					<?php wp_tag_cloud();?>

				<h2><?php wp_title( '',  
				true); ?></h2>
						
		        <?php if (have_posts()) : ?>
		        	<?php while (have_posts()) : the_post(); ?>
			            <div class="excerpt">
			              <?php the_content(); ?>
			            </div>

			      	<?php endwhile; ?>
		    		<?php endif; ?>
				</section>		

			</div><!--  fermeture col-md-9 -->
		  <div class="col-md-3">
		  	<aside>
					<?php echo date('H:i'); ?>
				</aside>
			</div> <!-- fermeture sidebar -->
			
		
		</div> <!-- fermeture div class row -->

			<?php get_footer(); ?>
	</div> <!--fermeture div class container:text-align center-->