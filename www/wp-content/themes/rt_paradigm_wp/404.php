<?php
/**
 * @version   1.0 March 5, 2014
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2014 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
// no direct access
defined('ABSPATH') or die('Restricted access');

global $gantry;

// get the current preset
$gpreset = str_replace(' ','',strtolower($gantry->get('name')));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $gantry->language; ?>" lang="<?php echo $gantry->language; ?>" dir="<?php echo $gantry->direction; ?>">
	<head>
		<?php if ($gantry->get('layout-mode') == '960fixed') : ?>
		<meta name="viewport" content="width=960px">
		<?php elseif ($gantry->get('layout-mode') == '1200fixed') : ?>
		<meta name="viewport" content="width=1200px">
		<?php else : ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php endif; ?>

		<?php
		$gantry->displayHead();

		// Less Variables
		$lessVariables = array(
			'header-overlay'        => $gantry->get('header-overlay',       'dark'),
			'header-text-color'     => $gantry->get('header-text-color',    '#CBCBCB'),

			'scrolling-overlay'     => $gantry->get('scrolling-overlay',    'light'),
			'scrolling-text-color'  => $gantry->get('scrolling-text-color', '#7D7D7D'),
			'scrolling-background'  => $gantry->get('scrolling-background', '#F5F5F5'),

			'utility-text-color'    => $gantry->get('utility-text-color',   '#686868'),
			'utility-background'    => $gantry->get('utility-background',   '#0C0C0C'),

			'feature-text-color'    => $gantry->get('feature-text-color',   '#686868'),

			'maintop-text-color'    => $gantry->get('maintop-text-color',   '#868686'),
			'maintop-background'    => $gantry->get('maintop-background',   '#0C0C0C'),            

			'main-body-overlay'     => $gantry->get('main-body-overlay',     'light'),
			'main-accent'           => $gantry->get('main-accent',          '#57CE96'),
			'main-accent2'          => $gantry->get('main-accent2',         '#46A879'),

			'mainbottom-text-color' => $gantry->get('mainbottom-text-color','#868686'),
			'mainbottom-background' => $gantry->get('mainbottom-background','#0C0C0C'), 

			'extension-text-color'  => $gantry->get('extension-text-color', '#868686'),
			'extension-background'  => $gantry->get('extension-background', '#0C0C0C'), 
						
			'footer-text-color'     => $gantry->get('footer-text-color',    '#686868'),
			'footer-background'     => $gantry->get('footer-background',    '#0C0C0C')
		);

		$gantry->addStyle('grid-responsive.css', 5);
		$gantry->addLess('bootstrap.less', 'bootstrap.css', 6);
		$gantry->addLess('error.less', 'error.css', 7, $lessVariables);

		if ($gantry->browser->name == 'ie') {
			if ($gantry->browser->shortversion == 8) {
				$gantry->addScript('html5shim.js');
			}
		}
		$gantry->addScript('rokmediaqueries.js');
		?>
	</head>
	<body <?php echo $gantry->displayBodyTag(); ?>>
		<div id="rt-page-surround">

			<header id="rt-header-surround">
				<div class="rt-overlay">
					<div id="rt-header">
						<div class="rt-container">
							<?php echo $gantry->displayModules('header','standard','standard'); ?>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</header>

			<section id="rt-error-desc">
				<div class="rt-container">
					<div class="rt-error-header">
						<h1 class="rt-error-title title">404</h1>
						<h3 class="rt-error-msg"><?php _re('Page not found'); ?></h3>
					</div>

					<div class="rt-error-desc-title rt-big-title">
						<div class="module-title">
							<h2 class="title"><?php _re('Hold Up Cowboy!'); ?></h2>
						</div>
					</div>

					<p class="rt-error-desc-message">
						<?php _re("Looks like the page you're trying to visit doesn't exist.<br />Please check the URL and try your luck again."); ?>
					</p>				

					<p><a href="<?php echo home_url(); ?>" class="readon"><span><?php _re('Take Me Home'); ?></span></a></p>	
				</div>
			</section>
			<footer id="rt-footer-surround">
				<div class="rt-footer-surround-pattern">
					<div class="rt-container">
						<div id="rt-copyright">
							<?php echo $gantry->displayModules('copyright','standard','standard'); ?>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<?php $gantry->displayFooter(); ?>			
	</body>
</html>
<?php
$gantry->finalize();
?>