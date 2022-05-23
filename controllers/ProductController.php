<?php  
   function create() {
    //Entradas
    $response = new Output();
    $response->allowedMethod('POST');
    $name = $_POST['name'];
    $value = $_POST['value'];

    //Processamento
    $user = new User(null, $name, $value);
    $id = $product->create();

    //Saídas
    $result['menssage'] = "Cadrastado com Sucesso";
    $result['user']['id'] = $id;
    $result['user']['name'] = $name;
    $result['user']['value'] = $value;
 
    $response->out($result);
}
    if(isset($route[1]) && $route[1] != ''){
        if($route[1] == 'create'){
            $product = new Product(10, 'Renan','','');
            $$product->create();
        }elseif ($route[1] == 'delete') {
            $product = new Product(10, 'Renan','','');
            $product->delete();
        }else{
            $result['message'] = "404 - Rota da Api não Encontrada";
            $response = new Output();
            $response->out($result, 404);
        }
    }else{
        $result['message'] = "404 - Rota da Api não Encontrada";
        $response = new Output();
        $response->out($result, 404);
    }
?>