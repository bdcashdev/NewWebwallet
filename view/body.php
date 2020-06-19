<?php

switch($_GET['pag']){
	
default:
include('wallet.php');	
break;
case 'auth';
include('security.php');
break;	
case 'uppass';
include('pin.php');
break;	
case 'invest';
include('invest.php');
break;
case 'start';
include('start.php');
break;
case 'start2';
include('start_invest.php');
break;
case 'exchange';
include('market.php');
break;
case 'admarket';
include('admin_market.php');
break;
}
?>