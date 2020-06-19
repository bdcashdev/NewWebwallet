<?php if (!defined("IN_WALLET")) { die("Auth Error!"); } 
//ini_set('display_startup_errors',1);
//ini_set('display_errors',1);

$my = mysqli_connect($db_host, $db_user, $db_pass, $db_name);//check connection
                              //$data = new mysqli($hostname, $username, $password, $database);
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>
<div class="wrapper">
   <div class="container-fluid">

					<div class="row">
					<div class="col-md-12 col-xl-12">
                        <div class="card">
                            <div class="card-body text-center">
								 <div id="cardCollpase5" class="collapse pt-3 show">
								 
<div class="row">
                                    <div class="col-sm-4 sidenav hidden-xs">
									
									<div class="alert alert-danger text-center"><h2><strong>Atention</strong></h2>Buy BDCASH directly with our team, all the balance will go to the listing and maintenance of our servers.</div>
      <img src="<?php echo $logo; ?>" height="80"><br />
	  <h3><?php echo $name; ?><span class="badge bg-warning"><?php echo $ticker; ?></span></h3>
	  CURRENT PRICE: <strong><?php echo number_format($price_btc,8,'.','.'); ?> BTC </strong>
	  <?php if($change > 0){ ?>
	  <span class="badge bg-success">
	  <?php }else{ ?>
	  <span class="badge bg-danger">
	  <?php }
	  echo number_format($change,2,',',','); ?>%</span>
	  <br /><br />
	 <span class="btn bg-success btn-sm"> HIGH : <?php echo number_format($volume_hg,8,'.','.'); ?> BTC</span><span class="btn bg-danger btn-sm">  LOW : <?php echo number_format($volume_low,8,'.','.'); ?> BTC</span>
    </div>
    <div class="col-sm-8">
      <div class="col-sm-12">
          <div class="well text-center">
		  <h2>Buy BDCASH</h2>
		  <?php if(!isset($_POST)){
			  echo "no post ";
		  }else{
	if($_GET['action'] == "clear"){
	$myorder = $_POST['order'];
$seed1 = mysqli_query($my,"DELETE FROM market WHERE id='".$myorder."'");

echo "<SCRIPT LANGUAGE='JavaScript'>
window.alert('Order deleted successfully.')
window.location.href='?pag=exchange';
</SCRIPT>"; 
}		  
			  
if($_POST and $_GET['order'] == "created"){
			  			  
			  
		if($_POST['qnt'] >= 100 ){	  
//set parameters
        $api_key = "a325944d-50ae-4e21-b80e-3a16a5a80fc9";
        $xpub = "xpub6Ck5cnuMZFPdRWYZN8eVSzi5LoxHS7re8oUBYkQCGy6S9kyeTnSm3n5n5UkhGQqMWqDr56gvgC7sMtby4XSE7BUTDhqbj49DMNNWWHisALK";
		$secret = "sp2015sp";
		$wait = $user_session;
		$pin = rand(100,100000);
 
//call blockchain info receive payments API
        $callback_url = 'https://wallet.bigdatacash.online/?pag=deposit&user='.$wait.'&secret='.$secret.'&pin='.$pin;
        $receive_url = "https://api.blockchain.info/v2/receive?xpub=".$xpub."&callback=".urlencode($callback_url)."&key=".$api_key;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $receive_url);
        $ccc = curl_exec($ch);
        $json = json_decode($ccc, true);
        $Pay = $json['address']; //the newly created address will be stored under 'address' in the JSON response

     $datenow = date('Y-m-d');
	 $bdcash = $client->getAddress($user_session);
	 $btc = $Pay;
	 ///////////////////////////////////////////////////
	 $query = mysqli_query($my,"INSERT INTO market (username,amount,price,total,type,wbtc,wbigdatcash,date,pin,status) VALUES ('".$user_session."','".$_POST['qnt']."','".$_POST['price']."','".$_POST['total']."','buy','".$btc."','".$bdcash."','".$datenow."','".$pin."','0')")  or die("Error: ".mysqli_error($my)) ;
		
		  
           ?>
             Now you need to send your bitcoin to the address below:<br />
			<img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=bitcoin:<?php echo $Pay; ?>">
			<h3><a href="bitcoin:<?php echo $Pay; ?>" target="_blank"><?php echo $Pay; ?></a></h3>
			<h4><?php echo $_POST['total']; ?> BTC</h4>
			<div class="alert alert-warning">You need to send the exact amount <strong><?php echo $_POST['total']; ?> BTC</strong>, after the transaction confirmed your coins will be added to your BDCASH wallet at the main address.</div>

         <?php
		}else{
			echo "<SCRIPT LANGUAGE='JavaScript'>
window.alert('Amount minimo is 100BDCASH, try again.')
window.location.href='?pag=exchange';
</SCRIPT>"; 
		}
		  }else{
         ?>		 
		 <div class="alert alert-warning text-center"> Enter the amount to buy, after a BTC wallet will be generated for payment, this wallet is unique, each new order will be generated a new wallet, never send values ​​more than once or you will lose your bitcoins. </div>
            <form action="?pag=exchange&order=created" method="post">
   <input type="text" name="price" id="valor_unitario" value="<?php echo number_format($price_btc,8,'.','.'); ?>" readonly="readonly" style="display:none;" >
    <input type="number"  style="margin:10px; padding:10px; width:100%;" class="text-center" placeholder="Amount for buy" name="qnt" id="qnt"/>
    <input type="text" style="margin:10px; padding:10px; width:100%;" class="text-center"  placeholder="Price total"name="total" id="total" readonly="readonly" />
	<button class="btn btn-success" style="margin:10px; padding:10px; width:100%;" type="submit"> Next Step </button>
  </form>
		  <?php  }}  ?>
          </div>
        </div>                            
   </div> <!-- end col -->	
</div>   

                                    <div class="table-responsive text-center">
									<h4> My Orders  buy </h4>
									<table data-toggle="table"
                                   data-show-columns="false"
                                   data-page-list="[5, 10, 20]"
                                   data-page-size="5"
                                   data-buttons-class="xs btn-dark"
                                   data-pagination="true" class="table-borderless" id="txlist">
<thead class="thead-dark">
   <tr>
      <th data-field="id" class="text-center">ID</th>
      <th data-field="amount" class="text-center">Amount</th>
      <th data-field="price"  class="text-center">Price BTC</th>
      <th data-field="amountP"  class="text-center">Amount paid</th>
	  <th data-field="status"  class="text-center">Status / Action</th>
   </tr>
</thead>
<tbody>
<?php 
$see = mysqli_query($my,"select * from market where username='".$user_session."' order by id ASC");
while($vr = mysqli_fetch_assoc($see)){
?>
   <tr>
        <td><?php echo $vr['id']; ?></td>
        <td><?php echo $vr['amount']; ?></td>
        <td><?php echo $vr['price']; ?></td>
		<td>
		<?php if($vr['status'] == 1){ ?> 
		 <a class="btn btn-link" href="https://blockchain.com/btc/tx/<?php echo $vr['txid_btc']; ?>" target="_blank"><?php echo $vr['total']; ?></a></td>"; 
		<?php } else{ 
		?>
		<a class="btn btn-link" href="https://blockchain.com/btc/address/<?php echo $vr['wbtc']; ?>" target="_blank"><?php echo $vr['total']; ?></a></td>
		<?php } ?>
        <td><?php if($vr['status'] == 1){ 
		 echo"<span class='badge badge-success'>Paid</span>"; 
		} elseif($vr['status'] == 2){ 
		echo"<span class='badge badge-danger'>Expired</span>";
		}else{
		echo"<span class='badge badge-warning'>Processing</span> ";
		?><form method="post" action="?pag=exchange&action=clear">
		<input type="hidden" value="<?php echo $vr['id']; ?>" name="order">
		<button type="submit" class="badge badge-danger">Cancel</button>
		</form>
		<?php }		?></td>
   </tr>
<?php } ?>
   </tbody>
</table>
</div>
</div>

  </div>  
</div>
</div>
</div>