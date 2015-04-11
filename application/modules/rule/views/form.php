<?php

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

//print_r($results);
?>
<script>
$(function() {
	$("#plus").click(function() {
		var html = 
			'<div id="hapus_saja">'+
			'<p class="inline">'+
			  '<label>Methode <span class="required">*</span></label>'+
			  '<label class="rule_method">: <input id="rule_method" type="text" name="rule_method[]" value="" required /></label>'+
			  '<label>Menu <span class="required">*</span></label>'+
			  '<label class="menu">: <input id="menu" type="text" name="menu[]" value="" required /></label>'+
			'</p>'+
			'</div>';		
		$("#add_metode").append(html);
	});
	
	$("#minus").click(function() {
		$( "#hapus_saja" ).remove();	
	});
	
	$(".ui-dialog-buttonpane button:contains('Cancel')").addClass('cancelButton');
	$(".ui-dialog-buttonpane button:contains('Save')").addClass('saveButton');
});
</script>
<style>
.ui-button.cancelButton {
    border: 1px solid #aaaaaa;
	background: #006600;
}

.ui-button.saveButton {
    border: 1px solid #aaaaaa;
	background: #CC0000;
}

label.rule_method {
	padding-left: 6px;
}

label.menu {
	padding-left: 8px;
}
</style>
<form method="post" class="form" action="<?=$action;?>" id="myform">
	<fieldset>
	<p class="inline">
	  <label>Rule Class <span class="required">*</span></label>
	  <label>: <input id="rule_class" type="text" name="rule_class" value="<?php echo $results[0]['rule_class'];?>" required /></label>
	</p>
	</fieldset>
	<fieldset>
	<div id="add_metode">
	<p class="inline">
	  <label>Methode <span class="required">*</span></label>
	  <label>: <input id="rule_method" type="text" name="rule_method[]" value="<?=$results[0]['rule_method'];?>" required /></label>
	  <label>Menu <span class="required">*</span></label>
	  <label>: <input id="menu" type="text" name="menu[]" value="<?=$results[0]['menu'];?>" required /></label>
	  <label><img src="<?=base_url();?>/application/views/templates/default/img/icons/plus.png" id="plus" title="Add row"/> <img src="<?=base_url();?>/application/views/templates/default/img/icons/badge_square_minus.png" id="minus" title="Delete row"/></label>
	</p>
	</div>
	<input type="hidden" name="rule_id"  value="<?=$results[0]['rule_id'];?>"/>
	<input type="hidden" name="button"  value="Save"/>
	</fieldset>
</form>