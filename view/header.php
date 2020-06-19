<?php if (!defined("IN_WALLET")) { die("Auth Error!"); }

function getprice($coingeckourl){
             $uri = $coingeckourl;
             $ch = curl_init($uri);
             curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
             curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
             curl_setopt($ch, CURLOPT_TIMEOUT, 30);
             $res = curl_exec($ch);
             curl_close($ch);
             $obj = json_decode($res);
             return $obj;
         }
		 
$gecko_api = getprice('https://api.coingecko.com/api/v3/coins/markets?vs_currency=btc&ids=bigdata-cash');
 $name = $gecko_api[0]->name;
 $ticker = $gecko_api[0]->symbol;
 $logo = $gecko_api[0]->image;
 $price_btc = $gecko_api[0]->current_price;
$volume_hg = $gecko_api[0]->high_24h;
$volume_low = $gecko_api[0]->low_24h;
$change = $gecko_api[0]->price_change_percentage_24h;
$volume_btc = $gecko_api[0]->total_volume;



 ?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Web Wallet <?=$fullname?> - <?php echo $user_session; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Wallet for BDCASH, store your coins safely and quickly, fully prepared for our Block chain." name="description" />
        <meta content="Bigdatacash Developer" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/icon.ico">

        <!-- Plugins css-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/jquery-vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
		<link href="assets/libs/bootstrap-table/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
		<script src="assets/js/function.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	  <link href="assets/css/datatable.css" rel="stylesheet" type="text/css" />
	  <link href="assets/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
	  
	  
    </head>

    <body class="center-menu drop-menu-dark" style="background: url(assets/images/bkg.png) no-repeat center top fixed;
     -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;">


<script>
$(function () {
$("#op").trigger("click");
});

$(document).ready(function() {
    $('#txlist').DataTable();
} );
</script>
<script type="text/javascript">
function id(el) {
  return document.getElementById( el );
}
function total( un, qnt ) {
  return parseFloat(un.replace(',', '.'), 10) * parseFloat(qnt.replace(',', '.'), 10);
}
window.onload = function() {
  id('valor_unitario').addEventListener('keyup', function() {
    var result = total( this.value , id('qnt').value );
    id('total').value = String(result.toFixed(8)).formatMoney();
  });

  id('qnt').addEventListener('keyup', function(){
    var result = total( id('valor_unitario').value , this.value );
    id('total').value = String(result.toFixed(8)).formatMoney();
  });
}

String.prototype.formatMoney = function() {
  var v = this;

  if(v.indexOf('.') === -1) {
    v = v.replace(/([\d]+)/, "$1,00");
  }

  v = v.replace(/([\d]+)\.([\d]{1})$/, "$1,$20");
  v = v.replace(/([\d]+)\.([\d]{2})$/, "$1,$2");
  v = v.replace(/([\d]+)([\d]{3}),([\d]{2})$/, "$1.$2,$3");

  return v;
};
</script>
<button id="op" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#att" style="display:none;">Open</button>
        <!-- Navigation Bar-->
        <header id="topnav">

            <!-- Topbar Start -->
            <div class="navbar-custom bg-dark">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">

                        <li class="dropdown notification-list">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>
                    </ul>
    
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="./" class="logo text-center">
                            <span class="logo-lg">
                                <img src="assets/images/log23.png" alt="" height="40">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-sm-text-dark">U</span> -->
                                <img src="assets/images/log23.png" alt="" height="34">
                            </span>
                        </a>
                    </div>
					
                </div> <!-- end container-fluid-->
			
            </div>
            
            <div class="topbar-menu bg-dark">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                       <ul class="navigation-menu">
					   <li class="has-submenu">
                                <a href="#">
                                    <i class="fe-shopping-cart"></i>Services <div class="arrow-down"></div></a>
                                <ul class="submenu">
								 <li>
                                        <a href="?pag=start" class="btn btn-link">Program Holder</a>
                                    </li>
                                    <li>
                                        <a href="?pag=exchange" class="btn btn-link">Buy BDCASH <span class="badge badge-danger">BETA</span></a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-link">Hosting Nodes (Soon)</a>
                                    </li>
                                </ul>
                            </li>
							<li class="has-submenu">
                                <a href="#">
                                    <i class="fa fa-gamepad"></i>Game BDCASH <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="/game/dice/" class="btn btn-link"> Dice game </a>
                                    </li>
                                    
                                </ul>
                            </li>
					    <li class="has-submenu">
                                <a href="#">
                                    <i class="fe-shield"></i>Security <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="?pag=uppass" class="btn btn-link">Update password</a>
                                    </li>
                                    <li>
                                        <a href="?pag=auth" class="btn btn-link">Security Wallet</a>
                                    </li>
                                </ul>
                            </li>
					   <li class="has-submenu">
					   <a href="?pag=invest" class="btn btn-link">
					   <i class="fe-book"></i>History </a>
                                    </li>
									<?php
if ($admin)
{
  ?>
<li class="has-submenu">

  <a href="?a=home" class="btn btn-link">
  <i class="fe-airplay"></i>Admin Dashboard</a>
</li>
  <?php
}
?>
									<li class="has-submenu">
                                        <form action="index.php" method="POST">
        <input type="hidden" name="action" value="logout" />
        <button type="submit" class="btn btn-danger"><?php echo $lang['WALLET_LOGOUT']; ?></button>
                              </form>
                                    </li>
									
                        </ul>
                        <!-- End navigation menu -->

                        <div class="clearfix"></div>
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->

        </header>
        <!-- End Navigation Bar-->
