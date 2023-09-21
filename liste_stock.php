<?php
// Connexion à la base de données (assurez-vous de fournir les informations de connexion appropriées)
$mysqli = new mysqli('localhost:3306', 'Perroquot', 'TrystanPerro#80160', 'stock');

// Vérification de la connexion à la base de données
if ($mysqli->connect_error) {
    die('Erreur de connexion à la base de données : ' . $mysqli->connect_error);
}

// Récupérer les données de la base de données
$select_query = "SELECT * FROM stock";
$result = $mysqli->query($select_query);
?>

<!DOCTYPE html>
<html>
<html lang="fr"></html>    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de Stock</title>
    <link rel="stylesheet" href="./assets/css/style2.css">
    <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script async src="./assets/js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<header>
        <h1>Détail du stock Campus Amiens</h1>
    </header>
    <div class="navbar-container">
    <div class="navbar">
        <img src="./assets/img/logo_manu.png">
        <a href="#"><div class="cat_nav"><i class="fa-solid fa-bars"></i> Vue d'ensemble <br></div></a>
        <a href="#"><div class="cat_nav"><i class="fa-solid fa-box-archive"></i> Emprunter / Rendre <br></div></a>
        <div class="cat_nav"><div class="dropdown">
            <button id="button"class="dropdown-button" onclick="toggleDropdown()"><i class="fa-solid fa-box"></i> Matériel <i class="fa-solid fa-chevron-down"></i></button>
            <div id="dropdown" class="dropdown-content">
                <a href="liste_stock.php">Stock</a>
                <a href="#">Détail</a>
                <a href="ajoutmat.html">Ajouter</a>
                <a href="#">Historique</a>
            </div>
        </div></div>
        <div class="leave_nav"><i class="fa-solid fa-arrow-right-from-bracket fa-xl" onclick="toggleNavbar()"></i></div>
    </div>
    </div>
    <h1>Liste de Stock</h1>
    <main>
    <table class="table">
        <tr>
            <th>Nom de l'élément</th>
            <th>Numéro de l'étiquette</th>
            <th>Numéro de série</th>
            <th>Mobilité</th>
            <th>Propriété</th>
            <th>Commentaire</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['nom_element'] . '</td>';
            echo '<td>' . $row['numero_etiquette'] . '</td>';
            echo '<td>' . $row['numero_serie'] . '</td>';
            echo '<td>' . $row['mobilite'] . '</td>';
            echo '<td>' . $row['propriete'] . '</td>';
            echo '<td>' . $row['commentaire'] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    </main>
</body>
</html>