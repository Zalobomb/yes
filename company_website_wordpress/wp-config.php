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
define('DB_NAME', 'wp996');

/** MySQL database username */
define('DB_USER', 'wp996');

/** MySQL database password */
define('DB_PASSWORD', 'j@63P-K8Sb');

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
define('AUTH_KEY',         'obrtrezxsct45jvwf34qo5lbgramequaqjz9uvodniqs5jqufdernnq2cbfemzy6');
define('SECURE_AUTH_KEY',  'dszo9c4ax2vegs8ffo9lrl3qywdnsupmqahryi0renjnufozeur5jmxqyl2xcmmr');
define('LOGGED_IN_KEY',    'pjyiboimoxchvdstgkb2i8lbktuaed8p2fxqxedm4hbxsmdw5tzyvjjkl7ioqg2w');
define('NONCE_KEY',        'zdraswdqh3lohbqbx7a31dqhmiz3bo3s29khdn8qmmr1xfs73r3sbqmecanvymel');
define('AUTH_SALT',        'bfkmfxrqoigzckqdo9b9by6tgv2usoodfcaqfdlddylx6qyxkum5uk4kx6pppyim');
define('SECURE_AUTH_SALT', 'oflbvekmzsejwmnm5wxppsfinadq3yvtqwkyd5tojpsmquo7aiuyxm2vbnsf0th6');
define('LOGGED_IN_SALT',   'hb02o1sb3rw7tedsudvzseug6ofrmqsenlvxyddybqiqwj8aafwjvje0qrmparro');
define('NONCE_SALT',       'wocwbsrtn2kvuxnxfrrseorbhz4vgfedej2kwhbgbfvjyrvtuthimd55ez1njvrq');

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

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', '127.0.0.1');
define('PATH_CURRENT_SITE', '/company_website_wordpress/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
