<?php
    if(isset($route[1]) && $route[1] != ''){
        if($route[1] == 'create'){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $user = new User(null, $name, $email, $pass);
            $user->create();
        } elseif ($route[1] == 'delete') {
            $id = $_POST['id'];
            $user = new User($id,null,null,null);
            $user->delete();
        } elseif ($route[1] == 'update') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $id = $_POST['id'];
            $user = new User($id, $name, $email, $pass);
            $user->update();
        } elseif ($route[1] == 'select-all') {
            $user = new User(null, null, null, null);
            $user->selectAll();
        } else {
            echo "Página não econtrada";
        }
    }else{
        echo "Página não econtrada";
    }
?>