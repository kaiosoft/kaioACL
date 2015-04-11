<?php 

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : info@kaiogroup.com
 *	Date: Juni 2013
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

//print_r($results);

?>
<script>
 $(function() {	
	$( "#add-spk" )
	.click(function() {
		$("#popup").html('Please wait');
		$("#popup").dialog({
			height: 250,
			width: 500,
			modal:true,
			closeOnEscape: false,
			title: 'Create SPK'
		}); 
		
	   // Call Ajax to get the HTML / PHP data from controller which will prepare it in view;
		$.ajax({
			 url: '<?php echo base_url(); ?>index.php/order/f1', // NOTE: THIS IS CONTROLLER - NOT VIEW!!!!
			 type: "POST",
			 data: ({action_id : 'Hello World' }), 
			 dataType: "html", // Note, we tell Ajax to expect HTML back;
			 async:true,
			 success: function(msg){
			  // Upon success do set HTML we got back in the popup;
			  $("#popup").html(msg);
			 }
		});
	});
	
	$( "#add-salesorder" )
	.click(function() {
		$("#popup").html('Please wait');
		$("#popup").dialog({
			height: 570,
			width: 950,
			modal:true,
			closeOnEscape: false,
			title: 'Add Sales Order'
		}); 
		
	   // Call Ajax to get the HTML / PHP data from controller which will prepare it in view;
		$.ajax({
			 url: '<?php echo base_url(); ?>index.php/order/edit', // NOTE: THIS IS CONTROLLER - NOT VIEW!!!!
			 type: "POST",
			 data: ({action_id : 'Hello World' }), 
			 dataType: "html", // Note, we tell Ajax to expect HTML back;
			 async:true,
			 success: function(msg){
			  // Upon success do set HTML we got back in the popup;
			  $("#popup").html(msg);
			 }
		});
	});
 });
</script>
<header>
<div class="header-top tr">
<p>Hello <strong><?=$this->session->userdata('username');?></strong> | <a href="<?=base_url();?>index.php/user/edit_paswd">Profile</a> | <a href="<?=base_url();?>index.php/auth/logout">Logout</a></p>
</div>
<div class="header-middle"> 
<!-- Start Nav -->
<ul id="nav" class="fr ">
  <li class="content"><a class="help" href="#">General</a>
	<ul>
	  <li><a href="<?=base_url();?>index.php/info">Info</a></li>
	</ul>
  </li>
  <li class="content"><a class="help" href="#">Order</a>
	<ul>
		<li><a href="<?=base_url();?>index.php/po_customer">Purhcase Order</a></li>
	  <li><a href="<?=base_url();?>index.php/order">Sales Order</a></li>
	  <li><a href="#">Kontrak Kerja</a></li>
	</ul>
  </li>
</ul>
<!-- End Nav --> 
<!-- Start Logo --> 

<!-- End Logo --> 
<br class="cl" />
</div>


</div>
</header>

