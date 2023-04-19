

<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-tofit=no" />
    <title>Ehpad Discount</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= WEBROOT ?>asset/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrapicons@1.10.3/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="<?= WEBROOT ?>asset/js/script.js"></script>
</head>
<body>
    <div class="container-fluid" id="top">
        <header class="row" style="background-color:black;color:white;border-bottom:2px solid white;" height="30px">
            <div id="logo" style="background-color:orange" class="col-md-3 textcenter d-none d-md-block">
                <nav class="navbar navbar-expand-md" style="font-size: 30px;">
                    <div class="navbar-nav">
                        <span class="nav-item">
                            <p>
                                <a class="nav-link" style="display:inline" href="<?=
                                WEBROOT ?>Accueil"><i class="bi bi-activity"></i>
                                Ehpad <i>Discount</i></a>
                            </p>
                        </span>
                    </div>
                </nav>
            </div>
            <div id="navigation" class="col-md-9 col-12 col-sm-12 text-uppercase text-justify">
                <nav class="navbar navbar-expand-md">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="<?= URL ?>acceuil">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= URL ?>services">Service</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= URL ?>connexion">Connexion</a></li>
                        <li class="nav-item" style="display:flex"><a class="nav-link" href="<?= URL ?>panier">Panier</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= URL ?>contacter">Contact</a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link" href="#">
                            <form style="max-width: 100%;font-size: inherit;" method="POST" action="<?= URL ?>">
                                <input type="text" style="width: 120px;max-width: 100%;font-size: inherit; -moz-box-sizing: content-box;
                                -webkit-box-sizing: content-box; box-sizing: content-box;  border: 0px solid #fff;" name="n_cherche">
                                <button type="submit"> <i class=" bi bi-search"></i></button>
                            </form>
                        </a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="row" style="background-image: url('<?= WEBROOT ?>asset/img/paysage.jpg'); background-repeat: no-repeat;background-size : cover;background-position-x: center;background-position-y:center;border-bottom: 2px solid white">   
            <div id="image" class="col text-center d-none d-md-block" style="padding: 50px 0px 10px 0px;position:relative" width="100%">
                <img id="service" src="<?= WEBROOT ?>asset/img/ehpad_presentation.jpg" alt="les services de l'ehpad" with="640px" height="427" style="border-radius:10px;border:10px solid rgb(232, 231, 239)">
                <span style="bottom:40%;left:40%;position:absolute;color:black;fontsize: 25px;text-shadow: 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white;"> Bienvenue à l'ehpad <i>Discount</i></span>
                <p style="color: rgb(43, 39, 72);font-size: 20px;text-shadow: 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white, 0 0 2px white;"">
                <i class=" bi bi-circle"></i>   
                <i class="bi bicircle"></i> 
                <i class="bi bi-circle"></i> 
                <i class="bi bi-circle"></i> 
                <i class="bi bi-circle"></i></p>
            </div>
        </div>
        
        <script>
            const tab = [
            {
                image: "ehpad_motricite.jpg",
                texte: "conserver la motricité"
            },
            {
                image: "ehpad_illectronisme.jpg",
                texte: "lutter contre l'illectronisme"
            },
            {
                image: "ehpad_memoire.jpg",
                texte: "travailler la mémoire"
            },
            {
                image: "ehpad_sortie.jpg",
                texte: "sortir en groupe"
            },
            {
                image: "ehpad_plateau_repas.jpg",
                texte: "les plateaux repas"
            }
            ];

            let i = 0;

            function carrousel() {
                i = i % tab.length;
                const image = document.querySelector("#image > img");
                const span = document.querySelector("#image > span");
                const circles = document.querySelectorAll("#image > p > i");
                
                image.setAttribute("src", "<?= WEBROOT?>asset/img/" + tab[i].image);
                image.style.filter = "blur(4px)";
                
                setTimeout(() => {
                    image.style.filter = "blur(0px)";
                }, 100);
                
                setTimeout(() => {
                    image.style.filter = "blur(4px)";
                }, 4900);
                
                span.innerHTML = tab[i].texte;
                
                for (let j = 0; j < circles.length; j++) {
                    if (i === j) {
                        circles[j].className = "bi bi-circle-fill";
                    } else {
                        circles[j].className = "bi bi-circle";
                    }
                }
                
                i++;
            }

            const interval = setInterval(carrousel, 5000);

        </script>

        <div id="main" class="row" style="background-color: rgb(247, 247, 251);border-bottom: 2px solid white;padding: 20px;">
            <!-- Insertion de la vue -->
            <?php
                echo $content_for_layout;
                
            ?>
        </div>
        <div id="message"></div>
            <footer class="row" style="background-color: rgb(39, 39, 42);color:white;padding: 15px;border-bottom: 2px solid white;">
                <div id="footer-direct" class="col-md-1 text-center d-none d-md-block" style="border-right: 1px solid orange;font-size: 30px;">
                    <p><a href="#top"><i class="bi bi-chevron-bar-up"></i></a></p>
                </div>
                <div id="footer-type" class="col-md-9 col-12 col-sm-12 d-none d-md-block"
                    style=" column-count: 4;">
                    <p><a href="<?= URL ?>accueil">accueil</a></p>
                    <p><a href="<?= URL ?>politique">politique de sécurité</a></p>
                    <p><a href="<?= URL ?>connexion">connexion</a></p>
                    <p><a href="<?= URL ?>panier">panier</a></p>
                    <p><a href="<?= URL ?>contacter">contact</a></p>
                    <p><a href="<?= URL ?>apropos">à propos</a></p>
                    <p><a href="<?= URL ?>paiement">paiement sécurisé</a></p>
                    <p><a href="<?= URL ?>services">service</a></p>
                    <!-- A compléter : insérer tous les catégories de services de l'ehpad -->
                </div>
                <div id="footer-contact" class="col-md-2 col-12 col-sm-12 d-none d-mdblock" style="border-left: 1px solid orange;position: relative;">
                    <p style="position:absolute;bottom:0px">
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    </p>
                </div>
                <div id="footer-contact" class="col-12 text-center">
                    <br>
                    <p>
                        Ehpad Discount - 7, rue des archives<br>
                        53 000 Laval<br>
                        <i class="bi bi-telephone"></i> : 02 43 99 99 99 - <i class="bi bi-mailbox"></i> :
                        contact@ehpaddiscount.fr<br>
                        Copyright © France
                    </p>
                    <p class="d-block d-md-none">
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                    </p>
                </div>
            </footer>
        </div>
    </body>
</html>