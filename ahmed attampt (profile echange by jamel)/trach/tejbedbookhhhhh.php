<?php
// Connexion à la base de données
$host = "localhost";
$username = "username";
$password = "password";
$dbname = "nom_de_la_base_de_donnees";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Vérification de la connexion
if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}

//add more graphic fetuses like Mor html and css 

$sql = "SELECT * FROM Books";
$result = mysqli_query($conn, $sql);

// Affichage des données sous forme de tableau
// add css for this placements full table stiling
echo "<table>";
echo "<tr><th>Titre</th><th>Auteur</th><th>Numero des pages</th><th>maison de publication</th><th>telecharger</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row["titre"]."</td><td>".$row["auteur"]."</td><td>".$row["Numero des pages"].$row["maison de publication"]."</td><td><a href='".$row["lien_telechargement"]."'>Télécharger</a></td></tr>";
}
echo "</table>";

// Fermeture de la connexion
mysqli_close($conn);
?>
