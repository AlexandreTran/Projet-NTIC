<?php
    include "connect.php";
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
<title>connexion</title>
</head>

<body>


    <div class="header">
            <div class="logo">
                    <a href="index.php" style="font-size:20px; padding-left: 20px;">LOGO</a>
            </div>
            <div class="onglet">
                    <a href="" style="margin-right: 40px;">Cathégorie</a>
                    <a href="create_post.php" style="margin-right: 40px;">Créer un post</a>
                    <a href="">Questions générales</a>
            </div>
            <?php

            if (isset($_SESSION['id'])) {
                echo '                
                <div class="login">
                    <form action="logout.php" method="POST">
                    <button type="submit" name="submit" id="logout" class="btn btn-outline-primary btn-sm" style="margin-right:20px;">Deconnexion</button>
                    </form>
                </div>
                ';
            }
            else{
                echo '
                <div class="login">
                    <a href="connexion.php"><button type="button" class="btn btn-outline-primary btn-sm" style="margin-right:20px;">Connexion</button>
                    <a href="inscription.php"><button type="button" class="btn btn-primary btn-sm">Inscription</button></a>
                </div>
                ';
            }
            ?>
    </div>




</body>
</html>
