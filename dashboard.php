<!DOCTYPE html>
<html lang="fr">

<?php
session_start();
?>

<?php
$api_url = 'http://localhost/BiblioSite/api/read.php';
$json_data = file_get_contents($api_url);
//$json_data =preg_replace('/\s+/', '',$json_data);
$MembersDatas = json_decode($json_data, TRUE);
$rows = count($MembersDatas);
?>

<!-- HEAD -->
<?php include("includes/head.php"); ?>
<!-- HEAD END -->


<body>
    <div class="container">
        <!-- SIDEBAR -->
        <?php include("includes/sidebar.php");  ?>
        <!--   END OF ASIDE-->
        <main>
            <h1 class="bigtitle">Dashboard</h1>
            <!-- INSIGHTS -->
            <div class="insights">
                <div class="members">
                    <i class="fa-solid fa-chart-line"></i>
                    <div class="middle">
                        <div class="left">
                            <h3>Total membres</h3>
                            <h1><?php echo $rows; ?></h1>
                        </div>
                        <div class="right">
                            <img src="assets/images/man.svg">
                        </div>
                    </div>
                </div>
                <div class="books">
                    <i class="fa-solid fa-chart-line"></i>
                    <div class="middle">
                        <div class="left">
                            <h3>Total livres</h3>
                            <h1>500</h1>
                        </div>
                        <div class="right">
                            <img src="assets/images/book.svg">
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF INSIGHTS -->
            <!-- RECENTS AJOUTS MEMBRES -->
            <div class="recent-adds">
                <h2>Ajouts récents</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Numéro</th>
                            <th>Nom</th>
                            <th>Prénoms</th>
                            <th>Date Inscription </th>
                            <th>Date de naissance</th>
                            <th>Contacts</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($MembersDatas as $MembersData) :
                            $id_membre = $MembersData["id_membre"]; ?>
                            <tr>
                                <td><?php echo $MembersData['id_membre'] ?></td>
                                <td><?php echo $MembersData['nom_membre'] ?></td>
                                <td><?php echo $MembersData['prenom_membre'] ?></td>
                                <td><?php echo $MembersData['date_inscription'] ?></td>
                                <td><?php echo $MembersData['dateNaiss_membre'] ?></td>
                                <td><?php echo $MembersData['contacts'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
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
</body>

</html>