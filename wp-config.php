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
define('DB_NAME', 'DMDB');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', '12345');

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
define('AUTH_KEY',         'BMBRNXT]1Qe{/ jn^P/_*IWfXLh}<n6a1_oA6a`0}Ec@R%mId?KNd+>4gsB9-m6A');
define('SECURE_AUTH_KEY',  'X%7-0R#IN2>WWbQzV{K7)r,%tj57>8/?.1)}a:&+VlOI~)gj%&!CIu2OhePDMo>Q');
define('LOGGED_IN_KEY',    'M=+i5Sf<S;T]p4U;]=8;i2@q5UM Uh)5/?;VV2~8@nm<00,fXIvP6#Ws-hHvH%Zx');
define('NONCE_KEY',        '81(1d=R1{x?;v3C`g^y6?X}xw9|#fofw;$dY}RD j/(Soajs/L>b6FwO|`y;g9]k');
define('AUTH_SALT',        '-y;B=Y*G_GzG/Z;u KL$?uvop0}H-|sb-m>H`9/H#H=Lm6RAj61PUQRDbroJGntj');
define('SECURE_AUTH_SALT', ':c]gL Ly%$oCgG>_c4Q+?VQsP5=P>X9|Z=IrevHn;GG^H1q=S<HX$nPtvpc:Y)kd');
define('LOGGED_IN_SALT',   'Qjx>;`9>hjAc^*^5;>e&%hgLmni{h/NOPxFH~R|SSV%QG;T(8?XDJXD0#$oNA6ts');
define('NONCE_SALT',       '#Y0DywzqvCA]%:Y 13E`PuJxZo~$yT~+}m>Z-KG[GX|2aflx)r~TZ5;IK<&?FdH~');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'DM_';

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
