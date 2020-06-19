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
                                <h1 class="header-title mb-0">History investiment</h1>
								<p>See the daily history of your BDCASH invested during income period.</p>
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
      <th data-field="id" data-switchable="true" class="text-center">TimeStamp</th>
      <th data-field="address" class="text-center">Amount</th>
      <th data-field="wallet"  class="text-center">Porcentagem</th>
      <th data-field="amount"  class="text-center">stage</th>
   </tr>
</thead>
<tbody>

   <tr>
        <td colspan="5"> history empty </td>
        <!-- <td></td>
        <td></td>
        <td></td> -->
   </tr>

   </tbody>
</table>
</div>
</div>

  </div>  
</div>
</div>
</div>