<?php
session_start();
//VALIDAR LOGIN
if (!isset($_SESSION['logeado']) || $_SESSION['logeado'] !== true) {
  header("Location: ./index.php");
  exit;
}

if(isset($_POST['agregarProducto'])) {
  $nuevo_producto = new ProductController();

  $producto =$nuevo_producto->anadir_producto($_POST['nombre'], $_POST['slug'], $_POST['descripcion'], $_POST['features']);
}

class ProductController
{

  public function obtener_productos()
  {
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
        'Authorization: Bearer 8|H12ZJhGoDTg8YHBH4yCGqFjyUObXLGcMsb23NDXA'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $response = json_decode($response, true);
    //print_r($response);

    if (isset($response['code']) && $response['code'] > 0) {

      return $response['data'];

    } else {
      return [];
    }

  }

  public function detalle_producto()
  {
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
          'Authorization: Bearer 8|H12ZJhGoDTg8YHBH4yCGqFjyUObXLGcMsb23NDXA'
        ),
      ));


      $response2 = curl_exec($curl);


      $response2 = json_decode($response2, true);
      $producto = $response2['data'];
      $nombre_brand = $response2['data']['brand']['name'];
      $_SESSION['producto'] = $producto;
      curl_close($curl);

      if (isset($response2['code']) && $response2['code'] > 0) {

        return $response2['data'];

      } else {
        return [];
      }
    }
  }

  public function anadir_producto($nombre, $slug, $descripcion, $features)
  {

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('name' => $nombre, 'slug' => $slug, 'description' => $descripcion, 'features' => $features),
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer P5os0Rl292WOKqgHoPq53HCPvRrB2UkuvdUtmeBU',
        'Cookie: XSRF-TOKEN=eyJpdiI6IkVLZGp6SjhlUnMvZHZseFBjVGkzVmc9PSIsInZhbHVlIjoiZ1NzMnYraGVnTC80Y3lGd3o1M0hqd2FIMlFwL0RDVU1NTmlQQzFSUnlkUW5ZY216UTlqdnBjcnd1S0xIQTJRN00ycXlsakh3TGxnOEdHcmRmNm96c016TTNYNkVPcTBSR3p6VFgyQ1ZsaEsvYlM0ZU5Ud2R6V0pTM2lnS1dDQnkiLCJtYWMiOiIwMjMzMjA0ZGUyNzRkMzFjZTdiZGIyNjcxZDViMGQ5NzZmOTliNDIwZDIzZmIyNmI0N2UzMTc3OWNhNWJkMDE1IiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6Ik4wUWFFOVBsUnNJT29ac2xsWHVsOUE9PSIsInZhbHVlIjoiUldxUElrYkhqb2E4MXhrQmpnMXFjWDh1SGl5bTBXRVZtRUxKdkRZS0hjNDB0V2tMNjJBL2hDdUU3cVhwTjFSNVpnVXcrQUt3WFF3dy95b2RlUlB6ckZ0eTgvMDdFbU5OSXNwVGZXckRUZnFQT2h5WEYxdDhidU1mak5zQjZFRk8iLCJtYWMiOiI2NjM4MTZkMmZiODA2ODdhYTM2NjZhMmE2NTA0ZmEwY2YyMmEyOWU1YTUyYThhYTFmOWQ0NDlmOGJkYjYwYzE0IiwidGFnIjoiIn0%3D'
      ),
    ));

    $response = curl_exec($curl);
    $response = json_decode($response, true);

    curl_close($curl);
    
    return $response;

  }

}





?>