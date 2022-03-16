<!DOCTYPE html>
<html lang="fr">

<?php
session_start();
?>

<!-- HEAD -->
<?php include("includes/head.php");
include_once 'config/database.php';
include_once 'class/members.php';

$database = new Database();
$db = $database->getConnection();

$item = new Membre($db);
?>



<?php
if (isset($_POST['submit'])) {
    $nom_membre = strip_tags($_POST['nom_membre']);
    $prenom_membre = strip_tags($_POST['prenom_membre']);
    $date_inscription = strip_tags($_POST['date_inscription']);
    $dateNaiss_membre = strip_tags($_POST['dateNaiss_membre']);
    $contacts = strip_tags($_POST['contacts']);
    $email = strip_tags($_POST['email']);

    $item->createMembers($nom_membre, $prenom_membre, $date_inscription, $dateNaiss_membre, $contacts, $email);
    $item->redirect("memberList.php");
}
?>

<!-- HEAD END -->
<style>
    /*================================= INPUT STYLE ==============================*/


    .formLogin {
        flex-direction: column;
        display: flex;
    }

    .inputStyle {
        margin-top: 20px;
        background-color: white;
        border: none;
        height: 70px;
        width: 700px;
        border-radius: 10px;
        padding: 15px;
    }

    .inputStyle input {
        border: none;
        width: 600px;
    }

    .inputStyle input:focus {
        outline: none;
    }

    .inputStyle:hover {
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        outline: none;
    }

    .submitButton {
        background-color: #fed648;
        width: 150px;
        border: none;
        color: white;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        font-size: 20px;
        height: 35px;
        margin-top: 25px;
        margin-bottom: 5px;
        transition: background-color 0.5s ease;
    }
</style>

<body>
    <div class="container">
        <!-- SIDEBAR -->
        <?php include("includes/sidebar.php");  ?>
        <!--   END OF ASIDE-->
        <main>
            <h1 class="bigtitle">Ajoutez des membres</h1>
            <h2>Ajoutez de nouveaux membres sur cet espace</h2>
            <form method="POST" class="formLogin">
                <div class="inputStyle">
                    <i class="fa-solid fa-user inputIcon"></i>
                    <input type="text" name="nom_membre" id="nom_membre" placeholder="Nom">
                </div>
                <div class="inputStyle">
                    <i class="fa-solid fa-user inputIcon"></i>
                    <input type="text" name="prenom_membre" id="prenom_membre" placeholder="Prénoms">
                </div>
                <div class="inputStyle">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" id="email" placeholder="email">
                </div>
                <div class="inputStyle">
                    <input type="date" name="date_inscription" id="date_inscription" placeholder="Date d'inscription">
                </div>
                <div class="inputStyle">

                    <input type="date" name="dateNaiss_membre" id="dateNaiss_membre" placeholder="Date de naissance">
                </div>
                <div class="inputStyle">
                    <i class="fa-solid fa-phone"></i>
                    <input type="tel" name="contacts" id="contacts" placeholder="Contacts">
                </div>

                <button class="submitButton" type="submit" name="submit" id="submit">Valider</button>
            </form>

            <!-- RECENTS AJOUTS MEMBRES -->
        </main>
        <!-- END OF MAIN -->
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
            <div class="rectangle">
                <img src="assets/images/Logo.png">
            </div>
        </div>
    </div>

    <!-- FONTAWESOME KIT -->
    <script src="https://kit.fontawesome.com/551b5baed9.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/dashboard.js"></script>
    <script src="sweetalert2.all.min.js"></script>

    <script>
        document.querySelector(".submitButton").addEventListener('click', function() {
            Swal.fire("Our First Alert");
        });
    </script>
</body>

</html>