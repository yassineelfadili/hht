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
define( 'DB_NAME', 'nico' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'super+nova07' );

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
define( 'AUTH_KEY',         'j#r&t>QS0V+!SBL!AD?c]%/Xm0i 9{oQKtv%x}Ez/6EXhvXn;96wGd<(BXa0iYoX' );
define( 'SECURE_AUTH_KEY',  'stmPPBU=<ktoC|@hWs)$7<DKRPkCNB~JV@>G}6B9KDGw&-I)V3r3Re$V+>yx0zOW' );
define( 'LOGGED_IN_KEY',    'ZT`KkhpPoTS2z`B;A1W|K7yA?9f-s(^c17K@3Vhqi.B2Zn8S`A/n<V%zw&au05<b' );
define( 'NONCE_KEY',        '&)BH.[nHy78xj^[WZ|j`2xjK;$W>!l$ksau+l}v1-0~S@hA9*?)ip%Z1G_BdHkg-' );
define( 'AUTH_SALT',        'v|GEDgWJ8/:wkE}#-;jLu6tqWY5^OU<NH esWI@VyY[Jog.3[6dY>3(}l(/:bd*8' );
define( 'SECURE_AUTH_SALT', 'Qwp4>%(xAD(?s-7b8hH(-Mk`x`c]5xS&[n+@a*E=2#hs<1SXBvaY4`3|-DN^v7J(' );
define( 'LOGGED_IN_SALT',   'h9Jpgac.#o[yrgSDVhvk/<i<M:a%r%%jq4P(3=Yx=mV}~h<]l6Y=ui9Yl8Pe/VDK' );
define( 'NONCE_SALT',       ' pO*{fY9h/6R>T&LpVY{2.a?Uap/<K!oQ|J{W=su]x7v&-9~>;6lJ@K,#-B`zK@U' );

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
