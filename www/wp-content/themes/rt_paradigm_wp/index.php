<?php
/**
 * @version   1.0 March 5, 2014
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2014 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
// no direct access
defined( 'ABSPATH' ) or die( 'Restricted access' );

global $gantry;

// get the current preset
$gpreset = str_replace(' ','',strtolower($gantry->get('name')));

?>
<!doctype html>
<html xml:lang="<?php echo $gantry->language; ?>" lang="<?php echo $gantry->language;?>" >
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
	$gantry->addStyle('grid-responsive.css', 5);
	$gantry->addLess('bootstrap.less', 'bootstrap.css', 6);
	if ($gantry->browser->name == 'ie'){
		if ($gantry->browser->shortversion == 9){
			$gantry->addInlineScript("if (typeof RokMediaQueries !== 'undefined') window.addEvent('domready', function(){ RokMediaQueries._fireEvent(RokMediaQueries.getQuery()); });");
			$gantry->addScript('placeholder-ie.js');
		}
		if ($gantry->browser->shortversion == 8){
			$gantry->addScript('html5shim.js');
			$gantry->addScript('canvas-unsupported.js');
			$gantry->addScript('placeholder-ie.js');
		}
	}
	if ($gantry->get('layout-mode', 'responsive') == 'responsive') $gantry->addScript('rokmediaqueries.js');
	if ($gantry->get('loadtransition')) {
		$gantry->addScript('load-transition.js');
		$hidden = ' class="rt-hidden"';
	}
?>
	<?php if ($gantry->browser->name == 'ie') : ?>
		<meta content="IE=edge" http-equiv="X-UA-Compatible" />
	<?php endif; ?>
	<script src="https://use.fontawesome.com/03a351e78b.js"></script>
</head>
<body <?php echo $gantry->displayBodyTag(); ?>>
	<div id="rt-page-surround">
		<?php /** Begin Header Surround **/ if ($gantry->countModules('header') or $gantry->countModules('showcase') or $gantry->countModules('drawer') or $gantry->countModules('top')) : ?>
		<header id="rt-header-surround">
			<div class="rt-overlay">
				<?php /** Begin Header **/ if ($gantry->countModules('header')) : ?>
				<div id="rt-header">
					<div class="rt-container">
						<?php echo $gantry->displayModules('header','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
				<?php /** End Header **/ endif; ?>
				<?php /** Begin Showcase **/ if ($gantry->countModules('showcase')) : ?>
				<div id="rt-showcase">
					<div class="rt-container">
						<?php echo $gantry->displayModules('showcase','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
				<?php /** End Showcase **/ endif; ?>
				<?php /** Begin Drawer **/ if ($gantry->countModules('drawer')) : ?>
				<div id="rt-drawer">
					<div class="rt-container">
						<?php echo $gantry->displayModules('drawer','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
				<?php /** End Drawer **/ endif; ?>
				<?php /** Begin Top **/ if ($gantry->countModules('top')) : ?>
				<div id="rt-top" <?php echo $gantry->displayClassesByTag('rt-top'); ?>>
					<div class="rt-container">
						<?php echo $gantry->displayModules('top','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
				<?php /** End Top **/ endif; ?>
				<?php if (!$gantry->countModules('showcase') && !$gantry->countModules('drawer') && !$gantry->countModules('top')) : ?>
				<div class="headerpadding"></div>
				<?php endif; ?>
			</div>
		</header>
		<?php /** End Header Surround **/ endif; ?>
		<section id="rt-section-surround">
			<div id="rt-transition"<?php if ($gantry->get('loadtransition')) echo $hidden; ?>>
				<div id="rt-mainbody-surround">
					<?php /** Begin Breadcrumbs **/ if ($gantry->countModules('breadcrumb')) : ?>
					<div id="rt-breadcrumbs">
						<div class="rt-container">
							<?php echo $gantry->displayModules('breadcrumb','standard','standard'); ?>
							<div class="clear"></div>
						</div>
					</div>
					<?php /** End Breadcrumbs **/ endif; ?>
					<?php /** Begin Utility **/ if ($gantry->countModules('utility')) : ?>
					<div id="rt-utility">
						<div class="rt-container">
							<?php echo $gantry->displayModules('utility','standard','standard'); ?>
							<div class="clear"></div>
						</div>
					</div>
					<?php /** End Utility **/ endif; ?>
					<?php /** Begin Feature **/ if ($gantry->countModules('feature')) : ?>
					<div id="rt-feature">
						<div class="rt-overlay">
							<div class="rt-container">
								<?php echo $gantry->displayModules('feature','standard','standard'); ?>
								<div class="clear"></div>
							</div>
						</div>
					</div>
					<?php /** End Feature **/ endif; ?>
					<?php /** Begin Main Top **/ if ($gantry->countModules('maintop')) : ?>
					<div id="rt-maintop">
						<div class="rt-container">
							<?php echo $gantry->displayModules('maintop','standard','standard'); ?>
							<div class="clear"></div>
						</div>
					</div>
					<?php /** End Main Top **/ endif; ?>
					<?php /** Begin Expanded Top **/ if ($gantry->countModules('expandedtop')) : ?>
					<div id="rt-expandedtop">
						<div class="rt-container">
							<?php echo $gantry->displayModules('expandedtop','standard','standard'); ?>
							<div class="clear"></div>
						</div>
					</div>
					<?php /** End Expanded Top **/ endif; ?>
					<?php /** Begin Main Body **/ ?>
					<div class="rt-container">
						<?php echo $gantry->displayMainbody('mainbody','sidebar','standard','standard','standard','standard','standard'); ?>
					</div>
					<?php /** End Main Body **/ ?>
					<?php /** Begin Main Bottom **/ if ($gantry->countModules('mainbottom')) : ?>
					<div id="rt-mainbottom">
						<div class="rt-container">
							<?php echo $gantry->displayModules('mainbottom','standard','standard'); ?>
							<div class="clear"></div>
						</div>
					</div>
					<?php /** End Main Bottom **/ endif; ?>
					<?php /** Begin Expanded Bottom **/ if ($gantry->countModules('expandedbottom')) : ?>
					<div id="rt-expandedbottom">
						<div class="rt-container">
							<?php echo $gantry->displayModules('expandedbottom','standard','standard'); ?>
							<div class="clear"></div>
						</div>
					</div>
					<?php /** End Expanded Bottom **/ endif; ?>
					<?php /** Begin Extension **/ if ($gantry->countModules('extension')) : ?>
					<div id="rt-extension">
						<div class="rt-container">
							<?php echo $gantry->displayModules('extension','standard','standard'); ?>
							<div class="clear"></div>
						</div>
					</div>
					<?php /** End Extension **/ endif; ?>
					<?php /** Begin FullWidth **/ if ($gantry->countModules('fullwidth')) : ?>
					<div id="rt-fullwidth">
						<?php echo $gantry->displayModules('fullwidth','basic','standard'); ?>
						<div class="clear"></div>
					</div>
					<?php /** End FullWidth **/ endif; ?>
				</div>
			</div>
		</section>
		<?php /** Begin Footer Section **/ if ($gantry->countModules('bottom') or $gantry->countModules('footer') or $gantry->countModules('copyright')) : ?>
		<footer id="rt-footer-surround">
			<div class="rt-footer-surround-pattern">
				<div class="rt-container">
					<?php /** Begin Bottom **/ if ($gantry->countModules('bottom')) : ?>
					<div id="rt-bottom">
						<?php echo $gantry->displayModules('bottom','standard','standard'); ?>
						<div class="clear"></div>
					</div>
					<?php /** End Bottom **/ endif; ?>
					<?php /** Begin Footer **/ if ($gantry->countModules('footer')) : ?>
					<div id="rt-footer">
						<?php echo $gantry->displayModules('footer','standard','standard'); ?>
						<div class="clear"></div>
					</div>
					<?php /** End Footer **/ endif; ?>
					<?php /** Begin Copyright **/ if ($gantry->countModules('copyright')) : ?>
					<div id="rt-copyright">
						<div class="rt-container">
							<?php echo $gantry->displayModules('copyright','standard','standard'); ?>
							<div class="clear"></div>
						</div>
					</div>
					<?php /** End Copyright **/ endif; ?>
				</div>
			</div>
		</footer>
		<?php /** End Footer Surround **/ endif; ?>
		<?php /** Begin Debug **/ if ($gantry->countModules('debug')) : ?>
		<div id="rt-debug">
			<div class="rt-container">
				<?php echo $gantry->displayModules('debug','standard','standard'); ?>
				<div class="clear"></div>
			</div>
		</div>
		<?php /** End Debug **/ endif; ?>
		<?php /** Begin Analytics **/ if ($gantry->countModules('analytics')) : ?>
		<?php echo $gantry->displayModules('analytics','basic','basic'); ?>
		<?php /** End Analytics **/ endif; ?>
		<?php /** Popup Login and Popup Module **/ ?>
		<?php echo $gantry->displayModules('login','login','popup'); ?>
		<?php echo $gantry->displayModules('popup','popup','popup'); ?>
		<?php /** End Popup Login and Popup Module **/ ?>
	</div>
	<?php $gantry->displayFooter(); ?>
</body>
</html>
<?php
$gantry->finalize();
?>