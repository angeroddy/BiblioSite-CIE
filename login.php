<!DOCTYPE html>
<html lang="fr">

<?php
include_once 'config/database.php';
include_once 'class/members.php';
$database = new Database();
$db = $database->getConnection();
$item = new Membre($db);
$userSession;


if (isset($_POST['submit'])) {
    $username = isset($_POST['login']) ? $_POST['login'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    $item->login($username,$password);
}




?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connectez-vous</title>
    <link href="assets/css/login.css?version=1" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">-->
</head>

<body>
    <div class="container element">
        <div class="col-md-6 brand-container">
            <img src="assets/images/Logo.png">
        </div>
        <div class="col-md-8 form-container">
            <h1> Votre bibliothèque</h1>
            <h2>digitale</h2>
            <div class="tinyline"></div>
            <h3 class="subtext">Connectez-vous</h3>
            <form action="login.php" class="formLogin" method="POST">
                <div class="inputStyle">
                    <i class="fa-solid fa-user inputIcon"></i>
                    <input type="text" name="login" id="login" placeholder="Nom d'utilisateur">
                </div>
                <div class="inputStyle">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Mot de passe">
                </div>
                <button type="submit" name="submit" id="submit" class="submitButton">Se connecter</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/551b5baed9.js" crossorigin="anonymous"></script>

</body>

</html>