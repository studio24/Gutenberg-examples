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
define( 'DB_NAME', 'wptest_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'qWao1)E.as{r0F?kBw51#|tX7ETw7PW+LFLxnGngfC0zY,I:gh6 fXewp*R`AxL*' );
define( 'SECURE_AUTH_KEY',  '<w#sK$Ub,$vF;?3g-E0L-/j~T!w;LySQ!#|,ZUBhv1 x)gt(?}i8L:|3H1~v%O1 ' );
define( 'LOGGED_IN_KEY',    'P65L ]!<`s4.9+aWB:H<CHX)nvJCW59vaLTtKuN)bR#ZZXcZ:/G8*7Ege*.zTmRY' );
define( 'NONCE_KEY',        't]t:Vqhb9bdV84z:#6Pn7R<|SUoo$z`c5c+-#}gA9PX0$:|o7E?3Be]q5-RFcF%(' );
define( 'AUTH_SALT',        'k7_O>%:x^< EvIn|4@+`GP@~+~/+nEfzs*9x66nxu.uIot^mZo*2I}FjD+:?vx:^' );
define( 'SECURE_AUTH_SALT', 'b7:3^9Q d0.nXD=>gR2 .x]0=X#i2KnX>DN~/,lGEP4J&vpv%0b^$PL@{Z(0Fuk/' );
define( 'LOGGED_IN_SALT',   'k}}Qv7US cl|nvtrqM}gi$jwt;GtUSxim~L  @$e56P8 9ycZnST7e,vCJ4Y:qL^' );
define( 'NONCE_SALT',       't%1q[@Id.$p[s^AnZ,#ac:_oz!)j?LoRg%&_X%$JIR$h |j;OU;/n#/Z0H+Ss~%i' );

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
