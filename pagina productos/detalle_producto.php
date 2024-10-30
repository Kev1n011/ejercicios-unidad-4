<?php
session_start();
//VALIDAR LOGIN
if (!isset($_SESSION['logeado']) || $_SESSION['logeado'] !== true) {
  header("Location: ./index.php");
  exit;
}

//AGREGAR PRODUCTO
if (isset($_POST['agregarProducto'])) {
  $nuevo_producto = new ProductController();

  $producto = $nuevo_producto->anadir_producto($_POST['nombre'], $_POST['slug'], $_POST['descripcion'], $_POST['features']);
  header("Location: ./home.php");
  exit();
}

//EDITAR PRODUCTO
if (isset($_POST['PUT'])) {
  $nuevo_producto = new ProductController();

  $producto = $nuevo_producto->editar_producto($_POST['nombre'], $_POST['slug'], $_POST['descripcion'], $_POST['features'], $_POST['id_producto']);
  header("Location: ./home.php");
  exit();
}

//BORRAR PRODUCTO
if (isset($_POST['borrar'])) {
  $nuevo_producto = new ProductController();

  $producto = $nuevo_producto->eliminar_producto($_POST['id_producto']);
  header("Location: ./home.php");
  exit();
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
      CURLOPT_POSTFIELDS => array('name' => $nombre,'slug' => $slug,'description' => $descripcion,'features' => $features),
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer P5os0Rl292WOKqgHoPq53HCPvRrB2UkuvdUtmeBU'
      ),
    ));
    

    $response = curl_exec($curl);
    $response = json_decode($response, true);

    curl_close($curl);

    return $response;

  }

  public function editar_producto($nombre, $slug, $descripcion, $features, $id_producto)
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
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => 'name=' . $nombre . '&slug=' . $slug . '&description=' . $descripcion . '&features=' . $features . '&id=' . $id_producto . '',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer P5os0Rl292WOKqgHoPq53HCPvRrB2UkuvdUtmeBU',
        'Cookie: XSRF-TOKEN=eyJpdiI6IndrNDQ0YWpsTFhic2VOWS96TFY5c1E9PSIsInZhbHVlIjoiYTlMMmw4dlkydGZKamY2dXJQK3M4a1hldmVlbUExenRyV2ZxaWhlYnpwN0xXYnhDWldGZ3ZCK3dlZFZ5ZnpKb2I3Q2JQeHJLS3NHTk1mY2oyN2RXS2lwTk9sNTYrbWRTMmduSm1OdTllUFIyMmxYbGgva0l5cFp0Z2lSNStCbEMiLCJtYWMiOiI3ODJlODgxMTY4YTEwNGEwNGY1MDA0MjY3NmFiMDJhNTA3NjQwYmE4ZGQyZmM2ZmY0MGU4ZmIxYmE3ZmY3ZmRlIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6Ii8wSVRtZzN5a2w1eDBnWlNyQXlpQ0E9PSIsInZhbHVlIjoicFVISFhUYWFxZWpEVW5Zek1NMmtYLzVlc0l6TWZDanlvaW5Rd3BmL0xvNCs1c3c1SCtIVjd1ZVJ1N3Ewb3o4R1ZoalgrV2cvSSttTnM1WEtPdFM2ZUZxNHBuS1paM1dxQzNjR2lIaTB5eUo3Q1gvRW1od3EwOHNiNkNGNXdTWHQiLCJtYWMiOiJjMGQ3NWY0ZWQxNzk2MTJkZTBiZDEzNTI4ZDNmY2ExZDE0ODQ2YjRiZDk4MzFiMTZmYzVjNWQ0NzJiNDMwMGIzIiwidGFnIjoiIn0%3D',
        'Content-Type: application/x-www-form-urlencoded'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;

  }

  public function eliminar_producto($id_producto)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/'.$id_producto.'',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'DELETE',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer P5os0Rl292WOKqgHoPq53HCPvRrB2UkuvdUtmeBU'
      ),
    ));

    $response = curl_exec($curl);

    $response = json_decode($response, true);

    curl_close($curl);

    return $response;
  }

}





?>