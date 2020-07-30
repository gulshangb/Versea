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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'versea' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'a{P|;Y2iA<VU8RG{g|dC[1rR(J-jdo=<k]2H--cbB9Xt0x_$&s+2iT {ZMN)g^U[' );
define( 'SECURE_AUTH_KEY',  'DyiA8Mn [ql&gP29`&{~}6,m]S|ZHebS!mH}0>Q1Y`g:RaLkM>o,nh N~QH.Rx:`' );
define( 'LOGGED_IN_KEY',    '47*qQEJ>/bkrC.Z9!k~#&`!b[[Pj0=t=Wlm8{y*6QBAOSt71osQ3[6SF2P&&?}5;' );
define( 'NONCE_KEY',        '[>MLNl;;hesoUrmRGk7gjfVuj6))(Fia,x0%^;|A_HQN}CeBgaAzQw$#(K+n-O$L' );
define( 'AUTH_SALT',        '`x[cG&P-MGD=|za5`1S4N]VK^f><l_qm]=-[Fp7E`v}c5<q}q+Cx|5gC`bpH&r =' );
define( 'SECURE_AUTH_SALT', '&R}LuDQc(p3&f;0m&isH7caW9DdIgQDFih9acR#9c;I;t!d|#{MZjm3We;@fz&J$' );
define( 'LOGGED_IN_SALT',   'QT!4xzgr18%h&+0fr:8krlrNarJ0e>k;m[<: R(yas<|_Kp`>hZ@kL=L8KR`W$AF' );
define( 'NONCE_SALT',       'y}LM8]ZcW_X<`0]_GJR$#s_Kykg7GG+JgcKY vyf.i_3*7UQgEI:*c_*u-|s`)NF' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

define('WP_MEMORY_LIMIT', '256M');
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
