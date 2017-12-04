

<?php
/*
include('send-prescription-doctor-dashboard.php');
 */
require_once 'config.php';


    $query = "SELECT patient_address
                FROM patient_table
                INNER JOIN orders_table ON patient_table.patient_id = orders_table.patient_id";

    $result = mysqli_query($DBcon, $query);

    $locations = array();

    if($result->num_rows > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $address = $row["patient_address"];
            $address = str_replace(" ", "+", $address);
            $region = "Ireland";

            $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region");
            $json = json_decode($json);

            $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
            $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};

            json_encode($latlng = array($long, $lat));

            array_push($locations, $latlng);
        }

        //print_r($latlng);
    }
?>
