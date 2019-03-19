<?php
    include "connect.php";
    ?>

<?php  session_start(); ?>

    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<style>

.block{
    background-color:rgb(241, 241, 241);
    margin-left:5%;
    margin-right:5%;
    border-radius:4px;
    padding: 1em;
    display: grid;
    grid-template-rows: 25% 50% 25%;
    width:60%;
    margin-top:3%;
    cursor: initial;
}

button.liked{
    border:none;
    outline:none;
    background-color:rgb(241, 241, 241);
    cursor:pointer;
    padding:0px;
}

button.unlike{
    border:none;
    outline:none;
    background-color:rgb(241, 241, 241);
    cursor:pointer;
    padding:0px;
}

.coeur{
    color:grey;
    font-size:0.9em;
}

.hide {
	display: none;
}
</style>

<body>
<?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $req = "SELECT * FROM Utilisateur WHERE Nom_Utilisateur ='".$username. "' AND MDP ='".$password."'";
        $result = $bddconn -> query($req);
        
        while ($row = $result -> fetch()) {
            if ($row ==true ){
                $db_username = $row[1];
                $db_password = $row[2];
                $db_id = $row[0];
            }
        }        
        
        if ($username !== $db_username && $password !== $db_password){
            header("Location: ../NTIC/connect.php");
        }
        
        else if($username == $db_username && $password == $db_password) {
            header("Location: ../NTIC/index.php");
            
            $_SESSION['username'] = $db_username;
            $_SESSION['lastname'] = $db_lastname;
            $_SESSION['id'] = $db_id;

        }
    }
    ?>

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




    <div class="content">

    <!-- // <div class="block" onClick="document.getElementById('"postform"').submit();"> -->

    <?php
        $req1 = "SELECT * FROM Post ORDER BY ID_Post DESC";
        $result1 = $bddconn -> query($req1);
        
        while ($row1 = $result1 -> fetch()) {
            if ($row1 ==true ){

                $req2 = "SELECT Nom_Utilisateur FROM Utilisateur WHERE ID = ".$row1[2]."";
                $result2 = $bddconn -> query($req2);

                while ($row2 = $result2 -> fetch()) {
                if ($row2 ==true ){
                        echo '
                        <form id="postform" action="post.php">
                            <div class="block">
                            <div class="users">
                                    <i class="fas fa-user-graduate" style="color:gray; font-size:1em;"></i> 
                                    <p style="display:inline-block; padding-right: 15px; font-size:1em; font-weight: bold;">'.$row2[0].'</p> 
                                    <i class="fas fa-book" style="color:gray; font-size:1.3em; font-size:1em;"></i> 
                                    <p style="display:inline-block; font-size:1em;">'.$row1[5].'</p>
                            </div>
                            <div class="question">
                                <p>'.$row1[1].'</p>
                            </div>
                            <div class="like">
                            </form>
                            ';

                            ?>

                            <?php
                                $req3 = "SELECT * FROM Coeur WHERE Id_User = '".$_SESSION['id']."' AND Id_Post = ".$row1[0];
                                $result3 = $bddconn -> query($req3);

                                
                                if($result3->rowCount()>0){
                                    echo '
                                    <button class="unlike" id="unliked'.$row1[0].'" onclick=unlike('.$row1[0].')><i class="fas fa-heart coeur" style="color:red" ></i></button>
                                    <button class="liked hide" id="liked'.$row1[0].'" onclick=like('.$row1[0].')><i class="fas fa-heart coeur"></i></button>
                                    <p style="display:inline-block; padding-right: 15px; color:grey; font-size:0.9em;"><span id="nblike'.$row1[0].'">'.$row1[3].'</span><span> Like</span></p>
                                    ';
                                }
                                else{
                                    echo '
                                    <button class="liked" id="liked'.$row1[0].'" onclick=like('.$row1[0].')><i class="fas fa-heart coeur"></i></button>
                                    <button class="unlike hide" id="unliked'.$row1[0].'" onclick=unlike('.$row1[0].')><i class="fas fa-heart coeur" style="color:red" ></i></button>
                                    <p style="display:inline-block; padding-right: 15px; color:grey; font-size:0.9em;"><span id="nblike'.$row1[0].'">'.$row1[3].'</span><span> Like</span></p>
                                    ';
                                }

                            ?>

                            <?php

                            echo'
                                    <i class="fas fa-comment-alt" style="color:gray; font-size:0.9em;"></i>
                                    <a href="connexion.php" class="comm"><p style="display:inline-block; color:grey; font-size:0.9em;">'.$row1[7].'<span> Commentaires</span></p></a>
                            </div>
                        </div>
                    ';
                    }
                }
            }
        }

    ?>



        <div class="block" style="margin-bottom:150px;">
            <div class="users">
                    <i class="fas fa-user-graduate" style="color:gray; font-size:1em;"></i> 
                    <p style="display:inline-block; padding-right: 15px; font-size:1em; font-weight: bold;">Salumek</p> 
                    <i class="fas fa-book" style="color:gray; font-size:1.3em; font-size:1em;"></i> 
                    <p style="display:inline-block; font-size:1em;">Mathématique</p>
            </div>
            <div class="question">
                <p>Quelqu'un à trouvé x+2 pour la réponse du TP2 ex2 de math ?</p>
            </div>
            <div class="like">
                    <i class="fas fa-heart" style="color:gray; font-size:0.9em;"></i>
                    <p style="display:inline-block; padding-right: 15px; color:grey; font-size:0.9em;">150<span> Like</span></p>
                    <i class="fas fa-comment-alt" style="color:gray; font-size:0.9em;"></i>
                    <p style="display:inline-block; color:grey; font-size:0.9em;">13<span> Commentaires</span></p>
            </div>
        </div>
    </div>


</body>

<script>

function like(idpost){
    var like = document.getElementById("liked" + idpost);
    var unlike = document.getElementById("unliked" + idpost);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            like.classList.add("hide");
            unlike.classList.remove("hide");
            document.getElementById("nblike" + idpost).innerHTML = this.responseText;
            // console.log(this.responseText);
        }
    }
    
    var iduser = "<?php echo $_SESSION['id']; ?>";

    xmlhttp.open("GET", "function.php?idpost="+ idpost + "&iduser=" + iduser , false);
    xmlhttp.send();
}

function unlike(idpost){
    var like = document.getElementById("liked" + idpost);
    var unlike = document.getElementById("unliked" + idpost);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            like.classList.remove("hide");
            unlike.classList.add("hide");
            document.getElementById("nblike" + idpost).innerHTML = this.responseText;
        }
    }
    
    var iduser = "<?php echo $_SESSION['id']; ?>";

    xmlhttp.open("GET", "function.php?idpost2="+ idpost + "&iduser2=" + iduser , false);
    xmlhttp.send();
}
</script>
</html>