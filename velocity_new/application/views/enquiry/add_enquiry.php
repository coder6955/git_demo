<?php 
	$contact_id="";
	$display="display:none;";
	if(isset($enquiry_details)){
		$contact_id=$enquiry_details[0]->contact_id;
		if(isset($enquiry_details['temp_checklist']))
			$display="";
	}
?>


<div class="page animsition" style="animation-duration: 800ms; opacity: 1;">

  	<div class="page-header">
	    <h1 class="page-title">
	    	<?php echo $title;?>
	    	<span class="text-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    			<?php 
            		echo $this->session->flashdata('msg'); 
    			?>
    		</span>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="<?php echo site_url('enquiry'); ?>" class="icon md-home">Home</a></li>
	      <li class="active">Enquiry MASTER</li>
	    </ol>
	    <div class="page-header-actions"> 
	    	<a onclick="goBack();">
	      		<button class="btn btn-sm btn-primary btn-round waves-effect waves-light waves-round" type="button"> 
	  			<i aria-hidden="true" class="icon md-mail-reply"></i> <span class="text hidden-xs">Back</span> </button>
	      	</a> 
	  	</div>
  	</div>

  	<div class="page-content container-fluid">
  		<?php 
  			$attributes = array('id' => 'enquiry_form');
  			echo form_open('enquiry/save_enquiry/'.@$enquiry_id); 
		?>
  	<ul class="blocks-xs-100 blocks-md-2">

	  	<li>
	    	<div class="panel">
	      		<!-- <div class="panel-heading">
	        		<h3 class="page-header"><?php echo $title;?> </h3>
	      		</div> -->

	  			<div class="panel-body container-fluid">
	   				<!-- <div class="row">
	   					<div class="col-md-7" style="border:1px solid red;"> -->
   						 	<div class="responsive">
				        		<div class="form-group form-material row">
				        			<div class="col-xs-12 col-md-6">
						        		<label class="control-label lead" for="org">Select Organization</label>
					                  	<select class="form-control empty" id="org" name="org">
						                    <option value=""></option>
						                   <?php  foreach($all_orgs as $org) {
						                   	$sel=($org['company_id']==@$enquiry_details[0]->company_id)?" selected":"";
						                    echo "<option value='".$org['company_id']."' ".$sel."> ".$org['company_name']."</option>";
						                  	 } ?>
					                  	</select>
				                	</div>
				                	<div class="col-xs-12 col-md-6">
					                	<label class="control-label  lead" for="contact_name">Select Contact Name</label>
					                  	<select id="contact_name" class="form-control empty" name="contact_name">
					                    	<option value=""></option>
					                  	</select>
				                	</div>
			                	</div>
				                <div class="form-group form-material  row">
				                	<div class="col-xs-12 col-md-6">
				            			<label class="control-label  lead" for="service_type">Select Service Type</label>
					                  	<select class="form-control empty" id="service_type" name="service_type" placeholder="">
					                    	<option value=""></option>
						                    <?php  foreach($all_services as $service) {
						                    	$sel=($service['service_id']==@$enquiry_details[0]->service_id)?" selected":"";
						                    echo "<option value='".$service['service_id']."' ".$sel.">".$service['service_name']."</option>";
						                  	 } ?>
					                  	</select>
				                	</div>
				                	<div class="col-xs-12 col-md-6">
					                 	<label class="control-label  lead" for="soe">Source Of Enquiry</label>
					                  	<select class="form-control empty" name="soe" id="soe">
						                    <option value=""></option>
						              		<?php  foreach($all_enquiry_source as $es) {
					              			$sel=($es['soe_id']==@$enquiry_details[0]->soe_id)?" selected":"";
						                    echo "<option value='".$es['soe_id']."'  ".$sel.">".$es['soe_name']."</option>";
						                  	 } ?>
					                 	 </select>
				                	</div>
			                	</div>
			                	<div class="form-group form-material  row">
			                		<div class="col-xs-12 col-md-6">
					                	<label class="control-label  lead" for="mobile_no">Mobile No</label>
					                  	<input class="form-control empty" name="mobile_no" id="mobile_no" type="tel"  pattern="[0-9]+" value="<?php echo @$enquiry_details[0]->enquiry_mobile_no; ?>" >
				                	</div>
				                	<div class="col-xs-12 col-md-6">
					                	<label class="control-label  lead" for="alt_mobile_no">Alternate Mobile No</label>
					                  	<input class="form-control empty" name="alt_mobile_no" id="alt_mobile_no" type="tel"  pattern="[0-9]+" value="<?php echo @$enquiry_details[0]->enquiry_alternate_no; ?>" >
				                	</div>
			                	</div>
				                <div class="form-group form-material  row">
				                	<div class="col-xs-12 col-md-6">
					                	<label class="control-label lead" for="email">Email ID</label>
					                  	<input class="form-control empty" name="email" id="email" type="email" value="<?php echo @$enquiry_details[0]->enquiry_email_id; ?>">
				                	</div>
				                	<div class="col-xs-12 col-md-6">
					                	<label class="control-label  lead" for="email1">Alternate Email ID </label>
					                  	<input class="form-control empty" name="email1" id="email1"  type="email" value="<?php echo @$enquiry_details[0]->alternate_email_id_1; ?>">
				                	</div>
			                	</div>
				                <div class="form-group form-material  row">
			                		<div class="col-xs-12 col-md-12">
					                	<label class="control-label  lead" for="address">Address</label>
					                  	<textarea class="form-control empty" rows="2" name="address" id="address"><?php echo @ltrim($enquiry_details[0]->enquiry_address_line_1); ?></textarea>
				                	</div>
			                	</div>
				                <div class="form-group form-material">
				                	<button type="submit" class="btn btn-success">Submit</button>
				                </div>
    						</div>  
   					<!-- 	</div>
   					</div> -->
		  		</div> 
	    	</div>
	    </li>	

	    <li>
	    	<div class="panel service_panel" style=<?php echo $display; ?> >
	      	    <div class="panel-heading">
	        		<h3 class="page-header text-center">Fill Checklist Details </h3>
	      		</div>
		     
	  			<div class="panel-body container-fluid " >
	   				<div class="row">
	   					<div class="col-md-12">
   						 	<div class="responsive" id="my_check_list" >
    							<?php 
    								if(!empty($enquiry_details['temp_checklist'])){
    									foreach ($enquiry_details['temp_checklist'] as $index => $qn_ans) {
    										$data=  '<label class="control-label" for="chklist_'.$qn_ans['checklist_id'].'">'.$qn_ans['checklist_name'].'</label><input class="form-control empty" name="chklist['.$qn_ans['checklist_id'].']" id="chklist_'.$qn_ans['checklist_id'].'" type="text" value="'.$qn_ans['check_description'].'">';
    										if(($index+1)%2==1){
												$div_st =  '<div class="form-group form-material row"><div class="col-xs-12 col-md-6">';
    											$div_end = '</div>';
    										}else{
    											$div_st=  '<div class="col-xs-12 col-md-6">';
    											$div_end = '</div></div>';
    										}
    										echo $div_st.$data.$div_end;
    									}
    								}
    							?>
    						</div>  
	   					</div>
	   				</div>
		  		</div> 
	    	</div>
	    </li>	
	</ul>
		<?php echo form_close(); ?>
  	</div>
</div>	
<script>
	
	function get_contacts(con=""){
			
			org=$("#org").val();
			$("#contact_name").html('<option value=""></option> ');

			if(org==""){
				return false;
			}
	
			main_url="<?php echo base_url(); ?>enquiry/get_enquiry_contacts/"+org;
			$.ajax({
					url:main_url,
					type:"POST",
					success:function(res){
						res=JSON.parse(res);
						sel="";
						$.each(res,function(key,value){
							$("#contact_name").append("<option value='"+value['contact_id']+"'>"+value['first_name']+"</option>");
						});
						$("#contact_name").val(con);
					},
					error:function(res){
						alert("error");
					}
			});		
	}

	$(document).ready(function(){

		con="<?php echo $contact_id; ?>";
		
		get_contacts(con);
		
		$("#org").change(function(){
			get_contacts();
		});

		$("#contact_name").change(function(){
			contact_id=$("#contact_name").val();
			if(contact_id==""){
				return false;
			}
			main_url="<?php echo base_url(); ?>enquiry/get_enquiry_mails/"+contact_id;
			$.ajax({
					url:main_url,
					type:"POST",
					success:function(res){
						res=JSON.parse(res);
						$("#email").val(res.email_id);
					},
					error:function(res){
						alert("error");
					}
			});
		});

		$("#service_type").change(function(){
			service=$("#service_type").val();
			$("#my_check_list").html('');
			if(service==""){
				$(".service_panel").hide();
				return false;
			}
			$(".service_panel").show();
			main_url="<?php echo base_url(); ?>enquiry/get_checklist/"+service;
			$.ajax({
					url:main_url,
					type:"POST",
					success:function(res){
						res=JSON.parse(res);   
						data="";
						$.each(res,function(key,value){
							sr_no=key+1;
							if(sr_no%2==1){
								div_st = '<div class="form-group form-material row"><div class="col-xs-12 col-md-6">';
								div_end = "</div>";
							}else{
								div_st = '<div class="col-xs-12 col-md-6">';
								div_end="</div></div>";
							}
							data = data+div_st+'<label class="control-label" for="chklist_'+value['checklist_id']+'">'+value['checklist_name']+'</label><input class="form-control empty" name="chklist['+value['checklist_id']+']" id="chklist_'+value['checklist_id']+'" type="text">'+div_end;
						});

						$("#my_check_list").html(data);
					},
					error:function(res){
						alert("error");
					}
			});
		});

	});
</script>