<?php
define( 'WP_CACHE', true );

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bumn7534_wp575' );

/** Database username */
define( 'DB_USER', 'bumn7534_wp575' );

/** Database password */
define( 'DB_PASSWORD', '3!GS7[5p9p' );

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
define( 'AUTH_KEY',         'dbbhgnscl6dnswtyur1z992guditnq1r7a6rtqo2pqlgtptsdscqg3kovmok95he' );
define( 'SECURE_AUTH_KEY',  'mqr4g5hfb5mzabtggelvjl5d4iqaf6oljpolzgkqb4jkonjwwb6ajn38fc7q68ci' );
define( 'LOGGED_IN_KEY',    'kqlemotvubscbgu7aimxawbioljtojziocitazpku3unydwiarymhi4ss1zv1de5' );
define( 'NONCE_KEY',        'jub2ca496viqooi8lpundju56wtferzuespocmqqvaw9wfj75axsohcoqon1w1r2' );
define( 'AUTH_SALT',        '7dtujdbpylry8cvnacdmtehxmhdhaue1554i9mxzvl3zy1hpz1fkjrv4jr1nrzjj' );
define( 'SECURE_AUTH_SALT', '8mviuqietgaiaopgivuspkqhlnxukyfhzhcf8qfo430bhqljgbhl4bsacv4ksd5j' );
define( 'LOGGED_IN_SALT',   'j2aoi2lo0mu9wq8q2e1owpjdmss4sdrt8cfrskrt3cj85g0si40rladatpfi2dvp' );
define( 'NONCE_SALT',       'qcldwlgesvqeppxagf5jugfembpmysqe2vjebn7kzojtejappekwbst5pt0syjmr' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpwz_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
