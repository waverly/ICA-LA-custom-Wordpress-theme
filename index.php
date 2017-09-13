<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ica-la
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class="download-pdf">
			Download PDF
		</div>
			<div class="post-wrapper">
				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
					<?php
					endif;
					/* Start the Loop */
					while ( have_posts() ) : the_post();
					?>
					<div class="image-wrap">
						<div class="image-inner-wrap">
							<a href="<?php echo get_permalink();?>">
								<?php
								the_post_thumbnail();
								?>
							</a>
						</div>
						<div class="work-info-wrap">
							<?php
							$workInfoArray = get_post_custom();
							if ( array_key_exists('unframed_dimensions', $workInfoArray) ){
								$unframed_dimensions = $workInfoArray['unframed_dimensions'][0];
							}
							else{
								$unframed_dimensions = '';
							}
							if ( array_key_exists('framed_dimensions', $workInfoArray) ){
								$framed_dimensions = $workInfoArray['framed_dimensions'][0];
							}
							else{
								$framed_dimensions = '';
							}
							if ( array_key_exists('dimensions', $workInfoArray) ){
								$dimensions = $workInfoArray['dimensions'][0];
							}
							else{
								$dimensions = '';
							}
							$artist_name = $workInfoArray['artist_name'][0];
							$medium = $workInfoArray['medium'][0];
							$price = $workInfoArray['price'][0];
							$title = $workInfoArray['title'][0];
							$year = $workInfoArray['year'][0];
							echo("<p id='artist-name' class='semi-bold'>" . $artist_name . "</p>");
							echo("<p id='title'><span class='italic'>" . $title . "</span>, " . $year . "</p>");
							echo("<p id='medium'>" . $medium . "</p>");
							if (isset($framed_dimensions) && $framed_dimensions !== ''){
								echo("<p id='framed-dimensions'>Framed: " . $framed_dimensions . "</p>");
							}
							if (isset($unframed_dimensions) && $unframed_dimensions !== ''){
								echo("<p id='unframed-dimensions'>Unframed: " . $unframed_dimensions . "</p>");
							}
							if (isset($dimensions) && $dimensions !== ''){
								echo("<p id='dimensions'>" . $dimensions . "</p>");
							}
					echo('</div>');
					echo('</div>');
					endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif; ?>
			</div> <!-- end post wrapper -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
