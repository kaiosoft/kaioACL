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
	$("#app_name").validate();
});
</script>
<form method="post" class="form" action="<?=$action;?>" enctype="multipart/form-data" >
	<fieldset>
	<p class="inline">
	  <label>Appilcation Name <span class="required">*</span></label>
	  <label><input id="app_name" type="text" name="app_name" value="<?php echo $results[0]['app_name'];?>" required /></label>
	</p>
	<p class="inline">
	  <label>Jumlah item/halaman</label>
	  <label><input id="jmlh_item" type="text" name="jmlh_item" value="<?=$results[0]['jmlh_item'];?>" class="small" /></label>
	</p>
	<p class="inline">
	  <label>Logo</label>
<?php if($results[0]['logo']==''){ ?>
		<label><input type="file" name="userfile" size="50" /></label>
<?php } else { ?>
		<label><img src="<?=base_url();?>/images/<?=$results[0]['logo'];?>"> <input type="file" name="userfile" size="50" /><label>
<?php } ?>		
	</p>  	
	<p class="inline">
	  <label>Panjang Logo</label>
	  <label><input id="pnjg" type="text" name="pnjg" value="<?php if(empty($results[0]['logo'])){ echo "0"; } else { echo $results[0]['pnjg']; } ?>" class="small" /></label>
	</p> 
	<p class="inline">
	  <label>Lebar Logo</label>
	  <label><input id="lbr" type="text" name="lbr" value="<?php if(empty($results[0]['logo'])){ echo "0"; } else { echo $results[0]['lbr']; } ?>" class="small" /></label>
	</p> 
	<input type="hidden" name="id"  value="<?=$results[0]['id'];?>"/>
	<button type="submit" name="button" value="Save" class="blue small">Save</button><button type="reset" class="blue small" onclick="window.close()" >Cancel</button>
	</fieldset>
</form>