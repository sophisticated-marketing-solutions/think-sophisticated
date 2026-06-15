<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'nextbrandxplugintest' );

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
define( 'AUTH_KEY',         '],G`W~$Or.Wok1 G90_vuD*XfH@p,yv1|+ag[dOPdWD83b?Fc~4}tfv1wuGBScJ1' );
define( 'SECURE_AUTH_KEY',  'iUyJDKQ.3eoDN4(Bp0<Pjm2D z:d,AEI:0X6[Y{kt`Tv|g8$%1gJtU$GguDYzFLa' );
define( 'LOGGED_IN_KEY',    'R(B27`8PxG[kZFfPO6LbNQQ;uD}y@SAR,@i4eDJ4*&Kf6[Oxmq;kxR*E{o_iQ.bD' );
define( 'NONCE_KEY',        'g}Qr1aa/9}mt;0):b^+]DXMF7p-`njI]@(I]KT_IiVQ[q4!<X9*J8FU9} eX4@In' );
define( 'AUTH_SALT',        'E1=T~.JE0`S3NfGjK(4zmr-uD}7=}D3k!A*30g:7~wFL4Z7Lsf~)I,zS_Z$4|62F' );
define( 'SECURE_AUTH_SALT', 'Mt(?.iMy0dOc8Q+zapRe!~:IW.cyk+u/A~!X9(#XU>,0ttwk/6o!?%@W/Ic^?~<y' );
define( 'LOGGED_IN_SALT',   'YuuGzhm50;,*j}XwQ01Dd8T4Se)tF C;s4eB/S2#L@2kpITu0Fxz703Gd.w$=<u0' );
define( 'NONCE_SALT',       '%1?x6HJO=thwk%$|L_ECZ+~g=uq))hb5`Z7&ljnIPNnv5CA!`Z<4<@F^-,,:.#U>' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
