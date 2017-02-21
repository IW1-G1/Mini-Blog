<?php include "../header.php";
redirectNotAdmin();
?>

<div id="page_title">
    <h6>Gestion des utilisateurs</h6>
</div>
<form action="archive.php" method="POST">
    <button type="submit" class="btn">Archives</button>
</form>
<table width="100%" align="center" cellpadding="0" cellspacing="1" border="1">
    <thead>
    <tr align="center">
        <td width="25%"><strong>Utilisateur</strong></td>
        <td width="25%"><strong>Role</strong></td>
        <td width="25%"><strong>Mise en ligne</strong></td>
    </tr>
    </thead>

    <tbody>
    <?php
    $req = $bdd->query('select * from mb_users order by id_user');
    while($row=$req->fetch(PDO::FETCH_OBJ)) {
        if($row->status==1){?>
            <tr align="center">
                <td><?= $row->username ?></td>
                <td>


                    <form action="updateAdmin.php" method="post" style="display: inline-block">
                        <input type="hidden" name="id_user" value="<?= $row->id_user ?>">
                        <input type="hidden" name="admin" value="<?= $row->admin ?>">
                        <button type="submit" name="toto" id="toto" onClick="if (!confirm('Voulez vous modifier le role de cet utilisateur?')) return false;">
                            <?php if ($row->admin == 0){ ?>
                            <h5>Rendre Administrateur</h5>
                            <?php }elseif($row->admin == 1){ ?>
                             <h5>Rendre Utilisateur</h5>
                            <?php } ?>
                        </button>
                    </form>

                </td>
                <td>


                            <form action="updateStatus.php" method="post" style="display: inline-block">
                                <input type="hidden" name="id_user" value="<?= $row->id_user ?>">
                                <input type="hidden" name="status" value="<?= $row->status ?>">
                                <button type="submit" name="toto" id="toto" onClick="if (!confirm('Voulez vous supprimer cet utilisateur?')) return false;">
                                    <h5>Supprimer</h5></button>
                            </form>

                        </td>
            </tr>
                    <?php
                }
            }

    ?>
    </tbody>
</table>

<a class="lien fade" href="../admin"><button type="button" class='btn'>Retour à l'admin</button></a>
