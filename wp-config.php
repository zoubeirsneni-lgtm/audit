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
define( 'DB_NAME', 'bebba_test' );

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
define( 'AUTH_KEY',         'h31Y*0U|A6dp@]~.T1,>l4g5&o,<%&$B1PqSf5)q/L0E(=u!9^2Zhwk(QWiS{t~[' );
define( 'SECURE_AUTH_KEY',  '8iPpYwzG)ef*fTs 9c:fT7> 4v|aKz#,X<+Nn1Zxl=fz{J(y894:mAXu{ eQ&rFm' );
define( 'LOGGED_IN_KEY',    '=3HS8mPr}kPcjP7cds5vbcUV;{,p,OCq]4gp$5=dM3zC:>t$Aq|-f^ifX(Cz,uNE' );
define( 'NONCE_KEY',        'GT]Xo/8P*xf+{) 6-;!4IMI/_hcAZVLi3|dY@?gM>q@S2U#DpB:A[<k=,FQ=EKZE' );
define( 'AUTH_SALT',        'Wv+5,[(hMy#=H*s]f0^:aPcBsfZ~D6`}TjtTw,_Ix5~IbS!Waz~LK9%rmxgp35oM' );
define( 'SECURE_AUTH_SALT', 'wGf_V~0HX4*T`lf:t5HvgQ:_-F8l)_s)<ajEN<+{{Un{=:L=E<ma)b+z4}FAbF/@' );
define( 'LOGGED_IN_SALT',   'UYzA#E0# Z7o)gAZ%UQoha&dwVl>o]<WV5vF_TNYF)[c5cMba;c]>pWQf04m?;Ab' );
define( 'NONCE_SALT',       '.a%8*n 1dYB|GnDh5D9v9M7YhICB5m;==J:P(xDqg`Rh9f.!,!yO`8]dua(DwP^4' );

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
