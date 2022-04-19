<?php
define('FOLDER','/afropratas-back-end/api/'); // cria a constante caminho padrão
$url = $_SERVER['REQUEST_URI']; // pega o que está na url
$lengthStrFolder = strlen(BASE_URL_API); // guarda o tamanho da constante folder
$urlClean = substr($url, $lengthStrFolder); // separa a parte do BASE_URL_API da string
$routeWithoutParameters = explode('?', $urlClean); //elimina parâmetros
$route = explode('/',$routeWithoutParameters[0]); //separa rota em um array
//Carrega autoloaders
require ('helpers/autoloaders.php');
//Cria objeto de response da api
$response = new Output();
//Checa se os controller e a action existe na rota
if(!isset($route[0]) || !isset($route[1])){
    $result['message'] = "404 - Rota da Api não Encontrada";
    $response->out($result, 404);
}
//Guarda o controler e o action na rota
$controller_name = $route[0];
$action = str_replace('-', '', $route[1]);
// checa se o arquivo do controller existe
$controller_path = CONTROLLERS_FOLDER.$controller_name.'Controller.php';
if(file_exists($controller_path)){
    $controller_class_name = $controller_name.'Controller';
    $controller = new $controller_class_name();
    //checa se a action do controller existe
    if (method_exists($controller, $action)){
        $controller->$action();
    }
}
//Caso não exista crontoller e action retorna 404
$result['message'] = "404 - Rota da Api não Encontrada";
$response->out($result, 404);
?>