
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

<form action="?pag=exchange&order=created" method="post">
   <input type="text" name="price" id="valor_unitario" value="<?php echo number_format($price_btc,8,'.','.'); ?>" readonly="readonly" style="display:none;" >
    <input type="number"  style="margin:10px; padding:10px; width:100%;" class="text-center" placeholder="Amount for buy" name="qnt" id="qnt"/>
    <input type="text" style="margin:10px; padding:10px; width:100%;" class="text-center"  placeholder="Price total"name="total" id="total" readonly="readonly" />
	<button class="btn btn-success" style="margin:10px; padding:10px; width:100%;" type="submit"> Next Step </button>
  </form>