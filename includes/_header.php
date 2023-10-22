<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annuaire NWS</title>

    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <header>
        <div class="logo">
            AnnuaireNWS
        </div>

        <!-- Le menu burger -->
        <div class="menu-burger">
            <div class="burger-button">
                <span class="burger-top"></span>
                <span class="burger-middle"></span>
                <span class="burger-bottom"></span>
            </div>
            <div class="burger-menu">
                <div class="nav-burger">
                    <ul>
                        <li><a href="/annuaire-php">Accueil</a></li>
                        <li><a href="/annuaire-php/listeEleve.php">Liste des élèves</a></li>
                    </ul>
                </div>
                <div class="btnSignIn">
                    <button>
                        <a class="btn-1" href="/annuaire-php/inscription.php">Inscription</a>
                    </button>
                </div>
            </div>
        </div>

        <div class="containerMenuOrdi">
            <nav>
                <ul>
                    <li><a href="/annuaire-php">Accueil</a></li>
                    <li><a href="/annuaire-php/listeEleve.php">Liste des élèves</a></li>
                </ul>
            </nav>
            <div class="btnSignIn">
                <button>
                    <a class="btn-1" href="/annuaire-php/inscription.php">Inscription</a>
                </button>
            </div>
        </div>
    </header>
    <main>
        <?php
