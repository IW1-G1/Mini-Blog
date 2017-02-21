<?php

  define("DB_NAME","mini_blog");
  define("DB_HOST","localhost");
  define("DB_USER","root");
  define("DB_PWD","");
  define("CSS_PATH","/Mini-Blog/public/css/");


  function redirectNotAdmin(){
    $auth = new Authentification();
    if($auth->isConnected()){
      $bdd = new PDO('mysql:host=localhost;dbname=mini_blog;charset=utf8', 'root', '');
      $statement = $bdd->prepare("SELECT id FROM mb_users WHERE username = :username");
      $statement->execute(array(':username' => $_SESSION['pseudo']));
      $userId = $statement->fetchAll();
        if(!$auth->isAdmin($userId)){
          header("Location: ../index.php");
          die();
        }
    }
  }
