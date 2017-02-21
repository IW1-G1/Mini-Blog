<?php
include "../../header.php";
redirectNotAdmin();

$sql = $bdd->query("SELECT * FROM mb_article WHERE `id_article` = '" . $_POST['id_article'] . "'");
while($row=$sql->fetch(PDO::FETCH_OBJ)) {
    ?>

    <div class="section admin">
        <h2>Edition de l'article</h2>

        <form action="edit.php" method="post" novalidate>


            <label>Titre :</label>
            <input type="text" id="title" name="title" value="<?= $row->title; ?>" required="required">
            <br>
            <label>Description :</label>
            <textarea  name="description" id="description" rows="20" cols="50"
                       required="required" ><?= $row->content;?></textarea>
            <input type="hidden" name="id_article" value="<?= $row->id_article ?>">
            <button type="submit" name="save" id="save" value="submit">Sauvegarder</button>

        </form>
        <a href="../article.php">
            <button type="button" class='btn'>Retour à la gestion des articles</button>
        </a>
    </div>
    <?php
}
?>
