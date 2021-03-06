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
    
    <!-- HEADER 1  -->
    <!-- <div class="header">
        <div class="logo">
        </div>
        <div class="login">
            <button type="button" class="btn btn-outline-primary btn-sm" style="margin-right:20px;">Connexion</button>
            <button type="button" class="btn btn-primary btn-sm">Inscription</button>
        </div>
    </div> -->


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

<div class="container" style="padding-top:100px;">
    <div class="col-xs-6">
        <div class="titre" style="text-align:center; margin-bottom:30px;"><h3>M'inscrire</h3></div>
         <div style="width: 500px;" class="mx-auto">
            <form action="javascript:account();" >
                <div class="form-group">
                <label for="username" style="text-align:center;">Nom d'utilisateur</label>
                <input type="text"  name="username" class="form-control" required id="username">
                </div>

                <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password"  name="password" class="form-control" required id="password">
                </div>

                <div class="form-group">
                <label for="email">Email</label>
                <input type="email"  name="email" class="form-control" required id="email">
                </div>

                <div style="text-align:center;">
                <input type="submit" name="submit" class="btn btn-info" value="Connexion" style="width:30%; margin-top:30px; text-align:center;">
                </div>
            </form>
        </div>
    </div>
</div>



</div>
</div>

<script>

function account(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert("votre compte a bien été créée");
        }
    }
    
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;

    xmlhttp.open("GET", "function.php?username="+ username + "&password=" + password + "&email=" + email, false);
    xmlhttp.send();
}

</script>

</body>
</html>
