<div class="page animsition" style="animation-duration: 800ms; opacity: 1;">
  <div class="page-header">
    <h1 class="page-title">
    	Project MASTER
    	 <span class="text-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    <?php 
		            echo $this->session->flashdata('msg'); 
		    ?>
	    </span>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('Project'); ?>" class="icon md-home">Home</a></li>
      <li class="active">Job Order</li>
    </ol>
    <div class="page-header-actions"> 
      <a onclick="goBack();">
        <button class="btn btn-sm btn-primary btn-round waves-effect waves-light waves-round" type="button"> 
          <i aria-hidden="true" class="icon md-mail-reply"></i> 
          <span class="text hidden-xs">Back</span> 
        </button>
      </a> 
    </div>
  </div>

  <div class="page-content container-fluid">
    <div class="panel">
    	<div class="panel-heading">
      	<h3 class="panel-title">
        <span class="pull-left">Client Name : <?php echo (!empty($enquiry_details['enquiry_name']))?$enquiry_details['enquiry_name']:"NA";?></span>
        <span class="pull-right">Job Type : <?php echo $enquiry_details['service_name'];?></span>
        </h3>
    	</div>
      <div class="panel-body container-fluid">
        <div class="responsive">
          <table class="table tablesaw table-striped table-bordered tablesaw-columntoggle dataTable no-footer">
            <thead>
              <tr role="row">
                <th>Stages Of Project</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($project_stages as $k=>$p) { ?>
                <tr>
                  <td><?php echo $p['service_cat_name']; ?></td>
                  <td class="start_date_td"><?php echo $p['start_date']; ?></td>
                  <td class="end_date_td"><?php echo $p['end_date']; ?></td>
                  <td>
                    <button type="button" class="btn btn-sm btn-warning waves-effect waves-light editor" data-target="#update_project" data-toggle="modal"  id="<?php echo $p['service_cat_id']; ?>">
                      <i class="icon md-edit"></i>
                    </button>   
                  </td>
                  <td>
                    <?php if($p['stage_status']==0) { ?>
                    <a class="btn btn-sm btn-success waves-effect waves-light" 
                      href="<?php echo base_url('project/complete_stage/'.$p['project_id'].'/'.$p['enquiry_id'].'/'.$p['service_cat_id']); ?>" >
                      Complete Stage
                    </a>   
                    <?php } ?>
                  </td>
                </tr>
              <?php  } ?>
            </tbody>
          </table> 
          <br />
          <h4 class="text-center">Stages which are accessible from Enquiry Module.</h4>
          <table class="tablesaw table-striped table-bordered tablesaw-columntoggle mytable dataTable no-footer">
            <thead>
              <tr role="row">
                <th>Stage No</th>
                <th>Stage Name</th>
                <th>Stage Status Description</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                foreach($project_stages_enq as $k=>$p) { 
                  $class="<i class='icon md-check-circle'></i>";
                  if(empty($p['stage_status'])){
                    $class="";
                  }
              ?>
                <tr>
                  <td><?php echo $p['stage_no']; ?></td>
                  <td><?php echo $p['stage_name']; ?></td>
                  <td><?php echo $p['stage_description']." ".$class; ?></td>
                </tr>
              <?php  } ?>
            </tbody>
          </table>
        </div> 
      </div>
    </div>
  </div>
</div>

<div class="modal fade modal-fall" id="update_project" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
  <div class="modal-dialog">
      <div class="modal-content">
      <?php echo form_open('project/update_project_data/'); ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
       <!--  <h4 class="modal-title">Select Booking format</h4> -->
      </div> 
      <div class="modal-body">
          <div class="form-group form-material row">
            <div class="col-xs-12 col-md-offset-1 col-md-5">
              Start date:<input type="date" name='start_date' class="form-control start_date" value=""/>
            </div>
            <div class="col-xs-12 col-md-6">
              End date:<input type="date" name='end_date' class="form-control end_date" value=""/>
            </div>
          </div>
          <input type="hidden" name='service_cat_id' class="hidden_sid" />
          <input type="hidden" name='project_id' value="<?php echo $project_data['project_id']?>"/>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default btn-pure margin-0" data-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-primary save_bkf" name="save_bkf">Save changes</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $(".editor").click(function(){
      $(".hidden_sid").val($(this).attr('id'));
      start_date = $(this).parent("td").siblings(".start_date_td").html();
      end_date = $(this).parent("td").siblings(".end_date_td").html();
      $(".start_date").val(start_date);
      $(".end_date").val(end_date);
    });
  });
</script>
