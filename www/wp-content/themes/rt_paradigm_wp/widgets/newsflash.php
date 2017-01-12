<?php
/**
 * @version   1.0 March 5, 2014
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2014 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

defined( 'GANTRY_VERSION' ) or die();

gantry_import( 'core.gantrywidget' );

class GantryWidgetNewsFlash extends GantryWidget {
	var $short_name = 'newsflash';
	var $wp_name = 'gantry_newsflash';
	var $long_name = 'Gantry NewsFlash';
	var $description = 'Gantry NewsFlash Widget';
	var $css_classname = 'widget_gantry_newsflash';
	var $width = 200;
	var $height = 400;

	function init() {
		register_widget( 'GantryWidgetNewsFlash' );
	}

	function render_title( $args, $instance ) {
		global $gantry;
		if ( $instance['title'] != '' ) :
			echo $instance['title'];
		endif;
	}

	function render( $args, $instance ) {
		global $gantry;
		
		ob_start();

		$cat_name = ( string )$instance['cat'];
		$cat_obj = get_category_by_slug( $cat_name );
		$cat_id = $cat_obj->term_id;

		$newsflash_query = new WP_Query( 'posts_per_page=' . $instance['count'] . '&orderby=' . $instance['order'] . '&cat=' . $cat_id ); ?>

		<div class="newsflash">

			<?php if( $newsflash_query->have_posts() ) { ?>

				<?php while ($newsflash_query->have_posts()) : $newsflash_query->the_post(); ?>

					<?php if( $instance['item_title'] ) : ?>

						<<?php echo $instance['item_heading']; ?> class="newsflash-title">

						<?php if( $instance['link_titles'] ) : ?>
							
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>

						<?php else : ?>

							<?php the_title(); ?>

						<?php endif; ?>

						</<?php echo $instance['item_heading']; ?>>

					<?php endif; ?>

					<div class="rt-newsflash-info">
						<span class="rt-newsflash-author"><?php _re( 'Written by' ); ?> <?php the_author(); ?></span>
						&nbsp;/&nbsp;
						<span class="rt-newsflash-publishup"><?php _re( 'Published on' ); ?> <?php the_date( 'l, d F Y' ); ?></span>	
					</div>

					<?php if( $instance['post_content'] == 'content' ) {
						the_content( false );
					} else {
						the_excerpt();
					} ?>

					<?php if( $instance['readmore'] && $instance['readmore_label'] != '' ) :
						echo '<a class="readmore" href="' . get_permalink() . '">' . $instance['readmore_label'] . '</a>';
					endif; ?>

				<?php endwhile; ?>

			<?php

			} else {

				echo '<p class="warning">' . _r( 'Category selected in the Gantry NewsFlash widget is empty!' ) . '</p>';

			}

			?>

		</div>

		<?php echo ob_get_clean();
	}
}