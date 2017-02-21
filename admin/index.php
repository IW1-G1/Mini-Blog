
<?php include "../header.php";
redirectNotAdmin();
?>

<div id="page_title">
      <h6>Administration</h6>
</div>
<a href="../index.php">
                   <button type="submit">Retour à l'accueil</button>
                </a>
<article id="admin_content">
   <div class="align_admin">
          <ul>
             <li class="category">
                <a href="comments.php">
                   <img src='../public/image/chat.png' alt="">
                   <p>Commentaires</p>
                </a>
             </li>
             <li class="category">
                <a href="article.php">
                   <img src='../public/image/pages.png' alt="">
                   <p>Articles</p>
                </a>
             </li>
              <li class="category">
                  <a href="user.php">
                      <img src='../public/image/account.png' alt="">
                      <p>Utilisateurs</p>
                  </a>
              </li>
          </ul>
       </div>
   </article>
    </div>
</div>
<?php include "../footer.php"; ?>
