<?php

    function getIPAddess(){
        $ip;

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        if(!is_null($ip))
            return $ip;
    }
    // echo $_SERVER['HTTP_USER_AGENT'];


    function getBrowserInfo(){    
        $browser;
        if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE){
            $browser = 'MSIE';
        }
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE){ //For Supporting IE 11
            $browser = 'Trident';
        }
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE){
            $browser = 'Firefox';
        }
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE){
            $browser = 'Chrome';
        }
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE){
            $browser = "Opera Mini";
        }
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE){
            $browser = "Opera";
        }
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE){
            $browser = "Safari";
        }

        if (!is_null($browser)){
            $strPos = strpos($_SERVER['HTTP_USER_AGENT'], $browser);
            $browserInfo = substr($_SERVER['HTTP_USER_AGENT'], $strPos);
            $strPos = strpos($browserInfo," ");
            $info = substr($browserInfo, 0, $strPos);
            
            if ($info == '')
                $browserInfo = substr($browserInfo, 0, strlen($browserInfo));
            else
                $browserInfo = $info;
            return $browserInfo;
        }else{
            return "browser???";
        }
    }

?>