<?php include "../../header.php";

$title= $_POST['title'];
$description= $_POST['description'];
$date= (new DateTime())->format('Y-m-d');
if(isset($title) && isset($description)) {
    $req = $bdd->query("UPDATE mb_article SET `title`='".$title."',`content`='".$description."',`date_update`='".$date."' WHERE `id_article` = '" . $_POST['id_article'] . "'");
    if($req){
        header('Location: ../article.php');
    }
}
