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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'U0^o3pOniQ$a%$#)bkYEUEc`E9c9W`JGVIIl3]I#^uZXGMrLA(5$De3`d0UEpMu%');
define('SECURE_AUTH_KEY',  '&?0@HVWO]3e?#%AAI2E|(~dxC1@%*U<H0Wo#O$!Uqt)%V_][+waLuR;)_LjTKd$I');
define('LOGGED_IN_KEY',    'T/mZ!2X.+RVwAv?*(cA3EUqwu>RIW5&3e9v[(tjI3nVjJ;<XCNXqC/fGiIFK4|-k');
define('NONCE_KEY',        '|V?2XBgl^EZs#|ZA;H33G-(m8~#<k]V,uQHyfSCfa$^URTPgL:@!kPtHwuHZ}^OT');
define('AUTH_SALT',        'tF7LyTk_-;X2QWuJL0]%#PL82]Z#^*)gQ`,nA#m{YG= v34p]6^9Sv?]s61S2:5s');
define('SECURE_AUTH_SALT', 'lulp58!ry-GZE=2Vh<mYDejPn_)UdK@tqbX_d)VZ.E =$%&>U(`a^ij=~wzQ*&g!');
define('LOGGED_IN_SALT',   'tuX%hv<hW~OcQ=;9~rv;pkJ5u}WP%>W>;AX@;EM}* 8R[w#]OD;jM+G;kKvS{Uo+');
define('NONCE_SALT',       '=:`&kLG~ra6.&LE/v)fmD)~nS#:/V[j7BE01:l{w9l|TWMil(JWX+/C5-Fbv3@h[');

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
