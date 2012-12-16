<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress_test');

/** MySQL database username */
define('DB_USER', getenv("DB_USER"));

/** MySQL database password */
define('DB_PASSWORD', getenv(("DB_PASSWORD"));

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'qSG~1v*RPHGKSL0M?%t8q8@b!hsn3V)@d3>[(Hn|JKoap*I;|D)!y}Lw` c*f.V!');
define('SECURE_AUTH_KEY',  'j^8FIU)2!W(b;0ZF`*U/pZb2E`t` V;|-,p7hr)>akT@p[758f;(T28,ccWQI3hk');
define('LOGGED_IN_KEY',    'Zml Yt1%,1724Tvo0Lxj&bpCzKf5fLP$FgZad -TuXkA=cLP(4{4AFpd*(x#;bVO');
define('NONCE_KEY',        'O8~m`83hs[j}6)7@ouoX#G<_h= AybAk],uI%H=RDuM5shLQTgW[j&f{J.Aw*t:w');
define('AUTH_SALT',        'L9(OE:=$~?qjT>ADkc@$7OHcInl)lyy#Rm{zd~xaqxyd67H$*]2cSFnlSKt;I:F|');
define('SECURE_AUTH_SALT', 'rN+EuB/k6l*GBoB*!50L{3u,S}mc:+^4 F,+E}+{pO&6g!]}^)ED7v>YIb+;uB]}');
define('LOGGED_IN_SALT',   '=Fv<V`[!A^bVX{J {8rr`+%%{hy15;!k6nc;d~ji<N]] [6)W+6VaM2%J.lmY.q.');
define('NONCE_SALT',       '~$raGa$),Oi 5F(R6,ZgW=e,Qlw&y28N`=WWJ[`|<Z;~7Btf3:Dy1onvp]p3c<G]');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wordpress_test_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
