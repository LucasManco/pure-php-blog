<?php

class Routes {
    public static function routes(){
        $url = $_SERVER['REQUEST_URI'];        
        $controller_name = 'Home';
        $action_name = 'index';

        echo('<h2>'.$url.'</h2>');
        // Escape forward slashes
        $url = str_replace('/index.php', '', $url);
        
        echo('<h2>'.$url.'</h2>');

        if (preg_match('/\/([a-z]+)/i', $url, $matches)) {
            $controller_name = ucfirst($matches[1]);
            print_r($matches);
            // $url = str_replace($matches[0], '', $url);

            $pos = strpos($url, $matches[0]);
            if ($pos !== false) {
                $url = substr_replace($url, '', $pos, strlen($matches[0]));
            }
            if (preg_match('/\/([a-z]+)/i', $url, $matches)) {
                $action_name = $matches[1];
                print_r($matches);
            }
        }
        

        // die('AAAAAAAA');
        
        $controller_file = 'Controllers/' . $controller_name . '.php';
        if (file_exists($controller_file)) {
            include($controller_file);
            $object = new $controller_name();
            $object->$action_name();
        } else {
            // handle 404 error
        }

        return true;
    }
}