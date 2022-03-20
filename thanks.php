<?php


//On défini la fonction test_input qui est censée servir à modifier le parametre pour le rendre "vérifiable" :
function test_input($data) {
    // On supprime les espaces :
    $data = trim($data);
    //On supprime les antislash :
    $data = stripslashes($data);
    //Converti les caracteres spéciaux en html :
    $data = htmlspecialchars($data);
    //On retourne le parametre modifié :
    return $data;
}

//On défini les différents messages d'erreus :
$user_nameErr = $user_firstnameErr = $user_emailErr = $phone_numberErr = $petsErr = $user_messageErr = "";
$user_name = $user_firstname = $user_email = $phone_number = $user_message = "";

//Pour chaque élément du formulaire on met en place une méthode pour vérifier ce qui est envoyer dans le formulaire

//On vérifie que la méthode est bien post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //On vérifie si le user_name est vide
    if (empty($_POST["user_name"])) {
        //si c'est vide on change le name erreur
        $user_nameErr = "Le nom est requis !<br>";
        //Si c'est plein :
    } else {
        //On est censé modifié le input pour l'inspecter en suivant :
        $user_name = test_input($_POST["user_name"]);
        //On inspecte le input modifié pour voir sil n'y a pas de caracteères indésirables
        if (!preg_match("/^[a-zA-Z-' ]*$/", $user_name)) {
            $user_nameErr = "Seulement lettres et espaces autorisés dans le champs \"Nom\" <br>";
        }
    }


    //On vérifie la même chose pour le prénom
    if (empty($_POST["user_firstname"])) {
        $user_firstnameErr = "Le Prénom est requis ! <br>";
    } else {
        $user_firstname = test_input($_POST["user_firstname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $user_firstname)) {
            $user_firstnameErr = "Seulement lettres et espaces autorisés dans le champs \"Prénom\" <br>";
        }
    }

    //On verrifie que l'adresse mail est bien remplie et que c'est au bon format
    if (empty($_POST["user_email"])) {
        $user_emailErr = "L'adresse email est requise ! <br>";
    } else {
        $email = test_input($_POST["user_email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $user_emailErr = "Le format de l'adresse email n'est pas correcte <br>";
        }
    }

//On vérifie l numéro de téléphone :
    if (empty($_POST["phone_number"])) {
        $phone_numberErr = "Vas-y paye ton 06 !! <br>";
    } else {
        $phone_number = test_input($_POST["phone_number"]);
        if (!preg_match("#^0[5-6-7-9]([-. ]?[0-9]{2}){4}$#", $phone_number)) {
            $phone_numberErr = "Le numéro de téléphone doit être un numéro valide ! <br>";
        }
    }

    //On vérifi qu'on a bien selectionner quelque chose dans à propos :
    if (!$_POST["pets"]) {
        $petsErr = "Vous devez choisir une bestiole ! <br>";
    }
    if (empty($_POST["user_message"])) {
        $user_messageErr = "Il faut nous dire ce qui ne va pas ! <br>";
    } else {
        $user_message = test_input($_POST["user_message"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $user_message)) {
            $user_messageErr = "Seulement lettres et espaces autorisés dans le champs \"Message\" <br>";
        }
    }
}

//On affiche le message adequat en fonction de la situation :


if ($user_nameErr != "") {
    echo $user_nameErr;
}   else if ($user_firstnameErr != "") {
    echo $user_firstnameErr;
}  else if ($user_emailErr != "") {
    echo $user_emailErr;
}  else if ($phone_numberErr != ""){
    echo $phone_numberErr;
}  else if ($petsErr != "") {
    echo $petsErr;
}  else if ($user_messageErr != ""){
    echo $user_messageErr;
}
else {
    echo 'Merci ' . $_POST['user_firstname'] . ' ' . $_POST['user_name'] . ' de nous avoir contacté à propos de ' .
        $_POST['pets'] . '. <br> Un de nos conseiller vous contactera soit à l’adresse ' . $_POST['user_email'] .
        ' ou par téléphone au ' . $_POST['phone_number'];
    }

?>
