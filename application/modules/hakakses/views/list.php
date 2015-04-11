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
	$( "#edit-<?=$c;?>" )
	.button()
	.click(function() {
        var id = [];
        $("input[name='box[]']:checked").each(function(i){
          id[i] = $(this).val();
        });
		
		if(id[0]){
			$("#popup").html('Please wait');
			$("#popup").dialog({
				height: 630,
				width: 550,
				modal:true,
				closeOnEscape: false,
				title: 'Edit',
				buttons: {
					"Save": function() {
						$("#myform").submit();
					},
					Cancel: function() {
						$(this).dialog('close');
					}
				}
			}); 
			
			$.ajax({
				 url: '<?php echo base_url(); ?>index.php/<?=$c;?>/edit/'+id[0], 
				 type: "POST",
				 dataType: "html", 
				 async:true,
				 success: function(msg){
				  // Upon success do set HTML we got back in the popup;
				  $("#popup").html(msg);
				 }
			});
		} else if(id='undefined'){
			alert('Pilih data yang ingin di edit!!');
		}

	});
 
	$('.check-all').on('click', function () {
        $(this).closest('table').find(':checkbox').prop('checked', this.checked);
    });
	
 });
</script>
<div id="popup"></div>

<form class="form" action="<?=$action;?>" />
<!-- cek yg berhak edit -->
<?php
	if($this->acl->cek_acl($c,'edit',$this->session->userdata('user_id'))){
?>
<a href="#" title="Edit" id="edit-<?=$c;?>">Edit</a> 
<?php
	}
?>
<p></p>
<section class="grid_12" id="dashtabs">
	<div class="box-header">Hak Akses List</div>
	<div id="dashtabs-pages" class="box-content no-padding">
	  <table width="100%" class="table no-border" >
		<thead>
		  <tr>
			<td width="17">#</td>
			<td width="20" class="tc checkbox"><input class="check-all" type="checkbox"></td>
			<td width="541">Name</td>
			<td width="296">Username</td>
			<td width="183">Group</td>
		  </tr>
		</thead>
		<tbody>
	<?php 
		$i=1;
		foreach($results as $res){ ?>
		  <tr class="alt">
			<td><?=$page+$i;?></td>
			<td class="tc"><input type="checkbox" name="box[]" id="box<?=$i;?>" value="<?=$res->user_id;?>"></td>
			<td><?=$res->name;?></td>
			<td><?=$res->k_username;?></td>
			<td><?=$res->group_name;?></td>
		  </tr>
	<?php 
			$i++;
		} 
	?>	
		</tbody>
	  </table>
	</div>
	
	<div class="box-footer"> <span class="txt-smaller txt-light">Showing <?=$jmlh_item;?> results of <?=$jmlh_data;?></span>
		<ul class="pagination">
			<?php echo $this->pagination->create_links(); ?>
		</ul>
	</div> 
</section>
<p></p>
Page rendered in <strong>{elapsed_time}</strong> seconds	
</form>
<?php
/* End of file friend.php */
/* Location: ./application/views/friend.php */
