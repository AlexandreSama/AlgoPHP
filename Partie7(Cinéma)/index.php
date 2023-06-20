<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinéma</title>
</head>
<body>
    
    <?php
        require './Personne.php';
        require './Acteur.php';
        require './Realisateur.php';
        require './Film.php';
        require './Genre.php';
        require './Role.php';

        $realisateur1 = new Realisateur('Wright', 'Edgar', 0, '18-04-1974');
        $realisateur2 = new Realisateur('Christopher', 'Nolan', 0, '30-07-1970');
        $realisateur3 = new Realisateur('Snyder', 'Zack', 0, '01-03-1966');

        $acteur1 = new Acteur('Pegg', 'Simon', 0, '14-02-1970');
        $acteur2 = new Acteur('Frost', 'Nick', 0, '28-03-1972');
        $acteur3 = new Acteur('Bale', 'Christian', 0, '30-01-1974');
        $acteur4 = new Acteur('Affleck', 'Ben', 0, '15-08-1972');

        $genre1 = new Genre('Comédie Horrifique');
        $genre2 = new Genre('Comédie');
        $genre3 = new Genre('SF');
        $genre4 = new Genre('Action');

        $film1 = new Film('Le Dernier Pub avant la fin du monde', '28-08-2013', 109, 3.4, $realisateur1, [$genre1]);
        $film2 = new Film('Shaun of the Dead', '27-07-2005', 95, 4, $realisateur1, [$genre2, $genre3]);
        $film3 = new Film('Batman Begins', '15-06-2005', 140, 4.1, $realisateur2, [$genre4]);
        $film4 = new Film("Zack Snyder's Justice League", '18-03-2021', 242, 4.2, $realisateur3, [$genre4]);

        $role1 = new Role('Gary King', $film1, $acteur1);
        $role2 = new Role('Andy Knightley', $film1, $acteur2);
        $role3 = new Role('Shaun', $film2, $acteur1);
        $role4 = new Role('Ed', $film2, $acteur2);
        $role5 = new Role('Batman', $film3, $acteur3);
        $role6 = new Role('Batman', $film4, $acteur4);

        $realisateur1->showFilms();

        $film1->showActors();

        $acteur1->showFilms();

        $genre4->showFilmsByGenre();
        
        $genre4->showActorsWithSameRole('Batman');
    ?>
</body>
</html>