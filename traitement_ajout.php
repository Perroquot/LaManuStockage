
<?php
// Informations de connexion à la base de données
$serveur = "localhost:3306"; // Nom du serveur MySQL
$utilisateur = "Perroquot"; // Nom d'utilisateur MySQL
$mot_de_passe = "TrystanPerro#80160"; // Mot de passe MySQL
$base_de_donnees = "stock"; // Nom de la base de données


// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Récupérer les données soumises par le formulaire
$nom_element = $_POST["nom_element"];
$numero_etiquette = $_POST["numero_etiquette"];
$numero_serie = $_POST["numero_serie"];
$mobilite = $_POST["mobilite"];
$propriete = $_POST["propriete"];
$commentaire = $_POST["commentaire"];


// Préparer et exécuter la requête SQL pour insérer les données
$insert_query = "INSERT INTO stock (nom_element, numero_etiquette, numero_serie, mobilite, propriete, commentaire) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $connexion->prepare($insert_query);
$stmt->bind_param("ssssss", $nom_element, $numero_etiquette, $numero_serie, $mobilite, $propriete, $commentaire);

if ($stmt->execute()) {
    header("Location: liste_stock.php");
} else {
    echo "Erreur lors de l'enregistrement : " . $stmt->error;
}

// Fermer la connexion à la base de données
$stmt->close();
$connexion->close();
?>