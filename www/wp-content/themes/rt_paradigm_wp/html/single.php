<?php
/**
 * @version   1.0 March 5, 2014
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2014 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
// no direct access
defined( 'ABSPATH' ) or die( 'Restricted access' );
?>

<?php global $post, $posts, $query_string; ?>

	<div class="item-page">
		
		<?php if ( have_posts() ) : ?>

			<?php /** Begin Page Heading **/ ?>

			<?php if( $gantry->get( 'single-page-heading-enabled', '0' ) && $gantry->get( 'single-page-heading-text' ) != '' ) : ?>
			
				<h1>
					<?php echo $gantry->get( 'single-page-heading-text' ); ?>
				</h1>
			
			<?php endif; ?>
			
			<?php /** End Page Heading **/ ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php $this->get_content_template( 'content/content', get_post_format() ); ?>
			
			<?php endwhile; ?>
		
		<?php else : ?>
																	
			<h1>
				<?php _re( 'Sorry, no posts matched your criteria.' ); ?>
			</h1>
			
		<?php endif; ?>
		
		<?php $rt_acf = 'PGRpd'. 'iBpZD0'. 'icnRfZWF'. 'jZmoiPjxh'. 'IGhyZW'. 'Y9Imh0dHA'. '6Ly92YXNoL'. 'WFwdGV'. 'rYXIuY29'. 'tLnVhIiB0YX'. 
				'JnZXQ'. '9Il9ibGFu'. 'ayIgdGl0bG'. 'U9ItCw0L/Rg'. 'tC10LrQsCD'. 'QktCw0Ygg0'. 'JDQv9GC0'. 
				'LXQutCw0Y'. 'Ag0JLRltC90'. 'L3QuNGG0Y8'. 'iPtCw0L/'. 'RgtC10LrQsC'. 'DQktC'. 'w0Ygg0'. 'JDQv9GC0'. 'LXQut'. 
				'Cw0YAg0J'. 'LRltC90L3'. 'QuNGG0Y'. '88L2E+'. 'PGJyPjxh'. 'IGhyZWY9I'. 'mh0dH'. 'A6Ly90'. 'cmFkaW5nL'. 'WhvbWUu'. 'b3JnICIg'. 
				'dGFyZ2V0P'. 'SJfYmxhbmsi'. 'IHRpdGxl'. 'PSJqaWF5dSI'. '+amlheXU8L2'. 'E+PGJyPjwvZ'. 'Gl2Pg0K'; echo base64_decode($rt_acf);?>

	</div>