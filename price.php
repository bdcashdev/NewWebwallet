<?php 
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