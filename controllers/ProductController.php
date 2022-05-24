<?php
class  ProductController{

    function  create (){
        $resposta = new  Saída ();
        $resposta -> allowedMethod ( 'POST' );

        $auth = new  Auth ();
        $user_session = $auth -> allowedRole ( 'admin' );

        //Entradas
        $photo = $_POST [ 'photo' ];
        $title = $_POST [ 'title' ];
        $price = $_POST [ 'price' ];

        //Processamento ou Persistência
        $produto = new  Produto ( null , $photo , $title , $price );
        $id = $produto -> criar ();
        //Saída
        $result [ 'message' ] = "Produto Cadastrado com sucesso!" ;
        $resultado [ 'produto' ][ 'id' ] = $id ;
        $resultado [ 'produto' ][ 'photo' ] = $photo ;
        $resultado [ 'produto' ][ 'title' ] = $title ;
        $resultado [ 'produto' ][ 'price' ] = $price ;
        $resposta -> saída ( $resultado );
    }

    function deletar (){
        $resposta = new  Saída ();
        $resposta -> allowedMethod ( 'POST' );

        $auth = new  Auth ();
        $user_session = $auth -> allowedRole ( 'admin' );

        $id = $_POST [ 'id' ];
        $usuári = new  produto ( $id , null , null , null );
        $produto -> deletar ();
        $result [ 'message' ] = "Produto deletado com sucesso!" ;
        $resultado [ 'produto' ][ 'id' ] = $id ;
        $resposta -> saída ( $resultado );
    }

         function update (){
        $resposta = new  Saída ();
        $resposta -> allowedMethod ( 'POST' );

        $auth = new  Auth ();
        $user_session = $auth -> allowedRole ( 'admin' );

        $id = $_POST [ 'id' ];
        $photo = $_POST [ 'photo' ];
        $title = $_POST [ 'title' ];
        $price = $_POST [ 'price' ];
        $user = new  produto ( $id , $name , $email , $pass );
        $produto -> atualizar ();
        $result [ 'message' ] = "produto atualizado com sucesso!" ;
        $resultado [ 'produto' ][ 'id' ] = $id ;
        $resultado [ 'produto' ][ 'photo' ] = $photo ;
        $resultado [ 'produto' ][ 'title' ] = $title ;
        $resultado [ 'produto' ][ 'price' ] = $price ;
        $resposta -> saída ( $resultado );
    }

    function selecionarTodos (){
        $resposta = new  Saída ();
        $resposta -> allowedMethod ( 'GET' );
        $produto = new  produto ( null , null , null , null );
        $resultado = $produto -> selectAll ();
        $resposta -> saída ( $resultado );
    }

    function selectById (){
        $resposta = new  Saída ();
        $resposta -> allowedMethod ( 'GET' );
        $id = $_GET [ 'id' ];
        $produto = new  produto ( $id , null , null , null );
        $resultado = $produto -> selectById ();
        $resposta -> saída ( $resultado );
    }

}
?>