<?php

class BrandController
{
    public function obtenerMarcas()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 38|BlPdbiUNy96CLf3MfJ2qFzRqfMiWmgvq3CRVg9Mv'
            ),
        ));

        $response = curl_exec($curl);
        $response = json_decode($response, true);

    
        if (isset($response['code']) && $response['code'] > 0) {

            return $response['data'];

        } else {
            return [];
        }
    }

}
?>