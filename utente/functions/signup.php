<?php 

function signup($data)
    {
        $url = 'http://localhost:8080/Progetto-Panini/food-api/API/user/registration.php';
        //$url = 'http://localhost/progetti_PHP/food-api/API/user/login.php';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url); // setta l'url
        curl_setopt($curl, CURLOPT_POST, true); // specifica che è una post request
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // ritorna il risultato come stringa

        $headers = array(
            "Content-Type: application/json",
            "Content-Lenght: 0",
        );


        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); // setta gli headers della request

        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

        $responseJson = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($responseJson);

        var_dump((array)$response);
        
        if ((array)$response->response == true)
        {
            header('Location: login.php');
        }
        else
        {
            return -1;
        }
    }

?>