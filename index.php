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

    function performSearch($array){

        $retVal = "";
        $filtered = $array;

        if($_GET['parking'] != 'null' || $_GET['stars'] != 'null'){
            
            $filtered = array_filter($array, function($arr_item){

                #Se parcheggio e stelle sono filtrati e vengono trovati match
                if($arr_item['parking'] == $_GET['parking'] && $arr_item['vote'] == $_GET['stars']){
                    return true;
                #Se parcheggio non filtrato, ma stelle corrispondono
                } elseif($_GET['parking'] == 'null' && $arr_item['vote'] == $_GET['stars']){
                    return true;
                #Se stelle non filtrate, ma parcheggio corrisponde
                } elseif($_GET['stars']  == 'null' && $arr_item['parking'] == $_GET['parking']){
                    return true;
                #Nessun match trovato
                } else {
                    return false;
                }

            });

        }

        foreach ($filtered as $item){

            $hasParking = "";

            if($item['parking'] == true){
                $hasParking = 'Si';
            }else {
                $hasParking = 'No';
            }

            $retVal .= "<tr> 
                    <th>".$item['name']."</th>
                    <td>".$item['description']."</td>
                    <td>".$hasParking."</td>
                    <td>".$item['vote']."</td>
                    <td>".$item['distance_to_center']."</td>
                </tr>";
        }  
            
        #Se non è stata trovata alcuna corrispondenza
        if(empty($retVal)){

            $retVal = "<div class='text-danger mb-3'>Nessun risultato</div>";
        }
        return $retVal;
    }



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
            <div class="container py-5">
                <div class="row py-3">
                    <div class="col-12">
                    <form class="row row-cols-lg-auto g-3 align-items-center" action="index.php" method="GET">
                         <div class="col-12">
                            <select class="form-select" id="inlineFormSelectPref" name="parking">
                                <option value="null">Parcheggio...</option>
                                <option value="1">Si</option>
                                <option value="">No</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <select class="form-select" id="inlineFormSelectPref" name="stars">
                                <option value="null">Stelle...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="submit-btn">Cerca</button>
                            <button type="reset" class="btn btn-warning" id="submit-btn">Reset</button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
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
                                        $return = performSearch($hotels);
                                        echo $return;
                                ?>                           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>