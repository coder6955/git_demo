<style>

#overlay {
    width: 100%;
    height: 100%;
    display:table;
   // background: rgba(0, 0, 0, 0.5);
}
#overlay i {
   display:table-cell;
    vertical-align:middle;
    text-align:center;
}
.spin-big {
    font-size: 50px;
    height: 50px;
    width: 50px;
 
}

</style>

<!-- Page -->
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
        <table class="tablesaw table-striped table-bordered tablesaw-columntoggle mytable dataTable no-footer">
			
            <thead>
              <tr role="row">
              	<th>Sr No.</th>
				        <th>Contact Name</th>
                <th>Category</th>
                <th>Company</th>
                <th>Email ID</th>
                <th>Country</th>
                <th>State</th>
                <th>City</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php 
				  foreach(@$agent_list as $k=>$details) { 
			?>
              <tr>
                <td><?php echo $k+1; ?></td>
               	<td><?php echo $details['first_name']; ?></td>
			 	<td><?php echo $details['category_name']; ?></td>
                <td><?php echo $details['company_name']; ?></td>
                <td><?php echo $details['email_id']; ?></td>
                <td><?php echo $details['country_name']; ?></td>
                <td><?php echo $details['state_name']; ?></td>
                <td><?php echo $details['city_name']; ?></td>
				<td  class="<?php echo $details['email_id']; ?>">
					<a class="btn btn-sm btn-icon btn-warning waves-effect waves-light mail_send" href="<?php echo base_url('enquiry/display_ask_email/'.$details['contact_id'].'/'.$enquiry_id); ?>">
						Send Mail <i class="icon md-mail-send"> </i>
					</a>
				</td>
              </tr>
            <?php  } ?>
            </tbody>
          </table>
        </div>  
        </div>
      </div>
    </div>
  </div>
</div>
<script>



	$(document).ready(function(){

		enquiry_id="<?php echo $enquiry_id; ?>";
		
		$(".mail_send").click(function(){
			$("#email_to").val($(this).parent().attr("class"));

			$.get("<?php echo base_url('enquiry/get_enquiry_mails'); ?>", function(data, status){
				data=JSON.parse(data);
				$("#email_cc").html("<option></option");
        		$.each(data,function(k,v){
        			$("#email_cc").append("<option>"+v['email_id']+"</option");
        		});
    		});
 
			main_url="<?php echo base_url(); ?>enquiry/get_temp_filled_checklist/"+enquiry_id;
			$.ajax({
					url:main_url,
					type:"POST",
					success:function(res){

						res=JSON.parse(res);
						//console.log(res);
						data="";
						remaining_field=[];
						table_st='<div class="table-responsive"><table class="table table-hover table-striped table-bordered"><thead><tr><th>Name</th><th>Description</th><th></th></tr></thead><tbody>';
						table_end='<tbody></table></div>';
						$.each(res,function(key,value){
							if(value['check_description']==""){
								remaining_field[value['checklist_id']]=value['checklist_name'];
								return true ;
							}
							data=data+"<tr><td>"+value['checklist_name']+"</td><td>"+value['check_description']+"</td><td><button class='btn btn-warning btn-sm'><i class='md-edit'></i></button> <button class='btn btn-danger btn-sm'><i class='md-delete'></i></button></td></tr>";
						});

						$("#enquiry_checklist_data").html(table_st+data+table_end);

					},
					error:function(res){
						alert("error");
					}
			});
		});

		
	});
</script>