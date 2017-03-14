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
define('DB_NAME', 'soporte_audiovisual');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'bdKzVOS;NpGITi6t>C!B681-d% )C}Q;T 9In3::Lhj;`5_CpT6Yozb~OiwDA+-Y');
define('SECURE_AUTH_KEY',  '_^3@7rEr&~2codA /TfY&L5M=uMC$^JXj!%n9QgHYIwZdYdQ75@h*FzB^9xt_-~,');
define('LOGGED_IN_KEY',    '<UXR?](f~D ANU8T+HcQ/}trX%0N:Z7C}IKUJK`^gP_5Hj,~p3DH[<qTP`aq.M| ');
define('NONCE_KEY',        'NI:N+n#Q4z=o(>2.CHzc/E] |#iMlv8[LhZ}K*at#$(2(g_iW~*:G^,HX]Z{0]Hl');
define('AUTH_SALT',        '`2n?Yey@`ob}_t+~7u{Mh[d=;qVV4uf[W6u!JE`5$Bd;S![pm`ffQG/@}EX,0p7n');
define('SECURE_AUTH_SALT', '^sSJ9}+P7Xl?I/>^>yI7vRL6=~lFI:I@FV[AVD=[y1vSda1Q{D/akN=A6#T^%IhC');
define('LOGGED_IN_SALT',   '2)/3M#!!Bn%C8?~p/`ctPG&P|`PFzI$fL!1k=iPD(Ud_#.*qxA{Bv7lV?$~E:+SX');
define('NONCE_SALT',       '/;%)x-K|G^R6fn~]DL+5Zudp]MT3c5tH*T];Mun6.f7=yhaIF2y~.{V>JP-[+z[c');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sa_';

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
define('WP_DEBUG', true);
/* Direct updates */
define('FS_METHOD','direct');
/* Remove Contact Form 7 p and br */
define('WPCF7_AUTOP', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
