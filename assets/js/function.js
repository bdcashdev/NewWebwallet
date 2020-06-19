
	

$(document).ready(function(){
 //$( "#modal" ).load( "modals.php" ),
 $( "#market" ).load( "main_market.php" );
 $( "#price" ).load( "price.php" );

});

window.setTimeout(function() {
$.get('price.php', function(res){
$('#price').html(res);
})
$.get('main_market.php', function(res){
$('#main').html(res);
})
}, 30000);