<?php
/**
 * DATABASE
 */
define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "kuatisa");

/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", "https://www.kuatisa.ao");
define("CONF_URL_TEST", "https://www.localhost/kuatisa");
define("CONF_URL_ADMIN", "/admin");

/**
 * SITE
 */
define("CONF_SITE_NAME", "Kuatisa");
define("CONF_SITE_TITLE", "Serviços e profissionais que podem resolver os seus problemas");
define("CONF_SITE_DESC",
    " o kuatisa é uma ferramenta que ajuda a expandir o prestador de serviços a e reduzir a sobrecarga de esforço da população e não só, há procura de um prestador de serviços.");
define("CONF_SITE_LANG", "pt_BR");
define("CONF_SITE_DOMAIN", "timo.ao");
define("CONF_SITE_ADDR_STREET", "SC 406 - Rod. Drº Antônio Luiz Moura Gonzaga");
define("CONF_SITE_ADDR_NUMBER", "3339");
define("CONF_SITE_ADDR_COMPLEMENT", "Bloco A, Sala 208");
define("CONF_SITE_ADDR_CITY", "Florianópolis");
define("CONF_SITE_ADDR_STATE", "SC");
define("CONF_SITE_ADDR_ZIPCODE", "88048-301");

define("CONF_NUMBER_PHONE", "937 180 040");
define("CONF_EMAIL_SITE", "info@kuatisa.com");
define("CONF_ADDR_SITE", "Angola/Namibe");
/**
 * SOCIAL
 */
define("CONF_SOCIAL_TWITTER_CREATOR", "@robsonvleite");
define("CONF_SOCIAL_TWITTER_PUBLISHER", "@robsonvleite");
define("CONF_SOCIAL_FACEBOOK_APP", "626590460695980");
define("CONF_SOCIAL_FACEBOOK_PAGE", "upinside");
define("CONF_SOCIAL_FACEBOOK_AUTHOR", "robsonvleiteoficial");
define("CONF_SOCIAL_GOOGLE_PAGE", "107305124528362639842");
define("CONF_SOCIAL_GOOGLE_AUTHOR", "103958419096641225872");
define("CONF_SOCIAL_INSTAGRAM_PAGE", "robsonvleite");
define("CONF_SOCIAL_YOUTUBE_PAGE", "upinside");

/**
 * DATES
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * PASSWORD
 */
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

/**
 * VIEW
 */
define("CONF_VIEW_PATH", __DIR__ . "/../../shared/views");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_THEME", "kuatisaWeb");
define("CONF_VIEW_APP", "kuatisaApp");

/**
 * UPLOAD
 */
define("CONF_UPLOAD_DIR", "storage");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "files");
define("CONF_UPLOAD_MEDIA_DIR", "medias");

/**
 * IMAGES
 */
define("CONF_IMAGE_CACHE", CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);

/**
 * MAIL
 */
define("CONF_MAIL_HOST", "smtp.sendgrid.net");
define("CONF_MAIL_PORT", "587");
define("CONF_MAIL_USER", "apikey");
define("CONF_MAIL_PASS", "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");
define("CONF_MAIL_SENDER", ["name" => "Robson V. Leite", "address" => "cursos@upinside.com.br"]);
define("CONF_MAIL_SUPPORT", "cursos@upinside.com.br");
define("CONF_MAIL_OPTION_LANG", "br");
define("CONF_MAIL_OPTION_HTML", true);
define("CONF_MAIL_OPTION_AUTH", true);
define("CONF_MAIL_OPTION_SECURE", "tls");
define("CONF_MAIL_OPTION_CHARSET", "utf-8");