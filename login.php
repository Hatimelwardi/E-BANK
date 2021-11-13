<?php 
    require 'config.php';
    include 'pages/functions.php';

   if(isset($_POST['login'])) 
     {
		$errMsg = '';

		// Get data from FORM
		$username = $_POST['username'];
		$password = $_POST['password'];

		if($username == '')
			$errMsg = 'Enter username';
		if($password == '')
			$errMsg = 'Enter password';

		if($errMsg == '') 
          {
			try 
               {
				$stmt = $connect->prepare('SELECT * FROM client WHERE username = :username');
				$stmt->execute(array(':username' => $username));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);

				if($data == false)
                    {
					$errMsg = "User $username not found.";
				}
				else 
                {
					if($password == $data['password']) 
                         {
                            $_SESSION['IsOnline'] = 1;
                            $_SESSION['id']= $data['id'];	
                            header('Location: pages/index.php');
						exit;
					}
					else
						$errMsg = 'Password not match.';

                       // header('Location: login.php');

				}
			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
        html,body {
            height: 100%;
        }
        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
    <?php
        if(isset($errMsg))
        {
            echo '<script type="text/javascript">alert("'.$errMsg.'");</script>';
        }
    ?>
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="../index.html"><img class="logo-img" src="assets/images/logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username" type="text" placeholder="Identifiant" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" type="password" placeholder="Mot de passe">
                    </div>
                    
                    
                    <input type="submit" name="login" class="btn btn-primary btn-lg btn-block" value="Connexion ">
                </form>
            </div>
            
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>