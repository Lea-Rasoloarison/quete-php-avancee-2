<!doctype html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>
</head>


    <body>

<!--le formulaire -->
        <form action="/thanks.php" method="post">
            <div>
                <label  for="nom">Nom :</label>
                <input  type="text"  id="nom"  name="user_name">
            </div>

            <div>
                <label  for="prenom">Prénom :</label>
                <input  type="text"  id="prenom"  name="user_firstname">
            </div>

            <div>
                <label  for="courriel">Courriel :</label>
                <input  type="email"  id="courriel"  name="user_email">
            </div>

            <div>
                <label  for="phoneNumber">Numéro téléphone :</label>
                <input type="tel"  id="phoneNumber"  name="phone_number"></input>
            </div>
            <div>
                <label  for="subjectSelect">A propos de :</label>
                <select name="pets" id="subject-select">
                    <option value="">Quel annimal à un soucis ?</option>
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                    <option value="hamster">Hamster</option>
                    <option value="parrot">Parrot</option>
                    <option value="spider">Spider</option>
                    <option value="goldfish">Goldfish</option>
                </select>
            </div>
            <div>
                <label  for="message">Message :</label>
                <textarea  id="message"  name="user_message"></textarea>
            </div>


            <div  class="button">
                  <button  type="submit">Envoyer votre message</button>
            </div>
        </form>

<br>
    </body>
</html>

