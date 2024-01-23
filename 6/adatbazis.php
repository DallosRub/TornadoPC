<?php
    function kapcs()
    {
        $host="localhost"; // 127.0.0.1
        $user="root";
        $pwd="";
        $dbname="pc-webshop";
    
        $s = "mysql:host=$host;dbname=$dbname;charset=utf8;port:3306";
        $db = new PDO($s, $user, $pwd);
        return $db;
    }
    
?>