<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
    <body>

        <main>
            <div class="container">
                <div class="row">
                    <div class="col-12 py-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Descrizione</th>
                                    <th scope="col">Parcheggio</th>
                                    <th scope="col">Stelle</th>
                                    <th scope="col">Distanza dal Centro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($hotels as $hotel){

                                        $hasParking = "";

                                        if($hotel['parking'] == true){
                                            $hasParking = 'Si';
                                        }else {
                                            $hasParking = 'No';
                                        }

                                        echo "<tr> 
                                                <th>".$hotel['name']."</th>
                                                <td>".$hotel['description']."</td>
                                                <td>".$hasParking."</td>
                                                <td>".$hotel['vote']."</td>
                                                <td>".$hotel['distance_to_center']."</td>
                                            </tr>";
                                    }    
                                ?>                           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>