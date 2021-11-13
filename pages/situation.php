<?php 
    require '../config.php';
    include 'functions.php';
    checkstatus($_SESSION['IsOnline']);

?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Situation</title>
    <!-- Bootstrap CSS -->
    <style>
            table, th, td 
            {
                text-align: center;
            }
    </style>
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
         <!-- ============================================================== -->
         <?php 
            header1('bakr');
            leftbar();
         ?>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                 <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                </div>
                                <div class="card">
                                    <?php 
                                    $stmt = $connect->prepare('SELECT DISTINCT c.fname as fn,c.lname as ln ,a.accountname as an FROM client c JOIN account a WHERE c.id = :id');
                                    $stmt->execute(array(':id' => $_SESSION['id']));
                                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                                    $fname = $data['fn'];
                                    $lname = $data['ln'];
                                    $aname = $data['an'];
                                    ?>
                                    <h5 class="card-header"><?php echo $fname.' '.$lname.' - '.$aname; ?></h5>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group">
                                                <?php
                                                    $stmt = $connect->prepare('SELECT balance FROM account WHERE idclient = :id');
                                                    $stmt->execute(array(':id' => $_SESSION['id']));
                                                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                                                    $solde = $data['balance'];
                                                ?>
                                                <h3 for="inputText3" class="col-form-label">Solde comptable</h3>
                                                <input id="inputText3" type="text" class="form-control" value="<?php echo $solde.' MAD'; ?>" disabled>
                                            </div>
                                        </form>
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
                                            $req = $connect->prepare('select idsender as ids, idreciver as idr, datetransaction as dt, amount as montant, nomtransaction as operation from transaction WHERE idsender = :id
                                            UNION
                                            select idsender as ids, idreciver as idr, datetransaction as dt, amount as montant, nomtransaction as operation from transaction WHERE idreciver = :id
                                            ORDER BY dt DESC');       
                                            $req->execute(array(':id' => $_SESSION['id']));
        ?>
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Operation</th>
                                                <th>Debit</th>
                                                <th>Credit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($r = $req -> fetch()): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($r['dt']); ?></td>
                                                <td><?php echo htmlspecialchars($r['operation']); ?></td>
                                                <td style="color:red">
                                                    <?php if($r['ids']==$_SESSION['id']) 
                                                            echo htmlspecialchars($r['montant']);
                                                    ?>
                                                </td>
                                                <td style="color:green">
                                                    <?php if($r['idr']==$_SESSION['id']) 
                                                            echo htmlspecialchars($r['montant']);
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