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
      <li class="active">Project MASTER</li>
    </ol>
    <div class="page-header-actions"> <a onclick="goBack();">
      <button class="btn btn-sm btn-primary btn-round waves-effect waves-light waves-round" type="button"> <i aria-hidden="true" class="icon md-mail-reply"></i> <span class="text hidden-xs">Back</span> </button>
      </a> </div>
  </div>
  <div class="page-content container-fluid">
    <div class="panel">
      	<div class="panel-heading">
        	<h3 class="panel-title">All Projects 
	          	<div class="pull-right padding-bottom-20">
	            	<span class="pull-right">
        		&nbsp;
       		 	<?php echo anchor("project/add_project/"," <i class='icon icon md-plus-circle-o'></i>Add Project",array('class'=>'btn btn-info'));?>
	          		</span> 
	      		</div>
        	</h3>
      	</div>
      <div class="panel-body container-fluid">
   		<?php if(!empty($project_list)){	?>
        <div class="responsive">
        <table class="tablesaw table-striped table-bordered tablesaw-columntoggle mytable dataTable no-footer">
			
            <thead>
              <tr role="row">
				<th></th>
				<th>Enquiry No</th>
				<th>Date</th>
				<th>Project ID</th>
				<th></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($project_list as $k=>$p) { ?>
     			<tr>
     				<td>
              <a class="btn btn-sm btn-icon btn-warning waves-effect waves-light" href="<?php echo base_url('enquiry/add_enquiry/'.$p['enquiry_id']); ?>">
                <!-- <i class="icon md-edit"></i> -->Edit ENQ
              </a>   
            </td>
     				<td><?php echo $p['enquiry_unique_id']; ?></td>
     				<td><?php echo $p['added_on']; ?></td>
     				<td><?php echo $p['project_unique_id']; ?></td>
     				<td>
              <a class="btn btn-sm btn-success waves-effect waves-light" 
                href="<?php echo base_url('project/view_job_order/'.$p['project_id']); ?>" >
                View Job Order
              </a>   
            </td>
 				</tr>
            <?php  } ?>
            </tbody>
          </table>
        </div> 
         <?php }else{
         		echo "<div class='alert alert-danger'>No Projects found...!</div>";
         	} 
     	?>
        </div>
      </div>
    </div>
  </div>


  
  <script>
  	$(document).ready(function(){

  	});
  </script>