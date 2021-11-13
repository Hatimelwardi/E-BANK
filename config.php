<?php
    session_start();
    try 
    {
        $connect = new PDO('mysql:host=localhost;dbname=ebank;charset=utf8', 'root', '');
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
   define('DBINFO', 'mysql:host=localhost;dbname=ebank');
   define('DBUSER','root');
   define('DBPASS','');

    function fetchAll($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->query($query);
        return $stmt->fetchAll();
    }
?>