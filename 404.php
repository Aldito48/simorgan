

<!DOCTYPE html>
<html lang="en">

 <head>
        <meta charset="utf-8">

        <title>SIMORGAN|LOGIN</title>

        <meta name="description" content="">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="img/logouinsu.png">
        <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
      
        <!-- END Icons -->

        <link rel="stylesheet" href="css/bootstrap.min.css">

        <link rel="stylesheet" href="css/plugins.css">

        <link rel="stylesheet" href="css/main.css">

        <link rel="stylesheet" href="css/themes.css">
        
        <script src="js/vendor/modernizr-3.3.1.min.js"></script>
		 <!-- BOOTSTRAP CSS -->
    <link id="style" href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- STYLE CSS -->
     <link href="assets/css/style.css" rel="stylesheet">

	<!-- Plugins CSS -->
    <link href="assets/css/plugins.css" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="assets/css/icons.css" rel="stylesheet">

    </head>

 <body>
       
        <img src="img/simpeg.png" alt="Full Background" class="full-bg animation-pulseSlow">
       
        <div id="login-container">
         
            <!-- Login Block -->
            <div class="block animation-fadeInQuick">
                <!-- Login Title -->
                <div class="block-title">
                    <h2>LOGIN SIMORGAN</h2>
                </div>
                <!-- END Login Title -->

                <!-- Login Form -->
                <form id="form-login" action="auth_login.php"   id="popup-validation" class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="username" class="col-xs-12">Username</label>
                        <div class="col-xs-12">
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                        </div>
                    </div>
                 
					<div class="wrap-input100 validate-input input-group" id="Password-toggle">
                     <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                       <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                     </a>
                     <input class="input100 border-start-0 form-control ms-0" name="password"  id="password" type="password" placeholder="Password" required>
                     </div>
                     
					 
					
                    <div class="form-group form-actions">
                        <div class="col-xs-8">
                        </div>
                        <div class="col-xs-4 text-right">
                            <button type="submit" class="btn btn-effect-ripple btn-sm btn-info">Log In</button>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
        </div>
		
		<!-- JQUERY JS -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>


    <!-- INPUT MASK JS-->
    <script src="assets/plugins/input-mask/jquery.mask.min.js"></script>

    <!-- SIDE-MENU JS-->
    <script src=".assets/plugins/sidemenu/sidemenu.js"></script>

	<!-- TypeHead js -->
	<script src="assets/plugins/bootstrap5-typehead/autocomplete.js"></script>
    <script src="assets/js/typehead.js"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="assets/js/show-password.min.js"></script>

	<script src="assets/js/form-validation.js"></script>
	
	
		
    </body>
</html>