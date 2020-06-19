<?php if (!defined("IN_WALLET")) { die("Auth Error!"); } ?>
<div class="wrapper">
   <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                            </div>
                            <h4 class="page-title">Change pass by <?php echo $user_session;?></h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

					<div class="row">
					<div class="col-md-12 col-xl-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <h4 class="header-title mb-0">Update password</h4>
								<?php
if (!empty($error))
{
    echo "<p style='font-weight: bold; color: red;'>" . $error['message']; "</p>";
}
?>
<p><strong><?php echo $lang['WALLET_PASSUPDATE']; ?></strong></p>
<form action="index.php" method="POST" autocomplete="off" class="clearfix" id="pwdform">
    <input type="hidden" name="action" value="password" />
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
    <div class="col-md-12"><br /><input type="password" class="form-control" name="oldpassword" placeholder="<?php echo $lang['WALLET_PASSUPDATEOLD']; ?>"></div>
    <div class="col-md-12"><br /><input type="password" class="form-control" name="newpassword" placeholder="<?php echo $lang['WALLET_PASSUPDATENEW']; ?>"></div>
    <div class="col-md-12"><br /><input type="password" class="form-control" name="confirmpassword" placeholder="<?php echo $lang['WALLET_PASSUPDATENEWCONF']; ?>"></div>
    <div class="col-md-12"><br /><button type="submit" class="btn btn-success col-cm-12"><?php echo $lang['WALLET_PASSUPDATECONF']; ?></button></div>
</form>
<p id="pwdmsg"></p>

  </div>  
</div>
</div>
</div>