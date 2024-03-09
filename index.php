<?php
// session_name('etudiant');
// session_start();

include_once "assets/database/database.php"; 
// On inclut les fichiers de configuration et d'accès aux données
include_once 'assets/function/function.php';
    
// On instancie la base de données
$database = new Database();
$db = $database->getConnection();

$get_formation = get_formation();

if (isset($_GET['q'])) {
    // code...

    if ($_GET['q']=='ecoles') {
        
        $get_ecole = getMoreElements('1');
    
    }elseif ($_GET['q']=='fil') {
        // code...

        $get_formation = get_formation();
    }elseif ($_GET['q']=='cdt') {
        // code...

        if (isset($_GET['i'])) {
            
            $get_ecoleID = get_ecoleID($_GET['i']);

           $get_filiere =  get_formationID($_GET['i']);

        }

        
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
        .note {
    font-size: 14px;
    color: green; /* Couleur de texte grise */
    text-align: center;
    margin-top: 10px; /* Espacement par rapport au bouton */
}

    </style>
</head>
<body class="">
    <div class="loading">
        <img src="https://i.gifer.com/ZKZg.gif" alt="Chargement en cours..." />
    </div>

    <?php include 'assets/includes/menu.html';?>

<?php  if(basename($_SERVER['PHP_SELF'])=="index.php") : ?>
<?php  if(!isset($_GET["q"]) || empty($_GET["q"])) : ?>
<section style="margin-top: 190px;">
    <div class="container mt-4">
        <div id="imageCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://i0.wp.com/etudiant.sn/wp-content/uploads/2021/08/DSC_0082.jpeg?fit=800%2C534&ssl=1" class="d-block w-100" alt="Image 1">
                    <div class="carousel-caption">
                        <h3 style="background:black;display: inline-block;padding: 5px;">Univesités & Ecoles supérieures</h3>
                        <p style="background:black;display: inline-block;padding: 5px;">Cherchez l'établissement qui vous convient.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://www.au-senegal.com/IMG/jpg/cpi2.jpg" class="d-block w-100" alt="Image 2">
                    <div class="carousel-caption">
                        <h3 style="background:black;display: inline-block;padding: 5px;">Logements à Dkr</h3><br>
                        <p style="background:black;display: inline-block;padding: 5px;">Des logements confortables & agréables.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://i.ytimg.com/vi/VstLXH6O9RA/maxresdefault.jpg" class="d-block w-100" alt="Image 3">
                    <div class="carousel-caption">
                        <h3 style="background:black;display: inline-block;padding: 5px;">Billet d'avion</h3>
                        <p style="background:black;display: inline-block;padding: 5px;">Nous nous chargeons éventuellement de vous aider dans vos démarches si vous le souhaitez.</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="https://thumbs.dreamstime.com/b/people-waiting-luggage-to-embark-bus-dakar-ziguinchor-senegal-africa-travek-standing-platform-front-get-186897348.jpg" class="d-block w-100" alt="Image 3">
                    <div class="carousel-caption">
                        <h3 style="background:black;display: inline-block;padding: 5px;">Navette Aéroport</h3>
                        <p style="background:black;display: inline-block;padding: 5px;">Nous venons vous cherchez à l'aéroport pour vous accompagnez chez vous.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
            </a>
            <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Suivant</span>
            </a>
        </div>
    </div>
</section>

<div class="d-flex justify-l4content-center align-items-center" style="margin-top: 50px;">
  <div class="container">
    <hr>
    <div class="row">
      <div class="col-md-4"> 
        <div style="text-align: center;">
          <img src="assets/images/Cpasorcier.png" class="img-fluid" alt="Image" style="border-radius: 15px;">
        </div>
      </div>
      <div class="col-md-7">
        <h4>Présentation</h4>
        <h6>#Qu'est-ce que Cpasorcier?</h6>
        <p style="text-justify: newspaper;"><b>Cpasorcier</b> est bien plus qu'une simple plateforme web ; c'est une passerelle vers l'avenir pour les étudiants qui aspirent à étudier au Sénégal. C'est une ressource inestimable conçue pour simplifier et optimiser le processus de recherche d'écoles et d'universités sénégalaises pour nos chers voisins gabonais. <b>Cpasorcier</b> est un guichet unique, une boussole éducative qui guide les étudiants gabonais à travers les méandres de l'éducation au Sénégal, offrant un accès à des informations claires et précieuses pour prendre des décisions éclairées.</p>

        <h6>#Ce que Cpasorcier n'est pas</h6>
        <p style="text-justify: newspaper;"><b>Cpasorcier</b> n'est pas une simple liste d'écoles sénégalaises. Ce n'est pas une plateforme statique et impersonnelle. Au contraire, "Cpasorcier" s'engage à offrir bien plus qu'une simple liste. Nous ne sommes pas une agence de recrutement ni une institution académique.</p>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<?php endif; ?>
    
<!-- services -->

<?php  if(basename($_SERVER['PHP_SELF'])=="index.php") : ?>
<?php  if(isset($_GET["q"]) && $_GET["q"]=="ser") : ?>
<div class="d-flex justify-l4content-center align-items-center" style="margin-top: 200px;">
  <div class="container">
    <h1>Sercives</h1>
    <hr>
    <div class="row">
      <div class="col-md-4"> 
        <div style="text-align: center;position: relative;">
          <img src="https://i0.wp.com/etudiant.sn/wp-content/uploads/2021/08/DSC_0082.jpeg?fit=800%2C534&ssl=1" class="img-fluid" alt="Image">
            <a  href="index.php?q=ecoles" class="btn btn-secondary btn-icon" style="position: absolute; bottom: 10px; right: 10px;border-radius: 10px;">
                    <i class="fas fa-school"></i> voir plus
                </a>
        </div>
      </div>
      <div class="col-md-7">
        <h4>Universités & écoles supérieures</h4>
        <h6>#Trouvez votre école</h6>
        <p style="text-justify: newspaper;"><b>Cpasorcier</b> s'engage à travers cette plateforme à vous accompagner dans la recherche de l'établissement d'enseignement qui correspond le mieux à vos besoins. Nous nous chargeons également de toutes les démarches administratives nécessaires en prévision de votre arrivée sur la magnifique terre de la Téranga, vous offrant ainsi un départ en toute sérénité vers votre aventure d'apprentissage..</p>

        <p style="text-justify: newspaper;">Nous considérons que votre satisfaction est la mesure ultime de notre succès, et nous nous efforçons continuellement de remplir ce devoir avec dévouement et professionnalisme.</p>
      </div>
    </div>

    <br>
    <hr>

    <div class="row">
      <div class="col-md-4"> 
        <div style="text-align: center;position: relative;">
          <img src="https://www.au-senegal.com/IMG/jpg/cpi2.jpg" class="img-fluid" alt="Image">
            <!-- <a  href="#" data-toggle="modal" data-target="#confirmationModal" class="btn btn-secondary btn-icon" style="position: absolute; bottom: 10px; right: 10px;border-radius: 15px;">
                    <i class="fas fa-paper-plane"></i> Faire une demande
                </a> -->
        </div>
      </div>
      <div class="col-md-7">
        <h4>Logements</h4>
        <h6>#Trouvez votre logement</h6>
        <p style="text-justify: newspaper;"><b>Cpasorcier</b> va au-delà de l'éducation en offrant également un soutien essentiel aux étudiants gabonais. Nous comprenons que la recherche d'un logement peut être une préoccupation majeure avant votre arrivée au Sénégal. C'est pourquoi <b>Cpasorcier</b> vous connecte avec des ressources pour trouver un logement adapté à vos besoins, de manière simple et efficace. Que ce soit en résidence universitaire, en colocation ou en location d'appartement, "Cpasorcier" vous guide dans votre recherche pour que vous puissiez vous concentrer sur votre éducation, sans soucis..</p>

        <p style="text-justify: newspaper;">Notre objectif est de vous faciliter la transition vers le Sénégal, pour que vous puissiez vous installer confortablement et vous concentrer sur vos études. <b>Cpasorcier</b> vous soutient, de l'éducation à l'hébergement, pour que vous puissiez réaliser vos rêves académiques en toute confiance.</p>
      </div>
    </div>

    <br>
    <hr>

    <div class="row">
      <div class="col-md-4"> 
        <div style="text-align: center">
          <img src="assets/images/billet.png" class="img-fluid" alt="Image">
        </div>
      </div>
      <div class="col-md-7">
        <h4>Achat ou Réservation de billet</h4>
        <h6>#Reservez votre billet</h6>
        <p style="text-justify: newspaper;"> Nous comprenons l'importance de trouver les meilleures offres. C'est pourquoi nous nous  travaillons au quotidien pour que vous puissiez profiter d'économies substantielles.</p>

        <p style="text-justify: newspaper;">Notre équipe dévouée de service clientèle est à votre disposition pour répondre à toutes vos questions, vous aider dans le processus de réservation et résoudre vos préoccupations. Votre satisfaction est notre priorité absolue.</p>
      </div>
    </div>

    <br>
    <hr>

    <div class="row">
      <div class="col-md-4"> 
        <div style="text-align: center;">
          <img src="https://citinewsroom.com/wp-content/uploads/2022/04/IMG-20220422-WA0031-750x375.jpg" class="img-fluid" alt="Image">
        </div>
      </div>
      <div class="col-md-7">
        <h4>Navette aéroport</h4>
        <h6>#Nous venons vous chercher à l'aéroport</h6>
        <p style="text-justify: newspaper;">Nous savons que votre voyage commence dès que vous descendez de l'avion. Notre service de navette aéroport assure un transport pratique et sûr depuis l'aéroport jusqu'à votre domicile au Sénégal. Plus besoin de vous soucier de la logistique à votre arrivée. Nous sommes là pour vous accueillir et vous conduire à votre nouvelle maison.</p>

        <p style="text-justify: newspaper;">Notre équipe dévouée est à votre disposition pour répondre à toutes vos questions, vous aider à planifier vos déplacements et résoudre tout problème que vous pourriez rencontrer. Votre réussite et votre bien-être sont nos priorités.</p>
      </div>
    </div>

    <br>
    <hr>

    <div class="row">
      <div class="col-md-4"> 
        <div style="text-align: center;">
          <img src="https://img.freepik.com/photos-premium/portrait-adolescent-metis-se-relaxant-maison-souriant-joyeusement-dans-interieur-confortable-espace-pour-copie_236854-32740.jpg" class="img-fluid" alt="Image">
        </div>
      </div>
      <div class="col-md-7">
        <h4>Meubler votre logement</h4>
        <h6>#Nous vous aidons à créer votre confort</h6>
        <p style="text-justify: newspaper;">Nous savons à quel point il est important de se sentir chez soi, même loin de chez soi. C'est pourquoi nous proposons un service d'équipement  de logement, vous permettant de personnaliser votre espace de vie et de le rendre confortable dès votre arrivée.</p>

        <p style="text-justify: newspaper;">Nous sommes à votre service pour dénicher les meubles qui rendront votre espace de vie des plus agréables. Quel que soit votre budget, collaborons pour identifier les éléments essentiels qui transformeront votre logement en un chez-vous chaleureux et fonctionnel. Nous mettons à votre disposition notre expertise pour vous aider à choisir les pièces qui correspondent à vos besoins et à votre style</p>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<?php endif; ?>

    <?php if(isset($_GET['q']) && $_GET['q']=='ecoles') : ?>
    <section class="page-container">
    <div class="scrollable-section">
    <div class="container">
        <h1 style="margin-bottom: 20px;">Universités & Ecoles supérieures</h1>
        <hr>
        <div class="row az" id="bloc">
        <?php foreach ($get_ecole as $ecole) : ?>
            <div class="col-md-3 col-sm-6 col-6 custom-bg" style="cursor: pointer;">
                <!-- Bloc 1 -->
                <a href="school-details.php?id=<?=$ecole["id_ecole"]?>">
                    <img src="<?=$ecole["img"]?>" alt="<?=$ecole["nom_ecole"]?>" class="img-fluid" style="border-radius: 10px;">
                    <p style="text-align: center;font-weight: bolder;color: black;"><?=$ecole["nom_ecole"]?></p>
                    <div class="overlay">
                        <p><?=$ecole["description"]?></p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>

        </div>
    </div>
    </div>
    </section>
<?php endif; ?>

 <?php if(isset($_GET['q']) && $_GET['q']=='fil') : ?>
    <section style="margin-top: 200px;">
        <div class="container filiere-list">
        <h1>Liste des Filières Universitaires & Ecoles supérieures</h1>

    <?php foreach ($get_formation as $formation) : ?>
        <a href="result-search.php?search=<?=$formation['nom_formation']?>">
            <div class="filiere-item">
                <img src="<?=$formation['img_formation']?>" alt="<?=$formation['nom_formation']?>" class="img-fluid">
                <h3><?=$formation['nom_formation']?></h3>
                <p><?=$formation['description_formation']?></p>
            </div>
        </a>
    <?php endforeach; ?>
    </section>
    <?php endif; ?>


<?php if(isset($_GET['q']) && $_GET['q']=='cdt') : ?>
<section style="margin-top:180px;">
    <div class="container">
        <h1 class="mt-4 mb-4">Formules de souscription</h1>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="subscription-card">
                    <h2>Formule de base</h2>
                    <div class="price">30 000 XAF</div>
                    <ul class="features">
                       <li><i class="fas fa-school"></i> Ecole</li>
                       <li><i class="fas fa-plane"></i> <span style="text-decoration: line-through;">Billet d'avion</span></li>
                        <li><i class="fas fa-bed"></i> <span style="text-decoration: line-through;">Logement</span></li>
                        <li><i class="fas fa-home"></i> <span style="text-decoration: line-through;">Meublé le logement (facutatif)</span></li>
                        <li><i class="fas fa-car"></i> <span style="text-decoration: line-through;">Navette aéroport</span></li>
                    </ul>
                    <?=(isset($get_ecoleID) && $get_ecoleID)? '<button class="btn btn-subscribe" data-toggle="modal" data-target="#infoModal" value="Base">Souscrire</button>' : '<button class="btn btn-subscribe" title="Veuillez choisir une école avant de souscrire">Souscrire</button>';?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="subscription-card">
                    <h2>Formule standard</h2>
                    <div class="price">50 000 XAF</div>
                    <ul class="features">
                       <li><i class="fas fa-school"></i> Ecole</li>
                        <li><i class="fas fa-plane"></i> Billet d'avion</li>
                        <li><i class="fas fa-bed"></i> Logement</span></li>
                        <li><i class="fas fa-home"></i> <span style="text-decoration: line-through;">Meublé le logement (facutatif)</span></li>
                        <li><i class="fas fa-car"></i> <span style="text-decoration: line-through;">Navette aéroport</span></li>
                    </ul>
                    <?=(isset($get_ecoleID) && $get_ecoleID)? '<button class="btn btn-subscribe" data-toggle="modal" data-target="#infoModal" value="Standard">Souscrire</button>' : '<button class="btn btn-subscribe" title="Veuillez choisir une école avant de souscrire">Souscrire</button>';?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="subscription-card">
                    <h2>Formule premium</h2>
                    <div class="price">130 000 XAF</div>
                    <ul class="features">
                        <li><i class="fas fa-school"></i> Ecole</li>
                        <li><i class="fas fa-plane"></i> Billet d'avion</li>
                        <li><i class="fas fa-bed"></i> Logement</li>
                        <li><i class="fas fa-home"></i> Meublé le logement (facutatif)</li>
                        <li><i class="fas fa-car"></i> Navette aéroport</li>
                    </ul>
                    <?=(isset($get_ecoleID) && $get_ecoleID)? '<button class="btn btn-subscribe" data-toggle="modal" data-target="#infoModal" value="Premium">Souscrire</button>' : '<button class="btn btn-subscribe" title="Veuillez choisir une école avant de souscrire">Souscrire</button>';?>
                </div>
            </div>
        </div>
        <p class="note">NB : Les prix ci-dessus incluent uniquement les frais de service et de dossier. Ils n'incluent pas les coûts liés à l'école et autres dépenses.</p>
    </div>
</section>
<?php endif; ?>

<?php include 'assets/includes/contactModal.html';?>
<?php include 'assets/includes/confirmationModal.html';?>
<?php include 'assets/includes/errorModal.html';?>
<?php include 'assets/includes/subModal.php';?>
</body>

<!-- Inclure les fichiers JavaScript Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var page = 2;
    var loading = false;
    var noMoreContent = false;


function isValidEmail(email) {
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(email);
}
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

     $(".btn-subscribe").click(function(){
        $('#formule').val($(this).val());
     });


      // Lorsque le formulaire est soumis
    $('#infoForm').click(function() {

        // Récupérez les valeurs des champs du formulaire
        var formule = $('#formule').val();
        var prenom = $('#prenom').val();
        var nom = $('#nom').val();
        var email = $('#email').val();
        var genre = $('#genre').val();
        var pays = $('#pays').val();
        var niveau = $('#niveau').val();
        var id_ecole = $('#id_ecole').val();
        var ecole = $('#ecole').val();
        var filiere = $('#filiere').val();

        // Effectuez les vérifications ici (par exemple, vérifiez si l'école existe dans la table ecoles et si l'email existe dans la base de données)

                // Effectuez des vérifications
        if (formule === '') {
            alert('Veuillez sélectionner une formule.');
            $('#confirmationModal').modal('hide');
        } else if (prenom === '') {
            alert('Veuillez entrer votre prénom.');
            $('#confirmationModal').modal('hide');
        } else if (nom === '') {
            alert('Veuillez entrer votre nom.');
            $('#confirmationModal').modal('hide');
        } else if (email === '') {
            alert('Veuillez entrer votre email.');
            $('#confirmationModal').modal('hide');
            return;
        } else if (!isValidEmail(email)) {
            alert('L\'email que vous avez saisi n\'est pas valide.');
            $('#confirmationModal').modal('hide');
            return;
        } else if (genre === 'Genre') {
            alert('Veuillez sélectionner votre genre.');
            $('#confirmationModal').modal('hide');
            return;
        } else if (pays === 'Pays de provenance') {
            alert('Veuillez sélectionner votre pays de provenance.');
            $('#confirmationModal').modal('hide');
            return;
        } else if (niveau === 'Niveau actuel') {
            alert('Veuillez sélectionner votre niveau actuel.');
            $('#confirmationModal').modal('hide');
            return;
        } else if (id_ecole === '') {
            alert('L\'ID de l\'école est manquant.');
            $('#confirmationModal').modal('hide');
            return;
        } else if (ecole === '') {
            alert('Le nom de l\'école est manquant.');
            $('#confirmationModal').modal('hide');
            return;
        } else if (filiere === 'Choisir la filière') {
            alert('Veuillez sélectionner une filière.');
            $('#confirmationModal').modal('hide');
            return;
        } else {

        // Envoyez les données au script de traitement
        $.ajax({
            type: 'POST',
            url: 'traitement.php',
            data: {
                formule: formule,
                prenom: prenom,
                nom: nom,
                email: email,
                genre: genre,
                pays: pays,
                niveau: niveau,
                id_ecole: id_ecole,
                ecole: ecole,
                filiere: filiere
            },
            success: function(response) {
                // Réponse du serveur (peut contenir un message de succès ou d'erreur)
                if (response ==='<b style="color:green;">Les données ont été enregistrées avec succès.</b>') {

                    $('#response').html(response);
                    $('#infoModal').modal('hide');
                    $('#confirmationModal').modal('show');

                }else{

                    $('#responseError').html(response);
                    $('#infoModal').modal('hide');
                    $('#errorModal').modal('show');
                }
                
                console.log(response);
                // Vous pouvez gérer la réponse ici, par exemple afficher un message à l'utilisateur
            }
        });

        
        } //fin de verifie

    });
});

</script>