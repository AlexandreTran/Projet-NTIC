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
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>

<style>
.Tpost{
    margin-left:5%;
    margin-right:5%;
    margin-top:3%;
}

.Spost{
    margin-left:5%;
    margin-right:5%;
    margin-top:0%;
}

.Cpost{
    background-color:white;
    margin-left:5%;
    margin-right:5%;
    border-radius:4px;
    border: 1px solid rgb(161, 161, 161);
    padding: 1em;
    display: grid;
    grid-template-rows: 15% 15% 50% 20%;
    width:60%;
    margin-top:3%;
    cursor: pointer;
    height: 300px;
}
</style>

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




    <div class="content">

        <div class="Tpost">
            <h5>Créer un post</h5>
            <hr width="67%" align="left">
        </div>

        <div class="Spost">
            <form action="javascript:submit();">
            <select class="custom-select" id="inputGroupSelect01" style="width : 20%" required>
                <option value="">Choississez le thème</option>
                <option value="1">Question Global</option>
            </select>
        </div>
        <div class="Cpost">
            <div class="users">
                    <i class="fas fa-pencil-alt" style="color:gray; font-size:1em;"></i> 
                    <p style="display:inline-block; padding-right: 15px; font-size:1em; font-weight: bold;">POST</p> 
            </div>
            <div class="question">
                <input type="Text" class="form-control" id="titre" placeholder="Titre" required>
            </div>
            <div class="like">
                <div id="editor">
                    <p>Détail du post(facultatif)</p>
                </div>
            </div>
            <div class="like">
                 <button type="submit" class="btn btn-info btn-sm">Soumettre</button>
                 </form>
            </div>
        </div>





<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
  var quill = new Quill('#editor', {
    theme: 'snow'
  });


  function submit(){
        var description = quill.getContents();
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert("votre post à bien été publié");
                // alert(this.responseText);
            }
        }

        var description = quill.getText();
        var titre = document.getElementById("titre").value;
        var el = document.getElementById("inputGroupSelect01");
        var theme = document.getElementById("inputGroupSelect01").options[el.selectedIndex].text;
        var user_id = "<?php echo $_SESSION['id']; ?>";

        xmlhttp.open("GET", "function.php?userid="+ user_id + "&titre=" + titre + "&description=" + description + "&theme=" + theme, false);
        xmlhttp.send();
  }
</script>
</body>
</html>