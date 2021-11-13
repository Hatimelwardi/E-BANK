<?php 
    include 'functions.php';
    require '../config.php';
    checkstatus($_SESSION['IsOnline']);


?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cartes</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <?php 
            header1('bakr');
            leftbar();
        ?>
       
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
               <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Cartes</h2>
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
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                       <?php 
                                            $req = $connect->prepare('select ca.cardnumber as ccn, t.name as type, ca.finishdate as finishd, ca.issuspended as etat FROM card ca JOIN cardtype t ON ca.type = t.id
                                            where ca.idaccount = ( select id FROM account WHERE idclient = :id)');       
                                            $req->execute(array(':id' => $_SESSION['id']));
                                        ?>
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Carte</th>
                                                <th>Fin de validité	</th>
                                                <th>Etat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($r = $req -> fetch()): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars(hideCard($r['ccn']).' '.$r['type']); ?></td>
                                                <td><?php echo date('Y/m',strtotime($r['finishd'])); ?></td>
                                                <td><?php 
                                                        if($r['etat'] == false)
                                                            echo htmlspecialchars('Active');
                                                        else if($r['etat'] == true)
                                                            echo htmlspecialchars('Non Active');

                                                    ?>
                                                </td>
                                            </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
    <script src="../assets/vendor/custom-js/jquery.multi-select.html"></script>
    <script src="../assets/libs/js/main-js.js"></script>
</body>
 
</html>