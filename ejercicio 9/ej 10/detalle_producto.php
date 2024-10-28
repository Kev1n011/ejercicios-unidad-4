<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer 9om4qsdlVDEYuHVL6plynX9eCXTUa9126mZz5Vlc'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$response = json_decode($response, true);
//print_r($response);

$arreglo = [];
foreach ($response['data'] as $valor) {
    //print_r($valor['name']);
    $arreglo[] = $valor;
}
curl_close($curl);



if (isset($_POST['id_producto'])) {
    $_SESSION['test'] = $_POST['id_producto'];
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/' . $_SESSION['test'] . '',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer 635|dpQ8rIYnu4zuYBZB71sBeAhBrEtTuTZe8M4SGYjQ'
        ),
    ));


    $response2 = curl_exec($curl);

    $response2 = json_decode($response2, true);
    $producto = $response2['data'];
    $nombre_brand = $response2['data']['brand']['name'];
    $_SESSION['producto'] = $producto;
    $_SESSION['brand'] = $brand;

    curl_close($curl);
    header('Location: details.php?slug=' . $_SESSION['producto']['slug']);
    exit;

   
}
?>