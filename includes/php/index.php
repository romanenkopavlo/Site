<?php include "average.php" ?>

<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>BAC calculation</title>
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
            <h1 class="text-light"><a href="index.php"><span>BAC 2023</span></a></h1>
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
                            <h2 class="animate__animated animate__fadeInDown">Welcome! You can calculate your BAC grade</h2>
                            <p class="animate__animated animate__fadeInUp">Click here to calculate</p>
                            <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Click here</a>
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
                <p>How does it work?</p>
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
                        echo "<h2 id = 'average'>The subject number: $subjects</h2>";
                        echo "<br><h2 id = 'average'>Your overall average: $average_grade</h2><br>";
                        if ($average_grade < 8) {
                            echo "<h3>You do not get the BAC diploma, and you do not have the opportunity to retake the exam.</h3>";
                        } elseif ($average_grade < 10) {
                            echo "<h3>You do not get the BAC diploma but everything is not lost, you can retake the exam.</h3>";
                        } elseif ($average_grade < 12) {
                            echo "<h3>You are admitted!<br>You get the diploma of the BAC <strong>without mention.</strong></h3>";
                        } elseif ($average_grade < 14) {
                            echo "<h3>You are admitted!<br>You get the diploma of the BAC with <strong>mention quite well.</strong></h3>";
                        } elseif ($average_grade < 16) {
                            echo "<h3>You are admitted!<br>You get the diploma of the BAC with <strong>good mention.</strong></h3>";
                        } elseif ($average_grade < 18) {
                            echo "<h3>You are admitted!<br>You get the diploma of the BAC with <strong>honorable mention.</strong></h3>";
                        } else {
                            echo "<h3>You are admitted!<br>You get the diploma of the BAC with the rare <strong>congratulations of the jury.</strong></h3>";
                        }
                        echo '<script>window.location = "#ligne_epreuve_anticipe";</script>';
                    }
                    ?>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                    <h3>To calculate your BAC grade, you need to enter the average grade for each of the following items, and then click on "Calculate my grade". The empty value will be calculated as 0. The image on the left summarizes the coefficient of the BAC 2024.</h3>
                    <div id="colonne-gauche-simulateur">
                        <form method="post" id="formulaire_simulateur" action="index.php" name="formulaire_simulateur">
                            <br>
                            <table id="tab-simulateur-notes">
                                <tbody><tr>
                                    <th id="premiere-colonne">Continuous control - <span class="nature_epreuve">First</span></th>
                                    <th>Coeff.</th>
                                    <th style="width: 50px;">Grade</th>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="choix_specialite_abandonnee" id="choix_specialite_abandonnee" style="padding-left: 0px;">
                                            <option value="specialite_abandonnee" selected="">Abandoned specialty</option>
                                            <option value="arts">Arts</option>
                                            <option value="bio_eco">Bio-eco</option>
                                            <option value="hggsp">HGGSP</option>
                                            <option value="hlp">HLP</option>
                                            <option value="llcer">LLCER</option>
                                            <option value="llca">LLCA</option>
                                            <option value="mathematiques">Math</option>
                                            <option value="nsi">NSI</option>
                                            <option value="physique_chimie">Physics-chemistry</option>
                                            <option value="ses">SES</option>
                                            <option value="si">SI</option>
                                            <option value="svt">SVT</option>
                                            <option value="eppcs">EPPCS</option>
                                        </select>
                                    </td>
                                    <td id="coeff_specialite_abandonnee" class="coeff">5</td>
                                    <td><input class="note_visee" type="number" name="specialite_abandonnee" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>History-geography</td>
                                    <td id="coeff_histoire_geographie_1" class="coeff">3</td>
                                    <td><input class="note_visee" type="number" name="histoire_geographie_1" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Living language A</td>
                                    <td id="coeff_langue_vivante_a_1" class="coeff">3</td>
                                    <td><input class="note_visee" type="number" name="langue_vivante_a_1" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Living language B</td>
                                    <td id="coeff_langue_vivante_b_1" class="coeff">3</td>
                                    <td><input class="note_visee" type="number" name="langue_vivante_b_1" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Science education</td>
                                    <td id="coeff_enseignement_scientifique_1" class="coeff">2.5</td>
                                    <td><input class="note_visee" type="number" name="enseignement_scientifique_1" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr id="ligne_moyenne_ou_moral">
                                    <td id="titre_moyenne_ou_moral">Civic and moral education<span class="nature_epreuve"></span></td>
                                    <td id="coeff_moyenne_ou_moral" class="coeff">5</td>
                                    <td><input class="note_visee" type="number" name="moyenne_ou_moral" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr id="ligne_epreuve_anticipe">
                                    <th>Early tests</th>
                                    <th>Coeff.</th>
                                    <th style="width: 50px;">Grade</th>
                                </tr>
                                <tr>
                                    <td>French <span class="nature_epreuve">(writing)</span></td>
                                    <td class="coeff">5</td>
                                    <td><input class="note_visee" type="number" name="francais_ecrit" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>French <span class="nature_epreuve">(oral)</span></td>
                                    <td class="coeff">5</td>
                                    <td><input class="note_visee" type="number" name="francais_oral" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <th>Continuous control - <span class="nature_epreuve">Terminal</span></th>
                                    <th>Coeff.</th>
                                    <th style="width: 50px;">Grade</th>
                                </tr>
                                <tr>
                                    <td>History-geography</td>
                                    <td class="coeff">3</td>
                                    <td><input class="note_visee" type="number" name="histoire_geographie_2" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Living language A</td>
                                    <td class="coeff">3</td>
                                    <td><input class="note_visee" type="number" name="langue_vivante_a_2" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Living language B</td>
                                    <td class="coeff">3</td>
                                    <td><input class="note_visee" type="number" name="langue_vivante_b_2" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Science education</td>
                                    <td id="coeff_enseignement_scientifique_2" class="coeff">2.5</td>
                                    <td><input class="note_visee" type="number" name="enseignement_scientifique_2" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>EPS <span class="nature_epreuve">(CCF)</span></td>
                                    <td id="coeff_eps_ccf" class="coeff">5</td>
                                    <td><input class="note_visee" type="number" name="eps_ccf" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Civic and moral education</td>
                                    <td class="coeff">1</td>
                                    <td><input class="note_visee" type="number" name="enseignement_moral_civique_2" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr id="ligne_epreuve_terminale">
                                    <th>Final examinations</th>
                                    <th>Coeff.</th>
                                    <th style="width: 50px;">Grade</th>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="choix_specialite_1" id="choix_specialite_1" style="padding-left: 0px;">
                                            <option value="specialite_1" selected="">Specialty 1</option>
                                            <option value="arts">Arts</option>
                                            <option value="bio_eco">Bio-eco</option>
                                            <option value="hggsp">HGGSP</option>
                                            <option value="hlp">HLP</option>
                                            <option value="llcer">LLCER</option>
                                            <option value="llca">LLCA</option>
                                            <option value="mathematiques">Math</option>
                                            <option value="nsi">NSI</option>
                                            <option value="physique_chimie">Physics-chemistry</option>
                                            <option value="ses">SES</option>
                                            <option value="si">SI</option>
                                            <option value="svt">SVT</option>
                                        </select>
                                    </td>
                                    <td class="coeff">16</td>
                                    <td><input class="note_visee" type="number" name="specialite_1" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="choix_specialite_2" id="choix_specialite_2" style="padding-left: 0px;">
                                            <option value="specialite_2" selected="">Speciality 2</option>
                                            <option value="arts">Arts</option>
                                            <option value="bio_eco">Bio-eco</option>
                                            <option value="hggsp">HGGSP</option>
                                            <option value="hlp">HLP</option>
                                            <option value="llcer">LLCER</option>
                                            <option value="llca">LLCA</option>
                                            <option value="mathematiques">Math</option>
                                            <option value="nsi">NSI</option>
                                            <option value="physique_chimie">Physics-chemistry</option>
                                            <option value="ses">SES</option>
                                            <option value="si">SI</option>
                                            <option value="svt">SVT</option>
                                        </select>
                                    </td>
                                    <td class="coeff">16</td>
                                    <td><input class="note_visee" type="number" name="specialite_2" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Philosophy</td>
                                    <td class="coeff">8</td>
                                    <td><input class="note_visee" type="number" name="eps" min="0" max="20" step="0.1"></td>
                                </tr>
                                <tr>
                                    <td>Big oral</td>
                                    <td class="coeff">10</td>
                                    <td><input class="note_visee" type="number" name="grand_oral" min="0" max="20" step="0.1"></td>
                                </tr>
                                </tbody></table>
                            <p></p>
                            <button type="submit" id="bouton-simulateur"><strong>Calculate my grade</strong></button>
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
                <h2>DEVELOPERS</h2>
                <p>Thank you for your attention!</p>
            </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                <div class="member" style="margin-left: 110px">
                    <div class="member-img">
                        <img src="../../assets/img/pavloavatar.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="member-info">
                        <h4>Pavlo Romanenko</h4>
                        <span>Developer </span>
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
                            <span>Developer </span>
                        </div>
                    </div>
                </div>
        </div>
            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact section-bg">
                <div class="container">
                    <div class="section-title">
                        <h2>The End</h2>
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