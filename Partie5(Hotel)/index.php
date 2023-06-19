<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <script src="https://kit.fontawesome.com/eec634434d.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <?php

        require './Chambre.php';
        require './Client.php';
        require './Hotel.php';
        require './Reserver.php';

        $client1 = new Client('GIBELLO', 'Virgile');
        $client2 = new Client('MURMANN', 'Micka');

        $hotel1 = new Hotel('Hilton', '10 route de la Gare', 'STRASBOURG', 67600);
        $hotel2 = new Hotel('Regent', '61 Rue Dauphine', 'Paris', 75006);

        $chambre1 = new Chambre(17, 300, true, $hotel1);
        $chambre2 = new Chambre(3, 120, false, $hotel1); 
        $chambre3 = new Chambre(4, 120, false, $hotel1);
        $chambre4 = new Chambre(5, 400, true, $hotel1);
        $chambre5 = new Chambre(6, 400, true, $hotel1);
        $chambre6 = new Chambre(7, 400, true, $hotel1);
        $chambre7 = new Chambre(8, 400, true, $hotel1);


        $reservation1 = new Reserver('01-01-2021', '01-01-2021', $chambre1, $client1);
        $reservation2 = new Reserver('11-03-2021', '15-03-2021', $chambre2, $client2);
        $reservation3 = new Reserver('01-04-2021', '01-04-2021', $chambre3, $client2);
        $reservation4 = new Reserver('01-04-2021', '05-01-2021', $chambre6, $client2);

        $hotel1->showInfos();

        $hotel1->showReservations();
        $hotel2->showReservations();

        $reservation2->showInfos();
        $reservation3->showInfos() . '<br>';

        $hotel1->calculerPrixChambre($client2);

        $hotel1->showRooms();

        //Annuler une réservation
        $reservation3->cancelReservation();

        //Supprimer une réservation car la date de début chevauche
        //La date de fin d'une autre réservation et car c'est la même chambre
        $hotel1->checkReservation();

        $hotel1->showReservations();

        $hotel1->showRooms();


    ?>
</body>
</html>