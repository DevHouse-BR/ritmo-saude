<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', '123456');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'RMeC&*qu1i7Bs>Q,sEL*9Y6XYof}q8-BI^wx -1T+>|}{7-jg![<L!k+;5+#,[&l');
define('SECURE_AUTH_KEY',  'zG]Yd70#/Z$+/@3 P|>=#T&Ic$~H8ZOPwQIGkM [j`}cn>Q?vHx %RSg3Bm:^Vs9');
define('LOGGED_IN_KEY',    'ZC6-#64:!Xil/e#}P-~{,F~!.Y++N6in/YK4tS{A%D$J},5R|GU)W`^KcKxs;]+!');
define('NONCE_KEY',        'PU2srrOydxn3sg>J!Cdw?6PMjo1#.^,-<3gB@Yi66py~V887$FF|d>0%.Gr|T8?W');
define('AUTH_SALT',        'm$Bp~$K|z^]C{Z1|,C GGvX1=e/QRPz[1Qt!J96F%l8E~XBe+eT9B2gJTk.[;Fj/');
define('SECURE_AUTH_SALT', 'XqtI~/+!GF:jaCaVJ{9)fPCEF#Bts4P{q5gFP=+8iEZ7k&j#[|Twbe!yW=PE!+{-');
define('LOGGED_IN_SALT',   'E9>]{YNIF|U]Xzr/$-W9fb1-[+.I_VT,%~o0H3vP+kva|$M@5B1UGXj[5~M~ZRLB');
define('NONCE_SALT',       'M=z8H}UuP/?9O_SsO!!-y~3{?esanc:yYLcV;!=/lC<_db:9drd^YI,d@a5 }YFV');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'rtmsaudewp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'pt_BR');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
