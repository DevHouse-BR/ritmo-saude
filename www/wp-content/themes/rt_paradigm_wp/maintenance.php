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

$gantry->addBodyClass( '-mar14-home' );

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

		$gantry->pageTitle = _r( 'Offline Page' );

		$lessVariables = array(
			'main-accent'           => $gantry->get('main-accent',          '#57CE96'),
			'main-accent2'          => $gantry->get('main-accent2',         '#46A879'),
			'footer-text-color'     => $gantry->get('footer-text-color',    '#686868'),
			'footer-background'     => $gantry->get('footer-background',    '#0C0C0C')    
		);

		$gantry->addStyle('grid-responsive.css', 5);
		$gantry->addLess('bootstrap.less', 'bootstrap.css', 6);
		$gantry->addLess('offline.less', 'offline.css', 7, $lessVariables);

		if ($gantry->browser->name == 'ie'){
			if ($gantry->browser->shortversion == 9){
				$gantry->addInlineScript("if (typeof RokMediaQueries !== 'undefined') window.addEvent('domready', function(){ RokMediaQueries._fireEvent(RokMediaQueries.getQuery()); });");
				$gantry->addScript('placeholder-ie.js');
			}
			if ($gantry->browser->shortversion == 8){
				$gantry->addScript('html5shim.js');
				$gantry->addScript('placeholder-ie.js');
			}
		}

		$gantry->addScript('rokmediaqueries.js');
		?>
	</head>
	<body id="rt-offline" <?php echo $gantry->displayBodyTag(); ?>>
		<div id="rt-page-surround">
			<header id="rt-header-surround">
				<div class="rt-overlay">
					<div class="rt-offline-body">
						<div class="rt-logo-block rt-offline-logo">
							<a id="rt-logo" href="<?php echo home_url(); ?>"></a>
						</div>

						<div class="rt-offline-title rt-big-title rt-center">
							<div class="module-title">
								<h2 class="title"><?php _re( 'Our Website is Temporarily Offline' ); ?></h2>
							</div>						
						</div>

						<?php if( $gantry->get('maintenancemode-message') != '' ) : ?>
						<p class="rt-offline-message">
							<?php echo $gantry->get('maintenancemode-message'); ?>
						</p>
						<?php endif; ?>					

					</div>
					<?php if (!$gantry->countModules('showcase') && !$gantry->countModules('drawer') && !$gantry->countModules('top')) : ?>
					<div class="headerpadding"></div>
					<?php endif; ?>
				</div>
			</header>
			<section id="rt-subscription-form">
				<div class="rt-container">
					<?php if($gantry->get('email-subscription-enabled')) : ?>
						<p class="rt-subscription-title">
							<?php _re( "Get Notified When We're Back" ); ?>
						</p>
						<form class="rt-offline-form" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $gantry->get('feedburner-uri'); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
							<input type="text" onblur="if(this.value=='') { this.value='<?php _re( 'Email Address' ); ?>'; return false; }" onfocus="if (this.value=='<?php _re( 'Email Address' ); ?>') this.value=''" value="<?php _re( 'Email Address' ); ?>" size="18" alt="<?php _re( 'Email Address' ); ?>" class="inputbox" name="email">
							<input type="hidden" value="<?php echo $gantry->get('feedburner-uri'); ?>" name="uri"/>
							<input type="hidden" name="loc" value="en_US"/>
							<input type="submit" name="Submit" class="button" value="<?php _re( 'Subscribe' ); ?>" />
						</form>
					<?php endif; ?>					
				</div>		
			</section>
			<section id="rt-authorized-form">
				<h2 class="rt-authorized-form-title"><?php _re('Authorized Login'); ?></h2>

				<p class="rt-authorized-login-message">
					<?php _re(' When your site is in Maintenance mode, the site frontend will not be available for public. You can still access the frontend of the site by logging in as an administrator below. You can customize this message in the Paradigm theme language file.'); ?>
				</p>				

				<form class="rt-authorized-login-form" action="<?php echo wp_login_url($_SERVER['REQUEST_URI']); ?>" method="post" id="rt-form-login">
					<input name="log" id="username" class="inputbox" type="text" alt="<?php _re('User Name'); ?>" onblur="if(this.value=='') { this.value='<?php _re('User Name'); ?>'; return false; }" onfocus="if (this.value=='<?php _re('User Name'); ?>') this.value=''" value="<?php _re('User Name'); ?>" />
					<input type="password" name="pwd" class="inputbox" alt="<?php _re('Password'); ?>" id="passwd" onblur="if(this.value=='') { this.value='<?php _re('Password'); ?>'; return false; }" onfocus="if (this.value=='<?php _re('Password'); ?>') this.value=''" value="<?php _re('Password'); ?>" />
					<input type="hidden" name="rememberme" class="inputbox" value="yes" id="remember" />
					<input type="submit" name="Submit" class="button" value="<?php _re('Log in'); ?>" />
				</form>
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