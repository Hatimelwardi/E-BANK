<?php 
    require '../config.php';
    include 'functions.php';
    checkstatus($_SESSION['IsOnline']);

    $req = $connect->prepare('select * from client where id = :id');       
    $req->execute(array(':id' => $_SESSION['id']));
         while($r = $req -> fetch()):
            echo $r['email'];
        endwhile;

  /*  $req = $connect->prepare('select * from client where id = :id');       
     $req->execute(array(':id' => $_SESSION['id']));
     while($r = $req->fetchall()):
        echo $r['email'];
    endwhile;
*/
?>

<html>
    <head>
    
    </head>
    <body>
        <?php
        if(isset($Msg))
        {
            echo '<script type="text/javascript">alert("'.$Msg.'");</script>';
        }
        ?>
    
        <h3></h3>
    </body>
</html>