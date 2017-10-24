<!-- Page -->
<div class="page animsition" style="animation-duration: 800ms; opacity: 1;">
  <div class="page-header">
    <h1 class="page-title"><?php echo $title; ?></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('dashboard'); ?>" class="icon md-home">Home</a></li>
      <li class="active">Enquiry MASTER</li>
    </ol>
    <div class="page-header-actions"> <a onclick="goBack();">
      <button class="btn btn-sm btn-primary btn-round waves-effect waves-light waves-round" type="button"> <i aria-hidden="true" class="icon md-mail-reply"></i> <span class="text hidden-xs">Back</span> </button>
      </a> </div>
  </div>
  <div class="page-content container-fluid">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="responsive">
        	<form class="form-horizontal" action="<?php echo base_url('enquiry/send_mail/'.@$enquiry_id.'/'.@$mail_type);?>" enctype="multipart/form-data" method="POST">
	  	  			<div class="form-group form-material">
			        	<label class="control-label col-sm-3" for="email_from">From :</label>
			        	<div class="col-sm-7">
			          		<input class="form-control empty" name="email_from" id="email_from" type="email"  value="<?php echo $email_from; ?>">
			          	</div>
	    			</div>

	    			<div class="form-group form-material">
			        	<label class="control-label col-sm-3" for="email_to">To :</label>
			        	<div class="col-sm-7">
		          		 	<?php 
				        		if(in_array($mail_type, array(0,1,3))){
				        	?>
				          		<input class="form-control empty" name="email_to" id="email_to" type="email" value="<?php echo $email_to['email_id']; ?>">
				          		<input class="form-control empty" name="contact_id_email_to"  type="hidden" value="<?php echo $email_to['contact_id']; ?>">
				          		<input class="form-control empty" name="company_id_email_to"  type="hidden" value="<?php echo $email_to['company_id']; ?>">
					          	<?php  
					          		}else{
					          	?>	
				          		<select id="email_cc"  class="form-control empty" name="email_to" required="true">
			                    	<option value=""></option>
			                    	<?php 
			                    		foreach ($email_to as $key => $email_id){
			                    		 	echo "<option value='".$email_id['company_id']."#".$email_id['contact_id']."#".$email_id['email_id']."'>".$email_id['email_id']."</option>";
			                    		 } 
			                    	?>
			                  	</select>
			                  	<input class="form-control empty" name="booking_format_id"  type="hidden" value="<?php echo $booking_format_id; ?>">
			                  	
				          		<?php } ?> 
			          	</div>
	    			</div>

	    			<div class="form-group form-material">
			        	<label class="control-label col-sm-3" for="email_cc">Add CC :</label>
			        	<div class="col-sm-7">
			        		<!--cc start  -->
			          		<select id="email_cc"  class="form-control empty my_select" name="email_cc[]" multiple="multiple">
		                    	<option value=""></option>
		                    	<?php 
		                    		foreach ($email_list_for_cc as $key => $email_id) {
		                    		 	echo "<option value='".$email_id['contact_id']."#".$email_id['email_id']."'>".$email_id['email_id']."</option>";
		                    		 } 
		                    	?>
		                  	</select>
		                  	<!--cc start  -->
			          	</div>
	    			</div>

	    			<div class="form-group form-material">
			        	<label class="control-label col-sm-3" for="sub">Subject :</label>
			        	<div class="col-sm-7">
			          		<input class="form-control empty" name="sub" id="sub" type="text" value="<?php echo @$subject; ?>" <?php echo (!empty($subject))?"readonly='true'":"";  ?> >
			          	</div>
	    			</div>

	    			<div class="form-group form-material">
			        	<label class="control-label col-sm-3" for="up_file">Upload File :</label>
			        	<div class="col-sm-7">
			          		<input class="form-control empty" name="up_file" id="up_file" type="file">
			          	</div>
	    			</div>

	    			<div class="form-group form-material">
			        	<label class="control-label col-sm-3" for="msg">Message :</label>
			        	<div class="col-sm-7">
			        		<?php 	
			        			$required='readonly="true"';
			        			if(empty($msg_body)){
			        				$required="";
		        				} 
	        				?>
			          		<textarea class="form-control empty" rows="3" name="msg" id="msg" <?php echo $required; ?> ><?php echo @$msg_body;?></textarea>
			          	</div>
	    			</div>



	    			<?php if( !empty($chk_fields_empty) || !empty($chk_fields_filled) ){ ?>

	    			<div class="form-group form-material">
			        	<div class="col-sm-offset-3 col-sm-7 chklist_panel" >

			        		<?php 
			        			if(!empty($chk_fields_empty)){
	        				?>
	        					<div class='form-group form-material'>
	   								<div class='col-sm-offset-10 col-sm-2'>
	   									<button type="button" class='btn btn-info btn-sm add_record'><i class='md-plus'></i> Add new record</button> 
	   								</div>
   								</div>		
	        				<?php
			        			}
			        		?>

					   		<?php 
					   			if(!empty($chk_fields_filled)){
						   			foreach ($chk_fields_filled as $c_id => $c_desc) {
			   				?>			
			   							<div class='form-group form-material' id="div_<?php echo $c_id; ?>">
			   								<label class='control-label col-sm-3' for='msg'><?php echo $c_desc[0]; ?></label>
				   							<div class='col-sm-7'>
				   								<input type='text' class='form-control empty desc' name="checklist_val[<?php echo $c_id; ?>]" id="<?php echo $c_id; ?>" value='<?php echo $c_desc[1]; ?>' readonly="true"/>
			   									<input type='hidden' class='form-control empty desc' name="checklist_name[<?php echo $c_id; ?>]"  value='<?php echo $c_desc[0]; ?>' readonly="true"/>
			   								</div>
			   								<div class='col-sm-2'>
			   									<button type="button" class='btn btn-warning btn-sm edit' id="<?php echo $enquiry_id."/".$c_id; ?>"><i class='md-edit'></i></button> 
			   									<button type="button" class='btn btn-danger btn-sm del' id="<?php echo $enquiry_id."_".$c_id; ?>"><i class='md-close'></i></button>
			   								</div>
		   								</div>		
						   	<?php		
						   			}
					   			}
					   		?>
			          	</div>
	    			</div>
	    			<?php } ?>



	    			<!-- terms_start -->
    				
				   		<?php if(!empty($terms_service)){ ?>
			   				<div class="form-group form-material">
		        				<div class="col-sm-offset-3   col-sm-7">
		        				<?php
					   				echo "<h4>Terms & Conditions are as follows:</h4>";
					   				echo "<ul  class='list-group' >";
						   			foreach ($terms_service as $key => $note) {
										echo "<li class='list-group-item ' style='border:1px solid #ddd'>".$note['note_name']."</li>";
						   			}
						   			echo "</ul>";
					   			?>
					   			</div>
				   			</div>
				   		<?php } ?>
					   		
	    			<!-- terms_end -->


		    			<!-- booking_start -->
		    			<?php 
				   			if(!empty($booking_chklist)){
		   				?>
	    				<div class="form-group form-material">
				        	<div class="col-sm-offset-3 col-sm-7" >
			   						<div class="alert alert-success" id="toggler">
				   						<p href="#" id="show_list">
				   							<b>Display booking details form</b> 
				   							<span class="pull-right"><i class="icon md-triangle-down" ></i></span>
			   							</p>
		   							</div>
			   						<div class="panel-body panel-success" id="bkng_list" style="border:1px solid #ddd;">
				   				<?php
							   			foreach ($booking_chklist as $key => $bkng) {
							   				//if($bkng['map_booking_format_id']==35){

						   					?>
					   						<!-- <div class='form-group form-material' id="div_<?php echo $bkng['map_booking_format_id']; ?>">
				   								
					   							<div class='col-sm-3'>
					   								<input type='button' class='btn btn-warning' value="Add Conatiner details" id="add_container"/>
				   								</div><br >
				   								<div class="col-sm-12 add_container_details">
				   									<div class="heading"></div>
				   									<div class="show_container"></div>
				   								</div>
		   									</div>	 -->
						   					<?php
							   					//continue;
							   				//}
				   				?>			
				   							<div class='form-group form-material' id="div_<?php echo $bkng['map_booking_format_id']; ?>">
				   								<label class='control-label col-sm-3' for='msg'><?php echo $bkng['booking_checklist_name']; ?></label>
					   							<div class='col-sm-7'>
					   								<input type='text' class='form-control focus' name="bkng[<?php echo $bkng['map_booking_format_id']; ?>]" id="<?php echo $bkng['map_booking_format_id']; ?>" value=''/>
						<input type='hidden'  name="bkng1[<?php echo $bkng['map_booking_format_id']; ?>]"  value="<?php echo $bkng['booking_checklist_name']; ?>"/>
				   								</div>
			   								</div>		
							   	<?php		
							   			}
					   			?>
					   				</div>
					   		</div>
			          	</div>
			          	<?php
				   			}
				   		?>
		    			<!-- booking_end -->

		    			<!-- Agent list start -->
		    			
		    			<?php if(!empty($list_of_agent) && $mail_type=="3"){ ?>
    						<div class="form-group form-material">
				        		<div class="col-sm-offset-3 col-sm-7" >
				        			<div class="panel panel-default">
					        			<div class="panel-body panel-success" style="background-color: #ddd;" >
					        				<div class='form-group form-material'>

				   								<label class='control-label col-sm-3'>Select Agent :</label>
				   								<div class='col-sm-7'>
				   									<select class="form-control focus" id="sel_agent">
				   										<option value=""></option>
									        			<?php foreach($list_of_agent as $agent){ ?>
									        				<option value="<?php echo $agent['contact_id']?>"><?php echo $agent['email_id']?></option>
							        					<?php } ?>
						        					</select>
						        				</div>

						        				<label class='control-label col-sm-3'>Company Name :</label>
				   								<div class='col-sm-7'>
				   								<input type='text' class='form-control focus' name="company_name" id="company_name" />
						        				</div>

						        				<label class='control-label col-sm-3'>First name :</label>
				   								<div class='col-sm-7'>
				   								<input type='text' class='form-control focus' name="first_name" id="first_name" />
						        				</div>

						        				<label class='control-label col-sm-3'>Mobile No :</label>
				   								<div class='col-sm-7'>
				   								<input type='text' class='form-control focus' name="mob_no" id="mob_no" />
						        				</div>

						        				<label class='control-label col-sm-3'>Tel No :</label>
				   								<div class='col-sm-7'>
				   								<input type='text' class='form-control focus' name="tel_no" id="tel_no" />
						        				</div>

						        				<label class='control-label col-sm-3'>Address :</label>
				   								<div class='col-sm-7'>
				   								<input type='text' class='form-control focus' name="addr" id="addr" />
						        				</div>

						        			</div>
						        		</div>
					        		</div>
				        		</div>
			        		</div>
    					<?php } ?>
		    			<!-- Agent list end -->


	    			<div class="form-group form-material">
			        	<label class="control-label col-sm-3" for="remark">Remark :</label>
			        	<div class="col-sm-7">
			          		<textarea class="form-control empty" rows="2" name="remark" id="remark" placeholder="Optional"></textarea>
			          	</div>
	    			</div>

	    			<div class="form-group form-material">
			        	<div class="col-sm-offset-3 col-sm-7">
			          		<input type="submit" class="btn btn-success" value="Send" name="sbmt">
			          	</div>
	    			</div>
			</form>
        </div>  
        </div>
      </div>
    </div>
  </div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<script>

	$(document).ready(function(){

			$(".my_select").select2();

			$(".add_record").click(function(){
				$(".add_record").hide();
				enquiry_id="<?php echo $enquiry_id; ?>";
				get_all_not_filled_chk_list = '<?php echo @$chk_fields_empty; ?>';
				empty_chk_fileds=JSON.parse(get_all_not_filled_chk_list);
				div_1="";
				$.each(empty_chk_fileds, function(c_id, c_desc){
					div_1='<div class="form-group form-material" id="div_'+c_id+'"><label class="control-label col-sm-3" for="msg">'+c_desc+'</label><div class="col-sm-7"><input type="text" class="form-control empty desc" name="checklist_val['+c_id+']" id="'+c_id+'" value=""/><input type="hidden" class="form-control empty desc" name="checklist_name['+c_id+']"  value="'+c_desc+'"/></div><div class="col-sm-2"><button type="button" class="btn btn-success btn-sm edit_dynamic" id="'+enquiry_id+"-"+c_id+'"><i class="md-check"></i></button> <button type="button" class="btn btn-danger btn-sm del_dynamic" id="'+enquiry_id+"__"+c_id+'" style="display:none;"><i class="md-close"></i></button> </div></div>';		;
					$(".chklist_panel").append(div_1);
				});
				
				

			});

			$(".edit").click(function(){ 
				btn_id=$(this).attr("id");
				values=btn_id.split("/");
				if($(":input#"+values[1]).attr("readonly")){
					$(":input#"+values[1]).attr("readonly", false);
					$(":input#"+values[1]).focus();
					$(this).children().attr("class","md-check");
					$(this).removeClass("btn-warning").addClass("btn-success");
				}else{
				 	$(":input#"+values[1]).attr("readonly", true);
				 	$(this).children().attr("class","md-edit");
					$(this).removeClass("btn-success").addClass("btn-warning");
				}
			});

			$("body").on("click",".edit_dynamic",function(){
				save_data($(this).attr("id"));
			});

			$("body").on("click",".del_dynamic",function(){
				btn_id=$(this).attr("id");
				values=btn_id.split("__");
				//$("#div_"+values[1]).remove();	
				$(":input#"+values[1]).val("");
			});

			
			$(".del").click(function(){
					btn_id=$(this).attr("id");
					values=btn_id.split("_");
					//$("#div_"+values[1]).remove();
					$(":input#"+values[1]).val("");	
			});

			$("#bkng_list").toggle();
			$("#show_list").click(function(){
				$("#bkng_list").toggle();
				if($("#bkng_list").is(":visible")==false){
					$('#toggler p  b').html("Fill/Show booking details form"); 
					$("#toggler p span i").removeClass("md-triangle-up").addClass("md-triangle-down");
				}else{
					$('#toggler p  b').html("Hide/Reset booking details"); 
					$("#toggler p span i").removeClass("md-triangle-down").addClass("md-triangle-up");
				}
			});

			/*$("#add_container").click(function(){
				//input='<div class="row"><div class="col-sm-4"><div class="example-wrap"><input class="form-control focus" type="text"></div></div><div class="col-sm-4"><input class="form-control focus" type="text"></div><div class="col-sm-4"><input class="form-control focus" type="text"></div></div>';
				get_container_types=<?php echo $container_types; ?>; 
				get_container_volumes=<?php echo $container_volumes; ?>;

				sel_c_type="<div class='col-sm-3'><div><select class='form-control focus'><option value=''>--select--</option>";
				$.each(get_container_types, function(k,v){
					//console.log(v);
					sel_c_type+="<option value='"+v['container_id']+"'>"+v['container_name']+"</option>";
				});
				sel_c_type+="</select></div></div>";

				sel_c_volume="<div class='col-sm-3'><div><select class='form-control focus'><option value=''>--select--</option>";
				$.each(get_container_volumes, function(k,v){
					console.log(v);
					sel_c_volume+="<option value='"+v['volume_id']+"'>"+v['volume_name']+"</option>";
				});
				sel_c_volume+="</select></div></div>";

				heading1='<div class="col-sm-3 text-center" ><label>No of conatiners</label></div>';
				heading2='<div class="col-sm-3 text-center"><label>Type of conatiners</label></div>';
				heading3='<div class="col-sm-3 text-center"><label>Volume of conatiners</label></div><div class="col-sm-3"><label>&nbsp;</label></div>';

				heading=heading1+heading2+heading3;
				input1='<div class="col-sm-3"><div class=""><input class="form-control focus" type="text" pattern="\d{1,15}"></div></div>';
				data='<div class="row">'+input1+sel_c_type+sel_c_volume+'</div>';

				$(".add_container_details div.heading").html(heading);
				$(".add_container_details div.show_container").append(data);
			});*/

			$("#sel_agent").change(function(){
				agent=$("#sel_agent").val();
				if(agent==""){
					return false;
				}

				main_url="<?php echo base_url(); ?>enquiry/get_agent_info/"+agent;
				$.ajax({
						url:main_url,
						type:"POST",
						success:function(res){
							res=JSON.parse(res);
							$("#company_name").val(res['company_name']);
							$("#mob_no").val(res['mobile_no']);
							$("#tel_no").val(res['telephone_no']);
							$("#addr").val(res['company_address']);
							$("#first_name").val(res['first_name']);
						},
						error:function(res){
							alert("error");
						}
				});		
	
			});

	});


	function save_data(btn_id){
		values=btn_id.split("-");
		if($(":input#"+values[1]).attr("readonly")){
			$(":input#"+values[1]).attr("readonly", false);
			$(":input#"+values[1]).focus();
			$("#"+btn_id).children().attr("class","md-check");
			$("#"+btn_id).removeClass("btn-warning").addClass("btn-success");
		}else{
		 	$(":input#"+values[1]).attr("readonly", true);
		 	$("#"+btn_id).children().attr("class","md-edit");
			$("#"+btn_id).removeClass("btn-success").addClass("btn-warning");
			$("#"+values[0]+"__"+values[1]).show();
		}
	}
</script>