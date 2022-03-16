<!DOCTYPE html>
<html lang="fr">

<!-- HEAD -->
<?php include("includes/head.php"); ?>
<!-- HEAD END -->

<?php 
session_start();

?>

<?php
$api_url = 'http://localhost/BiblioSite/api/read.php';
$json_data = file_get_contents($api_url);
//$json_data =preg_replace('/\s+/', '',$json_data);
$MembersDatas = json_decode($json_data, TRUE);

if (isset($_POST["export_data"])) {
    $filename = "liste membres" . date('Ymd') . ".xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $show_coloumn = false;
    if (!empty($MembersDatas)) {
        foreach ($MembersDatas as $MembersData) {
            if (!$show_coloumn) {
                // display field/column names in first row
                echo implode("\t", array_keys($MembersData)) . "\n";
                $show_coloumn = true;
            }
            echo implode("\t", array_values($MembersData)) . "\n";
        }
    }
    exit;
}
?>



<body>
    <div class="container">
        <!-- SIDEBAR -->
        <?php include("includes/sidebar.php");  ?>
        <!--   END OF ASIDE-->
        <main>
            <h1 class="bigtitle">Liste des membres</h1>
            <h2>Consultez, modifiez et supprimer des membres sur cet espace</h2>
            <!-- INSIGHTS -->

            <!-- END OF INSIGHTS -->
            <!-- RECENTS AJOUTS MEMBRES -->
            <div class="recent-adds">
                <table>
                    <thead>
                        <tr>
                            <th>Numéro</th>
                            <th>Nom</th>
                            <th>Prénoms</th>
                            <th>Date Inscription </th>
                            <th>Date de naissance</th>
                            <th>Contacts</th>
                            <th>Actions</th>
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
                                <td>
                                    <a href="EditMember.php?Edit=<?php echo $id_membre; ?>">
                                        <span class="btn-update">Modifier</span>
                                    </a>
                                    <a href="api/delete?Delete=<?php echo $id_membre; ?>">
                                        <span class="btn-danger">Supprimer</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn-update">Exporter pour Excell</button>
                </form>
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
    <script src="sweetalert2.all.min.js"></script>

    <script>

    </script>
</body>

</html>