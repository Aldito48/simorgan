<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:../404.php');
}
else{
?>	
       <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 text-center">
                        Copyright © <span id="year"></span> <a href="javascript:void(0)">SIMPEG</a> System <span
                            class="fa fa-heart text-danger"></span> Oleh <a href="javascript:void(0)"> UINSU MEDAN </a> All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->
<?php
}
?>	