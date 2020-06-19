<?php if (!defined("IN_WALLET")) { die("Auth Error!"); } ?>
									<?php
if ($admin)
{
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
<?php
if($_GET['action'] == "delete"){
$seed1 = mysqli_query($my,"DELETE FROM market WHERE id='".$_GET['id']."'");

echo "<SCRIPT LANGUAGE='JavaScript'>
window.alert('Order deleted successfully.')
window.location.href='?pag=admarket';
</SCRIPT>"; 
}

if($_GET['action'] == "update"){
$seed2 = mysqli_query($my,"update market set status='2' where id='".$_GET['id']."'");
echo "<SCRIPT LANGUAGE='JavaScript'>
window.alert('Order updated successfully to Expired.')
window.location.href='?pag=admarket';
</SCRIPT>";
}

if($_GET['action'] == "ended"){
$seed3 = mysqli_query($my,"update market set status='1' where id='".$_GET['id']."'");
$sentBDcash = $client->withdraw('developerx', $_GET['wallet'], (float)$_GET['amount']);
echo "<SCRIPT LANGUAGE='JavaScript'>
window.alert('Order updated successfully to Paid and coin added in balance buyer.')
window.location.href='?pag=admarket';
</SCRIPT>";
}

if (!empty($error))
{
    echo "<p style='font-weight: bold; color: red;'>" . $error['message']; "</p>";
}
if (!empty($msg))
{
    echo "<p style='font-weight: bold; color: green;'>" . $msg['message']; "</p>";
}
?>
<div class="row">
					<div class="col-md-12 col-xl-12">
                        <div class="card">
                            <div class="card-body">
							<span class="text-left"><a href="./" class="btn btn-success "> Go back to wallet home </a></span>
							

                                <h4 class="header-title mb-0">List orders market:</h4>
								

                                <div id="cardCollpase5" class="collapse pt-3 show">
                                    <div class="table-responsive">
<table data-toggle="table"
                                   data-show-columns="false"
                                   data-page-list="[5, 10, 20]"
                                   data-page-size="5"
                                   data-buttons-class="xs btn-dark"
                                   data-pagination="true" class="table-borderless" id="txlist">
<thead class="thead-dark">
   <tr>
      <th data-field="id" class="text-center">ID</th>
	  <th data-field="name" class="text-center">Username</th>
      <th data-field="amount" class="text-center">Amount</th>
      <th data-field="price"  class="text-center">Price BTC</th>
      <th data-field="amountP"  class="text-center">Amount paid</th>
	  <th data-field="status"  class="text-center">Status</th>
	  <th data-field="action"  class="text-center">Action</th>
   </tr>
</thead>
<tbody>
<?php 
$see = mysqli_query($my,"select * from market order by id ASC");
while($vr = mysqli_fetch_assoc($see)){
?>
   <tr>
        <td><?php echo $vr['id']; ?></td>
		<td><?php echo $vr['username']; ?></td>
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
		echo"<span class='badge badge-warning'>Processing</span>";
		}		?></td>
		<td>
		<?php if($vr['status'] == 0 or $vr['status'] == 2){  ?>
		<a href="?pag=admarket&action=ended&id=<?php echo $vr['id']; ?>&wallet=<?php echo $vr['wbigdatcash']; ?>&amount=<?php echo $vr['amount']; ?>" class="btn btn-success">Make Complete</a>
		<?php } ?>
		<a href="?pag=admarket&action=update&id=<?php echo $vr['id']; ?>" class="btn btn-warning">Make Expired</a>
		<a href="?pag=admarket&action=delete&id=<?php echo $vr['id']; ?>" class="btn btn-danger">delete</a>
		</td>
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
</div>
<?php
}else{
 header("Location: index.php");	
}
?>