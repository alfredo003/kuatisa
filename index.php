<?php
ob_start();

require __DIR__ . "/vendor/autoload.php";

/**
 * BOOTSTRAP
 */

use Source\Core\Session;
use CoffeeCode\Router\Router;

$session = new Session();
$route = new Router(url(), ":");

/*
 * WEB ROUTES
 */
$route->namespace("Source\App");
$route->get("/", "Web:home");
$route->get("/sobre", "Web:about");

 
//serviços
$route->group("/servico");
$route->get("/", "Web:servico");
$route->get("/page/{page}", "Web:servico");
$route->get("/{uri}", "Web:servicoPost");
$route->post("/buscar", "Web:serviceSearch");
$route->get("/buscar/{terms}/{page}", "Web:serviceSearch");

//tecnicos
$route->group("/tecnico");
$route->get("/", "Web:tecnico");
$route->get("/page/{page}", "Web:tecnico");
$route->get("/{uri}", "Web:tecnicoPost");
$route->post("/buscar", "Web:tecnicoSearch");
$route->post("/buscar/{terms}/{page}", "Web:tecnicoSearch");


//auth
$route->group(null);
$route->get("/entrar", "Web:login");
$route->get("/cadastrar", "Web:register");
$route->post("/cadastrar", "Web:register");

$route->get("/recuperar", "Web:forget");


//optin
$route->get("/confirma", "Web:confirm");
$route->get("/obrigado/{email}", "Web:success");

//services
$route->get("/termos", "Web:terms");

/*
 * ERROR ROUTES
 */
$route->namespace("Source\App")->group("/ops");
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