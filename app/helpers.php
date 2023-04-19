<?php

if (!function_exists('dummy')) {
    function dummy()
    {
        return 'Hola Mundo';
    }
}

/**
 * Dado una cantidad de segundos, retorna una cadeba formateada de la forma
 * 1 horas 2 minutos 4 segundos
 * 
 * @param $tiempo Cantidad de segundos
 */
if (!function_exists('dameTiempo')) {
    function dameTiempo($tiempo)
    {
        $horas = floor($tiempo / 3600);
        $minutos = floor(($tiempo - ($horas * 3600)) / 60);
        $segundos = $tiempo - ($horas * 3600) - ($minutos * 60);
        $hora_texto = "";

        if ($horas > 0) {
            $hora_texto .= $horas . " horas ";
        }

        if ($minutos > 0) {
            $hora_texto .= $minutos . " minutos ";
        }

        if ($segundos > 0) {
            $hora_texto .= $segundos . " segundos";
        }

        return $hora_texto;
    }
}

/**
 * JSON beautifier
 * 
 * @param string  JSON original
 * @param string  Salto de linea
 * @param string  Tabulacion
 * @return string JSON formateado
 */
if (!function_exists('pretty_json')) {
    function pretty_json($json, $ret = "\n", $ind = "\t")
    {
        $beauty_json = '';
        $quote_state = FALSE;
        $level = 0;
        $json_length = strlen($json);
        for ($i = 0; $i < $json_length; $i++) {
            $pre = '';
            $suf = '';
            switch ($json[$i]) {
                case '"':
                    $quote_state = !$quote_state;
                    break;
                case '[':
                    $level++;
                    break;
                case ']':
                    $level--;
                    $pre = $ret;
                    $pre .= str_repeat($ind, $level);
                    break;
                case '{':
                    if ($i - 1 >= 0 && $json[$i - 1] != ',') {
                        $pre = $ret;
                        $pre .= str_repeat($ind, $level);
                    }
                    $level++;
                    $suf = $ret;
                    $suf .= str_repeat($ind, $level);
                    break;
                case ':':
                    $suf = ' ';
                    break;
                case ',':
                    if (!$quote_state) {
                        $suf = $ret;
                        $suf .= str_repeat($ind, $level);
                    }
                    break;
                case '}':
                    $level--;
                case ']':
                    $pre = $ret;
                    $pre .= str_repeat($ind, $level);
                    break;
            }
            $beauty_json .= $pre . $json[$i] . $suf;
        }
        return $beauty_json;
    }
}


/**
 * Retorna IP de usuario
 */
if (!function_exists('dameIP')) {
    function dameIP()
    {
        //whether ip is from the share internet  
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from the remote address  
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}

/**
 * 
 * @return array
 */
if (!function_exists('clientInfo')) {
    function clientInfo()
    {
        $arr = array();

        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        /**
         * Navegador
         */
        if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/'))
            $arr["browser"] = "Opera";
        elseif (strpos($user_agent, 'Edge'))
            $arr["browser"] = "Edge";
        elseif (strpos($user_agent, 'Chrome'))
            $arr["browser"] = "Chrome";
        elseif (strpos($user_agent, 'Safari'))
            $arr["browser"] = "Safari";
        elseif (strpos($user_agent, 'Firefox'))
            $arr["browser"] = "Firefox";
        elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7'))
            $arr["browser"] = "MSIE";

        /**
         * Version de navegador
         */
        $known = array('Version', $arr["browser"], 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
            ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';            
        if (!preg_match_all($pattern, $user_agent, $matches)) {
            // no hayn numero
            $arr["version"] = "";
        }        
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($user_agent,"Version") < strripos($user_agent,$arr["browser"])){
                $arr["version"] = $matches['version'][0];                
            }
            else {                
                $arr["version"] = $matches['version'][1];
            }
        }
        else {            
            $arr["version"] = $matches['version'][0];
        }
        if ( $arr["version"] == null || $arr["version"] == "") { $arr["version"] = "?"; }

        /**
         * Sistema Operativo
         */
        if (preg_match('/linux/i', $user_agent)) {
            $arr["os"] = "Linux";
        } elseif (preg_match('/macintosh|mac os x/i', $user_agent)) {
            $arr["os"] = "mac";
        } elseif (preg_match('/windows|win32|win64/i', $user_agent)) {
            $arr["os"] = "Windows";
        }


        return $arr;
    }
}
