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

td {
    padding: 5px;
}
</style>
<form method="post" class="form" action="<?=$action;?>" id="myform">
	<fieldset>
	<p class="inline">
	  <label>Name <span class="required">*</span>:</label>
	  <label>
		<input name="name" type="text" id="name" value="<?php echo $results[0]['name']; ?>" disabled="disabled"/>
		<input name="user_id" type="hidden" id="user_id" value="<?php echo $results[0]['user_id']; ?>"/>
	  </label>
	</p>
	<table border=1 width="100%" class="table no-border">
		<tr>
			<td align="center">Menu</td>
			<td align="center">Read</td>
			<td align="center">Add</td>
			<td align="center">Edit</td>
			<td align="center">Delete</td>
		</tr>
 <?php foreach($listakseslevel as $val=>$key){ ?>
		 <tr class="alt">
			<td><?=$key['menu'];?></td>
			<td align="center"><input name="rule_id[]" id="rule_id" type="checkbox" value="<?=$key['rsindex'];?>"
			<?php 
				if($key['rsindex']>0){ ?> 
				<input name="rule_id[]" id="rule_id" type="checkbox" value="<?=$key['rsedit'];?>"
			<?php 
				foreach($canread as $m=>$n){ 
					if($key['rsindex']==$n['rule_id']){ echo "checked"; } 
				}
			?> />					
			<?php
				}
			?>
			<?php //$key['rsindex'];?>
			</td>
			<td align="center">
			<?php 
				if($key['rsadd']>0){ ?> 
				<input name="rule_id[]" id="rule_id" type="checkbox" value="<?=$key['rsadd'];?>"
			<?php 
					foreach($canadd as $a=>$b){ 
						if($key['rsadd']==$b['rule_id']){ echo "checked"; } 
					}
			?> />
			<?php
				} else {
					echo "-"; //$key['rsadd'];
				}
			?>
			</td>
			<td align="center">
			<?php 
				if($key['rsedit']>0){ ?> 
				<input name="rule_id[]" id="rule_id" type="checkbox" value="<?=$key['rsedit'];?>"
			<?php 
					foreach($canedit as $a=>$b){ 
						if($key['rsedit']==$b['rule_id']){ echo "checked"; } 
					}
			?> />
			<?php
				} else {
					echo "-"; //$key['rsadd'];
				}
			?>
			</td>
			<td align="center">
			<?php 
				if($key['rsdelete']>0){ ?> 
				<input name="rule_id[]" id="rule_id" type="checkbox" value="<?=$key['rsdelete'];?>"
			<?php 
					foreach($candelete as $a=>$b){ 
						if($key['rsdelete']==$b['rule_id']){ echo "checked"; } 
					}
			?> />
			<?php
				} else {
					echo "-"; //$key['rsdelete'];
				}
			?>
			</td>
		</tr>
<?php
	}
?>
	</table>
	<p></p>
	<input type="hidden" name="group_id" value="<?php echo $results[0]['group_id']; ?>" />
	<input type="hidden" name="button"  value="Save"/>
	</fieldset>
</form>
