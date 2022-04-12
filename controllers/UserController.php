<?php
class UserController{

    function create() {
        //Entradas
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        //Processamento
        $user = new User(null, $name, $email, $pass);
        $id = $user->create();

        //Saídas
        $result['menssage'] = "Cadrastado com Sucesso";
        $result['user']['id'] = $id;
        $result['user']['name'] = $name;
        $result['user']['email'] = $email;
        $result['user']['pass'] =  $pass;
        $response = new Output();
        $response->out($result);
    }
    function delete(){
        //Entrada
        $id = $_POST['id'];
        //Processamento
        $user = new User($id,null,null,null);
        //Saida
        $result['menssage'] = "Deletado com Sucesso";
        $result['user']['id'] = $id;
        $response = new Output();
        $response->out($result);  
    }
    function Update(){
        //Entrada
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
        $response = new Output();
        $response->out($result);
    }
    function selectAll(){
        //Entrada
        $user = new User(null, null, null, null);
        //Saida
        $result =  $user->selectAll();
        $response = new Output();
        $response->out($result);
    }

}