<?php if (!defined("IN_WALLET")) { die("Auth Error!"); } ?>

<div class="wrapper">
   <div class="container-fluid">
<?php
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
							<span class="text-left"><a href="./" class="btn btn-info "> Go back to wallet</a><a href="?pag=admarket" class="btn btn-primary "> Go history market</a></span>
							<span class="text-rigth"> <h3>Balance General: <?php echo $noresbalg = $client->getBalanceGeneral(); ?> BDCASH</h3></span>

                                <h4 class="header-title mb-0">List of all users:</h4>
								

                                <div id="cardCollpase5" class="collapse pt-3 show">
                                    <div class="table-responsive">
<table data-toggle="table"
                                   data-search="true"
                                   data-show-columns="true"
                                   data-sort-name="data"
                                   data-page-list="[10, 50, 100]"
                                   data-page-size="10"
                                   data-buttons-class="xs btn-dark"
                                   data-pagination="true" class="table-borderless"" id="txlist">
<thead class="thead-dark">
   <tr>
      <th data-field="username" data-switchable="true" class="text-center">Username</th>
      <th data-field="data"  class="text-center">Created</th>
      <th data-field="adm"  class="text-center" >Is admin?</th>
      <th data-field="lock"  class="text-center">Is locked?</th>
      <th data-field="ip"  class="text-center">IP</th>
      <th data-field="info"  class="text-center">Info</th>
      <th data-field="action"  class="text-center">Delete</th>
   </tr>
</thead>
<tbody>
   <?php
   foreach($userList as $user) {
      echo '<tr>
               <td>' . $user['username'] . '</td>
               <td>' . $user['date'] . '</td>
               <td>' . ($user['admin'] ? '<strong>Yes</strong> <a href="?a=home&m=deadmin&i=' . $user['id'] . '">De-admin</a>' : 'No <a href="?a=home&m=admin&i=' . $user['id'] . '">Make admin</a>') . '</td>
               <td>' . ($user['locked'] ? '<strong>Yes</strong> <a href="?a=home&m=unlock&i=' . $user['id'] . '">Unlock</a>' : 'No <a href="?a=home&m=lock&i=' . $user['id'] . '">Lock</a>') . '</td>
               <td>' . $user['ip'] . '</td>
               <td>' . '<a href="?a=info&i=' . $user['id'] . '">Info</a>' . '</td>
                       <td>' . '<a href="?a=home&m=del&i=' . $user['id'] . '" onclick="return confirm(\'Are you sure you really want to delete user ' . $user['username'] . ' (id=' . $user['id'] . ')?\');">Delete</a>' . '</td>
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

</div>
</div>