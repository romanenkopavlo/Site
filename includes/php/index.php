<?php include "average.php" ?>

<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Voici mon site</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Icon pour la fenetre du haut  -->
    <link href="../../assets/img/favicon.ico" rel="icon">
    <!-- Vendor CSS Files -->
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">
<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex">

        <div class="logo mr-auto">
            <h1 class="text-light"><a href="index.php"><span>BAC 2022</span></a></h1>
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul>

            </ul>
        </nav>
    </div>
</header>

<!-- Premiere pages -->
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url(../../assets/img/Logo.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">Bienvenu voulez vous calculer votre note du bac</h2>
                            <p class="animate__animated animate__fadeInUp">Cliquer ci-joint pour calculer </p>
                            <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Appuyer ici</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title">
                <h2>BAC 2023-2024</h2>
                <p>Comment fonctionne-t-il</p>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <img src="../../assets/img/Note-finale-gt-22.jpg" class="img-fluid" alt="">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        echo "<h2 id = 'average'>Le numero de matieres: $subjects</h2>";
                        echo "<br><h2 id = 'average'>Votre moyenne generale: $average_grade</h2><br>";
                        if ($average_grade < 8) {
                            echo "<h3>Vous n'obtenez pas le diplôme du bac, et vous n'avez pas la possibilité d'aller au rattrapage</h3>";
                        } elseif ($average_grade < 10) {
                            echo "<h3>Vous n'obtenez pas le diplôme du bac mais tout n'est pas perdu, vous pouvez aller au rattrapage</h3>";
                        } elseif ($average_grade < 12) {
                            echo "<h3>Vous êtes admis!<br>Vous décrochez le diplôme du bac <strong>sans mention</strong></h3>";
                        } elseif ($average_grade < 14) {
                            echo "<h3>Vous êtes admis!<br>Vous décrochez le diplôme du bac avec la <strong>mention assez-bien</strong></h3>";
                        } elseif ($average_grade < 16) {
                            echo "<h3>Vous êtes admis!<br>Vous décrochez le diplôme du bac avec la <strong>mention bien</strong></h3>";
                        } elseif ($average_grade < 18) {
                            echo "<h3>Vous êtes admis!<br>Vous décrochez le diplôme du bac avec la <strong>mention très-bien</strong></h3>";
                        } else {
                            echo "<h3>Vous êtes admis!<br>Vous décrochez le diplôme du bac avec les rarissimes <strong>félicitations du jury</strong></h3>";
                        }
                        echo '<script>window.location = "#ligne_epreuve_anticipe";</script>';
                    }
                    ?>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                    <h3>Petit rappel: Prévues les 14, 15 et 16 mars 2024, les épreuves écrites de spécialité du baccalauréat général et technologique sont reportées aux 11, 12 et 13 mai 2024, pour laisser aux lycéens le temps nécessaire aux révisions. Cette images resume les coef du bac 2024.</h3>
                    <div id="colonne-gauche-simulateur">
                        <form method="post" id="formulaire_simulateur" action="index.php" name="formulaire_simulateur">
                            <br>
                            <table id="tab-simulateur-notes">
                                <tbody><tr>
                                    <th id="premiere-colonne">Contrôle continu - <span class="nature_epreuve">Première</span></th>
                                    <th>Coeff.</th>
                                    <th style="width: 50px;">Note</th>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="choix_specialite_abandonnee" id="choix_specialite_abandonnee" style="padding-left: 0px;">
                                            <option value="specialite_abandonnee" selected="">Spécialité abandonnée</option>
                                            <option value="arts">Spé Arts</option>
                                            <option value="bio_eco">Spé Bio-éco</option>
                                            <option value="hggsp">Spé HGGSP</option>
                                            <option value="hlp">Spé HLP</option>
                                            <option value="llcer">Spé LLCER</option>
                                            <option value="llca">Spé LLCA</option>
                                            <option value="mathematiques">Spé Mathématiques</option>
                                            <option value="nsi">Spé NSI</option>
                                            <option value="physique_chimie">Spé Physique-chimie</option>
                                            <option value="ses">Spé SES</option>
                                            <option value="si">Spé SI</option>
                                            <option value="svt">Spé SVT</option>
                                            <option value="eppcs">Spé EPPCS</option>
                                        </select>
                                    </td>
                                    <td id="coeff_specialite_abandonnee" class="coeff">5</td>
                                    <td><input class="note_visee" type="number" name="specialite_abandonnee" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Histoire-géographie</td>
                                    <td id="coeff_histoire_geographie_1" class="coeff">3</td>
                                    <td><input class="note_visee" type="number" name="histoire_geographie_1" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Langue vivante A</td>
                                    <td id="coeff_langue_vivante_a_1" class="coeff">3</td>
                                    <td><input class="note_visee" type="number" name="langue_vivante_a_1" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Langue vivante B</td>
                                    <td id="coeff_langue_vivante_b_1" class="coeff">3</td>
                                    <td><input class="note_visee" type="number" name="langue_vivante_b_1" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Enseignement scientifique</td>
                                    <td id="coeff_enseignement_scientifique_1" class="coeff">2.5</td>
                                    <td><input class="note_visee" type="number" name="enseignement_scientifique_1" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr id="ligne_moyenne_ou_moral">
                                    <td id="titre_moyenne_ou_moral">Moyenne générale <span class="nature_epreuve">(bulletins)</span></td>
                                    <td id="coeff_moyenne_ou_moral" class="coeff">5</td>
                                    <td><input class="note_visee" type="number" name="moyenne_ou_moral" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr id="ligne_epreuve_anticipe">
                                    <th>Epreuves anticipés</th>
                                    <th>Coeff.</th>
                                    <th style="width: 50px;">Note</th>
                                </tr>
                                <tr>
                                    <td>Français <span class="nature_epreuve">(écrit)</span></td>
                                    <td class="coeff">5</td>
                                    <td><input class="note_visee" type="number" name="francais_ecrit" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Français <span class="nature_epreuve">(oral)</span></td>
                                    <td class="coeff">5</td>
                                    <td><input class="note_visee" type="number" name="francais_oral" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <th>Contrôle continu - <span class="nature_epreuve">Terminale</span></th>
                                    <th>Coeff.</th>
                                    <th style="width: 50px;">Note</th>
                                </tr>
                                <tr>
                                    <td>Histoire-géographie</td>
                                    <td class="coeff">3</td>
                                    <td><input class="note_visee" type="number" name="histoire_geographie_2" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Langue vivante A</td>
                                    <td class="coeff">3</td>
                                    <td><input class="note_visee" type="number" name="langue_vivante_a_2" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Langue vivante B</td>
                                    <td class="coeff">3</td>
                                    <td><input class="note_visee" type="number" name="langue_vivante_b_2" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Enseignement scientifique</td>
                                    <td id="coeff_enseignement_scientifique_2" class="coeff">2.5</td>
                                    <td><input class="note_visee" type="number" name="enseignement_scientifique_2" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>EPS <span class="nature_epreuve">(CCF)</span></td>
                                    <td id="coeff_eps_ccf" class="coeff">5</td>
                                    <td><input class="note_visee" type="number" name="eps_ccf" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Enseignement moral et civique</td>
                                    <td class="coeff">1</td>
                                    <td><input class="note_visee" type="number" name="enseignement_moral_civique_2" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr id="ligne_epreuve_terminale">
                                    <th>Epreuves terminales</th>
                                    <th>Coeff.</th>
                                    <th style="width: 50px;">Note</th>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="choix_specialite_1" id="choix_specialite_1" style="padding-left: 0px;">
                                            <option value="specialite_1" selected="">Spécialité 1</option>
                                            <option value="arts">Spé Arts</option>
                                            <option value="bio_eco">Spé Bio-éco</option>
                                            <option value="hggsp">Spé HGGSP</option>
                                            <option value="hlp">Spé HLP</option>
                                            <option value="llcer">Spé LLCER</option>
                                            <option value="llca">Spé LLCA</option>
                                            <option value="mathematiques">Spé Mathématiques</option>
                                            <option value="nsi">Spé NSI</option>
                                            <option value="physique_chimie">Spé Physique-chimie</option>
                                            <option value="ses">Spé SES</option>
                                            <option value="si">Spé SI</option>
                                            <option value="svt">Spé SVT</option>
                                        </select>
                                    </td>
                                    <td class="coeff">16</td>
                                    <td><input class="note_visee" type="number" name="specialite_1" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="choix_specialite_2" id="choix_specialite_2" style="padding-left: 0px;">
                                            <option value="specialite_2" selected="">Spécialité 2</option>
                                            <option value="arts">Spé Arts</option>
                                            <option value="bio_eco">Spé Bio-éco</option>
                                            <option value="hggsp">Spé HGGSP</option>
                                            <option value="hlp">Spé HLP</option>
                                            <option value="llcer">Spé LLCER</option>
                                            <option value="llca">Spé LLCA</option>
                                            <option value="mathematiques">Spé Mathématiques</option>
                                            <option value="nsi">Spé NSI</option>
                                            <option value="physique_chimie">Spé Physique-chimie</option>
                                            <option value="ses">Spé SES</option>
                                            <option value="si">Spé SI</option>
                                            <option value="svt">Spé SVT</option>
                                        </select>
                                    </td>
                                    <td class="coeff">16</td>
                                    <td><input class="note_visee" type="number" name="specialite_2" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Philosophie</td>
                                    <td class="coeff">8</td>
                                    <td><input class="note_visee" type="number" name="eps" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Grand oral</td>
                                    <td class="coeff">10</td>
                                    <td><input class="note_visee" type="number" name="grand_oral" min="0" max="20" step="0.1"></td>
                                </tr>
                                </tbody></table>
                            <p></p>
                            <button type="submit" id="bouton-simulateur"><strong>Calculer ma note</strong></button>
                        </form>
                        <!-- /1006699/SDB_simulateur_mobile-bas_300x250 -->
                        <div id="div-gpt-ad-1440009016627-2" class="ads-by-dfp" style="width: 300px; margin: auto; margin-top: 10px;">
                        </div></div>


                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Cards Section ======= -->
    <section id="cards" class="cards">
        <div class="container">
        </div>
    </section><!-- End Cards Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container">

        </div>
    </section><!-- End Pricing Section -->

    <!-- ======= createur  ======= -->
    <section id="team" class="team">
        <div class="container">
            <div class="section-title">
                <h2>Createurs</h2>
                <p>Merci pour votre attention!</p>
            </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                <div class="member" style="margin-left: 110px">
                    <div class="member-img">
                        <img src="../../assets/img/pavloavatar.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="member-info">
                        <h4>Pavlo Romanenko</h4>
                        <span>Créateur </span>
                    </div>
                </div>
            </div>

                <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="../../assets/img/sorinavatar.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4>Sorin Pirgari</h4>
                            <span>Créateur </span>
                        </div>
                    </div>
                </div>
        </div>
            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact section-bg">
                <div class="container">
                    <div class="section-title">
                        <h2>Fin</h2>
                    </div>
                </div>
            </section>
        </div>
    </section>
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h4>&copy; 2023 Lycée Astier. All rights reserved.</h4>
            </div>
        </div>
    </div>
</footer><!-- End Footer -->
</body>
</html>