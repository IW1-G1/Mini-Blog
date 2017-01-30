<?php include "../header.php"; ?>
<div class="section admin">
    <h2>Archives</h2>

    <table width="100%" align="center" cellpadding="0" cellspacing="1" border="1">
            <thead>
                <tr align="center">
                    <td>Nom</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody> <?php $refererUrl = $_SERVER['HTTP_REFERER'];
            $Exploded_URL = explode("/",$refererUrl);
$urlToCheck = $Exploded_URL[6];//A modifier selon votre URL

if($urlToCheck == 'article.php'){
?> <p> Liste des articles </p>
    <?php $req = $bdd->query('select * from mb_article where status = -1');
    while($row=$req->fetch(PDO::FETCH_OBJ)) {?>
        <tr align="center">
             <td><?= $row->title ?></td>
        <td><?php
            if($row->status==-1):
                ?>

                <form action="updateStatus.php" method="post" style="display: inline-block">
                    <input type="hidden" name="id_article" value="<?= $row->id_article ?>">
                    <input type="hidden" name="status" value="<?= $row->status ?>">
                    <button type="submit" name ="toto" id="toto" onClick="if (!confirm('Voulez vous mettre en ligne cette article : <?= $row->title ?> ?')) return false;"><h5>Mettre en ligne</h5></button>
                </form>

                <?php
            endif;
            ?>
        </td>

        </tr>
        <?php
         }  ?>
<?php } elseif ($urlToCheck == 'comments.php'){
?> <p> Liste des commentaires </p>
    <?php $req = $bdd->query('select * from mb_comments where status = -1');
    while($row=$req->fetch(PDO::FETCH_OBJ)) {?>
        <tr align="center">
            <td><?= $row->content ?></td>
            <td><?php
                if($row->status==-1):
                    ?>

                    <form action="updateStatus.php" method="post" style="display: inline-block">
                        <input type="hidden" name="id_comment" value="<?= $row->id_comment ?>">
                        <input type="hidden" name="status" value="<?= $row->status ?>">
                        <button type="submit" name ="toto" id="toto" onClick="if (!confirm('Voulez vous mettre en ligne ce commentaire ?')) return false;"><h5>Mettre en ligne</h5></button>
                    </form>

                    <?php
                endif;
                ?>
            </td>

        </tr>
        <?php
    }  ?>


    <?php
}else{ echo "Error 404";}
?>
            </tbody>
        </table>

    <a class="lien fade" href="index.php"><button type="button" class='btn'>Retour à l'administration</button></a>
</div>
