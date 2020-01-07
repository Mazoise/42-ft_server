<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wordpress');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'myserver_user');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'myserver_psw');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
    define('AUTH_KEY',         '9JKlP?[6+_P3tngAdu~z=}{P^?3lCwq*+_tQ,RBF X7(p]TymWKwA?&|3f9IYg+.');
    define('SECURE_AUTH_KEY',  '-Cc/ +AFU|YG/hg-kho$_w.;YWZO(m/9o80-kCh;FWZNB.2lPe..:-L+)a:M(;*C');
    define('LOGGED_IN_KEY',    'G 9`|eeP/<u~_%@#D-W*!V]Q-$!tJE@BXiC!nM5;-&>[(Zo7J5%v fZjV)VtLv&,');
    define('NONCE_KEY',        ')(L.EJuz[eq5h2EN;Xuq4}mk_j:)@fa-hs!k |sJ2D-]+FWC5+y/K7Z^eUo:fk,X');
    define('AUTH_SALT',        'oDMEg0)n?:n^yf7%q9G&52Hghv|CXG?rEG=}}lRe0^NJ*gvm$y4Go||/U>Enzp`h');
    define('SECURE_AUTH_SALT', '12vvq)/n>q_v#G^.|*vKv<{:2m4Q,UG6`K-t6j%-P9(5Tg6#I%9&fcI{~WV{0ewn');
    define('LOGGED_IN_SALT',   '+s.. wiGD&J()z1T[X>%e]jfG}t_)5_I0hHM.27!b{{i+]4e7Rp/|OPz#V%>JrHy');
    define('NONCE_SALT',       '1>bjh|+LEq}i1ftE[/j|L|~%&rSWH[0Qd:lAf[/}|H1q&QO|~vf>iOAi#`!dzEF#');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
        define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');