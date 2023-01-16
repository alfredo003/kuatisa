<?php
ob_start();

require __DIR__ . "/vendor/autoload.php";

/**
 * BOOTSTRAP
 */

use CoffeeCode\Router\Router;
use Source\Core\Session;

$session = new Session();
$route = new Router(url(), ":");
$route->namespace("Source\App");

/*
 * WEB ROUTES
 */
$route->group(null);
$route->get("/", "Web:home");
$route->get("/sobre", "Web:about");

//Services
$route->group("/servicos");
$route->get("/", "Web:service");
$route->get("/p/{page}", "Web:service");
$route->get("/{uri}", "Web:servicePost");
$route->post("/buscar", "Web:serviceSearch");
$route->get("/buscar/{terms}/{page}", "Web:serviceSearch");

$route->get("/em/{category}", "Web:serviceCategory");
$route->get("/em/{category}/{page}", "Web:serviceCategory");

//auth
$route->group(null);
$route->get("/entrar", "Web:login");
$route->post("/entrar", "Web:login");
$route->get("/cadastrar", "Web:register");
$route->post("/cadastrar", "Web:register");
$route->get("/recuperar", "Web:forget");
$route->post("/recuperar", "Web:forget");
$route->get("/recuperar/{code}", "Web:reset");
$route->post("/recuperar/resetar", "Web:reset");


$route->post("/solicitacao", "Web:solicitacao");
//optin
$route->group(null);
$route->get("/confirma", "Web:confirm");
$route->get("/obrigado/{email}", "Web:success");

//services
$route->group(null);
$route->get("/termos", "Web:terms");


/**
 * APP
 */
$route->group("/app");
$route->get("/", "App:home");
$route->get("/publicar", "App:publicar");
$route->post("/publicar", "App:publicar");
$route->get("/listagem-servicos", "App:listagemServico");
$route->get("/agenda", "App:agenda");
$route->get("/fatura/{invoice_id}", "App:invoice");

$route->get("/perfil", "App:profile");
$route->post("/profile", "App:profile");
$route->get("/sair", "App:logout");

/*
 * ERROR ROUTES
 */
$route->group("/ops");
$route->get("/{errcode}", "Web:error");

/**
 * ROUTE
 */
$route->dispatch();

/**
 * ERROR REDIRECT
 */
if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();