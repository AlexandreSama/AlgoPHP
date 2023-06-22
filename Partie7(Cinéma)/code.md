# Code PHP utilisé (avec Bootstrap pour le style):

## Personne : 

```php
    Class Personne{
        public string $nom;
        public string $prenom;
        public bool $sexe;
        public DateTime $date_naissance;

        public function __construct(string $nom, string $prenom, bool $sexe, string $date_naissance)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->sexe = $sexe;
            $this->date_naissance = new DateTime($date_naissance);
        }
    }
```

## Acteur : 

```php
    Class Acteur extends Personne{

        public array $films;
        public function __construct(string $nom, string $prenom, bool $sexe, string $date_naissance)
        {
            parent::__construct($nom, $prenom, $sexe, $date_naissance);
            $this->films = [];
        }

        /**
         * This function adds a film object to an actor's list of films.
         * 
         * @param Film film The parameter "film" is an instance of the "Film" class, which represents a movie
         * or a film. The "addFilmToActor" function adds this film to an array of films associated with an
         * actor.
         */
        public function addFilmToActor(Film $film){
            $this->films[] = $film;
        }

        /**
         * This function displays a list of films in which a person has acted, along with their ratings.
         */
        public function showFilms(){
            echo "<h3>Films auquel " . $this->prenom . " " . $this->nom . " jouent : </h3>";
            echo "<div class='card' style='width: 24rem;'>";
            echo "<div class='card-body'>";
            foreach ($this->films as $value) {
                echo "<p class='card-text'>" . $value->titre . " / Notes : " . $value->note . "</p>";
            }
            echo " </div></div>";

        }

    }
```

## Film
```php
    Class Film{
        public string $titre;
        public DateTime $date_sortie;
        public int $duree;
        public float $note;
        public Realisateur $realisateur;
        public array $genre;
        public array $casting;

        public function __construct(string $titre, string $date_sortie, int $duree, float $note, Realisateur $realisateur, array $genres)
        {
            $this->titre = $titre;
            $this->date_sortie = new DateTime($date_sortie);
            $this->duree = $duree;
            $this->note = $note;
            $this->realisateur = $realisateur;
            $realisateur->addFilmToReal($this);
            foreach ($genres as $value) {
                $this->genre[] = $value;
                $value->addFilms($this);
            }
            $this->casting = [];
        }

        /**
         * The function displays the actors and their corresponding characters in a movie.
         */
        public function showActors(){
            echo "<h3>Acteurs du film " . $this->titre . " :</h3>";
            echo "<div class='card' style='width: 24rem;'>";
            echo "<div class='card-body'>";
            foreach ($this->casting as $key => $value) {
                echo "Personnage : <br>";
                echo "<p class='card-text'>" . $value . '</p>';
                echo "Acteur : <br>";
                echo "<p class='card-text'>" . $key . '</p>';
            }
            echo " </div></div>";
        }

    }
```
## Genre

```php
    Class Genre{
        public string $nom;
        public array $films;

        public function __construct(string $nom)
        {
            $this->nom = $nom;
            $this->films = [];
        }

        /**
         * This function adds a Film object to an array of films.
         * 
         * @param Film film The parameter is an instance of the `Film` class. The `addFilms` function
         * adds this instance to an array of films called.
         */
        public function addFilms(Film $film){
            $this->films[] = $film;
        }

        /**
         * This function displays a list of films by genre with their titles and ratings.
         */
        public function showFilmsByGenre(){
            echo "<h3>Films dans le genre " . $this->nom . " : </h3>";
            echo "<div class='card' style='width: 24rem;'>";
            echo "<div class='card-body'>";
            foreach ($this->films as $value) {
                echo "<p class='card-text'>" . $value->titre . " / Notes : " . $value->note . "</p>";
            }
            echo " </div></div>";
        }

        /**
         * The function displays actors who have played a specific role in a list of films.
         * 
         * @param string role A string representing the role for which we want to find actors who have played
         * that role.
         */
        public function showActorsWithSameRole(string $role){
            echo "<h3>Acteurs ayant joué le role de $role : </h3>";
            echo "<div class='card' style='width: 24rem;'>";
            echo "<div class='card-body'>";
            foreach ($this->films as $value) {
                foreach ($value->casting as $key => $value) {
                    echo "Acteur : <br>";
                    echo "<p class='card-text'>" . $key . '</p>';
                }
            }
            echo " </div></div>";
        }
    }
```

## Realisateur

```php
    Class Realisateur extends Personne{

        public array $films;

        public function __construct(string $nom, string $prenom, bool $sexe, string $date_naissance)
        {
            parent::__construct($nom, $prenom, $sexe, $date_naissance);
        }

        /**
         * This function adds a Film object to an array of films in a Real object.
         * 
         * @param Film film The parameter "film" is an object of the class "Film". The function "addFilmToReal"
         * adds this object to an array called "films" which is a property of the current object.
         */
        public function addFilmToReal(Film $film){
            $this->films[] = $film;
        }

        /**
         * The function displays the films of a director with their titles and ratings.
         */
        public function showFilms(){
            echo "<h3>Films du réalisateur " . $this->prenom . " " . $this->nom . " :</h3>";
            echo "<div class='card' style='width: 24rem;'>";
            echo "<div class='card-body'>";
            foreach ($this->films as $value) {
                echo "<p class='card-text'>" . $value->titre . " / Note : " . $value->note . "</p>";
            }
            echo " </div></div>";
        }
    }
```

## Role

```php
    Class Role{
        public string $nom_personnage;

        public function __construct(string $nom_personnage, Film $film, Acteur $acteur)
        {
            $this->nom_personnage = $nom_personnage;
            $acteur->addFilmToActor($film);
            $film->casting += [$acteur->prenom . " " . $acteur->nom => $nom_personnage];
        }
    }
```

## Index
```php
        require './Personne.php';
        require './Acteur.php';
        require './Realisateur.php';
        require './Film.php';
        require './Genre.php';
        require './Role.php';

        //On créer les Réalisateurs
        $realisateur1 = new Realisateur('Wright', 'Edgar', 0, '18-04-1974');
        $realisateur2 = new Realisateur('Christopher', 'Nolan', 0, '30-07-1970');
        $realisateur3 = new Realisateur('Snyder', 'Zack', 0, '01-03-1966');

        //On créer les Acteurs
        $acteur1 = new Acteur('Pegg', 'Simon', 0, '14-02-1970');
        $acteur2 = new Acteur('Frost', 'Nick', 0, '28-03-1972');
        $acteur3 = new Acteur('Bale', 'Christian', 0, '30-01-1974');
        $acteur4 = new Acteur('Affleck', 'Ben', 0, '15-08-1972');

        //On créer les Genres
        $genre1 = new Genre('Comédie Horrifique');
        $genre2 = new Genre('Comédie');
        $genre3 = new Genre('SF');
        $genre4 = new Genre('Action');

        //On créer les Films
        $film1 = new Film('Le Dernier Pub avant la fin du monde', '28-08-2013', 109, 3.4, $realisateur1, [$genre1]);
        $film2 = new Film('Shaun of the Dead', '27-07-2005', 95, 4, $realisateur1, [$genre2, $genre3]);
        $film3 = new Film('Batman Begins', '15-06-2005', 140, 4.1, $realisateur2, [$genre4]);
        $film4 = new Film("Zack Snyder's Justice League", '18-03-2021', 242, 4.2, $realisateur3, [$genre4]);

        //On créer les Roles
        $role1 = new Role('Gary King', $film1, $acteur1);
        $role2 = new Role('Andy Knightley', $film1, $acteur2);
        $role3 = new Role('Shaun', $film2, $acteur1);
        $role4 = new Role('Ed', $film2, $acteur2);
        $role5 = new Role('Batman', $film3, $acteur3);
        $role6 = new Role('Batman', $film4, $acteur4);

        //On affiche les films que le réalisateur a réalisé
        $realisateur1->showFilms();

        //On affiche les acteurs ayant joué dans ce film
        $film1->showActors();

        //On affiche les films dans lesquels l'acteur a joué
        $acteur1->showFilms();

        //On affiche les films d'un genre spécifique
        $genre4->showFilmsByGenre();
        
        //On affiche les acteurs ayant joué le même rôle
        $genre4->showActorsWithSameRole('Batman');
```
