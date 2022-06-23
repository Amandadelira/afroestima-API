<?php
class ProductController{

    function create(){
        $response = new Output();
        $response->allowedMethod( 'POST' );

        $auth = new Auth();

        //Entradas
        $photo = $_POST[ 'photo' ];
        $title = $_POST[ 'title' ];
        $price = $_POST[ 'price' ];

        //Processamento ou Persistência
        $produto = new Product( null , $photo , $title , $price );
        $id = $produto->create();
        //Saída
        $result[ 'message' ] = "Produto Cadastrado com sucesso!" ;
        $result[ 'produto' ][ 'id' ] = $id ;
        $result[ 'produto' ][ 'photo' ] = $photo ;
        $result[ 'produto' ][ 'title' ] = $title ;
        $result[ 'produto' ][ 'price' ] = $price ;
        $response->out( $result );
    }

    function delete(){
        $response = new Output();
        $response->allowedMethod( 'POST' );

        $auth = new Auth();
        $user_session = $auth->allowedRole( 'admin' );

        $id = $_POST [ 'id' ];
        $produto = new Product( $id, null, null, null );
        $produto->delete();
        $result [ 'message' ] = "Produto deletado com sucesso!" ;
        $result [ 'produto' ][ 'id' ] = $id ;
        $response->out($result);
    }

    function update(){
        $response = new Output();
        $response->allowedMethod( 'POST' );

        $auth = new Auth();
        $user_session = $auth->allowedRole( 'admin' );

        $id = $_POST[ 'id' ];
        $photo = $_POST[ 'photo' ];
        $title = $_POST[ 'title' ];
        $price = $_POST[ 'price' ];
        $product = new Product( $id , $photo , $title , $price );
        $product ->update();
        $result[ 'message' ] = "produto atualizado com sucesso!" ;
        $result[ 'produto' ][ 'id' ] = $id ;
        $result[ 'produto' ][ 'photo' ] = $photo ;
        $result[ 'produto' ][ 'title' ] = $title ;
        $result[ 'produto' ][ 'price' ] = $price ;
        $response->out( $result );
    }
    function selectAll(){
        //Entrada
        $response = new Output();
        $response->allowedMethod('GET');
        $product = new Product(null, null, null, null);
        //Saida
        $result =  $product->selectAll();
        $response->out($result);
    }
    function selectById (){
        $response = new  Output();
        $response -> allowedMethod('GET');
        $id = $_GET['id'];
        $product = new Product( $id, null, null, null );
        $p = $product->selectById ();
        $result[ 'produto' ] = $p;
        //$result[ 'produto' ][ 'id' ] = $id ;
        //$result[ 'produto' ][ 'photo' ] = $pphoto ;
        //$result[ 'produto' ][ 'title' ] = $p->title ;
        //$result[ 'produto' ][ 'price' ] = $p->price ;
        $response->out($result);
    }

}
?>