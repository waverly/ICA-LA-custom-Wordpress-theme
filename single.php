<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ica-la
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="single-wrap">
				<?php
				while ( have_posts() ) : the_post();
				?>
					<div class="single-img-wrap">
						<?php
						the_post_thumbnail();
						?>
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
							if ( array_key_exists('description', $workInfoArray) ){
								$description = $workInfoArray['description'][0];
							}
							else{
								$description = '';
							}
							$artist_name = $workInfoArray['artist_name'][0];
							$medium = $workInfoArray['medium'][0];
							$price = $workInfoArray['price'][0];
							$title = $workInfoArray['title'][0];
							$year = $workInfoArray['year'][0];
							$price = $workInfoArray['price'][0];
							echo("<p id='artist-name' class='bold'>" . $artist_name . "</p>");
							echo("<p id='title'><span class='italic'>" . $title . "</span>, " . $year . "</p>");
							echo("<p id='medium'>" . $medium . "</p>");
							if (isset($framed_dimensions)){
								echo("<p id='framed-dimensions'>Framed: " . $framed_dimensions . "</p>");
							}
							if (isset($unframed_dimensions)){
								echo("<p id='unframed-dimensions'>Unframed: " . $unframed_dimensions . "</p>");
							}
							echo("<p id='price'>" . $price . "</p>");
							if (isset($description) && $description !== ''){
								echo "<div class='description'>";
								echo "<h2 class='semi-bold'>Description / Commentary</h2>";
								echo("<p id='description'>" . $description . "</p>");
								echo "</div>";
							}
					echo('</div>');
					endwhile;
					?>

			</div><!-- end singlewrap  -->
			<div id="bottom-right-text">
				<p id="expand">Expand</p>
				<a id="close" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Close</a>
			</div>
			<div class="modal-close invisible">
				<p>Close</p>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
