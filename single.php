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
		        	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		      	</h2>
		      	<div class="image">
		      		<?php the_post_thumbnail('full', array("class" => "img-responsive")); ?>
		      	</div>
		      	<div class="post-content">
		        	<?php the_content(); ?>
		      	</div>
		      	<div lass="tags">
		      		<?php the_tags( 'Mots-clés : ', ', ', '' );?>
		      	</div>
		      	<p class="post-info">
		        	Posté dans <?php the_category(', '); ?> par <?php the_author(); ?>.
		      	</p>

		      	<div class="post-comments">
		          			<div>
		                			<?php comments_template('', true); ?>
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