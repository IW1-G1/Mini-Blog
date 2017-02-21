<?php include "../header.php";
redirectNotAdmin();
?>


<div id="page_title">
    <h6>Gestion des commentaires</h6>
</div>
  <form action="archive.php" method="POST">
        <button type="submit" class="btn">Archives</button>
    </form>
<table width="100%" align="center" cellpadding="0" cellspacing="1" border="1">
    <thead>
    <tr align="center">
        <td width="25%"><strong>Commentaires</strong></td>
        <td width="25%"><strong>Article</strong></td>
        <td width="25%"><strong>Utilisateur</strong></td>
        <td width="25%"><strong>Mise en ligne</strong></td>
    </tr>
    </thead>

    <tbody>
    <?php
    $req = $bdd->query('select * from mb_comments order by id_comment');

    while($row=$req->fetch(PDO::FETCH_OBJ)) {
        if($row->status==1) {
            $user = $row->fk_id_user;
            $article = $row->fk_id_article;
            $req1 = $bdd->query('select * from mb_users where id_user=' . $user);
            while ($toto = $req1->fetch(PDO::FETCH_OBJ)) {
                $req2 = $bdd->query('select * from mb_article where id_article=' . $article);
                while ($title = $req2->fetch(PDO::FETCH_OBJ)) { ?>
                    <tr align="center">
                        <td><?= $row->content ?></td>
                        <td><?= $title->title ?>
                        <td><?= $toto->username ?></td>
                        <td>

                            <form action="updateStatus.php" method="post" style="display: inline-block">
                                <input type="hidden" name="id_comment" value="<?= $row->id_comment ?>">
                                <input type="hidden" name="status" value="<?= $row->status ?>">
                                <button type="submit" name="toto" id="toto" onClick="if (!confirm('Voulez vous supprimer ce commentaire ?')) return false;">
                                    <h5>Supprimer</h5></button>
                            </form>

                        </td>
                    </tr>
                    <?php
                }
            }

        }
    }
    ?>
    </tbody>
</table>

<a class="lien fade" href="../admin"><button type="button" class='btn'>Retour à l'admin</button></a>
