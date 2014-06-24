<?php get_header(); ?>

	<div class="container" style="text-align:center">
		<div class="row">
			<div class="col-md-9" id="content" role="main">
				<section>

					<h2><?php single_cat_title( '', true); ?></h2>
					<?php if ( category_description() ) : // Show an optional category description ?>
						<div class="archive-meta"><?php echo category_description(); ?></div>							
					<?php endif; ?>
							
						
					<div class="col-md-6">
		        <?php if (have_posts()) : ?>
		        	<?php while (have_posts()) : the_post(); ?>

		            <div class="post">
			            <div class="image">
			              <?php the_post_thumbnail('thumbnail', array("class" => "img-responsive")); ?>
			            </div>
			            <div class="date">
			              <?php the_date(); ?>
			            </div>
			            <div class="post-title"> 
			            	<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
			            </div>
			            <div class="excerpt">
			              <?php the_excerpt(); ?>
			            </div>
			          </div>

			        <?php $counter++;
			        if ($counter % 2 == 0) {
			        echo '</div><div class="row">';
			        }
			      	endwhile; ?>
		    		<?php endif; ?>
			    </div>
				</section>		

			</div><!--  fermeture col-md-9 -->
		  <div class="col-md-3">
		  	<aside>
					<?php dynamic_sidebar('main-sidebar'); ?>
				</aside>
			</div> <!-- fermeture sidebar -->
			
		
		</div> <!-- fermeture div class row -->

			<?php get_footer(); ?>
	</div> <!--fermeture div class container:text-align center-->