<?php 

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

if($this->session->flashdata('msg')){
	echo $this->session->flashdata('msg');
}
?>

<script>
 $(function() {
	$( "#dialog-form" ).dialog({
		autoOpen: false,
		height: 470,
		width: 450,
		modal: true
	});
	
	 $( "#add-schedule" )
	.button()
	.click(function() {
		$( "#dialog-form" ).dialog( "open" );
	});
});
</script>
<!-- Add Shipping Schedule Form-->
<div id="dialog-form" title="Add Shipping Shcedule">
<p></p>

<form method="post" class="form" action="">
<fieldset>
<table width="100%">
	<tr>
		<td width="36%">Description <span class="required">*</span></td>
		<td width="64%"><input id="desc" type="text" name="desc" /></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
		<td>Date <span class="required">*</span></td>
		<td><input id="desc" type="text" name="desc" /></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  </tr>
	<tr>
	  <td>Order No <span class="required">*</span> </td>
	  <td><select name="select" id="select">
	      <option> 01/SPO/PI/2013 </option>
	      <option>01/PI/MRA/2013 </option>
	      </select>
	  </td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  </tr>
	<tr>
	  <td>Note</td>
	  <td valign="top"><textarea name="desc2" cols="25" rows="5" id="desc2"></textarea></td>
	  </tr>
	<tr>
	  <td>&nbsp;</td>
	  <td valign="top">&nbsp;</td>
	  </tr>
	<tr>
	  <td>&nbsp;</td>
	  <td valign="top"><button type="button">Button</button><button type="button">Reset</button></td>
	  </tr>
</table>
</fieldset>
</form>

</div>

<!-- End Off Add Shipping Schedule Form-->

<div class="grid_12">

	<div class="container_12">
	  <div class="grid_8">
		<div class="box-header"> Shipping Schedule </div>
		<div class="box">
		  <button type="button" class="blue small" id="add-schedule">Add Schedule</button>
		  <div class="container_12">
			<table class="table no-border">
				<thead>
				<tr>
					<td>Date</td>
					<td>No Order</td>
					<td>Descripton</td>
				</tr>
				</thead>
				<tr class="alt">
					<td>Sen, 13/05 </td>
					<td>01/SPO/PI/2013 </td>
					<td>Spacious Outlet 1 x 40 Feet </td>
				</tr>
				<tr>
					<td>Jum, 10/05</td>
					<td>01/PI/MRA/2013 </td>
					<td>Best Marble & Stone 1 x 20 Feet </td>
				</tr>
				<tr class="alt">
					<td>Jum, 10/05</td>
					<td>01/PI/MRA/2013 </td>
					<td>Best Marble & Stone 1 x 20 Feet </td>
				</tr>
			</table>
			<br class="cl">
		  </div>
		</div>
	  </div>
	  <div class="grid_4">
		<div class="box-header">New Request Order </div>
		<div class="box">No request order</div>
	  </div>
	  <br class="cl">
	  <div class="grid_4">
		<div class="box-header"> Column 4 </div>
		<div class="box"> This is the content for column three. </div>
	  </div>
	</div>

</div>

<?php	
/* End of file friend.php */
/* Location: ./application/views/friend.php */
