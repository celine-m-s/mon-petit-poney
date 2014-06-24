

<?php get_header(); ?>

	<div class="row">
  <div class="col-md-9">
      <section>

         <?php $my_query = new WP_Query('category_name=featured&posts_per_page=1');
            while ($my_query->have_posts()) : $my_query->the_post();
            $do_not_duplicate = $post->ID; ?>
             <article> 
               <div class="post">
                  <div class="date">
                  <?php the_date(); ?></div>
                    <h2>
                      <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div class="image">
                      <a href="<?php echo get_permalink(); ?>">
                        <?php the_post_thumbnail('full', array("class" => "img-responsive")); ?>
                      </a> 
                    </div>                   
                    <div class="excerpt">
                      <?php the_excerpt(); ?>
                    </div>
               </div>

              </article>
            <?php endwhile; ?>

            <div class="row">
              <div class="col-md-6">
            <?php query_posts($query_string . '&cat=-5'); ?>
            <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>
                  <article>
                    <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('thumbnail', array("class" => "img-responsive")); ?>
                    </a>
                    <div class="legend">
                      <div class="date">
                        <?php the_date(); ?></div>
                      <p class="post-title">  
                        <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                      </p>
                    </div>
                  </article>

            <?php $counter++;
              if ($counter % 2 == 0) {
              echo '</div><div class="row">';
            }
            endwhile; ?>
          <?php endif; ?>
        </div>
        </div><!-- /row -->

           
       

          


      <div class="col-md-12" class='suivants'>
        <p class="align-right"></p>
          <?php posts_nav_link('separator' , 'Articles précédents' , 'Articles suivants'); ?>
      </div>

 
    </section>
    </div> <!-- fermeture div class col-md-9 -->

    <div class="col-md-3">
<!--     	<aside>
  			<?php dynamic_sidebar('main-sidebar'); ?>
  		</aside> -->
  	</div> <!-- fermeture sidebar -->
	          
	        
</div> <!-- fermeture div class row -->
</div> <!-- fermeture container -->



<?php get_footer() ?>