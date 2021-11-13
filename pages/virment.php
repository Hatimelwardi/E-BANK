<?php 
    require '../config.php';
    include 'functions.php';
    checkstatus($_SESSION['IsOnline']);
   
   
    if(isset($_POST['val'])) 
     {
        //GET RECIVER RIB
        $rac = $_POST['cac'];
        //GET SENDER ID
        $rad = $_POST['cad'];
        //GET TRANSACTION AMOUNT
        $mnt = (float) $_POST['montant'];
        
        //GET RECIVIER ID
        $id1 = getId($rac);
        
        if(getId($rac) == 0)
            $Msg = 'Compte introuvable';
        else if($mnt > checkBalance($rad))
            $Msg = 'solde insuffisant';
        else if ($mnt <= checkBalance($rad))
        {
            $text = 'Virment ....';
            $connect->exec("INSERT INTO `transaction` (`id`, `idsender`, `idreciver`, `nomtransaction`, `amount`, `datetransaction`) VALUES (NULL, '$rad', '$id1', 'Virment test', '$mnt',now())");
            $connect->exec("UPDATE `account` SET balance= balance+'$mnt' WHERE idclient = '$id1';");
            $connect->exec("UPDATE `account` SET balance= balance-'$mnt' WHERE idclient = '$rad';");

            header('Location:index.php');
        }
		         
    }

?>


<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Espace Virment</title>
    <!-- Bootstrap CSS -->
     <style>
           .div2{
        }
        .aaa{
            margin-left: 27%;
            width: 45%;
        }
     
    </style>
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
    <link rel="stylesheet" href="../assets/vendor/inputmask/css/inputmask.css" />
</head>

<body>
    <?php
        if(isset($Msg))
        {
            echo '<script type="text/javascript">alert("'.$Msg.'");</script>';
        }
    ?>
    <div class="dashboard-main-wrapper">
       <?php header1('Hello'); leftbar(); ?>
       
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-10">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                       <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header">
                                    <h2 class="pageheader-title">Espace virement</h2>
                                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">

                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    
                                </div>
                                <div class="card">
<!--                                    <h5 class="card-header">Basic Form</h5>-->
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <label for="input-select">Compte a debiter</label>
                                                
                                                <select class="form-control" name='cad' id="input-select">
                                                    <?php
                                                        $req = $connect->prepare('select id,accountname as an, rib from account where idclient = :id');
                                                        $req->execute(array(':id' => $_SESSION['id']));
                                                        while ($r = $req->fetch()): 
                                                        echo"<option value='".$r['id']."'>".$r['an'].", ".$r['rib']."</option>";
                                                        endwhile;
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                    <label>Rib compte a crediter</label>
                                                    <input type="text" name='cac' class="form-control" placeholder="">
                                                </div>
                                             <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Montant</label>
                                                <input id="inputText3" name="montant" type="text" class="form-control">
                                            </div>
                                            <div class="d-grid gap-2 d-md-block div2">
                                              <input class="btn btn-primary aaa" name="val" type="submit" >
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end basic form  -->
                    </div>
                  
                </div>
            </div>
            <!-- ============================================================== -->
          
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="../assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
    <script>
    $(function(e) {
        "use strict";
        $(".date-inputmask").inputmask("dd/mm/yyyy"),
            $(".phone-inputmask").inputmask("(999) 999-9999"),
            $(".international-inputmask").inputmask("+9(999)999-9999"),
            $(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"),
            $(".purchase-inputmask").inputmask("aaaa 9999-****"),
            $(".cc-inputmask").inputmask("9999 9999 9999 9999"),
            $(".ssn-inputmask").inputmask("999-99-9999"),
            $(".isbn-inputmask").inputmask("999-99-999-9999-9"),
            $(".currency-inputmask").inputmask("$9999"),
            $(".percentage-inputmask").inputmask("99%"),
            $(".decimal-inputmask").inputmask({
                alias: "decimal",
                radixPoint: "."
            }),

            $(".email-inputmask").inputmask({
                mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
                greedy: !1,
                onBeforePaste: function(n, a) {
                    return (e = e.toLowerCase()).replace("mailto:", "")
                },
                definitions: {
                    "*": {
                        validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                        cardinality: 1,
                        casing: "lower"
                    }
                }
            })
    });
    </script>
</body>
 
</html>