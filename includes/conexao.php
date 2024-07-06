<?php 

    try {
        $url = "mysql:host=localhost;dbname=soga_db";
        $user = "root";
        $pass = "";
        $connection = new PDO($url, $user, $pass);
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage(); // Improve error message
        }


?>