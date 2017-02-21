    <?php include "../../header.php";

    $title= $_POST['title'];
    $description= $_POST['description'];
    // Récupérer l'id de l'auteur
    $username = $_SESSION['pseudo'];
    $res = $bdd->prepare("SELECT * FROM mb_users WHERE username = :username");
    $res->execute(array(':username' => $username));
    $user = $res->fetch(PDO::FETCH_OBJ);

    $status = 1;
    $date= (new DateTime())->format('Y-m-d');
    if(isset($title) && isset($description)) {


        $req = $bdd->prepare("INSERT INTO mb_article(title, content, status, date, fk_id_user) VALUES (:title, :description, :status, :date, :id_user)");
        $req->execute(array(
            ':title' => $title,
            ':description' => $description,
            ':status' => $status,
            ':date' => $date,
            ':id_user' => $user->id_user
        ));
        if($req){
            header('Location: ../article.php');
        }
    }
    header('Location: ../article.php');
    ?>
