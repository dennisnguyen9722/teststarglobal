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
define( 'DB_NAME', 'admin' );

/** Database username */
define( 'DB_USER', 'admin' );

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
define( 'AUTH_KEY',         'o+w=BekD/5A2<Ol,5Mn1*`z35g}W}v%gAnsW9,/-:Hy1&6*F^jh^*b];0e@(p>f4' );
define( 'SECURE_AUTH_KEY',  '*v`R-,^ET>P#35/;^lOjg@(#g%^{vNmZSVOqX&P7lX3nB?::m(#_AzJJ;>;Ocy-&' );
define( 'LOGGED_IN_KEY',    'xrY5kz|{fL/u08=Gl$6Z0JvH#E0W9X_]J-Lw3 o.+v^4!qIKzH,3cjxTa6*t6pnI' );
define( 'NONCE_KEY',        '|Y?$]~AV!<(@7<%M@5q:B <:6( e(^u@MCr#1cWq@/E0;_^xZ%AE[ZENhKzE>iL`' );
define( 'AUTH_SALT',        'fY?{z-@:Sy*UHO,`>e=AVHW 53<VuDa{.xW}86fevH+#y^fD=t)=oVkJTVIn~^U_' );
define( 'SECURE_AUTH_SALT', 'p]%K%4f0D>P4/O%3S}lFiV@UG$Y*v2gz}jUZ@C5f2U};V1AZL1Cs:t.i~tdh ^ma' );
define( 'LOGGED_IN_SALT',   ':{NIi7PD?Cj;H=d_`|N%3mKPi;AxRHyS#mjgu|QAHB3hR%]L5G,AH1:HO(}8j1S,' );
define( 'NONCE_SALT',       '?2am.EuOpP$C<(h32v<~7|gb{g[!K-Sk0O;|6qYb(Va%4~#,~?H1*?`IOye`UJ&(' );

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
$table_prefix = 'wp_admin';

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
