<?php

include_once "assets/database/database.php"; 
// On inclut les fichiers de configuration et d'accès aux données
    
// On instancie la base de données
$database = new Database();
$pdo = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez les données du formulaire
    $formule = $_POST['formule'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $genre = $_POST['genre'];
    $pays = $_POST['pays'];
    $niveau = $_POST['niveau'];
    $id_ecole = $_POST['id_ecole'];
    $filiere = $_POST['filiere'];

    $stmt = $pdo->prepare('SELECT * FROM ecoles WHERE id_ecole = ?');
    $stmt->execute([$id_ecole]);

    if ($stmt->fetch() === false) {
        // L'école n'existe pas, vous pouvez gérer cette situation, par exemple, afficher un message d'erreur
        echo '<b style="color:red;">L\'école spécifiée n\'existe pas.</b>';
    } else {
        // L'école existe, continuez avec la vérification de l'email

        // Vérification : Vérifiez si l'email existe déjà dans la base de données des utilisateurs
        $stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE email = ?');
        $stmt->execute([$email]);

        if ($stmt->fetch() !== false) {
            // L'email existe déjà, vous pouvez gérer cette situation, par exemple, afficher un message d'erreur
            echo '<b style="color:red;">L\'email spécifié existe déjà dans la base de données.</b>';
        } else {
            // L'email n'existe pas, insérez les données dans la base de données

            $stmt = $pdo->prepare('INSERT INTO utilisateurs (formule, prenom, nom, email, genre, pays, niveau, id_ecole, id_filiere) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
            if ($stmt->execute([$formule, $prenom, $nom, $email, $genre, $pays, $niveau, $id_ecole, $filiere])) {
                // Les données ont été enregistrées avec succès
                echo '<b style="color:green;">Les données ont été enregistrées avec succès.</b>';
            } else {
                // Une erreur s'est produite lors de l'enregistrement
                echo '<b style="color:red;">Une erreur s\'est produite lors de l\'enregistrement des données.</b>';
            }
        }
    }
} else {
    // Répondre aux requêtes qui ne sont pas de type POST
    http_response_code(405); // Code d'erreur "Method Not Allowed"
    echo 'Méthode non autorisée';
}
