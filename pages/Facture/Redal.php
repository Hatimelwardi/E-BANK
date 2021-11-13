<?php
    require '../../config.php';
    include '../functions.php';
    checkstatus2($_SESSION['IsOnline']);

     if(isset($_POST['val'])) 
     {
        $idsender  = getId2($_SESSION['id']);
        $idreciver = 5;
        $transaction = "Paiment Fac REDAL";
        $mnt = $_POST['montant'];
        
        if(checkBalance($idsender) < $_POST['montant'])
            $Msg = 'balance insufisant';
        else if(checkBalance($idsender) >= $_POST['montant'])
        {
            $connect->exec("INSERT INTO `transaction` (`id`, `idsender`, `idreciver`, `nomtransaction`, `amount`, `datetransaction`) VALUES (NULL, '$idsender', '$idreciver', '$transaction', '$mnt',now())");
            $connect->exec("UPDATE `account` SET balance= balance+'$mnt' WHERE idclient = '$idreciver';");
            $connect->exec("UPDATE `account` SET balance= balance-'$mnt' WHERE idclient = '$idsender';");

            header('Location:../index.php');
        }
    }

?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>REDAL</title>
    <!-- Bootstrap CSS -->
    <style>
           .div2{
        }
        .aaa{
            margin-left: 27%;
            width: 45%;
        }
     
    </style>
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/libs/css/style.css">
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../../assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
    <link rel="stylesheet" href="../../assets/vendor/inputmask/css/inputmask.css" />
</head>

<body>
     <?php   
        if(isset($Msg))
        {
            echo '<script type="text/javascript">alert("'.$Msg.'");</script>';
        }
    ?>
    <div class="dashboard-main-wrapper">
        
       <?php header1('bakr');
             leftbar2();
        ?>
       
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-10">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header" id="top">
                                    <h2 class="pageheader-title">Facture REDAL</h2>
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
                                                <label for="inputText3" class="col-form-label">N Abonment</label>
                                                <input id="inputText3" type="text" class="form-control">
                                            </div>
                                             <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Montant avant la virgule</label>
                                                <input id="inputText3" type="text" name="montant" class="form-control">
                                            </div><br>
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
    <script src="../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../../assets/libs/js/main-js.js"></script>
    <script src="../../assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
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