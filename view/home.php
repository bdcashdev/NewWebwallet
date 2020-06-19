<?php if (!defined("IN_WALLET")) { die("Auth Error"); } ?>
<!-- sample modal content -->
                            <div id="create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg bg-warning text-light">
                                            <center><h4 class="modal-title" id="myModalLabel"> Create new account </h4></center>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body text-center">
                                        <form action="index.php" autocomplete="off" method="POST">
											   <input type="hidden" name="action" value="register" />
                                                <div class="form-group mb-3">
                                               <input type="text" class="form-control" name="username" placeholder="<?php echo $lang['FORM_USER']; ?>">
                                                </div>
            
                                                <div class="form-group mb-3">
                                                <input type="password" class="form-control" name="password" placeholder="<?php echo $lang['FORM_PASS']; ?>">
                                                </div>
												 <div class="form-group mb-3">
                                         <input type="password" class="form-control" name="confirmPassword" placeholder="<?php echo $lang['FORM_PASSCONF']; ?>">
                                                </div>
                                                <div class="form-group mb-3">
                                                   <center><span class="g-recaptcha" data-sitekey=<?=$public?>></span></center>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <button class="btn btn-warning btn-sm col-sm-12" type="submit"><?php echo $lang['FORM_SIGNUP']; ?></button>
                                                    
                                                </div>
    
                                            </form>
                                            
                                        </div>
                                        <div class="modal-footer  bg bg-warning">
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
<div class="account-pages mt-3 mb-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="card bg-pattern">
                            <div class="card-body p-1 text-center">
							 <?php
                if (!empty($error))
                {
                    echo "<p style='font-weight: bold; color: red;'>" . $error['message']."</p>";
                }
?>
							<div class="text-center mb-4">
                             
                                        <span><img src="assets/images/main2.png" alt="" style="width:100%; height:200px; border-radius:5px;" class="img-responsive"></span>
                                
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="p-sm-1 text-center">
                                            <!-- title-->
                                            <h4 class="mt-0"><span><img src="assets/images/ssls.jpg" alt="" height="80"></span></h4>
<p>Security and protection guaranteed with SSL certificate, your data protected from end to end. </p>

                                             
                                        </div>
                                    </div> <!-- end col -->
									<div class="col-lg-4">
                                        <div class="p-sm-1 text-center">
                                            <!-- title-->
                                            <h4 class="mt-0"><span><img src="assets/images/speeds.png" alt="" height="80"></span></h4>
											<p>Speed ​​in processing, technology and improvement, do not wait for confirmations on the network.</p>
                                             
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-lg-4">
                                        <div class="p-sm-1 text-center">
                                            <h4 class="mt-3 mt-lg-0"><span><img src="assets/images/responsives.png" alt="" height="80"></span></h4>
											<p>100% responsive layout on all devices, feel free and comfortable whether PC or MOBILE.</p>
                                               
                                        </div>
                                        
                                    </div> <!-- end col -->
									<div class="col-lg-12">
                                        <div class="p-sm-1 text-center">
                                           <a href="#" class="col-sm-5 btn btn-success" data-toggle="modal" data-target="#access">Acess Wallet</a>
										   <a href="#" class="col-sm-5 btn btn-success" data-toggle="modal" data-target="#create">Create New Account</a>
                                        </div>
										</div>
										<div class="col-lg-6">
										<div class="p-sm-1 text-center b bg-warning text-light">
										<p>
										<h3>Program Investiment</h3>
										Earn up to  <strong class="text-success">100% profit</strong>, just keep your <strong class="text-danger">BDCASH</strong> with us.
										<a href="#" class="col-sm-12 btn btn-success text-center" data-toggle="modal" data-target="#q1">View more </a>
										</p>
										</div>
										</div>
										<div class="col-lg-6">
										<div class="p-sm-1 text-center b bg-warning text-light">
										<p>
										<h3>Service BDCASH</h3>
										Try our services and pay with BDCASH.
										<a href="#" class="col-sm-12 btn btn-info text-center" data-toggle="modal" data-target="#q">View more </a>
										</p>
										</div>
										</div>
                                </div>
                                <!-- end row-->

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->	
		
		<!-- sample modal content -->
                            <div id="access" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg bg-warning text-light">
                                            <center><h4 class="modal-title" id="myModalLabel"> Accessing Wallet </h4></center>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body text-center">
                                        <form action="index.php" autocomplete="off" method="POST">
											 <input type="hidden" name="action" value="login" />
                                                <div class="form-group mb-3">
                                                    <input type="text" class="form-control" name="username" placeholder="<?php echo $lang['FORM_USER']; ?>">
                                                </div>
                                                <div class="form-group mb-3">
                                                   <input type="password" class="form-control" name="password" placeholder="<?php echo $lang['FORM_PASS']; ?>">
                                                </div>
												<div class="form-group mb-3">
                                                    <input type="text" class="form-control" name="auth" placeholder="<?php echo $lang['FORM_2FA']; ?>">
                                                </div>
												<div class="form-group mb-3">
                                                   <center> <span class="g-recaptcha" data-sitekey=<?=$public?>></span></center>
                                                </div>
                                                
                                                <div class="form-group mb-0">
                                                    <button class="btn btn-success btn-sm col-sm-12" type="submit"><?php echo $lang['FORM_LOGIN']; ?></button>
                                                    
                                                </div>
                                            </form>
                                            
                                        </div>
                                        <div class="modal-footer  bg bg-warning">
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->