	

<footer>
Tous droits réservés -- Web-Design Express
</footer>

<?php
   /* Always have wp_footer() just before the closing </body>
    * tag of your theme, or you will break many plugins, which
    * generally use this hook to reference JavaScript files.
    */
    wp_footer();
?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	        <script>window.jQuery || document.write('<script src="<?php bloginfo('template_directory'); ?>/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

	        <script src="<?php bloginfo('template_directory'); ?>/js/vendor/bootstrap.min.js"></script>

	        <script src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>

	        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
	        <script>
	            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
	            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
	            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
	            e.src='http://www.google-analytics.com/analytics.js';
	            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
	            ga('create','UA-XXXXX-X');ga('send','pageview');
	        </script>
</body>
</html>
