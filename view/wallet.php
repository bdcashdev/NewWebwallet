
<div class="wrapper">
   <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                            </div>
                            <h4 class="page-title">My Wallet <?=$short?></h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

                <div class="row">
				
		<div class="col-md-4 col-xl-4">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center">
		<center><img src="https://chart.googleapis.com/chart?chs=117x117&cht=qr&chl=bdcash:<?php echo $client->getAddress($user_session); ?>"></center>
 <p class="text-muted mb-1 text-truncate">My address BDCASH</p>
       <h6 class="text-dark my-1"><strong><?php echo $client->getAddress($user_session); ?></strong></h6>
	  
</div>	  </div> 
									
                            </div>
                    </div> <!-- end col -->
					</div>		
				
<div class="col-md-4 col-xl-4">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center">
						
									<p class="text-muted mb-1 text-truncate"><?php echo $lang['WALLET_BALANCE']; ?></p>
                               <h3 class="text-dark my-1"><span data-plugin="counterup"><?php echo satoshitize($balance); ?> </span><?=$short?></h3>
<p class="text-muted mb-1 text-truncate">Balance Invested</p>
                               <h4 class="text-danger my-1"><span data-plugin="counterup">0.00000000 </span><?=$short?></h4>
<p class="text-muted mb-1 text-truncate">Profit Investiment</p>
                               <h4 class="text-dark my-1"><span data-plugin="counterup">0.00000000 </span><?=$short?></h4>
</div>		
	   </div> 
									
                            </div>
                    </div> <!-- end col -->
					</div>
					<div class="col-md-4 col-xl-4">
					 <div class="card-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center">
									<p class="text-muted mb-1 text-truncate">Stats coin: </p>
									CURRENT PRICE: <strong><?php echo number_format($price_btc,8,'.','.'); ?> BTC </strong>
	  <?php if($change > 0){ ?>
	  <span class="badge bg-success">
	  <?php }else{ ?>
	  <span class="badge bg-danger">
	  <?php }
	  echo number_format($change,2,',',','); ?>%</span>
	  <br />
	 HIGH : <span class="text-success"><?php echo number_format($volume_hg,8,'.','.'); ?> BTC</span><br />
	 LOW : <span class="text-danger"><?php echo number_format($volume_low,8,'.','.'); ?> BTC </span><br />
									<?php if (!defined("IN_WALLET")) { die("Auth Error!"); } ?>
									 <?php
if (!empty($error))
{
    echo "<p style='font-weight: bold; color: red;'>" . $error['message']; "</p>";
}
?>

 <a href="#" class="btn btn-warning waves-effect waves-light col-sm-5" data-toggle="modal" data-target="#deposit"> Generate New Address </a>
 <a href="#" class="btn btn-info waves-effect waves-light col-sm-5"  data-toggle="modal" data-target="#withdraw"> Withdraw <?=$short?></a>
                                   </div>
                                </div>
                            </div>
                        </div> <!-- end card-box-->
                    </div> <!-- end col -->
					<div class="col-md-12 col-xl-12">
					 <div class="card-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center">
									<p class="text-muted mb-1 text-truncate"> Buy/ Sell BDCASH: </p>
<a href="https://exchange.sperocoin.org/markets/bdcashbtc" class="btn btn-success waves-effect waves-light" target="_blank"><i class="fe-shopping-cart"></i> Exchange-Spero</a>
<a href="https://exchange-assets.com?ref=27933" class="btn btn-success waves-effect waves-light" target="_blank"><i class="fe-shopping-cart"></i> Assets-Exchange</a>
<a href="?pag=exchange" class="btn btn-warning waves-effect waves-light"><i class="fe-shopping-cart"></i> Market BDCASH <span class="badge badge-danger">BETA</span></a>
<a href="https://www.unnamed.exchange/Exchange/Basic?market=BDCASH_BTC" class="btn btn-success waves-effect waves-light" target="_blank"><i class="fe-shopping-cart"></i> Unnamed</a>
<a href="https://erex.io/account/signup/?ref=3137" class="btn btn-success waves-effect waves-light" target="_blank"><i class="fe-shopping-cart"></i> Erex Exchange</a>
                                   </div>
                                </div>
                            </div>
                        </div> <!-- end card-box-->
                    </div> <!-- end col -->
					
					</div>
					
					
					 <!-- sample modal content -->
                            <div id="deposit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg bg-warning">
                                            <h4 class="modal-title" id="myModalLabel">Deposit <?=$short?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body text-center">
<form action="index.php" method="POST" id="newaddressform">
	<input type="hidden" name="action" value="new_address" />
	<button type="submit" class="btn btn-success waves-effect waves-light col-sm-12"><?php echo $lang['WALLET_NEWADDRESS']; ?></button>
</form>
<p id="newaddressmsg"></p>
<br />
<table data-toggle="table"
                                   data-search="true"
                                   data-show-columns="true"
                                   data-page-list="[5, 10, 20]"
                                   data-page-size="5"
                                   data-buttons-class="xs btn-dark"
                                   data-pagination="true" class="table-borderless" id="alist">
<thead class="thead-dark">
<tr>
<th data-switchable="true" class="text-center"><?php echo $lang['WALLET_ADDRESS']; ?>:</th>
<th data-switchable="true" class="text-center"><?php echo $lang['WALLET_QRCODE']; ?>:</th>
</tr>
</thead>
<tbody>
<?php
foreach ($addressList as $address)
{
echo "<tr><td>".$address."</t>";?>
<td><a href="qrgen/?address=<?php echo $address;?>" target="_blank">
  <img src="qrgen/?address=<?php echo $address;?>" alt="QR Code" style="width:42px;height:42px;border:0;"></td><tr>
<?php
}
?>
</tbody>
</table>

                                            
                                        </div>
                                        <div class="modal-footer  bg bg-warning">
                                            <button type="button" class="btn btn-danger waves-effect col-sm-12 text-center" data-dismiss="modal">Close</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
							
							
	<!-- sample modal content -->
                            <div id="withdraw" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg bg-warning">
                                            <h4 class="modal-title" id="myModalLabel">Withdraw <?=$short?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body text-center">
<form action="index.php" method="POST" autocomplete="off" class="clearfix" id="withdrawform">
    <input type="hidden" name="action" value="withdraw" />
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
    <div class="col-md-12 "><br /><input type="text" class="form-control" name="address" placeholder="<?php echo $lang['WALLET_ADDRESS']; ?>"></div>
    <div class="col-md-12"><br /><input type="text" class="form-control" name="amount" placeholder="<?php echo $lang['WALLET_AMOUNT']; ?>"></div>
    <div class="col-md-12"><br /><button type="submit" class="btn btn-success col-sm-12"><?php echo $lang['WALLET_SENDCONF']; ?></button></div>
</form>
<p id="withdrawmsg"></p>
                                            
                                        </div>
                                        <div class="modal-footer  bg bg-warning">
                                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->	

						
							
					
				</div>
					<div class="row">
					<div class="col-md-12 col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <div id="cardCollpase5" class="collapse pt-2 show">
                                    <div class="table-responsive">
<table data-toggle="table"
                                   data-search="true"
                                   data-show-columns="true"
                                   data-sort-name="id"
                                   data-page-list="[5, 10, 20]"
                                   data-page-size="10"
                                   data-buttons-class="xs btn-dark"
                                   data-pagination="true" class="table-borderless" id="txlist">
<thead class="thead-dark">
   <tr>
      <th data-field="id" data-switchable="true" class="text-center"><?php echo $lang['WALLET_DATE']; ?></th>
      <th data-field="address" class="text-center"><?php echo $lang['WALLET_ADDRESS']; ?></th>
      <th data-field="wallet"  class="text-center"><?php echo $lang['WALLET_TYPE']; ?></th>
      <th data-field="amount"  class="text-center"><?php echo $lang['WALLET_AMOUNT']; ?></th>
      <th data-field="fee"  class="text-center"><?php echo $lang['WALLET_FEE']; ?></th>
      <th data-field="conf"  class="text-center"><?php echo $lang['WALLET_CONFS']; ?></th>
      <th data-field="info"  class="text-center"><?php echo $lang['WALLET_INFO']; ?></th>
   </tr>
</thead>
<tbody>
   <?php
   $bold_txxs = "";
   foreach($transactionList as $transaction) {
      if($transaction['category']=="send") { $tx_type = '<b class="text-danger">Sent</b>'; } else { $tx_type = '<b class="text-success">Received</b>'; }
      echo '<tr>
               <td>'.date('n/j/Y h:i a',$transaction['time']).'</td>
               <td>'.$transaction['address'].'</td>
               <td>'.$tx_type.'</td>
               <td>'.abs($transaction['amount']).'</td>';
			   if(empty($transaction['fee'])){
				echo '<td class="badge badge-warning"> No fee </td>';  
			   }else{
              echo '<td class="badge badge-danger">'.$transaction['fee'].'</td>';
			   }
          echo      '<td>'.$transaction['confirmations'].'</td>
               <td><a href="' . $blockchain_tx_url,  $transaction['txid'] . '" class="badge badge-success" target="_blank">Info</a></td>
            </tr>';
   }
   ?>
   </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
var blockchain_tx_url = "<?=$blockchain_tx_url?>";
$("#withdrawform input[name='action']").first().attr("name", "jsaction");
$("#newaddressform input[name='action']").first().attr("name", "jsaction");
$("#pwdform input[name='action']").first().attr("name", "jsaction");
$("#donate").click(function (e){
  $("#donateinfo").show();
  $("#withdrawform input[name='address']").val("<?=$donation_address?>");
  $("#withdrawform input[name='amount']").val("0.01");
});
$("#withdrawform").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR) 
        {
            var json = $.parseJSON(data);
            if (json.success)
            {
              $("#withdrawform input.form-control").val("");
            	$("#withdrawmsg").text(json.message);
            	$("#withdrawmsg").css("color", "green");
            	$("#withdrawmsg").show();
            	updateTables(json);
            } else {
            	$("#withdrawmsg").text(json.message);
            	$("#withdrawmsg").css("color", "red");
            	$("#withdrawmsg").show();
            }
            if (json.newtoken)
            {
              $('input[name="token"]').val(json.newtoken);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //ugh, gtfo    
        }
    });
    e.preventDefault();
});
$("#newaddressform").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR) 
        {
            var json = $.parseJSON(data);
            if (json.success)
            {
            	$("#newaddressmsg").text(json.message);
            	$("#newaddressmsg").css("color", "green");
            	$("#newaddressmsg").show();
            	updateTables(json);
            } else {
            	$("#newaddressmsg").text(json.message);
            	$("#newaddressmsg").css("color", "red");
            	$("#newaddressmsg").show();
            }
            if (json.newtoken)
            {
              $('input[name="token"]').val(json.newtoken);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //ugh, gtfo    
        }
    });
    e.preventDefault();
});
$("#pwdform").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR) 
        {
            var json = $.parseJSON(data);
            if (json.success)
            {
               $("#pwdform input.form-control").val("");
               $("#pwdmsg").text(json.message);
               $("#pwdmsg").css("color", "green");
               $("#pwdmsg").show();
            } else {
               $("#pwdmsg").text(json.message);
               $("#pwdmsg").css("color", "red");
               $("#pwdmsg").show();
            }
            if (json.newtoken)
            {
              $('input[name="token"]').val(json.newtoken);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //ugh, gtfo    
        }
    });
    e.preventDefault();
});

function updateTables(json)
{
	$("#balance").text(json.balance.toFixed(8));
	$("#alist tbody tr").remove();
	for (var i = json.addressList.length - 1; i >= 0; i--) {
		$("#alist tbody").prepend("<tr><td>" + json.addressList[i] + "</td></tr>");
	}
	$("#txlist tbody tr").remove();
	for (var i = json.transactionList.length - 1; i >= 0; i--) {
		var tx_type = '<b style="color: #01DF01;">Received</b>';
		if(json.transactionList[i]['category']=="send")
		{
			tx_type = '<b style="color: #FF0000;">Sent</b>';
		}
		$("#txlist tbody").prepend('<tr> \
               <td>' + moment(json.transactionList[i]['time'], "X").format('l hh:mm a') + '</td> \
               <td>' + json.transactionList[i]['address'] + '</td> \
               <td>' + tx_type + '</td> \
               <td>' + Math.abs(json.transactionList[i]['amount']) + '</td> \
               <td>' + (json.transactionList[i]['fee']?json.transactionList[i]['fee']:'') + '</td> \
               <td>' + json.transactionList[i]['confirmations'] + '</td> \
               <td><a href="' + blockchain_tx_url.replace("%s", json.transactionList[i]['txid']) + '" target="_blank">Info</a></td> \
            </tr>');
	}
}
</script>
