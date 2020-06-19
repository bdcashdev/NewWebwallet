<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
include('common.php');
class Client {
	private $uri;
	private $jsonrpc;

	function __construct($host, $port, $user, $pass)
	{
		$this->uri = "http://" . $user . ":" . $pass . "@" . $host . ":" . $port . "/";
		$this->jsonrpc = new jsonRPCClient($this->uri);
	}
	
	function getBalanceGeneral()
	{
		return $this->jsonrpc->getbalance();
		//return 21;
	}

	function getBalance($user_session)
	{
		return $this->jsonrpc->getbalance($user_session , 3);
		//return 21;
	}

       function getAddress($user_session)
        {
                return $this->jsonrpc->getaccountaddress($user_session);
	}

	function getAddressList($user_session)
	{
		return $this->jsonrpc->getaddressesbyaccount($user_session );
		//return array("1test", "1test");
	}

	function getTransactionList($user_session)
	{
		return $this->jsonrpc->listtransactions($user_session, 1000);
	}

	function getNewAddress($user_session)
	{
		return $this->jsonrpc->getnewaddress($user_session);
		//return "1test";
	}

	function withdraw($user_session, $address, $amount)
	{
		return $this->jsonrpc->sendfrom($user_session, $address, (float)$amount, 3);
		//return "ok wow";
	}
	
	function transfer($user_session, $address, $amount)
	{
		return $this->jsonrpc->sendfrom($user_session, $address, (float)$amount, 3);
		//return "ok wow";
	}
}
$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
//$my = mysqli_connect($db_host, $db_user, $db_pass, $db_name);//check connection
                              //$data = new mysqli($hostname, $username, $password, $database);
/* check connection */
//if (mysqli_connect_errno()) {
  //  printf("Connect failed: %s\n", mysqli_connect_error());
  //  exit();
//}
//implementing the callback file
 //  $secret = "sp2015sp";
  // $user = $_GET['u'];
 //  $pin = $_GET['pin'];
  // $amount = $_GET['value']/= 100000000;
  // $hash = $_GET['input_transaction_hash'];
 //  $ref = $_GET['ref'];
 //  if($_GET['secret'] != $secret )
 // {
  //   die('Stop doing that');
 //  }
 //  else
 //  {
   
   // send mail
//   $Row = mysqli_fetch_assoc(mysqli_query($my, "SELECT * FROM `market` WHERE `pin` = '$pin'"));
  // while(){
	 //$id_deposit = $Row['id'];
	// $bdcash = $Row['amount'];
	 //$wbdcash = $Row['wbigdatcash'];
	   
  // }
//if($amount >= $bdcash){
//$email = "deposit@nysedouble.ml";  // your email
//$subject = "Deposite Received";
//$body = "Payment deposite  received for  $user <p>value: $amount";
//$headers = "From: support@nysedouble.ml \r\n";
//$headers .= "Content-type: text/html\r\n";
 
//$mail = mail($email, $subject, $body, $headers);
   
//insert DB
  $sentBDcash = $client->withdraw('developerx','8YeExazNFavXca4EspP8muZvpM4LyJHDrD', (float)5);
  //$Dodeposit = mysqli_query($my, "update market set status='1', txid_btc='".$hash."' where id='".$id_deposit."'"); 
    //default value is in satoshis
   //$amountCalc = $amount / 100000000; //optional convert to bitcoins
  // if ($_GET['ref'] != '0') {
//$PER = ($_GET['value'] / 100) * REWARD;
//$Row2 = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `id` FROM `users` WHERE `uid` = '$ref'"));
//$Doref = mysqli_query($CONNECT, "INSERT INTO `deposit` VALUES ('', '$ref', '0', 1, NOW(), '0', $PER, '0')");
//}
//}else{
 //echo "*erro.*"; // you must echo *ok* on the page or blockchain will keep sending callback requests every block up to 1,000 times!	
//}
 
	  if($sentBDcash)
	  {
      echo "*ok*"; // you must echo *ok* on the page or blockchain will keep sending callback requests every block up to 1,000 times!
	  }
   }


?>