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

label.name {
	padding-left: 50px;
}

label.username {
	padding-left: 20px;
}

label.password {
	padding-left: 42px;
}

label.repassword {
	padding-left: 20px;
}

label.email {
	padding-left: 56px;
}

label.block {
	padding-left: 74px;
}

label.group_id {
	padding-left: 66px;
}
</style>
<form method="post" class="form" action="<?=$action;?>" id="form_user">
	<fieldset>
	<p class="inline">
	  <label>Name <span class="required">*</span></label>
	  <label class="name">: <input id="name" type="text" name="name" value="<?php echo $results[0]['name'];?>" required /></label>
	</p>
	<p class="inline">
	  <label>Username <span class="required">*</span></label>
	  <label class="username">: 
	  <?php if($results[0]['user_id'] > 0){ 
				echo $results[0]['k_username']; ?>
	  <input type="hidden" name="username"  value="<?=$results[0]['k_username'];?>"/>		
	  <?php
			} else { ?>
	  <input id="username" type="text" name="username" value="" required />
	  <?php
			} ?>
	  </label>
	</p>
	<p class="inline">
	  <label>Password</label>
	  <label class="password">: <input id="password" type="password" name="password" value="" /> </label>
	</p>
	<p class="inline">
	  <label>Re Password</label>
	  <label class="repassword">: <input type="password" name="repassword" value="" /></label>
	</p>
	<p class="inline">
	  <label>Email <span class="required">*</span></label>
	  <label class="email">: <input id="email" type="text" name="email" value="<?=$results[0]['email'];?>" required />
	</p>
	<p class="inline">
	  <label>Block</label>
	  <label class="block">: 
	  <select name="block">
		<option value="N" <?php if($results[0]['block']=='N'){ echo "selected"; } ?> >No</option>
		<option value="Y" <?php if($results[0]['block']=='Y'){ echo "selected"; } ?> >Yes</option>
	  </select>
	  </label>
	</p>
	<p class="inline">
	  <label>Group</label>
	  <label class="group_id">: 
	  <select name="group_id" required >
		<option value="">Select Group</option>
		<?php foreach($listgroup as $res){ ?>
		<option value="<?=$res->group_id;?>" <?php if($res->group_id==$results[0]['group_id']){ echo "selected"; } ?> ><?=$res->group_name;?></option>
		<?php } ?>
	  </select>
	  </label>
	</p>
	<input type="hidden" name="user_id"  value="<?=$results[0]['user_id'];?>"/>
	<input type="hidden" name="button"  value="Save"/>
	</fieldset>
</form>