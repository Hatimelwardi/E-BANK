<?php 

function header1($user)
    {
        echo ' 
            <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.php">Concept</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria- controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                     
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">'.$user.'</h5>
                                </div>
                                <a class="dropdown-item" href="../logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>';
    }


function leftbar()
    {
        echo ' <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="index.php" aria-expanded="false" aria-controls="submenu-1"><i class="fas fa-home"></i>Acceuil </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="situation.php" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-chart-bar"></i>Situation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="carte.php" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-credit-card"></i>Cartes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-donate"></i>Operation</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="virment.php">VIREMENTS</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="facture.php">PAIEMENT DES FACTURES</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fa fa-fw fa-user-circle"></i>Profile</a>
                                 <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="profile.php">Mes infos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="update-pw.php">Modifier le mot de passe</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>';
    }
function leftbar2()
    {
        echo ' <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="../index.php" aria-expanded="false" aria-controls="submenu-1"><i class="fas fa-home"></i>Acceuil </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../situation.php" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-chart-bar"></i>Situation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../carte.php" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-credit-card"></i>Cartes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-donate"></i>Operation</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="../virment.php">VIREMENTS</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../facture.php">PAIEMENT DES FACTURES</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fa fa-fw fa-user-circle"></i>Profile</a>
                                 <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="../profile.php">Mes infos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../update-pw.php">Modifier le mot de passe</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>';
    }
function checkstatus($status)
{
     if(!isset($status))
    {
        header('Location: ../login.php');
    }
}
function checkstatus2($status)
{
     if(!isset($status))
    {
        header('Location: ../../login.php');
    }
}
function hideCard($card) 
{ 
    $length = strlen($card); 
    for ($i = 0; $i < $length - 4; $i++) 
        { 
            if ($card[$i] == ' ') 
                { continue; } 
                $card[$i] = 'X'; 
    } 
    return $card; 
}

function getId($rib)
{
        $link = new mysqli('localhost', 'root', '', 'ebank');
        $link->set_charset('utf8mb4'); // always set the charset
        $name = $rib;
        $stmt = $link->prepare("select id from account WHERE rib = ? limit 1");
        $stmt->bind_param('s', $name);
        $stmt->execute();
        $result = $stmt->get_result();
        $value = $result->fetch_object();
        if($value != null )
            return $value->id;
        else return 0;
    // $value = $result->fetch_object();
    
       /* $idr = $value->id;
        if($idr != null)
           return $idr;
        else
           return 0;*/
            //return $idr;
}
function getId2($rib)
{
        $link = new mysqli('localhost', 'root', '', 'ebank');
        $link->set_charset('utf8mb4'); // always set the charset
        $name = $rib;
        $stmt = $link->prepare("select id from account WHERE idclient = ? limit 1");
        $stmt->bind_param('s', $name);
        $stmt->execute();
        $result = $stmt->get_result();
        $value = $result->fetch_object();
        if($value != null )
            return $value->id;
        else return 0;
    // $value = $result->fetch_object();
    
       /* $idr = $value->id;
        if($idr != null)
           return $idr;
        else
           return 0;*/
            //return $idr;
}
function checkBalance($id)
{
        $link = new mysqli('localhost', 'root', '', 'ebank');
        $link->set_charset('utf8mb4'); // always set the charset
        $stmt = $link->prepare("select balance from account WHERE id = ? limit 1");
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $value = $result->fetch_object();
        return $value->balance;
}

















 
     



















?>