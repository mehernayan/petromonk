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
define( 'DB_NAME', 'petromo_wp424' );

/** MySQL database username */
define( 'DB_USER', 'petromo_wp424' );

/** MySQL database password */
define( 'DB_PASSWORD', '!6S4@Ip4fq' );

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
define( 'AUTH_KEY',         'ns1t2qxzj1a1jox9hqdxpemoispkyoynywfvzpiwqluojkmur0s4hcqo6nbsxpve' );
define( 'SECURE_AUTH_KEY',  'yekihjhgrdtwk39a2z5nenkisbgtnwn4fq7oftqqim9kfoigishea1fdla7s40ih' );
define( 'LOGGED_IN_KEY',    'aj99q5bacftphslvbxs9pfrtxmmex91n3khvgwlltftslofoxhg3jd2uyitfay3q' );
define( 'NONCE_KEY',        'cbxpcipvzxi08y29sotnczpncphplpic71bnlryr8fzel3p2mvrelsphvoglvq98' );
define( 'AUTH_SALT',        'aqyvojompwlqnjejpbpl1sliiravjl0olfp6nq6rirylxxt9ip72qndlc4xgcrgp' );
define( 'SECURE_AUTH_SALT', 'qsibjv4mnrjidnpf6wyogfelxudnd02km3n2outtp4l1gnwyg2gjxwv59arpe6hb' );
define( 'LOGGED_IN_SALT',   'dyeokbrfglpneogcu11epwgfduwnqq6cf8gnf9kqk6hrsvnodngxmarguhcq6pri' );
define( 'NONCE_SALT',       'sluggakjd98naxeagmrxetf5qlcv2kzh4nbxlebeniisivekqgdabuik4vhosioz' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpmx_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
