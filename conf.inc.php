<?php

  define("DB_NAME","mini_blog");
  define("DB_HOST","localhost");
  define("DB_USER","root");
  define("DB_PWD","");
  define("CSS_PATH","/Mini-Blog/public/css/");


  function redirectNotAdmin(){
    $auth = new Authentification();
    if($auth->isConnected()){
      $bdd = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PWD);
      $statement = $bdd->prepare("SELECT id_user FROM mb_users WHERE username = :username");
      $statement->execute(array(':username' => $_SESSION['pseudo']));
      $userId = $statement->fetch();

        if(!$auth->isAdmin($userId['id_user'])){
          header("Location: ../index.php");
          die();
        }
    } else
        header("Location: ../index.php");
  }
