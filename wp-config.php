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
define( 'DB_NAME', 'myblog_db' );

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
define( 'AUTH_KEY',         '~he^>&J_O6lVs9UTj0lVrv*rsBCpJ)/yrkt>~uLu*R+jU0|ypdZUJJ5X#6Xb y6K' );
define( 'SECURE_AUTH_KEY',  '<xX{g2;wQrX2P``*8~p&`1S8>[|,(lzG1:YI`g:5fP#l.}}vdm?;|]xg,HvIgW^2' );
define( 'LOGGED_IN_KEY',    '/La&:%iQUx0&Y<%;.Dwu)_ Qa>/JtJoexLO]7WK4`S>Rpu%<c><5KF7D=pngRe:6' );
define( 'NONCE_KEY',        'BIPb}05,8#|B|eI*Iy.,>#!rn.3|P`wXD%2r.%}bn!o0VIQwZs 9o=*9j;h`zeJT' );
define( 'AUTH_SALT',        'XGO; `73*4$7b~1}fI8#siSf|/rC[e]/|7Mja83RoKilZz^/xsfeZL+sK[9q.wxa' );
define( 'SECURE_AUTH_SALT', 'n~P>J45])-_7B^W;J)I)!=F.k&sMI4NBsWfzd)tIvk^qJuK8?me$0q`0i6Iv:yak' );
define( 'LOGGED_IN_SALT',   'QqJu!{ qmQ|EZDte{u $QSiOMhrMp8JG.]vHwmW$lG83ni+PnAOBZmgD&d]Ju;0^' );
define( 'NONCE_SALT',       'McWb=XQ %tC0Qgc,T1A4]@Hq2,!}*=A!3/@;~8yMC4&!+Hjo5IPk 9[}@3TOkLeH' );

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
