<?php
class UserController{

    function create() {
        //Entradas
        $response = new Output();
        $response->allowedMethod('POST');
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        //Processamento
        $user = new User(null, $name, $email, sha1($pass));
        $id = $user->create();

        //Saídas
        $result['menssage'] = "Cadrastado com Sucesso";
        $result['user']['id'] = $id;
        $result['user']['name'] = $name;
        $result['user']['email'] = $email;
        $result['user']['pass'] =  $pass;
     
        $response->out($result);
    }
    function delete(){
        //Entrada
        $response = new Output();
        $response->allowedMethod('POST');
        $id = $_POST['id'];
        //Processamento
        $user = new User($id,null,null,null);
        $user->delete();
        //Saida
        $result['menssage'] = "Deletado com Sucesso";
        $result['user']['id'] = $id;
        $response->out($result);  
    }
    function update(){
        //Entrada
        $response = new Output();
        $response->allowedMethod('POST');
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $id = $_POST['id'];
        //Processamento
        $user = new User($id, $name, $email, $pass);
        $user->update();
        //Saida
        $result['menssage'] = "Atualizado com Sucesso";
        $result['user']['id'] = $id;
        $result['user']['name'] = $name;
        $result['user']['email'] = $email;
        $result['user']['pass'] =  $pass;
        $response->out($result);
    }
    function selectAll(){
        //Entrada
        $response = new Output();
        $response->allowedMethod('GET');
        $user = new User(null, null, null, null);
        //Saida
        $result =  $user->selectAll();
        $response->out($result);
    }
    function selecById(){
        //Entrada
        $response = new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $user = new User($id, null, null, null);
        //Saida
        $result =  $user->selecById();
        $response->out($result);
    }

}