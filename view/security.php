<?php if (!defined("IN_WALLET")) { die("Auth Error!"); } ?>
<div class="wrapper">
   <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                            </div>
                            <h4 class="page-title">My Security <?=$short?></h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

					<div class="row">
					<div class="col-md-12 col-xl-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <h4 class="header-title mb-0">Wallet Security</h4>
								<?php
if (!empty($error))
{
    echo "<p style='font-weight: bold; color: red;'>" . $error['message']; "</p>";
}
?>


<form action="index.php" method="post">
<input type="hidden" name="action" value="disauth" />
<button type="submit" class="btn btn-danger"><?php echo $lang['WALLET_2FAOFF']; ?></button>
</form>
<br /><br />
<form action="index.php" method="POST">
<input type="hidden" name="action" value="authgen" />
<button type="submit" class="btn btn-success"><?php echo $lang['WALLET_2FAON']; ?></button>
</form>

  </div>  
</div>
</div>
</div>