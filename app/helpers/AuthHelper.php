<?php
    require_once "./config.php";

    function base64url_encode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    class AuthHelper {
        function getAuthHeaders() {
            $header = "";
            if(isset($_SERVER['HTTP_AUTHORIZATION']))
                $header = $_SERVER['HTTP_AUTHORIZATION'];
            if(isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION']))
                $header = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
            return $header;
        }

        function createToken($payload) {
           
            $header = array(
                'alg' => 'HS256',
                'typ' => 'JWT'
            );
            
            $payload['exp'] = time() + JWT_EXP;

            $header = base64url_encode(json_encode($header));
            $payload = base64url_encode(json_encode($payload));
            
            $signature = hash_hmac('SHA256', "$header.$payload", JWT_KEY, true);
            $signature = base64url_encode($signature);

            $token = "$header.$payload.$signature";
            
            return $token;
        }

        function verify($token) {
            // $header.$payload.$signature

            $token = explode(".", $token); // [$header, $payload, $signature]
            $header = $token[0];
            $payload = $token[1];
            $signature = $token[2];

            if(count($token) != 3){
                return false;
            }

            $newSignature = hash_hmac('SHA256', "$header.$payload", JWT_KEY, true);
            $newSignature = base64url_encode($newSignature);

            if($signature!=$newSignature) {
                return false;
            }

            $payload = json_decode(base64_decode($payload));

            if($payload->exp<time()) {
                return false;
            }

            return $payload;
        }

        function currentUser() {
            $auth = $this->getAuthHeaders(); // "Bearer $token"
            $auth = explode(" ", $auth); // ["Bearer", "$token"]

            if(count($auth) != 2){
                return false;
            }

            if($auth[0] != "Bearer" ) {
                return false;
            }

            return $this->verify($auth[1]); // Si está bien nos devuelve el payload
        }
    }
