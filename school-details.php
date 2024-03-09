<?php
// session_name('etudiant');
// session_start();

include_once "assets/database/database.php"; 
// On inclut les fichiers de configuration et d'accès aux données
include_once 'assets/function/function.php';
    
// On instancie la base de données
$database = new Database();
$db = $database->getConnection();

if (isset($_GET['id'])) {
  // code...
  $get_ecole = get_ecoleID($_GET['id']);
  $get_filiere = get_formationID($_GET['id']);

  if (!isset($get_ecole)) {
    // code...
    header('Location:index.php');
  }
}

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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <style type="text/css">
        /* Style pour le texte aligné à droite */
.text-right {
    text-align: right;
    font-size: 18px;
    color: #333;
}

/* Style pour la liste */
.list-group-item {
    border: none;
    background-color: transparent;
}

/* Style pour le tableau */
.table {
    width: 100%;
    border: 1px solid #ccc;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: center;
}

/* Style pour l'image */
.img-fluid {
    max-width: 100%;
    height: auto;
    border-radius: 12px;
}

    </style>
</head>
<body class="">
    <div class="loading">
        <img src="https://i.gifer.com/ZKZg.gif" alt="Chargement en cours..." />
    </div>

    <?php include 'assets/includes/menu.html';?>
    
<section class="page-container">
<div class="container">
    <div class="row">
        <div class="col-md-4"> 
            <div style="position: relative;">
                <img src="<?=$get_ecole["img"]?>" class="img-fluid" alt="Image">
                <a href="index.php?q=cdt&i=<?=$get_ecole["id_ecole"]?>&e=<?=$get_ecole["nom_ecole"]?>" class="btn btn-success btn-icon" style="position: absolute; bottom: 10px; right: 10px;">
                    <i class="fas fa-check-circle"></i> Candidater
                </a>
            </div>
            <p style="font-weight: bolder;text-align: center;padding: 10px;"><?=$get_ecole["nom_ecole"]?></p>
        </div>
        <div class="col-md-7">
            <h6>Description</h6>
            <p style="text-justify: newspaper;"><?=$get_ecole["description"]?></p>

            <?php $get_certif = get_certificationID($get_ecole["id_ecole"]);?>
            <?=(isset($get_certif) OR !empty($get_certif))? '<h6>Certifications</h6>' : null ?>
            <p>
              <ul>
                <?php foreach ($get_certif as $certification) : ?>
                  <li data-toggle="tooltip" title="<?=$certification['description_certif']?>"><b><?=$certification['titre']?></b></li>
                <?php endforeach; ?>
              </ul>
            </p>

            <h6>Informations</h6>
            <p>Depuis : <b><?=$get_ecole["date_create"]?></b></p>
            <p>Pays : <b><?=$get_ecole["pays"]?></b></p>
            <p>Ville : <b><?=$get_ecole["ville"]?></b></p>
            <p>Adresse : <b><?=$get_ecole["adresse"]?></b></p>
            <p>Filières disponibles : <a href="#" data-toggle="modal" data-target="#filiereModal" data-dismiss="modal" >Voir</a></p>
            
        </div>
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

    function loadMoreContent() {
        if (!loading && !noMoreContent) {
            loading = true;
            $('.loading').show();

            $.ajax({
                url: 'load_more.php',
                type: 'GET',
                data: { page: page },
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
            loadMoreContent();
        }
    });


     $("#menuButton").click(function () {
                $("#navbarNav").slideToggle("slow");
            });
});

</script>