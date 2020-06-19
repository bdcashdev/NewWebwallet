<?php if (!defined("IN_WALLET")) { die("Auth Error!"); } ?>
<div class="wrapper">
   <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                            </div>
                            <h4 class="page-title">Invest and hold <?=$short?></h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

					<div class="row">
					<div class="col-md-12 col-xl-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <h1 class="header-title mb-0">Start investiment</h1>
								<p>See the daily history of your BDCASH invested during income period.</p>
								<a href="#" class="btn btn-info col-sm-12" data-toggle="modal" data-target="#q1">See how our plans work <i class="fa fa-question-circle" aria-hidden="true"></i> </a>
								 <?php
								 if($_GET['step'] == 3 ){
								 ?>
								 <h2>Review investiment:</h2>
                                   <form method="post" action="?pag=confirm">
								   <div class="col-md-12 col-xl-12 alert alert-success">
								   <div class="col-md-12 col-xl-12">
								   <div class="p-sm-2 text-center">
								   <input type="hidden" name="amount3" class="form-control" value="<?php echo $_POST['amount']; ?>">
								   <input type="hidden" name="plan3" class="form-control" value="<?php echo $_POST['plan2']; ?>">

								   <p><?php 
								   

//////////////////////////////////////////								   
// starting verification balance invest //
//////////////////////////////////////////
if($_POST['plan2'] == "start" and $_POST['amount'] < 200 XOR $_POST['amount'] > 1000 XOR $_POST['amount']< 1001){
									
									echo "<SCRIPT LANGUAGE='JavaScript'>
window.alert('Balance is less than or greater than allowed for the plan start.')
window.location.href='?pag=start2&step=2&plan=start';
</SCRIPT>";
								   
}elseif($_POST['plan2'] == "intermediary" and $_POST['amount'] < 1001 XOR $_POST['amount'] >20000 XOR $_POST['amount']< 20001){
									
									echo "<SCRIPT LANGUAGE='JavaScript'>
window.alert('Balance is less than or greater than allowed for the plan intermediary.')
window.location.href='?pag=start2&step=2&plan=intermediary';
</SCRIPT>";
				
}elseif($_POST['plan2'] == "advance" and $_POST['amount'] < 20001 XOR $_POST['amount'] >100000 XOR $_POST['amount']< 100001){
                                    
				                    echo "<SCRIPT LANGUAGE='JavaScript'>
window.alert('Balance is less than or greater than allowed for the plan advance.')
window.location.href='?pag=start2&step=2&plan=advance';
</SCRIPT>";
	
}
/////////////////////////////////////
/// end veriication balance invest //
/////////////////////////////////////
 
if($_POST['plan2'] == "start" and $_POST['amount'] > 199 XOR $_POST['amount'] < 1001 XOR $_POST['plan2'] == "intermediary" and $_POST['amount'] > 1000 or $_POST['amount'] < 20001 XOR $_POST['plan2'] == "advance" and $_POST['amount'] > 20000 or $_POST['amount'] <100001){							
								$my = mysqli_connect($db_host, $db_user, $db_pass, $db_name);//check connection
                              //$data = new mysqli($hostname, $username, $password, $database);
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
								
								$result = mysqli_query($my,"SELECT * FROM investments WHERE id_user='".$user_session."' and status='1'");
	 if (mysqli_num_rows($result) > 0){
		echo "<SCRIPT LANGUAGE='JavaScript'>
window.alert('You can have a plan, wait administrator release plan or finish your cycle to invest in a new plan.')
window.location.href='./';
</SCRIPT>"; 
	 }else{
		 /////////////////////////////////////////
     $datenow = date('Y-m-d H:i:s');
	 $fulldate = date('Y-m-d H:i:s', strtotime('+365 days'));
	 ///////////////////////////////////////////////////
	 $query = mysqli_query($my,"INSERT INTO investments (id_user,plan,balance,profit,start,end,active) VALUES ('".$user_session."','".$_POST['plan2']."','".$_POST['amount']."','0','".$datenow."','".$fulldate."','0')")  or die("Error: ".mysqli_error($my)) ;
	 
	 if($query){//start

				echo "<SCRIPT LANGUAGE='JavaScript'>
window.alert('Proccessed, please wait trasnsfer balance now for start investiment.');
</SCRIPT>"; 
				} else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
window.alert('No processed, try again.')
window.location.href='?pag=invest_start';
</SCRIPT>"; 

				}//end
	       }
}
					
			 
									   
									   
								   
								       if($_POST['plan2'] == "start"){
										  echo "<h3>Plan</h3>START"; 
									   }else if($_POST['plan2'] == "intermediary"){
										   echo "<h3>Plan</h3>INTERMEDIARY"; 
									   }else{
                                           echo "<h3>Plan</h3>ADVANCE";  
									   }										   
								   ?></p>
								   <p><?php 
								       if($_POST['plan2'] == "start"){
										  echo "<h3>Amount</h3>".$_POST['amount']." BDCASH"; 
									   }else if($_POST['plan2'] == "intermediary"){
										   echo "<h3>Amount</h3>".$_POST['amount']." BDCASH"; 
									   }else{
                                           echo "<h3>Amount</h3>".$_POST['amount']." BDCASH"; 
									   }										   
								   ?></p>
								   
								   </div>
								   </div>
								   </div>
								   <button class="btn btn-success col-sm-12 p-sm-3"  type="submit"> Transfer amount >> </button>
								   </form>
								  <?php
								 }else if($_GET['step'] == 2 ){
								 ?>
								 
								 <h2>Choose amount send:</h2>
                                   <form method="post" action="?pag=start2&step=3">
								   <div class="col-md-12 col-xl-12 alert alert-success">
								   <div class="col-md-12 col-xl-12">
								   <div class="p-sm-2 text-center">
								   <input type="text" name="amount" class="form-control text-center" placeholder="Input amount sent to invest an hold">
                               			<?php if($_POST){ ?>			  
								  <input type="hidden" name="plan2" class="form-control" value="<?php echo $_POST['plan']; ?>">
										<?php }else{?>
										<?php if($_GET['plan'] == 'start'){  ?>
								   <input type="hidden" name="plan2" class="form-control" value="start">
								   <?php } ?>
								   <?php if($_GET['plan'] == 'intermediary'){  ?>
								   <input type="hidden" name="plan2" class="form-control" value="intermediary">
								   <?php } ?>
								   <?php if($_GET['plan'] == 'advance'){  ?>
								   <input type="hidden" name="plan2" class="form-control" value="advance">
								   <?php } ?>
								  <?php } ?>
								   <p><?php 
								       if($_POST['plan'] == "start" or $_GET['plan'] == "start"){
										  echo "min: 200BDACSH | Max: 1000BDCASH"; 
									   }
									   if($_POST['plan'] == "intermediary" or $_GET['plan'] == "intermediary"){
										   echo "min: 1001BDACSH | Max: 20000BDCASH"; 
									   }
									   if($_POST['plan'] == "advance" or $_GET['plan'] == "advance"){
                                           echo "min: 20001BDACSH | Max: 100000BDCASH"; 
									   }										   
								   ?></p>
								   </div>
								   </div>
								   </div>
								   <button class="btn btn-success col-sm-12 p-sm-3"  type="submit"> Continue proccess >> </button>
								   </form>
								 
								 <?php
								 }else{
								 ?>
								<h2>Choose the plan:</h2>
                                   <form method="post" action="?pag=start2&step=2">
								   <div class="col-md-12 col-xl-12 alert alert-success">
								   <div class="col-md-12 col-xl-12">
								   <div class="p-sm-2 text-center">
								   <label class="radio-inline"><input type="radio" name="plan" value="start">Plan START</label>
								   <p> Investiment:  200 - 1,000</p>
								   </div>
								   </div>
								   <div class="col-md-12 col-xl-12">
								   <div class="p-sm-2 text-center">
                                   <label class="radio-inline"><input type="radio" name="plan" value="intermediary">Plan INTERMEDIARY</label>
								   <p> Investiment:  1,001 - 20,000</p>
								   </div>
								   </div>
								   <div class="col-md-12 col-xl-12">
								   <div class="p-sm-1 text-center">
                                   <label class="radio-inline"><input type="radio" name="plan" value="advance">Plan ADVANCE</label>
								   <p> Investiment:  20,001 - 100,000</p>
								   </div>
								   </div>
								   </div>
								   <button class="btn btn-success col-sm-12 p-sm-3"  type="submit"> Next Step >> </button>
								   </form>
								 <?php } ?>
								   


  </div>  
</div>
</div>
</div>