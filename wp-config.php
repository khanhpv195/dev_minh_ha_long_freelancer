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
define( 'DB_NAME', 'minh' );

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
define( 'AUTH_KEY',         'mr^(E5;9Wga, mJEUe?p]=0|f~ghy}c[1MuBSeEB6sL]A.{G9! S|-gs/_1j*GQY' );
define( 'SECURE_AUTH_KEY',  ' T;mTI@<m]L_/2S7-&@%t:&/3xeMzudOg(hlA:B!jZ7Ln!bY]E-|4(Wt[8G#uXB6' );
define( 'LOGGED_IN_KEY',    '@ZT=iF=SE)C<*Tqjf=eh8*?hG%WO{0nPz]l)5_edun+*=8;Ipy,>W1aH<$gf=%=?' );
define( 'NONCE_KEY',        'iVboNdW8t}[g{kjiv!|{E;#dKAhaOrt}l9g|<c8],97(mj[:p.bLL?Y 1%s@7z^2' );
define( 'AUTH_SALT',        'U.@#N6kG](3I9_{Zv6wkPU<licExs:]re9M(6DfR4iF[O YM;Mflg=CyoCN/u_mE' );
define( 'SECURE_AUTH_SALT', 'oQj2FRm5S>g>A]<tR/f,`%>W SnnAvOZJdMyIb!;~)tJOc#CLBmR<0s=R8[&?#ei' );
define( 'LOGGED_IN_SALT',   '>z~z5vZ+@8Wkfo @On8Lz~aqtG=w!GWy6%^T<#H1r3&@T@[d-Ze+vk~#!j3H%4% ' );
define( 'NONCE_SALT',       ':<d((thjG1%` QmFer d3aP5K>Kld8C}IhEi=U,,G$_z E/E@9qou(Z)5q` i2>G' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
