<div class="page animsition" style="animation-duration: 800ms; opacity: 1;">
  <div class="page-header">
    <h1 class="page-title">
    	Enquiry MASTER
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
      	<div class="panel-heading">
        	<h3 class="panel-title">All Enquiry 
	          	<div class="pull-right padding-bottom-20">
	            	<span class="pull-right">
	            		&nbsp;
	           		 	<?php echo anchor("enquiry/add_enquiry/"," <i class='icon icon md-plus-circle-o'></i>Add ENQUIRY",array('class'=>'btn btn-info'));?>
	          		</span> 
	      		</div>
        	</h3>
      	</div>
      <div class="panel-body container-fluid">
   		<?php if(!empty($enquiry)){	?>
        <div class="responsive">
        <table class="tablesaw table-striped table-bordered tablesaw-columntoggle mytable dataTable no-footer">
			
            <thead>
              <tr role="row">
				<th>Edit</th>
                <th>Delete</th>
                <th>Sr No.</th>
                <th>Unique Number</th>
                <th>organization</th>
                <th>Services</th>
                <th>Date</th>
                <th>Enquired by</th>
				<th>Ask Quote</th>
				<th>Send Quote</th>
				<th>BKG-CONF</th>
				<th>Agent Details</th>
				<th>Approved</th>
				<th>Lost</th>
              </tr>
            </thead>
            <tbody>
            <?php 

				  foreach($enquiry as $k=>$details) { 
			?>
              <tr>
				<td>
					<a class="btn btn-sm btn-icon btn-warning waves-effect waves-light"
					href="<?php echo site_url('enquiry/add_enquiry/'.$details->enquiry_id); ?>">
						<i class="icon md-edit"></i>
					</a>
				</td>
				
				<td>
					<a class="btn btn-sm btn-icon btn-danger waves-effect waves-light" 
					href="<?php echo site_url('organisation/delete/'.$details->enquiry_id); ?>">
					<i class="icon md-delete" onclick="return confirm('Are you sure you want to delete this Record ?')"></i>
					</a>
				</td>
				
                <td><?php echo $k+1; ?></td>
               	<td><?php echo $details->enquiry_unique_id; ?></td>
			 	<td><?php echo $details->company_name; ?></td>
                <td><?php echo $details->service_name; ?></td>
                <td><?php echo $details->added_on; ?></td>
                <td><?php echo $details->first_name?></td>
				<td>
					<a class="btn btn-sm btn-icon btn-primary waves-effect waves-light"
					href="<?php echo site_url('enquiry/ask_quotation/'.$details->enquiry_id); ?>">
					<i class="icon md-mail-send"></i>
					</a>
				</td>
				<td>
					<a class="btn btn-sm btn-icon btn-primary waves-effect waves-light"
					href="<?php echo site_url('enquiry/send_quotation/'.$details->enquiry_id.'/'.$details->contact_id); ?>">
					<i class="icon md-mail-send"></i>
					</a>
				</td>
				<td>
					<button type="button" class="btn btn-sm btn-icon btn-primary waves-effect waves-light bkng_btn" id="<?php echo $details->enquiry_id; ?>" data-target="#exampleNiftyFall" data-toggle="modal">
						<i class="icon md-edit"></i>
					</button>
				</td>
				<td>
					<a class="btn btn-sm btn-icon btn-primary waves-effect waves-light"
					href="<?php echo site_url('enquiry/send_agent_details/'.$details->enquiry_id.'/'.$details->contact_id); ?>">
					<i class="icon md-edit"></i>
					</a>
				</td>
				<td>
					<a class="btn btn-sm btn-icon btn-success waves-effect waves-light"
					href="<?php echo site_url('enquiry/approve_enquiry/'.$details->enquiry_id); ?>">
					<i class="icon md-check"></i>
					</a>
				</td>
                <td>
	                <button type="button"  class="btn btn-sm btn-icon btn-danger waves-effect waves-light bkng_btn" data-target="#reason_lost" data-toggle="modal" id="<?php echo $details->enquiry_id; ?>">
						<i class="icon md-close"></i>
					</button>
				</td>
              </tr>
            <?php  } ?>
            </tbody>
          </table>
        </div> 
         <?php }else{
         		echo "<div class='alert alert-danger'>No Enquiries found...!</div>";
         	} 
     	?>
        </div>
      </div>
    </div>
  </div>


  <!--Modal start-->
   	<div class="modal fade modal-fall" id="exampleNiftyFall" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    	<div class="modal-dialog">
	      	<div class="modal-content">
	      	<?php echo form_open('enquiry/booking_confirmation/'); ?>
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">×</span>
	          </button>
	         <!--  <h4 class="modal-title">Select Booking format</h4> -->
	        </div> 
	        <div class="modal-body">
	          	<div class="form-group form-material row">
        			<div class="col-xs-12 col-md-offset-3 col-md-6">
		        		<label class="control-label lead" for="booking_format">Select Booking Format</label>
	                  	<select class="form-control empty" id="booking_format" name="booking_format">
		                   	<?php  
		                   		foreach($booking_formats as $book) {
				                   	//$sel=($org['company_id']==@$enquiry_details[0]->company_id)?" selected":"";
				                    echo "<option value='".$book['booking_format_id']."'> ".$book['booking_format_name']."</option>";
	                  	 		} 
	                  	 	?>
	                  	</select>
	                  	<input type="hidden" name='enquiry_id' class="hidden_enquiry_id" value="" />
                	</div>
            	</div>
	        </div>
	        <div class="modal-footer">
	          <!-- <button type="button" class="btn btn-default btn-pure margin-0" data-dismiss="modal">Close</button> -->
	          <button type="submit" class="btn btn-primary save_bkf" name="save_bkf">Save changes</button>
	        </div>
	        <?php echo form_close(); ?>
	      </div>
	    </div>
  	</div>
  <!--modal end-->


 	<!--Modal start-->
   	<div class="modal fade modal-fall" id="reason_lost" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    	<div class="modal-dialog">
	      	<div class="modal-content">
	      	<?php echo form_open('enquiry/lost_enquiry/'); ?>
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">×</span>
	          </button>
	         <!--  <h4 class="modal-title">Select Booking format</h4> -->
	        </div> 
	        <div class="modal-body">
	          	<div class="form-group form-material row">
        			<div class="col-xs-12 col-md-offset-3 col-md-6">
		        		<label class="control-label lead" for="l_r">Reason for lost</label>
	                  	<input type="text" name='lost_reason' class="form-control focus" value="" required="true" id="l_r"/>
	                  	<input type="hidden" name='enquiry_id' class="hidden_enquiry_id" value="" />
                	</div>
            	</div>
	        </div>
	        <div class="modal-footer">
	          <!-- <button type="button" class="btn btn-default btn-pure margin-0" data-dismiss="modal">Close</button> -->
	          <button type="submit" class="btn btn-primary save_reason" name="save_reason">Save changes</button>
	        </div>
	        <?php echo form_close(); ?>
	      </div>
	    </div>
  	</div>
  	<!--modal end-->



  <script>
  	$(document).ready(function(){

  		$(".bkng_btn").click(function(){
  			enquiry_id = $(this).attr('id');
  			$(".hidden_enquiry_id").val(enquiry_id);
  		});



  	});
  </script>