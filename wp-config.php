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
define( 'DB_NAME', 'caestus_fr' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

define( 'WP_HOME', 'https://caestus.takiddine.co/fr' );
define( 'WP_SITEURL', 'https://caestus.takiddine.co/fr' );






define( 'FS_METHOD', 'direct' );


/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'TvLsPMmKk5Ex5KbnOm0ZOE46ySLi5LjcRUpViuLwBsyn0AEaw0viD6HFRRI0Qfet' );
define( 'SECURE_AUTH_KEY',  'yu2SSm4P5e4YF0DAbCQ3fPwkCye7bIwlPTDmqK2Rh5j3aFteiAvqhaLsAbIfjNST' );
define( 'LOGGED_IN_KEY',    '868AfpbK6pqKfUmS3HiECiTNQzieY3rI1uhhGj5y7uQyAqKChP4vxnORiUuyDq7C' );
define( 'NONCE_KEY',        '5Ej9peqbJtvF6iSEiEoHKglx6dJjbNmN8VnnF9rHXbDV2lwrvgnjKV9wWOIkcJXT' );
define( 'AUTH_SALT',        'bld3yhTGEOyALMyxPEfABAJyax6hGzDujLu5EFLrPF20x6HRqXXtvhTWOS24cFJi' );
define( 'SECURE_AUTH_SALT', 'abPom3ZBDxs3InPY8ZbacsVLeXkpQ3S6D0gbon0QBiEO4jkYA5bxsASCQn3ltzC6' );
define( 'LOGGED_IN_SALT',   'Rym9zYwD0lP9J11MmG9pstOgM9xkVG7ae0dEzDNamHBkPD41jxAkbDE7GYtvAX2e' );
define( 'NONCE_SALT',       'wxCyCydITuezkqt1JXPtTDhvQPZ94Djjd9r6HT5u3jmZPJT56XzsPIHTpjsB3uFD' );

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
