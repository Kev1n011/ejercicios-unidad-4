<?php
    session_start();

    function generar_token($lenght=10) {
        $cadena = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $token = '';
        for ($i=0; $i < $lenght; $i++) { 
            $token.= $cadena[rand(0,35)];
        }
        return $token;
    }

    if (!isset($_SESSION['global_token'])) {
        $_SESSION['global_token'] = generar_token(10);
    }
    if(isset($_POST['enviar'])){
        if($_POST['global_token'] == $_SESSION['global_token']){
            switch ($_POST['enviar']) {
                case 'enviar':
                    $username = $_POST['username'];
                    $password = $_POST['password'];
    
                    $login = new AuthController();
                    $login -> validar($username, $password);
            }

        }
        else {
            echo'falta el token';
        }
        

    }

    class AuthController {
        public function validar($username, $password) {

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('email' => $username,'password' => $password),
            ));

            $response = curl_exec($curl);
            
            $response = json_decode($response);

            if(isset($response -> data) && is_object($response)) {
                $_SESSION['logeado'] = true;
                header("location: ../home.php");
            }
            else {
                echo "credenciales no validas";
            }

            curl_close($curl);

        }
    }
?>