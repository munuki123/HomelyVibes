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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '{+FDa =[Zd_!3j[]NB)]C8|s4Oo[ !@QIa+--{8nj{+MA}ehCe{de`/5a35^&1Tk' );
define( 'SECURE_AUTH_KEY',  'S`{6qI0gup^PFj{*9b@UdyL2.xy-9c]+id#)|-DSS8;o2qHc#wV%FLW$A$ XP.}~' );
define( 'LOGGED_IN_KEY',    'J=;bLBMYtqw2a1Qc@^b7`3d2Z[KQfPwFec,X)]P)&@A3spNaw7]3wKlSQaF&.y,>' );
define( 'NONCE_KEY',        ']Y_R8VshFR~mDp|A6&wpMin=qGS qtDrS/REs~MHjaxoJuuvCVke8x1w9lPHg,l4' );
define( 'AUTH_SALT',        'N:r;fk~&fk;jns73~H[segUl-]zP,rK[}[,OM?mMxn$&9q/Wk~,CU_@C!#;(^t#B' );
define( 'SECURE_AUTH_SALT', 'c]2<F[6#O03p0TmaE:#ex,_#gRL810mv)Yha#<eZu#{yi|+WXrb_d!c*vk.^xyeO' );
define( 'LOGGED_IN_SALT',   '# 7VhLmoa@9f-&)N7ijc{+_QYup?H[1dI0no=7.*3A_|c&DROV@.fjA$U-}j@,X>' );
define( 'NONCE_SALT',       'jp+943OzL;^NJjSx|C`:a/fM!`o;m:6$S=d^NzV/8Mb!<h;;[kqt/3oQZd$!^XQ_' );

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
