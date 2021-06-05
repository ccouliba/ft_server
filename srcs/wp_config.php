<?php
/**
 * Custom WordPress configurations on "wp-config.php" file.
 *
 * This file has the following configurations: MySQL settings, Table Prefix, Secret Keys, WordPress Language, ABSPATH and more.
 * For more information visit {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php} Codex page.
 * Created using {@link http://generatewp.com/wp-config/ wp-config.php File Generator} on GenerateWP.com.
 *
 * @package WordPress
 * @generator GenerateWP.com
 */


/* MySQL settings */
define( 'DB_NAME',     'wordpress' );
define( 'DB_USER',     'ccouliba' );
define( 'DB_PASSWORD', 'ccouliba' );
define( 'DB_HOST',     'localhost' );
define( 'DB_CHARSET',  'utf8' );


/* MySQL database table prefix. */
$table_prefix = 'wp_';
define( 'CUSTOM_USER_TABLE',      $table_prefix . 'ccouliba' );


/* Authentication Unique Keys and Salts. */
define('AUTH_KEY',         '@MPKmx+D]-#^pT:]I1&OWTjRQv|~5]60EiN`A=(dz~1=G#CD5:5g~1_`-z,tC0#P');
define('SECURE_AUTH_KEY',  ',BJrtA*Gt[(_QbZ_;TA)-Aofs{j>uD3KYu<#o~yVb$u{eUY+UTJze[;:w:K%VC5,');
define('LOGGED_IN_KEY',    'tXwfcvVee]G,`lq9$}KK-G8_,lT&Db(-}zpB]Y}n )a A_rTY+ZInTMKAy# wk*G');
define('NONCE_KEY',        '^-D_knZ(*+Uq_5cmHH7eSa|8uBh8MwkwA/)JKv2%xesxD>FUm6Xk+y-E+q0~REZw');
define('AUTH_SALT',        '&[:O[mkk:ylemLvzP!q+QB2FZ( #lwi gp|+|H[|xxVNk|SG0kFm+0EuLX*i&A_6');
define('SECURE_AUTH_SALT', '4}#vp|NObTIps|e+Aul14j`(m@qc-XMk/|:X9mTC886--|6*c)oT~FBwCe|QmlOY-``Q5?x8e');
define('NONCE_SALT',       '_Z,uE-+7yk-w=wO}CW3i{M8-H0GltLu,4(v1@D0HGJ!+V6Y?g:PyuDM?jpu#+eFD');


/* Absolute path to the WordPress edirectory. */
if ( ! defined( 'ABSPATH' ) ){
	define( 'ABSPATH', __DIR__ . '/' );
}
/* Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
