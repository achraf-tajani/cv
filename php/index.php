<?php include './cnx.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>CV</title>
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <link href="../assets/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">Clarence Taylor</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="https://www.pavilionweb.com/wp-content/uploads/2017/03/man-300x300.png" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">À propos de</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Expérience</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#Formation">Formation</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">compétences</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">Intérêts</a></li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid p-0">
        <!-- À propos de -->
        <?php
        // get info Profile
        $profile = $bdd->prepare("SELECT * FROM db_cv.profile");
        $profile->execute();
        $result = $profile->fetch(PDO::FETCH_OBJ);
        $idProfile =  $result->id;
        $nom =  $result->nom;
        $prenom =  $result->prenom;
        $email =  $result->email;
        $address =  $result->address;
        $tel =  $result->tel;
        $profile_text =  $result->profile_text;
        $interet =  $result->interet;
        ?>
        <section class="resume-section" id="about">
            <div class="resume-section-content">
                <h1 class="mb-0">
                    <?= $nom ?>
                    <span class="text-primary"> <?= $prenom ?></span>
                </h1>
                <div class="subheading mb-5">
                    <?= $address ?> · (33) <?= $tel ?> ·
                    <a href="mailto:name@email.com"> <?= $email ?></a>
                </div>
                <p class="lead mb-5">

                    <?= $profile_text ?>
                </p>
                <div class="social-icons">
                    <a class="social-icon" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="social-icon" href="#"><i class="fab fa-github"></i></a>
                    <a class="social-icon" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="social-icon" href="#"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Expérience-->
        <?php
        // get info Expérience
        $assoExpr = $bdd->prepare("SELECT * FROM asso_expr_profile  WHERE id_profile = " . $idProfile);
        $assoExpr->execute();
        $experiences = new ArrayObject();
        while ($row = $assoExpr->fetch(PDO::FETCH_OBJ)) {
            $experience = $bdd->prepare("SELECT * FROM experience  WHERE id = " . $row->id_exp);
            $experience->execute();
            $resultExp = $experience->fetch(PDO::FETCH_OBJ);
            $experiences->append($resultExp);
        }
        //
        ?>
        <section class="resume-section" id="experience">
            <div class="resume-section-content">
                <h2 class="mb-5">Expérience</h2>
                <?php
                foreach ($experiences as $ex) {
                ?>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0"><?= $ex->poste_name ?></h3>
                            <div class="subheading mb-3"><?= $ex->entreprise ?></div>
                            <p><?= $ex->desc ?></p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"><?= $ex->duree ?></span></div>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Formation-->
        <?php
        // get info Formation
        $assoformation = $bdd->prepare("SELECT * FROM asso_formation_profile  WHERE id_profile = " . $idProfile);
        $assoformation->execute();
        $formations = new ArrayObject();
        while ($row = $assoformation->fetch(PDO::FETCH_OBJ)) {
            $formation = $bdd->prepare("SELECT * FROM formation WHERE id = " . $row->id_formation);
            $formation->execute();
            $resultFormation = $formation->fetch(PDO::FETCH_OBJ);
            $formations->append($resultFormation);
        }
        //
        ?>
        <section class="resume-section" id="Formation">
            <div class="resume-section-content">
                <h2 class="mb-5">Formation</h2>
                <?php
                foreach ($formations as $formation) {
                ?>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0"><?= $formation->ecole ?></h3>
                            <div class="subheading mb-3"><?= $formation->diplome ?></div>
                            <?= $formation->module ?>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"><?= $formation->duree ?></span></div>
                    </div>
                <?php
                }
                ?>

            </div>
        </section>
        <hr class="m-0" />
        <!-- compétences-->
        <section class="resume-section" id="skills">
            <div class="resume-section-content">
                <h2 class="mb-5">compétences</h2>
                <div class="subheading mb-3">Programming Languages & Tools</div>
                <ul class="dev-icons">
                    <li class="list-inline-item"><i class="fab fa-html5"></i></li>
                    <li class="list-inline-item"><i class="fab fa-css3-alt"></i></li>
                    <li class="list-inline-item"><i class="fab fa-js-square"></i></li>
                    <li class="list-inline-item"><i class="fab fa-angular"></i></li>
                    <li class="list-inline-item"><i class="fab fa-react"></i></li>
                    <li class="list-inline-item"><i class="fab fa-node-js"></i></li>
                    <li class="list-inline-item"><i class="fab fa-sass"></i></li>
                    <li class="list-inline-item"><i class="fab fa-less"></i></li>
                    <li class="list-inline-item"><i class="fab fa-wordpress"></i></li>
                    <li class="list-inline-item"><i class="fab fa-gulp"></i></li>
                    <li class="list-inline-item"><i class="fab fa-grunt"></i></li>
                    <li class="list-inline-item"><i class="fab fa-npm"></i></li>
                </ul>
                <div class="subheading mb-3">Workflow</div>
                <ul class="fa-ul mb-0">
                    <li>
                        <span class="fa-li"><i class="fas fa-check"></i></span>
                        Responsive Design
                    </li>
                    <li>
                        <span class="fa-li"><i class="fas fa-check"></i></span>
                        Tests et débogage entre navigateurs
                    </li>
                    <li>
                        <span class="fa-li"><i class="fas fa-check"></i></span>
                        Équipes interfonctionnelles
                    </li>
                    <li>
                        <span class="fa-li"><i class="fas fa-check"></i></span>
                        Développement Agile et Scrum
                    </li>
                </ul>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Intérêts -->
        <section class="resume-section" id="interests">
            <div class="resume-section-content">
                <h2 class="mb-5">Intérêts</h2>
                <p> <?= $interet; ?></p>
            </div>
        </section>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>

</html>