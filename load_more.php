<?php
// Assurez-vous de charger les données ou de les inclure à partir de votre base de données
// Par exemple, vous pouvez exécuter une requête SQL pour obtenir les éléments suivants

include_once "assets/database/database.php"; 
// On inclut les fichiers de configuration et d'accès aux données
include_once 'assets/function/function.php';

// On instancie la base de données
$database = new Database();
$db = $database->getConnection();

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Si la variable 'page' n'est pas définie, utilisez la page 1
    $newElements = rechercherEcoles($search, $page); // Récupérez les éléments de la recherche
} else {
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Si la variable 'page' n'est pas définie, utilisez la page 1
    $newElements = getMoreElements($page); // Récupérez les éléments pour la pagination
}

if ($newElements) {
    foreach ($newElements as $element) {
        // Affichez le contenu de chaque élément
        echo '<div class="col-md-3 col-sm-6 col-6 custom-bg" style="cursor: pointer;">';
        echo '<a href="school-details.php?id='.$element["id_ecole"].'">
                <img src="' . $element['img'] . '" alt="' . $element['nom_ecole'] . '" class="img-fluid" style="border-radius: 10px;">';
        echo '<p style="text-align: center;font-weight: bolder;color: black;">' . $element['nom_ecole'] . '</p>';
        echo '<div class="overlay">';
        echo '<p>' . $element['description'] . '</p>';
        echo '</div></a>';
        echo '</div>';
    }
}
