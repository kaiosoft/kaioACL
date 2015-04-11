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
	$( "#add-<?=$c;?>" )
	.button()
	.click(function() {
		$("#popup").html('Please wait');
		$("#popup").dialog({
			height: 530,
			width: 650,
			modal:true,
			closeOnEscape: false,
			title: 'Add',
			buttons: {
				"Save": function() {
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
					$("#form_user").submit();
				},
				Cancel: function() {
					$(this).dialog('close');
				}
			}
		}); 
		
		$.ajax({
			 url: '<?php echo base_url(); ?>index.php/user/edit', 
			 type: "POST",
			 dataType: "html", // Note, we tell Ajax to expect HTML back;
			 async:true,
			 success: function(msg){
			  // Upon success do set HTML we got back in the popup;
			  $("#popup").html(msg);
			 }
		});
	});
	
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
				height: 530,
				width: 650,
				modal:true,
				closeOnEscape: false,
				title: 'Edit',
				buttons: {
					"Save": function() {
						$("#form_user").validate();
						$("#form_user").submit();
					},
					Cancel: function() {
						$(this).dialog('close');
					}
				}					
			}); 
			
			$.ajax({
				 url: '<?php echo base_url(); ?>index.php/user/edit/'+id[0], 
				 type: "GET",
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
 
 	$( "#delete-<?=$c;?>" )
	.button()
	.click(function() {
        var id = [];
        $("input[name='box[]']:checked").each(function(i){
          id[i] = $(this).val();
        });
	
		if(id.length > 0){
			$("#popup").html('Please wait');
			$("#popup").dialog({
				height: 200,
				modal:true,
				closeOnEscape: false,
				title: 'Delete',
				buttons: {
					"Delete": function() {
						$("#form_user").submit();
					},
					Cancel: function() {
						$(this).dialog('close');
					}
				}	
			}); 
			
			$.ajax({
				 url: '<?php echo base_url(); ?>index.php/user/confirm/', 
				 type: "POST",
				 data: ({id : id }),
				 dataType: "html", 
				 async:true,
				 success: function(msg){
				  // Upon success do set HTML we got back in the popup;
				  $("#popup").html(msg);
				 }
			});
		} else if(id='undefined'){
			alert('Pilih data yang ingin di hapus!!');
		}
	});
	
	$('.check-all').on('click', function () {
        $(this).closest('table').find(':checkbox').prop('checked', this.checked);
    });
	
 });
</script>
<div id="popup"></div>

<form class="form" action="<?=$action;?>" />
<!-- cek yg berhak add -->
<?php
	if($this->acl->cek_acl($c,'add',$this->session->userdata('user_id'))){
?>
<a href="#" id="add-<?=$c;?>" title="Add">Add</a> 
<?php
	}
?>
<!-- cek yg berhak edit -->
<?php
	if($this->acl->cek_acl($c,'edit',$this->session->userdata('user_id'))){
?>
<a href="#" title="Edit" id="edit-<?=$c;?>">Edit</a> 
<?php
	}
?>
<!-- cek yg berhak hapus -->
<?php
	if($this->acl->cek_acl($c,'hapus',$this->session->userdata('user_id'))){
?>
<a href="#" title="Delete" id="delete-<?=$c;?>">Delete</a> 
<?php
	}
?>
<p></p>
<section class="grid_12" id="dashtabs">
	<div class="box-header">User List</div>
	<div id="dashtabs-pages" class="box-content no-padding">
	  <table width="100%" class="table no-border" >
		<thead>
		  <tr>
			<td>#</td>
			<td class="tc checkbox"><input class="check-all" type="checkbox"></td>
			<td width="250">Name</td>
			<td width="183">username</td>
			<td width="250">Group</td>
			<td width="250">Last Login</td>
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
			<td><?=$res->last_login;?></td>
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
