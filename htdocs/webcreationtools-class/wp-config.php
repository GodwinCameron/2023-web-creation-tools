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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'webcreationtools' );

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
define( 'AUTH_KEY',         ';uRz=n,LDZX_YTvjWy/C7kL61<3TIi<uC-y*14f9}PKS$nfP6Nvl)ziIO|{z18^n' );
define( 'SECURE_AUTH_KEY',  'B>{1oVplh_57{$|e.wkol^!Pr%qn`FLOB3`)DML|pk5qfK[>JJ Ng)$Wgr=bta>d' );
define( 'LOGGED_IN_KEY',    '5geTH+*sFiXp5ADCoO^EKvia :d^vRig=Fu$Qr/KJ:w5M-g]%zJXWxGCkQd7iGob' );
define( 'NONCE_KEY',        'k@e8# aBk|_Tk$#I,nBqNrP!yj*2=XIcn=#rfc>ds5&5$~{#D%b(:n0`Iq|G})oy' );
define( 'AUTH_SALT',        'f@66<%4I}.B*qa1@`l/>Bn9~!_Cy#D#:kXmvZ-/^;FQTZpft(q =uU3$?H|TZCIS' );
define( 'SECURE_AUTH_SALT', 'u9I0>(b&^2U1pZ./u8XHCV+MxlCzs8ViruA CP%K+ wY*m/TS^F7x#MB{m,#pvf,' );
define( 'LOGGED_IN_SALT',   'os:ml6_[~NAQxF]cv!4:/,i[CvaS)CgN$Or~GFFl#h*qu2}M-/bt~1yeVV$U0N<:' );
define( 'NONCE_SALT',       'Df(fwx=DBq:kG4&#;4ANq0#<5H6v}z{n1Ii+J$52ttTL]bdyw^r4AM)z>v8W$1,y' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
