<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Football</title>
</head>
<body>
    <?php
        require './Club.php';
        require './Joueur.php';
        require './Pays.php';
        require './Nationalite.php';

        //On crée les nationalités
        $française = new Nationalite('Française');
        $espagnol = new Nationalite('Espagnol');
        $anglaise = new Nationalite('Anglaise');
        $italienne = new Nationalite('Italienne');

        //On créer les Pays
        $france = new Pays('France', $française);
        $espagne = new Pays('Espagne', $espagnol);
        $angleterre = new Pays('Angleterre', $anglaise);
        $italie = new Pays('Italie', $italienne);

        //On créer les clubs
        $psg = new Club('PSG', '12-08-1970', $france);
        $rcs = new Club('RCS', '12-08-1906', $france);
        $fc = new Club('FC Barcelone', '29-11-1899', $espagne);
        $rm = new Club('Real Madrid', '06-03-1902', $espagne);
        $mu = new Club('Manchester United', '01-01-1878', $angleterre);
        $juv = new Club('Juventus', '01-11-1897', $italie);

        //On créer les joueurs
        $joueur1 = new Joueur('Messi', 'Lionel', '24-06-1987', $espagnol);
        $joueur2 = new Joueur('Mbappe', 'Killian', '20-12-1998', $française);
        $joueur3 = new Joueur('Ronaldo', 'Christiano', '05-02-1985', $espagnol);
        $joueur4 = new Joueur('Junior', 'Neymar', '05-02-1992', $italienne);


        $psg->addJoueur($joueur1, '01-01-2017');
        $psg->addJoueur($joueur4, '01-01-2021');
        $fc->addJoueur($joueur1, '01-01-2004');
        $fc->addJoueur($joueur4, '01-01-2013');
        $psg->addJoueur($joueur2, '01-01-2017');
        $juv->addJoueur($joueur3, '01-01-2018');


        echo "Clubs de football : <br>";
        echo "<div class='row'>";
        $france->showClubs();
        $espagne->showClubs();
        $angleterre->showClubs();
        $italie->showClubs() . "<br>";
        echo "</div>";

        echo "Joueurs des équipes : <br>";
        echo "<div class='row'>";
        $psg->showJoueurs();
        $rcs->showJoueurs();
        $fc->showJoueurs();
        $rm->showJoueurs();
        $mu->showJoueurs();
        $juv->showJoueurs();
        echo "</div>";

        echo "Equipes du joueur : <br>";
        echo "<div class='row'>";
        $joueur1->showClubs();
        $joueur2->showClubs();
        $joueur3->showClubs();
        $joueur4->showClubs();
        echo "</div>";
    ?>
</body>
</html>