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
define('DB_USER', 'wordpressuser');

/** MySQL database password */
define('DB_PASSWORD', 'sql');

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
define('AUTH_KEY',         'ah5Tm_&5-@]o@P72iXG,24*IK};sIPJvh<?N1u#|&1poTWpL1r:Z!|}Br6>`rZU[');
define('SECURE_AUTH_KEY',  '<A>4gyi@7NkCyi-9IT@rB;J*g]d|!g4(5ZwdC3yi0`ZunEGt3.sW]BbTMT<0tXeL');
define('LOGGED_IN_KEY',    'QC&Y}Cs.jK2&Gdg8n{n .`>IWB`dMHX8gqA/j<I-{}iN4=P?CN{_3h^<| {o7ag*');
define('NONCE_KEY',        'WdN^~S9yo&j:oc,[`NDgr{~^&_qC>Jn3y{Vy1I9$2 S;)49S>rG!~jqkcu)PT|;Q');
define('AUTH_SALT',        'Hdmb}!;DtE7)Wum|2a}279s2S+u1>QD.ay/ ;&8g/quEj58|a>H;yiLjsWX^;0I+');
define('SECURE_AUTH_SALT', 'Id4SUBN4#3WLSnC rR]5y@ATyW!v2]-:0Jvh5KgbJRrJrkN>6P#3[w)~^_ez^pFj');
define('LOGGED_IN_SALT',   'Ui1>o6LNhZ,:B}RP$j5`hhmQih0V nf4ABWT[&E8b;<cIkbsqAG!}FkVAI75F!9=');
define('NONCE_SALT',       'e0GFH1xVM|@505O]zNA_e*w;;rwf@gi.SYRkt /cdo#UT)i]-8/-vM-9T?MgxbDX');

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
