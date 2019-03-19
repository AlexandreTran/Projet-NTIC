<?php
    include "connect.php";
    ?>

<?php
    if(isset($_GET["username"]) && isset($_GET["password"]) && isset($_GET["email"])){

        $username = $_GET["username"];
        $password = $_GET["password"];
        $email = $_GET["email"];

        $req="INSERT INTO Utilisateur (ID, Nom_Utilisateur, MDP, Email ) VALUES ( NULL,'".$username."', '".$password."', '".$email."');";

        $bddconn -> exec($req);
    }


    if(isset($_GET["titre"]) && isset($_GET["userid"]) && isset($_GET["theme"])){

        $userid = $_GET["userid"];
        $titre = $_GET["titre"];
        $theme = $_GET["theme"];
        $description = $_GET["description"];
        
        $req="INSERT INTO Post (ID_Post, Titre, Id_Utilisateur, Coeur, Detail, Theme, Tags, Nb_commentaire ) VALUES ( NULL,'".$titre."', '".$userid."', 0, '".$description."', '".$theme."', NULL, 0);";

        $bddconn -> exec($req);
    }

    if(isset($_GET["idpost"]) && isset($_GET["iduser"])){

        $iduser = $_GET["iduser"];
        $idpost= $_GET["idpost"];

        $req="INSERT INTO Coeur (Id_Coeur, Id_User, Id_Post) VALUES ( NULL,'".$iduser."', '".$idpost."');";

        $bddconn -> exec($req);

        $req2 ="SELECT Coeur FROM Post WHERE Id_Post = '".$idpost."'";
        $result1 = $bddconn -> query($req2);
        while ($row1 = $result1 -> fetch()) {
            if ($row1 ==true ){
                $row1[0] += 1;
                $req3 = "UPDATE Post SET Coeur = '.$row1[0].' WHERE Id_Post = '".$idpost."' ";
                $bddconn -> exec($req3);
                echo $row1[0];
            }
        }
    }

    if(isset($_GET["idpost2"]) && isset($_GET["iduser2"])){

        $iduser = $_GET["iduser2"];
        $idpost= $_GET["idpost2"];

        $req="DELETE FROM Coeur WHERE Id_User = '".$iduser."' AND Id_Post = '".$idpost."' ";

        $bddconn -> exec($req);

        $req2 ="SELECT Coeur FROM Post WHERE Id_Post = '".$idpost."'";
        $result1 = $bddconn -> query($req2);
        while ($row1 = $result1 -> fetch()) {
            if ($row1 ==true ){
                $row1[0] -= 1;
                $req3 = "UPDATE Post SET Coeur = '.$row1[0].' WHERE Id_Post = '".$idpost."' ";
                $bddconn -> exec($req3);
                echo $row1[0];
            }
        }
    }

?>