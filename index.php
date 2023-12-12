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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <form method="GET" class="form-control-sm">
                <div class="row p-5">
                    <div class="col">
                        <select class="form-select form-select-sm" aria-label="Default select example" name="parkingFilter" id="parkingFilter">
                            <!-- inserire "" in option selected x mostrare comunque tutti gli htls se non si effettua scelta -->
                            <option selected value="">Filtra per parcheggio: </option>
                            <option value="all">Tutti</option>
                            <option value="yes">Con parcheggio</option>
                            <option value="no">Senza Parcheggio</option>
                        </select>
                    </div>

                    <div class="col">
                        <select class="form-select form-select-sm" aria-label="Default select example" name="starsFilter" id="starsFilter">
                            <option selected value="">Filtra per voto: </option>
                            <option value="all">Tutti</option>
                            <option value="1">Solo 1 stella</option>
                            <option value="2">Da 2 stelle in su</option>
                            <option value="3">Da 3 stelle in su</option>
                            <option value="4">Da 4 stelle in su</option>
                            <option value="5">Solo 5 stelle</option>
                        </select>
                    </div>

                    <div class=" col d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary btn-sm">INVIA</button>
                    </div>
                </div>





            </form>

        </div>

        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Vote</th>
                        <th scope="col">Distance to center</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1; //inizializzare un counter per hotel #
                    
                    
                    //controllare se filtro parcheggio è selezionato e se non lo è, mostra tutti
                    $parkingFilter =
                    isset($_GET['parkingFilter']) && $_GET['parkingFilter'] !== '' ? $_GET['parkingFilter'] : 'all';

                    //controllare se filtro stella è selezionato , mostra tutti se no
                    $starsFilter =
                    isset($_GET['starsFilter']) && $_GET['starsFilter'] !== '' ? $_GET['starsFilter'] : 'all';

                    //iterare attraverso hotel in array
                    foreach ($hotels as $hotel) {
                        //applicare il filtro
                        if (
                            ($parkingFilter == 'all' || ($parkingFilter == 'yes' && $hotel['parking']) || ($parkingFilter == 'no' && !$hotel['parking'])) &&
                            ($starsFilter == 'all' || ($starsFilter == '1' && $hotel['vote'] == 1) || ($starsFilter == '2' && $hotel['vote'] >= 2) || ($starsFilter == '3' && $hotel['vote'] >= 3) || ($starsFilter == '4' && $hotel['vote'] >= 4) || ($starsFilter == '5' && $hotel['vote'] == 5))
                        ) {


                            echo '<tr>';
                            //hotel number
                            echo '<th scope="row">' . $count++ . '</th>';
                            //nome hotel  
                            echo '<td>' . $hotel['name'] . '</td>';
                            //descrizione htl
                            echo '<td>' . $hotel['description'] . '</td>';
                            //parcheggio htl con operatore ternario, stampa si se true o no se false
                            echo '<td> Parking:' . ($hotel['parking'] ? 'yes' : 'no') . '</td>';
                            //stampa voto hotel
                            echo '<td> vote:' . $hotel['vote']  . '</td>';
                            //stampa distanza dal centro
                            echo '<td> ' . $hotel['distance_to_center']  . 'km </td>';
                            //lchiudere tabella
                            echo '</tr>';
                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>