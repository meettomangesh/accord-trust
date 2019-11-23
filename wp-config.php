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
define('DB_NAME', 'accord-trust');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '8_d9/+2!FFl|FKEcQis9*B5R[Ky9>X`=V)4i}c[25xK#_Y`,8}^u`3]dx0v.scf;');
define('SECURE_AUTH_KEY',  ',_.k?iveMEXiFCi{Li(DD4AgW:k!Za3/lJhUH+md%~}n}^j)m%]WCnxzAIrID;}I');
define('LOGGED_IN_KEY',    'bO!mO#6,_lozY$Zze?wPjFvY0v/Pey=2VV9XDo1>U#8FPz*pI~~]sYC0=57#1Xe;');
define('NONCE_KEY',        '.rID[Se23+C2xy: %]OTLbfeABf:3fUc_X0?-nar+vw%8wCG(?4M53FAED<JrHgy');
define('AUTH_SALT',        '3}L#@o4araz<KN?VvhmSO,[KXIP^#0v+sUT=<mw[Mp[GP,$L2@XFIAfO1r0B?}*D');
define('SECURE_AUTH_SALT', 'j;$-#LN=H *_{otK%]=}m|BZ[IIj>2|F2?tIKM^{n>jZ.BW4lI/8&zu2p UMj1A0');
define('LOGGED_IN_SALT',   'qZ0xHOuxgicigf~M<|?ac;j@Z,}Q,kkzQG.7gnp;J(6}Mq%lv)bD#z@cfqXUlgk5');
define('NONCE_SALT',       '8ZvwFREw3Isib`RX}C_~[OjI+H{51UN8AnD2v#;3uY2 j;$~D8Va4oB]2m4.@Y8t');

/**#@-*/

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
