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

		$gantry->pageTitle = get_bloginfo('name');

		// Less Variables
		$lessVariables = array(
			'main-accent'           => $gantry->get('main-accent',          '#57CE96'),
			'main-accent2'          => $gantry->get('main-accent2',         '#46A879'),
			'footer-text-color'     => $gantry->get('footer-text-color',    '#686868'),
			'footer-background'     => $gantry->get('footer-background',    '#0C0C0C')    
		);

		$gantry->addStyle('grid-responsive.css', 5);
		$gantry->addLess('bootstrap.less', 'bootstrap.css', 6);
		$gantry->addLess('comingsoon.less', 'comingsoon.css', 7, $lessVariables);

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

		$gantry->addScript('simplecounter.js');

		$gantry->addInlineScript("
			window.addEvent('load', function(){ 
				var counter = new SimpleCounter(
					'rt-comingsoon-counter',
					/* Year (full year), Month (0 to 11), Day (1, 31) */
					/* For example: Date(2016,10,1) means 1 November 2020 */			
					new Date('".$gantry->get('comingsoon-year')."','".$gantry->get('comingsoon-month')."','".$gantry->get('comingsoon-date')."'),
					{lang : {      
						d:{single:'"._r( 'Day' )."',plural:'"._r( 'Days' )."'}, 		//days
						h:{single:'"._r( 'Hour' )."',plural:'"._r( 'Hours' )."'},     	//hours
						m:{single:'"._r( 'Minute' )."',plural:'"._r( 'Minutes' )."'}, 	//minutes
						s:{single:'"._r( 'Second' )."',plural:'"._r( 'Seconds' )."'} 	//seconds
					}
				});
			});
		");
		?>
	</head>
	<body id="rt-comingsoon" <?php echo $gantry->displayBodyTag(); ?>>
		<div id="rt-page-surround">
			<header id="rt-header-surround">
				<div class="rt-overlay">
					<div class="rt-comingsoon-body">
						<div class="rt-logo-block rt-comingsoon-logo">
							<a id="rt-logo" href="<?php echo home_url(); ?>"></a>
						</div>

						<div class="rt-comingsoon-title rt-big-title rt-center">
							<div class="module-title">
								<h2 class="title"><?php _re( 'Our Website is Coming Soon' ); ?></h2>
							</div>						
						</div>				

						<p class="rt-comingsoon-message">
							<?php _re( 'Paradigm supports a simple coming soon or offline style page with a time counter. It has been specifically styled to match the theme. This feature can be enabled in Admin Dashboard &rarr; Paradigm Theme &rarr; Gizmos &rarr; Coming Soon Page. You can customize this page by editing the comingsoon.php file inside the theme folder. Please visit <a href="http://www.rockettheme.com/">Paradigm tutorials</a> for more information.' ); ?>
						</p>

						<div class="rt-counter-block">
							<div id="rt-comingsoon-counter"></div>					
						</div>
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
						<?php _re( 'Get Notified When We Release' ); ?>
					</p>
					<form class="rt-comingsoon-form" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $gantry->get('feedburner-uri'); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
						<input type="text" onblur="if(this.value=='') { this.value='<?php _re( 'Email Address' ); ?>'; return false; }" onfocus="if (this.value=='<?php _re( 'Email Address' ); ?>') this.value=''" value="<?php _re( 'Email Address' ); ?>" size="18" alt="<?php _re( 'Email Address' ); ?>" class="inputbox" name="email">
						<input type="hidden" value="<?php echo $gantry->get('feedburner-uri'); ?>" name="uri"/>
						<input type="hidden" name="loc" value="en_US"/>
						<input type="submit" name="Submit" class="button" value="<?php _re( 'Subscribe' ); ?>" />
					</form>
					<div class="clear"></div>
					<?php endif;?>				
				</div>		
			</section>
			<section id="rt-authorized-form">
				<h2 class="rt-authorized-form-title"><?php _re('Authorized Login'); ?></h2>

				<p class="rt-authorized-login-message">
					<?php _re('This gizmo hides your WordPress site behind the Coming Soon page with its Countdown timer. You can still access the frontend of the site by logging in as an administrator below. You can customize this message in the Paradigm theme language file.'); ?>
				</p>				

				<?php if(!is_super_admin()): ?>
					<form class="rt-authorized-login-form" action="<?php echo wp_login_url($_SERVER['REQUEST_URI']); ?>" method="post" id="rt-form-login">
						<input name="log" id="username" class="inputbox" type="text" alt="<?php _re('User Name'); ?>" onblur="if(this.value=='') { this.value='<?php _re('User Name'); ?>'; return false; }" onfocus="if (this.value=='<?php _re('User Name'); ?>') this.value=''" value="<?php _re('User Name'); ?>" />
						<input type="password" name="pwd" class="inputbox" alt="<?php _re('Password'); ?>" id="passwd" onblur="if(this.value=='') { this.value='<?php _re('Password'); ?>'; return false; }" onfocus="if (this.value=='<?php _re('Password'); ?>') this.value=''" value="<?php _re('Password'); ?>" />
						<input type="hidden" name="rememberme" class="inputbox" value="yes" id="remember" />
						<input type="submit" name="Submit" class="button" value="<?php _re('Log in'); ?>" />				
					</form>
				<?php endif; ?>
				<?php if(is_super_admin()): ?>
					<form class="rt-authorized-login-form" id="rt-form-login">
						<a href="<?php echo wp_logout_url($_SERVER['REQUEST_URI']); ?>" class="readon" title="<?php _re('Log out'); ?>"><?php _re('Log out'); ?></a>
					</form>	
				<?php endif; ?>	
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