<?php
/**
 * @version   1.0 March 5, 2014
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2014 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

defined( 'GANTRY_VERSION' ) or die();

gantry_import( 'core.gantrygizmo' );

/**
 * @package     gantry
 * @subpackage  features
 */
class GantryGizmoStyleDeclaration extends GantryGizmo {

	var $_name = 'styledeclaration';
	
	function isEnabled(){
		global $gantry;
		$menu_enabled = $this->get('enabled');

		if (1 == (int)$menu_enabled) return true;
		return false;
	}

	function query_parsed_init() {
		global $gantry;
		$browser = $gantry->browser;

		// Logo
		$css = $this->buildLogo();

		// Less Variables
		$lessVariables = array(
			'header-overlay'        => $gantry->get('header-overlay',       'dark'),
			'header-text-color'     => $gantry->get('header-text-color',    '#CBCBCB'),
			'header-opacity'        => $gantry->get('header-opacity',       '80%'),
			'header-background'     => $gantry->get('header-background',    '#282828'),

			'scrolling-overlay'     => $gantry->get('scrolling-overlay',    'light'),
			'scrolling-text-color'  => $gantry->get('scrolling-text-color', '#7D7D7D'),
			'scrolling-background'  => $gantry->get('scrolling-background', '#F5F5F5'),

			'utility-text-color'    => $gantry->get('utility-text-color',   '#686868'),
			'utility-background'    => $gantry->get('utility-background',   '#0C0C0C'),

			'feature-text-color'    => $gantry->get('feature-text-color',   '#686868'),
			'feature-opacity'       => $gantry->get('feature-opacity',      '50%'),
			'feature-background'    => $gantry->get('feature-background',   '#FFFFFF'),

			'maintop-text-color'    => $gantry->get('maintop-text-color',   '#868686'),
			'maintop-background'    => $gantry->get('maintop-background',   '#0C0C0C'),            

			'main-body-overlay'     => $gantry->get('main-body-overlay',    'light'),
			'main-accent'           => $gantry->get('main-accent',          '#57CE96'),
			'main-accent2'          => $gantry->get('main-accent2',         '#46A879'),

			'mainbottom-text-color' => $gantry->get('mainbottom-text-color','#868686'),
			'mainbottom-background' => $gantry->get('mainbottom-background','#0C0C0C'), 

			'extension-text-color'  => $gantry->get('extension-text-color', '#868686'),
			'extension-background'  => $gantry->get('extension-background', '#0C0C0C'), 
						
			'footer-text-color'     => $gantry->get('footer-text-color',    '#686868'),
			'footer-background'     => $gantry->get('footer-background',    '#0C0C0C')
		);

		// Section Background Images
		$positions = array('header-customheader', 'feature-customfeature', 'extension-customextension');
		$source = "";

		foreach ($positions as $position) {
			$data = $gantry->get($position . '-image', false) ? json_decode(str_replace("'", '"', $gantry->get($position . '-image'))) : false; 
			if ($data) $source = $data->path;
			$lessVariables[$position . '-image'] = $data ? 'url(' . $source . ')' : 'none';
		}   

		$gantry->addLess('global.less', 'master.css', 8, $lessVariables);

		$this->_disableRokBoxForiPhone();

		$gantry->addInlineStyle($css);
		if ($gantry->get('layout-mode')=="responsive") $gantry->addLess('mediaqueries.less');
		if ($gantry->get('layout-mode')=="960fixed") $gantry->addLess('960fixed.less');
		if ($gantry->get('layout-mode')=="1200fixed") $gantry->addLess('1200fixed.less');

		// RTL
		if ( $gantry->get( 'rtl-enabled' ) && is_rtl() ) {
			$gantry->addBodyClass( 'rtl' );
			$gantry->addLess( 'rtl.less' );
		}

		// Demo Styling
		if ($gantry->get('demo')) $gantry->addLess('demo.less', 'demo.css', 9, $lessVariables);

		// Chart Script
		if ($gantry->get('chart-enabled')) $gantry->addScript('chart.js');

		// Scrolling Fixed Header
		if ($gantry->get('scrolling-fixed-header')=="enable") $gantry->addScript('scrolling-header.js');  

		// Add inline css from the Custom CSS field
		$gantry->addInlineStyle($gantry->get('customcss'));

	}

	function buildLogo(){
		global $gantry;

		if ($gantry->get('logo-type')!="custom") return "";

		$source = $width = $height = "";

		$logo = str_replace("&quot;", '"', str_replace("'", '"', $gantry->get('logo-custom-image')));
		$data = json_decode($logo);

		if (!$data){
			if (strlen($logo)) $source = $logo;
			else return "";
		} else {
			$source = $data->path;
		}

		$baseUrl = trailingslashit(get_bloginfo('wpurl'));

		if (substr($baseUrl, 0, strlen($baseUrl)) == substr($source, 0, strlen($baseUrl))){
			$file = trailingslashit(ABSPATH) . substr($source, strlen($baseUrl));
		} else {
			$file = trailingslashit(ABSPATH) . $source;
		}

		if (isset($data->width) && isset($data->height)){
			$width = $data->width;
			$height = $data->height;
		} else {
			$size = @getimagesize($file);
			$width = $size[0];
			$height = $size[1];
		}

		$source = str_replace(' ', '%20', $source);

		$output = "";
		$output .= "#rt-logo {background: url(".$source.") 50% 0 no-repeat !important;}"."\n";
		$output .= "#rt-logo {width: ".$width."px;height: ".$height."px;}"."\n";

		$file = preg_replace('/\//i', DIRECTORY_SEPARATOR, $file);

		return (file_exists($file)) ? $output : '';
	}

	function _disableRokBoxForiPhone() {
		global $gantry;

		if ($gantry->browser->platform == 'iphone' || $gantry->browser->platform == 'android') {
			$gantry->addInlineScript("window.addEvent('domready', function() {\$\$('a[rel^=rokbox]').removeEvents('click');});");
		}
	}
}