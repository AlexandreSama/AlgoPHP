**Général :**

1) Il faut un serveur Apache et un serveur MySQL. Pour cela, on peut utiliser Laragon ou Xamp

2) un algorithme est un ensemble de règles permettant de faire des calculs ou de suivre 
des conditions précises

3) Une variable associe un nom a une valeur. En PHP, une variable est préfixé du signe $

4) La portée d'une variable signifie jusqu'a ou une variable peut être lu dans notre code

5) Une constante est une variable qui a une valeur fixe, inchangé comparé a une variable 
classique qui change de valeur.

6) Les superglobales sont des variables que l'ont peut utiliser a n'importe quel moment 
dans notre code. Il en existe 9. On peut utiliser la superglobal $_POST lors d'une inscription
et $_GET pour récupérer des informations depuis le serveur Web. Il y a aussi le $_SESSION 
pour garder en mémoire des informations d'un utilisateur.

7) boolean ($test = true;), char ($test = 'blabla';), 
byte / short / int / long ($test = 654864165;), float / double ($test = 45.32586;)

8) Oui, il existe aussi le tableau associatifs et les tableaux multidimensionnels

9) if, switch, ternaire, for, foreach, while, do... while

10) on utilise strlen()

11) Une session est une façon de stocker des données de différents utilisateurs. On démarre
une session avec session_start. On peut s'en servir pour rester connecter a un striped

12) Un cookie est un petit fichier texte permettant de sauvegarder de petites données.

13) Require veut dire que le fichier est nécessaire pour le code suivant, alors que Include
veut dire que le fichier est inclus dans le code.

14) grace a header("location:index.php")

15) La partie Front-End signifie le design du site, son ergonomie et tout ce qui touche 
directement l'utilisateur. Le Back-End signifie toute la partie technique que l'utilisateur
ne vois pas.

16) Le contrôle de version permet de sauvegarder un projet a différentes étapes de 
développement. Git est un programme permettant de faire un contrôle de version plus simplement

17) CMS veut dire Content Management System, c'est un logiciel permettant de créer, 
gérer et modifier son site web facilement. On peut citer Wordpress ou Joomla

**Front-End :**

1) HTML signifie 'HyperText Markup Langage' => 'Langage de balises pour l'hypertexte', 
c'est ce qu'on utilise pour créer et représenter le contenu d'une page web

2) CSS signifie 'Cascade StyleSheet' => 'Feuille de Style en Cascade'. On l'utilise 
pour donner une forme a notre page web.

3) Javascript est un langage permettant de rendre une page web interactive graçe a 
des scripts

4) JSON est un format de données. On l'utilise lorsque l'on veut stocker de larges 
quantités de données structurés

5) Oui, graçe a un framework nommée NodeJS.

6) Un sélecteur permet de récupérer un élement spécifique de la page web (. pour une classe 
et # pour un id)

7) on utilise la balise <a href='#'>

8) Une requête Ajax permet d'effectuer une requête entre le côté client et le côté 
serveur et de modifier la page web sans l'actualiser

9) . / #

10) Le responsive design signifie que la page web a été créer pour supporter n'importe 
quel format d'écran

11) 

12) une fonction anonyme est une fonction sans nom

13) On utilise la méthode push()

14) Un media query sert a 

15)

16) Bootstrap est un framework CSS. On peut citer Tailwind ou encore Materialize

17) On peut donner la méthode GET ou la méthode POST. GET permet de récupérer des 
informations depuis le serveur alors que POST permet d'envoyer les informations rentrés 
dans le formulaire


**UX/UI :**

1) UX veut dire 'Expérience Utilisateur' et UI veut dire 'Interface Utilisateur'.
L'UI va se consacrer a l'ergonomie et a la facilité de compréhension du site alors que l'UX

2) 

3)

4)

5)

6)

7)

8) Mobile Fist Design veut dire que l'on créer le site web pour un format 
d'écran correspondant aux smartphones avant d'avoir une version bureau


**POO :**

1) La POO est une autre façon d'imaginer, de construire et d'organiser son code.

2) Une classe est la structure d'un objet. On l'a déclare en créeant un fichier php et 
en indiquant des le début de page 'class Test'

3) Un objet est une représentation d'une chose a laquel on associe des propriétés et 
des actions

4) Une propriété est une information de l'objet, un attribut et une méthode permet de 
modifier / supprimer/ crée une propriété

5) La visibilité veut dire qu'elle soit accessible ou non. 
On utilise Public, Private ou Protected

6) On utilise $test = new Test('blabla', 42);

7) On encapsule des données pour les regrouper.

8) Etendre une classe a une autre permet d'utiliser ses méthodes et éviter une redondance.

9) :: permet d'accéder au membres statiques ou constants de la classe

10) public static Film $film; public static getLost();

11) 

12) C'est une méthode ou une classe qui ne pourra pas être instancié directement

13) Cela permet de lancer plusieurs méthodes a la suite sans perdre de temps

14) la méthode __toString() renvoi toutes les propriétés d'une classe sous forme de 
string. Oui

15) 

16) On appelle cela des accesseurs et des mutateurs

17) 


**Architecture :**

1) C'est un environnement de communication entre une machine client et une machine serveur. 
GET, POST, PUT, etc... 

On utilise l'acronyme HTTP. La différence entre HTTP et HTTPS est que la connexion est 
plus sécurisé.

2)

3) MVC veut dire Model View Controller, c'est un modèle se servant d'un controlleur 
pour gérer la vue

4)Model -> Données / View -> Interface Utilisateur / Controller -> Gestion des événements 
et synchronisation

5)Il y a une meilleur organisation du code, une diminution de la complexité a la conception 
et une conception clair et efficace grace à la séparation des données de la vue et du 
contrôleur.

6) Il existe le MVVM (Model View View Model).

7) une API est une interface qui connecte des services entre eux. Le REST permet de faire 
communiquer plusieurs appareils sur le même réseau.


**Modélisation / Base de données :**

1) La Modélisation de Données est le processus de représentation des flux de données. 
C'est une méthode d'analyse et de conception des systèmes sur la séparation des données 
et des traitements

2) a

3) Ca a pour bur d'écrire de façon formelle les données qui seront utilisés par le systèmes

4) C'est une représentation textuelle de la base de données consécutive au travail d'analyse
MCD

5) le type Entité désigne un ensemble d'entités, le type Relation fournit un accès a des 
points de données liées les uns aux autres. La Cardinalité représente le nombre minimum et 
maximum d'instances autorisés à la relation. La Clé Etrangère est une contrainte qui garanti 
l'intégrité référentielle entre deux tables. La clé Primaire permet d'identifié de manière 
unique

6) 

7)C'est un ensemble de données structurés accessible depuis un logiciel

8) SQL => Langage de programmation permettant de manipuler des données dans une BD. 
MySQL => Système de gestion relationnel utilisant SQL. SGBD

9) Tables, 

10)

11)

12)

13)

14)

15)

16)

17)


**Symfony :**

1)

2)

3)

4)

5)

6)

7)

8)

9)

10)


**Sécurité :**

1)

2)

3)

4)

5)

6)

7)

8)

9)

10)


**RGPD:**

1)

2)

3)

4)

5)

6)

7)

8)

9)

10)


**SEO:**

1)

2)

3)

4)

5)

6)

7)

8)

9)

10)

11)

12)

13)


**Gestion de projets / DevOps:**

1)

2)

3)

4)

5)

6)

7)

8)

9)

10)

11)

12)

13)

14)

15)

16)



**English :**

1) a

2) a

3) a

4) a

5) a

6) a

7) b

8) 
