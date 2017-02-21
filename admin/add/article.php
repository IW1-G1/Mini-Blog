<?php include "../../header.php";
redirectNotAdmin();
?>

<div class="section admin">
    <h2>Gestion des articles</h2>

    <form action="add.php" method="post" novalidate>


        <label>Titre :</label>
        <input type="text" id="title" name="title" placeholder="Entrez le titre de votre article"  required="required">
<br>
        <label>Description :</label>
        <textarea placeholder="Entrez ici votre description" name="description" id="description" rows="20" cols="50"  maxlength="100"  required="required"></textarea>
        <button type="submit" name="save" id="save" value="submit">Sauvegarder</button>

    </form>
    <a  href="../article.php"><button type="button" class='btn'>Retour à la gestion des articles</button></a>
</div>
