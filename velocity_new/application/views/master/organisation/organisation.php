<!-- Page -->
<div class="page animsition" style="animation-duration: 800ms; opacity: 1;">
  <div class="page-header">
    <h1 class="page-title">Payroll Management</h1>
	<div class="col-md-6 col-xs-12">
		<ol class="breadcrumb">
	     <li><a href="<?php echo site_url('dashboard'); ?>" class="icon md-home">Home</a></li>
      <li class="active">ORGANISATION MASTER</li>
		</ol>
	</div>
	
	<div class="col-md-6 col-xs-12">
		<br />
		<br />
		<div class="page-header-actions">
		  <button class="btn btn-sm btn-primary btn-round waves-effect waves-light waves-round" type="button"> 
		  <i aria-hidden="true" class="icon md-mail-reply"></i> <span class="text hidden-xs">Back</span> </button>
		  </a> 
		</div>
	</div>
	<div class="clearfix"></div>
  </div>
  
  <div class="page-content container-fluid">
    <div class="panel">
      <div class="panel-heading">
           <h3 class="panel-title">All Members &nbsp; <span class="label label-info"><?php echo $companyNum; ?></span>
          <div class="pull-right padding-bottom-20">
            <a data-toggle="modal" data-target="#add">
				<button class="btn btn-sm btn-icon btn-primary waves-effect waves-light margin-bottom-5 waves-effect waves-light"><i class="icon md-plus"></i> Add Payroll Data</button>
            </a>
          </div>
        </h3>
      </div>
				
      <div class="panel-body container-fluid">
        <table class="tablesaw table-striped table-bordered tablesaw-columntoggle mytable dataTable no-footer">
              <thead>
              <tr role="row">
                <th>&nbsp;</th>
                <th>Organization Name</th></a>
                <th>organization Address</th>
                <th>organization Details</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=1;
				  foreach($company as $client) { 
			?>
              <tr>
                <td><?php echo $i; ?></td>
               
               <td><?php echo $client->company_name; ?></td>
                <td><?php echo $client->company_address; ?></td>
				
				<td><a href="<?php echo site_url('organisation/companymember/'.$client->company_id)?>"> View Details</a></td>
				<!--<td><a class="btn btn-sm btn-icon btn-primary waves-effect waves-light" 
				onclick="my(<?php echo $client->company_id; ?>);" ><i class="icon md-edit"></i></a></td>-->
                <td><a class="btn btn-sm btn-icon btn-primary waves-effect waves-light"
				href="<?php echo site_url('organisation/edit/'.$client->company_id); ?>"><i class="icon md-edit"></i></a></td>
                <td><a class="btn btn-sm btn-icon btn-primary waves-effect waves-light" 
				href="<?php echo site_url('organisation/delete/'.$client->company_id); ?>"><i class="icon md-delete" 
				onclick="return confirm('Are you sure you want to delete this Record ?')"></i></a></td>

              </tr>
            <?php $i++; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<!-- End Page -->

<!-- Add Modal-->
<div id="add" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center" >Add Content</h4>
      </div>
      <div class="modal-body">
		 <form class="form-horizontal col-sm-12" id="exampleStandardForm" method="POST" action="<?php echo site_url('')?>/organisation/add" autocomplete="off" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group form-material">
						<label class="col-sm-4 control-label">Organization Name *</label>
						<div class="col-sm-8">
						  <input type="text" placeholder="" name="txtname" value="" required class="form-control" />
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group form-material">
						<label class="col-sm-4 control-label">Organization Address *</label>
						<div class="col-sm-8">
						  <textarea class="form-control" placeholder="" name="txtaddress" required></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group form-material">
						<label class="col-sm-4 control-label">Primary Email *</label>
						<div class="col-sm-8">
						  <input type="text" placeholder="" name="txtemail1" value="" required class="form-control" />
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group form-material">
						<label class="col-sm-4 control-label">Alternate Email</label>
						<div class="col-sm-8">
						  <input type="text" placeholder="" name="txtemail2" value="" class="form-control" />
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group form-material">
						<label class="col-sm-4 control-label">Branch </label>
						<div class="col-sm-8">
						  <input type="text" placeholder="" name="txtbranch" value=""  class="form-control" />
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group form-material">
						<label class="col-sm-4 control-label">Telephone No.</label>
						<div class="col-sm-8">
						  <input type="text" placeholder="" name="txtphone" value=""  class="form-control" />
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group form-material">
						<label class="col-sm-4 control-label">Country</label>
						<div class="col-sm-8">
							<select name="txtcountery" class="form-control select2-accessible" data-plugin="select2">
								<?php foreach($country as $country1){?>
								<option value="<?php echo $country1->country_id?>"><?php echo $country1->country_name; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-sm-6">

					<div class="form-group form-material">
						<label class="col-sm-4 control-label">State</label>
						<div class="col-sm-8">
						   <select name="txtstate" class="form-control" >
								
								<?php foreach($state as $state1){?>
								<option value="<?php echo $state1->state_id; ?>"><?php echo $state1->state_name; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group form-material">
						<label class="col-sm-4 control-label">City</label>
						<div class="col-sm-8">
						   <select name="txtcity" class="form-control" >
								<?php foreach($city as $city1){?>
								<option value="<?php echo $city1->city_id;?>"><?php echo $city1->city_name; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group form-material">
						<label class="col-sm-4 control-label">Category Name </label>
						<div class="col-sm-8">
						  <select name="txtcategory" class="form-control" >
								<?php foreach($category as $category1){?>
								<option value="<?php echo $category1->category_id;?>"><?php echo $category1->category_name; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
      </div>
		<div class="modal-footer">
			<div class="pull-left">
				
					<div>
						<a>
							<button class="btn btn-primary  waves-effect waves-round waves-light" type="submit">Submit</button>
						</a>
					</div>
				
			</div>
			<div class="pull-right">
				
					<div>
						<a>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</a>
					</div>
				
			</div>
		</div>
	  
	 </form>
    </div>

  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
function calculate_payroll(){
var reg_pay, ot_pay, total_pay;
	
var reg_hour 		= $('#reg_hour').val();	
var ot 				= $('#ot').val();	
var pay_rate_id 	= $('#pay_rate_id').val();	

if(reg_hour== "" ||  reg_hour==" "){
	reg_hour=0;
}

if(ot == "" || ot==" "){
	ot=0;
}

if(pay_rate_id=="" || pay_rate_id==" "){
	pay_rate_id=0;
}



// reg_hour
// ot
// pay_rate_id
}
</script>
