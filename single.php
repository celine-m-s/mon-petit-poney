<?php get_header(); ?>

<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<section>
			<?php if (have_posts()) : ?>
				 
				<?php while (have_posts()) : the_post(); ?>
		     	<div class="post">
		     		<div class="date">
		     			<?php the_date(); ?></div>
		      	<h2>
		        	<?php the_title(); ?>
		      	</h2>
		      	<div class="image"></div>
		      	<?php the_post_thumbnail('full', array("class" => "img-responsive")); ?>
		      	<div class="post-content">
		        	<?php the_content(); ?>
		      	</div>
		      	<p class="post-info">
		        	Posté dans <?php the_category(', '); ?> par <?php the_author(); ?>.
		      	</p>
		      	<?php wp_related_posts(); ?>
		      	<div class="post-comments">
		          <?php comments_template(); ?>
		        </div>      	
					</div>
				<?php endwhile; ?>
				<?php else : ?>
					<p class="nothing">
					Cette page n'existe pas, reportez-vous à la barre de recherche pour faire une nouvelle recherche.
					</p>
			<?php endif; ?>
		</section>
	</div>
			
		
</div> <!-- fermeture div class row -->


			<?php get_footer(); ?>
		</div>