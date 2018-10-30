<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'myperf65_wattcycling-amersfoort');

/** MySQL database username */
define('DB_USER', 'myperf65_watt');

/** MySQL database password */
define('DB_PASSWORD', 'iDf2EG5#MIQxgg9SGu!');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '8q5qUJ$s[@?|9<|dQ`*s`GbejoZ2M$YyWS+rSqRXg960}E$  6m$!;J%Lr&1e5(1');
define('SECURE_AUTH_KEY',  'd^.%P.0B8OoiHZ/`5Y7}B1!gf5TvyYR<=5TS:v|K- ?nHL?W2-:HeOvdz/zQQ5%~');
define('LOGGED_IN_KEY',    ']*..xIR|^*tlCw~gjC<vP>|gPE|5xTOb;u4PxtFD4=[CDhn[jP+lj5Bn`NHr`#D|');
define('NONCE_KEY',        'yP+0;G<wSGuutO74]:gR1(gynA2IFo2% ?N>UVqm<!mz;(q)t-iey~_wlQ+V`r*H');
define('AUTH_SALT',        'HB-huc%:bHiTp`(!v`>zR~PYKKBEIOA}d!KD}x_yo&@lIpz_>gf*~g5.=rV6#F]*');
define('SECURE_AUTH_SALT', '{7Q[M>)11itp,b&O8[Z`V4LTFEP!ho :f)gg@yW5I<Q}x~[!81s:Y#-i$ /X2J#1');
define('LOGGED_IN_SALT',   'nGMmU$1lePleju|(U~rM$2/-? OsrYbxZ(INTk|LI5Y)v|.^<:@!hE2?M5>3[mo)');
define('NONCE_SALT',       '-PuV8T>%oGn62IpTA)v@]!p4bJsY=ZaA!{8<6-!a(`HW7`;mC*B+Gu%YMd,wvFPJ');

define(‘WP_MEMORY_LIMIT’,‘96M’);
define(‘WP_MAX_MEMORY_LIMIT’,‘256M’);
define('FS_METHOD','direct');



/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

define('WP_HOME','https://wattcycling.nl/amersfoort');
define('WP_SITEURL','https://wattcycling.nl/amersfoort');
if ($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') $_SERVER['HTTPS']='on';

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
