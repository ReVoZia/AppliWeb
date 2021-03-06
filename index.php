<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>EastMaster</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <link rel="icon" href="Img/East/logo.jpg" type="image/png">
</head>
<body>

<!-- header -->
<header class="header" id="header">
    <div class="head-top">
        <div class="site-name">
            <span>EastMaster</span>
        </div>
        <div class="site-nav">
            <span id="nav-btn">MENU <i class="fas fa-bars"></i></span>
        </div>
    </div>
    <div class="head-bottom flex">
        <h2>EastMaster : Une envie de liberté à porté de main! </h2>
        <p>Sur la Côte d’Azur, Saint-Tropez est une destination balnéaire unique.
            Le Eastmaster Hôtel & Spa, à la majestueuse façade de briques et pierres blanches, a été construit
            en 1924 dans un style Art Déco et comporte 4 étages.
            En plein centre de la ville, entre mer et garigue, l’hôtel séduit par son luxe sage dans une
            atmosphère unique alliant histoire, modernité et gastronomie</p>
        <button type="button" class="head-btn">Faites Défiler!</button>
    </div>
</header>
<!-- end of header -->

<!-- side navbar -->
<div class="sidenav" id="sidenav">
            <span class="cancel-btn" id="cancel-btn">
                <i class="fas fa-times"></i>
            </span>

    <ul class="navbar">
        <li><a href="#header">Accueil</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#rooms">Chambres - Mariages - Restaurants</a></li>
        <li><a href="#customers">Avis des clients</a></li>
        <?php if (isset($_SESSION['Role'])) { ?>
            <li><a href="Reserver.php"> Réservation </a></li>
        <?php if ($_SESSION['Role'] === 'ADMIN') {?>
            <li><a href="selectReservation.php"> Modifier une réservation </a></li>
            <li><a href="selectReservation.php"> Supprimer une réservation </a></li>
            <li><a href="signup.php"> Créer un compte </a></li>
        <?php } ?>
            <li><a href="logout.php"> Déconnexion </a></li>
        <?php } else { ?>
            <li><a href="login.php"> Connexion </a></li>
            <li><a href="signup.php"> Créer un compte </a></li>
        <?php } ?>
    </ul>

</div>
<!-- end of side navbar -->

<!-- fullscreen modal -->
<div id="modal"></div>
<!-- end of fullscreen modal -->

<!-- body content  -->
<section class="services sec-width" id="services">
    <div class="title">
        <h2>Services</h2>
    </div>
    <div class="services-container">
        <!-- single service -->
        <article class="service">
            <div class="service-icon">
                        <span>
                            <i class="fas fa-utensils"></i>
                        </span>
            </div>
            <div class="service-content">
                <h2>Restauration:</h2>
                <p>Gilles Petit, Maître d'Hôtel du Eastmaster depuis 25 ans, veille au bon fonctionnement du bar et
                    des deux restaurants. Les Cimaises, 200 couverts par service midi et soir, 365 jours sur 365 ; le
                    Pavillon, 40 couverts le soir, neuf mois dans l'année. Deux restaurants, deux univers, deux façons
                    de travailler.
                    </br></br> Le Bar "Le Mahogany" :
                    Mythique à Saint-Tropez, le Mahogany offre, dans un style très anglais, un lieu de convivialité
                    élégant et feutré.
                    Venez-vous relaxer autour d’un verre dans une ambiance rétro-chic (boiseries acajou, velours
                    rouge des fauteuils, ambiance jazzy). Aux beaux jours, profitez de la terrasse avec vue sur le
                    parc.</p>

            </div>
        </article>
        <!-- end of single service -->
        <!-- single service -->
        <article class="service">
            <div class="service-icon">
                        <span>
                            <i class="fas fa-swimming-pool"></i>
                        </span>
            </div>
            <div class="service-content">
                <h2>Raffraichissement:</h2>
                <p>L’hôtel Eastmaster et Nuxe se sont associés pour vous présenter un espace de bien être
                    exceptionnel dans un lieu unique où les mots harmonie, sensations, émotions et détente trouvent
                    tout leur sens.
                    </br></br>Le Spa NUXE procure un réconfort et un apaisement nouveaux par l’association de ses
                    produits
                    de cosmétologie d’origine naturelle à des techniques exclusives manuelles.
                    </br></br> Dans ce lieu magique, 5 cabines de soins, dont une double, un hammam, Sauna, Jacuzzi et
                    une
                    piscine intérieure vous accueillent pour vous procurer des instants voluptueux et relaxants.
                    Avec sa carte aussi riche que complète en soins visage, soins corps, massages, NUXE allie son sens
                    du plaisir et de la gourmandise.
                    </br> </br> Le sauna, jacuzzi et la piscine sont en accès libre aux utilisateurs du SPA (droit
                    d’entrée 10€,
                    gratuit à toutes personnes faisant un soin).</p>

            </div>
        </article>
        <!-- end of single service -->
        <!-- single service -->
        <article class="service">
            <div class="service-icon">
                        <span>
                            <i class="fas fa-broom"></i>
                        </span>
            </div>
            <div class="service-content">
                <h2>Entretien Ménager:</h2>
                <p>L'Hotel EastMaster veille à ce que tous les clients puissent vivre dans un confort inégalé avec leurs
                    chambres nettoyés,rangés,apres le départ des clients précédents
                    </br> L'équipe est composée de 64 techniciens de surface qualifiés ainsi que 4 concierge qui feront
                    en sorte que vous puissiez séjourner dans un endroit soigné.</p>

            </div>
        </article>
        <!-- end of single service -->
        <!-- single service -->
        <article class="service">
            <div class="service-icon">
                        <span>
                            <i class="fas fa-door-closed"></i>
                        </span>
            </div>
            <div class="service-content">
                <h2>Séminaire/Mariage:</h2>
                <p>Un nouvel art de vivre les affaires dans un environnement où modernité et design côtoient
                    authenticité et qui feront de vos évènements des véritables moments d'exception et de savoirfaire.
                    </br>Les salles de réunion :
                    </br> - 2 salles de 200 m² à la lumière du jour, de 120 personnes, climatisation
                    </br>- 6 salles de 50 m², de 40 personnes, climatisation
                    </br>Les salles de réunion étant modulables entre elles, permettent de proposer les superficies
                    suivantes : 50m², 100m², 200m², 300m², 400m², 500m².
                    </br> Les salons de réception privés pour les mariages :
                    </br>- Salon Shetland : 150 personnes
                    </br>- Salon Glasgow : 80 personnes
                    </br>- Salon Cambridge : 60 personnes
                    </br>- Salon Bristol : 36 personnes
                    </br>- Salon Aberdeen : 36 personnes</br></p>

            </div>
        </article>
        <!-- end of single service -->
    </div>
</section>


<section class="rooms sec-width" id="rooms">
    <div class="title">
        <h2>Chambres</h2>
    </div>
    <div class="rooms-container">
        <!-- single room -->
        <article class="room">
            <div class="room-image">
                <img src="Img/East/luxe.jpg" alt="room image">
            </div>
            <div class="room-text">
                <h3><u>Chambre de Luxe:</u></h3>
                <ul>
                    <li>
                        <i class="fas fa-arrow-alt-circle-right"></i>
                        Petit déjeuner au lit.
                    </li>
                    <li>
                        <i class="fas fa-arrow-alt-circle-right"></i>
                        Vue sur la Mer.
                    </li>
                    <li>
                        <i class="fas fa-arrow-alt-circle-right"></i>
                        Les animaux ne sont pas accueillis dans les chambres.
                    </li>
                </ul>
                <p>Dotées d’un design élégant, elle offre une vue sur Le Touquet, le parc ou le phare. Le mariage
                    du confort moderne et du style rétro s’y harmonisent parfaitement.</p>
                <p>Toutes les chambres sont équipées de :
                    Ecran plat
                    Satellite – Pay TV
                    Accès Internet WIFI gratuit
                    Téléphone direct
                    Mini-bar
                    Coffre-fort
                    Room-service
                    Service réveil et conciergerie
                    Peignoir
                    Sèche-cheveux</p>
                <p class="rate">
                    <span>199.00€/</span> Par Nuit
                </p>
                <a href="Reserver.php">
                    <button type="button" class="btn">Réservation</button>
                </a>
            </div>
        </article>
        <!-- end of single room -->
        <!-- single room -->
        <article class="room">
            <div class="room-image">
                <img src="Img/East/mariage.jpg" alt="room image">
            </div>
            <div class="room-text">
                <h3><u>Salon de Mariage:</u></h3>
                <ul>
                    <li>
                        <i class="fas fa-arrow-alt-circle-right"></i>
                        Grand et espacé
                    </li>
                    <li>
                        <i class="fas fa-arrow-alt-circle-right"></i>
                        Moderne
                    </li>
                    <li>
                        <i class="fas fa-arrow-alt-circle-right"></i>
                        Climatisation
                    </li>
                </ul>
                <p>Passez un moment conviviable ou vous vous en rappellerez toute votre vie avec plusieurs salons de
                    mariage de differentes tailles selon le nombre de personnes admises lors de votre mariage!</p>
                <p>Les salles de réunion étant modulables entre elles, permettent de proposer les superficies suivantes
                    : 50m², 100m², 200m², 300m², 400m², 500m².</p>
                <p class="rate">
                    <span>1500/2000€ </span>selon le nombre de personne
                </p>
                <button type="button" class="btn">Réservation</button>
            </div>
        </article>
        <!-- end of single room -->
        <!-- single room -->
        <article class="room">
            <div class="room-image">
                <img src="Img/East/restauration.png" alt="room image">
            </div>
            <div class="room-text">
                <h3><u>Restauration:</u></h3>
                <ul>
                    <li>
                        <i class="fas fa-arrow-alt-circle-right"></i>
                        Repas cuisiné par le chef Gilles Petit ainsi que sa brigade
                    </li>
                    <li>
                        <i class="fas fa-arrow-alt-circle-right"></i>
                        Ouvert 7j/7.
                    </li>
                    <li>
                        <i class="fas fa-arrow-alt-circle-right"></i>
                        Menu:Entrée/Plat/Dessert.
                    </li>
                </ul>
                <p>Nous vous proposons de passer un agréable moment en dégustant des plats élaborés par le chef avec des
                    produits frais régionaux.</p>
                <p>Que vous célébriez un jour spécial ou souhaitiez simplement passer une soirée loin des fourneaux,
                    faites confiance à notre cuisine, c’est-ce que nous faisons de mieux.</p>
                <p class="rate">
                    <span>80.00€ /</span>Par Personne
                </p>
                <button type="button" class="btn">Réservation</button>
            </div>
        </article>
        <!-- end of single room -->
    </div>
</section>


<section class="customers" id="customers">
    <div class="sec-width">
        <div class="title">
            <h2>Avis des clients:</h2>
        </div>
        <div class="customers-container">
            <!-- single customer -->
            <div class="customer">
                <div class="rating">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                </div>
                <h3><u>Nous avons adoré!</u></h3>
                <p>Un week-end passé en amoureux avec ma femme.Moment très agréable,calme...Si vous souhaitez vous
                    reposer et passer du bon temps alors n'hésitez surtout pas je vous le recommande fortement!</p>
                <img src="Img/East/espagnol.jpg" alt="customer image">
                <span>Lionel, Espagne</span>
            </div>
            <!-- end of single customer -->
            <!-- single customer -->
            <div class="customer">
                <div class="rating">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="far fa-star"></i></span>
                </div>
                <h3><u>Vie confortable:</u></h3>
                <p>J'ai passé un moment agréable avec mon épouse,le restaurant est de très bonne qualité et plus
                    particulièrement son vin meme si cela reste couteux</p>
                <img src="Img/East/francais.jpg" alt="customer image">
                <span>Jean, France</span>
            </div>
            <!-- end of single customer -->
            <!-- single customer -->
            <div class="customer">
                <div class="rating">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="far fa-star"></i></span>
                </div>
                <h3><u>Bon Endroit:</u></h3>
                <p>Bon emplacement, près des transports publics et de la mer Parking accessible.
                    proche du centre-ville, à proximité de bons magasins, restaurants et bars.</p>
                <img src="Img/East/allemand.jpg" alt="customer image">
                <span>Félix, Allemagne</span>
            </div>
            <!-- end of single customer -->
        </div>
    </div>
</section>
<!-- end of body content -->

<!-- footer -->
<footer class="footer">
    <div class="footer-container">
        <div>
            <h2>A Propos De Nous : </h2>
            <p>Construit en 1924, l'hotel EastMaster a été crée dans le but de satisfaire les clients et leurs faire
                changer les idées en leur faisant découvrir un endroit paisible et chaleureux</p>
            <ul class="social-icons">
                <li class="flex">
                    <i class="fa fa-twitter fa-2x"></i>
                </li>
                <li class="flex">
                    <i class="fa fa-facebook fa-2x"></i>
                </li>
                <li class="flex">
                    <i class="fa fa-instagram fa-2x"></i>
                </li>
            </ul>
        </div>


    </div>
    </div>
</footer>
<!-- end of footer -->

<script src="script.js"></script>
</body>
</html>