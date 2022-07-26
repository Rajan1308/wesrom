<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wesrom' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'O*v(NcnMK=[YcL%CFXJ=eVl ZU*oZ/!%sJ(3YFi8HP%e7_AH9yk-kPk:#aImfP;x' );
define( 'SECURE_AUTH_KEY',  'y[;$zP)jYh<k`CR16G/`&&3[CPxN:WlAlXDI}VObJs/+gG1&IChMH%oBE%RBE=b;' );
define( 'LOGGED_IN_KEY',    'U%$&DhWgy[>%!1i1KeB;NQO8|-_R]q?;EJ8aOK8ax0qciTiC+?NA+O}4A=xVsXDQ' );
define( 'NONCE_KEY',        '0m|5{}l`V?^hD)wXH.k>IuB<P+`pB`` Y/%#$I$.i{GS_8KnBVoiv%):MW5uYjuE' );
define( 'AUTH_SALT',        'Y2bK.&3jt5]ZJe9S9ETKD<+>[OL]jR!1.j)F JXgCoAAqH} YFMuIUcmYIty7a|P' );
define( 'SECURE_AUTH_SALT', 'CY4a5k* x%t^6A`!<;vA~l|3T0]C}nKrK`_6R_m>tM6(}QAIGmr;b5>1fUUqhS%h' );
define( 'LOGGED_IN_SALT',   '}23R_4U{g}FUo)<bf;<40--Q(KOXq(l.-{bh&X{85u0hpY^2+3WAO%/M%_Wc@_+;' );
define( 'NONCE_SALT',       'qw8$I8yM7ipII[kq]PE+cInT,7::xo>OvZ_gyu.%w ^3u9H-lBgn2;zQU1pYw8u/' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wes_';
define('WP_MEMORY_LIMIT', '512M');
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
