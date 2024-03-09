<?php
// session_name('etudiant');
// session_start();

include_once "assets/database/database.php"; 
// On inclut les fichiers de configuration et d'accès aux données
include_once 'assets/function/function.php';
    
// On instancie la base de données
$database = new Database();
$db = $database->getConnection();


$page = 1;
$search = $_GET['search'];
if (!isset($search) OR empty($search)) {
  header('Location:index.php');
}
$get_ecole = rechercherEcoles($search,$page);

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE.edge" />
    <meta name="author" content="colorlib.com">
    <!-- Inclure les fichiers CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet">     
</head>
<body class="">
    <div class="loading">
        <img src="https://i.gifer.com/ZKZg.gif" alt="Chargement en cours..." />
    </div>

<?php include 'assets/includes/menu.html';?>  

<section class="page-container">
<div class="container">
    <h1>Résultat : "<?=$search?>"</h1>
    <hr>
    <br>
    <div class="row">
      <?php foreach ($get_ecole as $ecole) : ?>
        <?php $get_filiere = get_formationID($ecole['id_ecole']);?>
        <div class="col-md-4"> 
            <div style="position: relative;">
                <img src="<?=$ecole["img"]?>" class="img-fluid" alt="Image">
                <a href="index.php?q=cdt&i=<?=$ecole["id_ecole"]?>&e=<?=$ecole["nom_ecole"]?>" class="btn btn-success btn-icon" style="position: absolute; bottom: 10px; right: 10px;">
                    <i class="fas fa-check-circle"></i> Candidater
                </a>
            </div>
            <p style="font-weight: bolder;text-align: center;padding: 10px;"><?=$ecole["nom_ecole"]?></p>
        </div>
        <div class="col-md-7" style="padding-bottom: 30px;">
            <h6>Description</h6>
            <p style="text-justify: newspaper;"><?=$ecole["description"]?></p>
            <?php $get_certif = get_certificationID($ecole["id_ecole"]);?>
            <?=(isset($get_certif) OR !empty($get_certif))? '<h6>Certifications</h6>' : null ?>
            <p>
              <ul>
                <?php foreach ($get_certif as $certification) : ?>
                  <li data-toggle="tooltip" title="<?=$certification['description_certif']?>"><b><?=$certification['titre']?></b></li>
                <?php endforeach; ?>
              </ul>
            </p>
            <h6>Informations</h6>
            <p>Depuis : <b><?=$ecole["date_create"]?></b></p>
            <p>Pays : <b><?=$ecole["pays"]?></b></p>
            <p>Ville : <b><?=$ecole["ville"]?></b></p>
            <p>Adresse : <b><?=$ecole["adresse"]?></b></p>
            
            <p>
              Filières disponibles :
              <ul>
                <?php foreach ($get_filiere as $filiere) : ?>
                  <li title="<?=$filiere['description_formation']?>"><b><?=$filiere['nom_formation']?></b></li>
                <?php endforeach; ?>
              </ul>
            </p>
        </div>
        
        <?php endforeach; ?>
    </div>
    <table class="table table-bordered">
        <!-- Insérez ici votre tableau -->
    </table>
</div>
    </section>
<?php include 'assets/includes/contactModal.html';?>
<?php include 'assets/includes/filiereModal.php';?>
</body>

<!-- Inclure les fichiers JavaScript Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    let page = 2;
    let loading = false;
    let noMoreContent = false;

    $('[data-toggle="tooltip"]').tooltip();

    $('[data-toggle="tooltip"]').tooltip({
        placement: 'top', // Position de l'info-bulle (top, bottom, left, right, etc.)
        delay: { "show": 500, "hide": 100 } // Délai d'affichage et de disparition en millisecondes
    });


    function recherche() {
        if (!loading && !noMoreContent) {
            loading = true;
            $('.loading').show();
            var search = $('#search').val();
            $.ajax({
                url: 'load_more.php',
                type: 'GET',
                data: { search: search, page: page },
                success: function(data) {
                    if (data) {
                        $('.az').append(data);
                        loading = false;
                        page++;
                    } else {
                        noMoreContent = true;
                    }
                    $('.loading').hide();
                }
            });
        }
    }

    $(window).scroll(function() {
        if (!loading && !noMoreContent && $(window).scrollTop() + $(window).height() >= $(document).height() - 200) {
            recherche();
        }
    });

    $("#menuButton").click(function () {
                $("#navbarNav").slideToggle("slow");
            });
});

</script>