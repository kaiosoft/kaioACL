<?php

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
//print_r($id);
?>
<script>
$(function() {
	$(".ui-dialog-buttonpane button:contains('Cancel')").addClass('cancelButton');
	$(".ui-dialog-buttonpane button:contains('Delete')").addClass('deleteButton');
});
</script>
<style>
.ui-button.deleteButton {
    border: 1px solid #aaaaaa;
	background: #006600;
}

.ui-button.cancelButton {
    border: 1px solid #aaaaaa;
	background: #CC0000;
}
</style>

<div id="confirm-delete" title="Empty the recycle bin?">
<form method="post" class="form" action="<?=$action;?>" id="myform" >
<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>These items will be permanently deleted. Are you sure?</p>
<?php
	for($i=0; $i < count($id); $i++){ ?>
<input type="hidden" name="id[]" value="<?=$id[$i];?>">
<?php
	}
?>

</form>
</div>