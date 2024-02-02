<?php

// Configuration common to all environments
include_once __DIR__ . '/wp-config.common.php';

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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'YB+70#L)CPGLAHu1J0r:wE)M)^xA}5XMPU?Ld>P~gMBk:-XLl)LY]zZ_l2OKctr]' );
define( 'SECURE_AUTH_KEY',   'J~%EY6[XFYsm${sby$HLvn.N)K^Dge_,y3/P;30|w.|84xpCr*s)h_1]B`pfc.ak' );
define( 'LOGGED_IN_KEY',     'W<3#-Qkid0y#.;0O?;b7[A7:lYkBI>oFqyFF`h9bW%Ij]I4gsx#[pWk)z&|EcWl4' );
define( 'NONCE_KEY',         'T<S@6AjG`^]TRT2zBkXj>Ri+2XN(DY/.Jomgcq8(CpX~Q[Vv$%ba`V:-d`89J-TM' );
define( 'AUTH_SALT',         'mwXp*{KV@=BS}5$4mNFr<}s!zMt:gGy:9x]|]%cGHc337jl=ufv5_b50`mS6Ti1I' );
define( 'SECURE_AUTH_SALT',  '4}<kQNdhmFhl/oa&EhX+}Y5Q U=S Im x WNPxho;Oub$v^~B?ULDkVom;x^TY=d' );
define( 'LOGGED_IN_SALT',    ' 8^FVP~wq%dEid7;b4Wii#fw+P%j9LTWTZ=OkX96_8/K5qn=p(&s4:n,{)5s{0xF' );
define( 'NONCE_SALT',        'N/)S`_Zc66jHys$$y3L-Y@({@~eyh?YL7B>u$gY1.X:H?I*|]^azm,?ht7+~We3k' );
define( 'WP_CACHE_KEY_SALT', 'YR.NzkYP:flbBEdu$q/]GzzV_4qFn>WKk-Bd-5-c$WTqMZjRk6Oq%=@%XlB-(OC0' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
