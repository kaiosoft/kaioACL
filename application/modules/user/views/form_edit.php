<?php

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

//print_r($results);
if($this->session->flashdata('msg')){
	echo $this->session->flashdata('msg');
}

?>
<script>
 $(function() {
		$("#form_user").validate({
			rules: {
				password: {
					minlength: 5
				},
				repassword: {
					minlength: 5,
					equalTo: "#password"
				}
			}
		}); 
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
	padding-left: 53px;
}

label.username {
	padding-left: 30px;
}

label.password {
	padding-left: 42px;
}

label.repassword {
	padding-left: 20px;
}

label.email {
	padding-left: 54px;
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
	  <label class="password">: <input id="password" type="password" name="password" value="" /></label>
	</p>
	<p class="inline">
	  <label>Re Password</label>
	  <label class="repassword">: <input type="password" name="repassword" value="" /></label>
	</p>
	<p class="inline">
	  <label>Email <span class="required">*</span></label>
	  <label class="email">: <input id="email" type="text" name="email" value="<?=$results[0]['email'];?>" required /></label>
	</p>
	<input type="hidden" name="user_id"  value="<?=$results[0]['user_id'];?>"/>
	<input type="hidden" name="group_id"  value="<?=$results[0]['group_id'];?>"/>
	<input type="hidden" name="type_edit"  value="edit_password"/>
	<input type="hidden" name="button"  value="Save"/>
	<button type="submit" name="button" value="Save" class="blue small">Save</button>
	</fieldset>
</form>