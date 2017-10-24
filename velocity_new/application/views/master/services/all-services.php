


<!-- Page -->
<div class="page animsition" style="animation-duration: 800ms; opacity: 1;">
  <div class="page-header">
    <h1 class="page-title">SERVICE MASTER </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('dashboard'); ?>" class="icon md-home">Home</a></li>
      <li class="active">SERVICE MASTER </li>
    </ol>
    <div class="page-header-actions"> <a onclick="goBack();">
      <button class="btn btn-sm btn-primary btn-round waves-effect waves-light waves-round" type="button"> <i aria-hidden="true" class="icon md-mail-reply"></i> <span class="text hidden-xs">Back</span> </button>
      </a> </div>
  </div>
  <div class="page-content container-fluid">
    <div class="panel">
      <div class="panel-heading">
        <h3 class="panel-title">All Members &nbsp; <span class="label label-info"><?php echo $serviceNum; ?></span>
          <div class="pull-right padding-bottom-20">
			
			
			<a data-toggle="modal" data-target="#prefix">
            <button class="btn btn-sm btn-icon btn-primary waves-effect waves-light margin-bottom-5
			waves-effect waves-light"><i class="icon md-plus"></i> Add New Prefix</button>
            </a>
			<a data-toggle="modal" data-target="#add">
            <button class="btn btn-sm btn-icon btn-primary waves-effect waves-light margin-bottom-5
			waves-effect waves-light"><i class="icon md-plus"></i> Add New Services</button>
            </a>
            
            <!--
             <a target="_blank" href="<?php/*php echo site_url('clients/exportToExcel'); */?>">
            <button class="btn btn-sm btn-icon btn-primary waves-effect waves-light
			margin-bottom-5 waves-effect waves-light"><i class="icon fa fa-file-excel-o"></i> Export to excel</button>
            </a>
			-->
          </div>
        </h3>
      </div>
      <div class="panel-body container-fluid">
   
        <div class="responsive">
        <table class="tablesaw table-striped table-bordered tablesaw-columntoggle mytable dataTable no-footer">
			
            <thead>
              <tr role="row">
                <th>&nbsp;</th>
                <th>Service Name</th></a>
				<th>Prefix</th></a>
                 <th>Service Details</th>
                <th>Edit</th>
                <th>Delete</th>
				<th>Design</th>
				<th>Terms</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=1;
				
				  foreach($service as $service1) { 
			?>
              <tr>
                <td><?php echo $i; ?></td>
               
               <td><?php echo $service1->service_name; ?></td>

			
                <td><?php echo $service1->category; ?></td>
				
				<td><a href="<?php echo site_url('service/category/'.$service1->service_id)?>"> View Details</a></td>
                <td><a class="btn btn-sm btn-icon btn-primary waves-effect waves-light"
				href="<?php echo site_url('service/edit/'.$service1->service_id); ?>"><i class="icon md-edit"></i></a></td>
			
			
                <td><a class="btn btn-sm btn-icon btn-primary waves-effect waves-light" 
				href="<?php echo site_url('service/delete/'.$service1->service_id); ?>"><i class="icon md-delete" 
				onclick="return confirm('Are you sure you want to delete this Record ?')"></i></a></td>
				<td><a class="btn btn-sm btn-icon btn-primary waves-effect waves-light"
				href="<?php echo site_url('service/edit_format/'.$service1->service_id); ?>">Design Fromat</a></td>
						<td><a class="btn btn-sm btn-icon btn-primary waves-effect waves-light"
				href="<?php echo site_url('service/edit/'.$service1->service_id); ?>">Design Terms</a></td>
              </tr>
            <?php $i++; } ?>
            </tbody>
          </table>
		
			
		  </div>
        </div>  
        </div>
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
			<h4 class="modal-title text-center" >Add Service</h4>
		</div>
		<div class="modal-body">
			<form class="form-horizontal col-sm-12" id="exampleStandardForm" method="POST" action="<?php echo site_url('')?>/service/add" autocomplete="off" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group form-material">
						<label class="col-sm-4 control-label">Service Name *</label>
						<div class="col-sm-8">
						  <input type="text" placeholder="" name="txtname" value="" required class="form-control" />
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group form-material">
						<label class="col-sm-4 control-label">Prefix *</label>
						<div class="col-sm-8">
							<select name="txtprefix" class="form-control"  required>
								<?php foreach($prefix as $prefix1){?>
								<option name="<?php echo $prefix1->prefix_name; ?>"><?php echo $prefix1->prefix_name; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<div class="pull-left"><div><a><button class="btn btn-primary  waves-effect waves-round waves-light" type="submit">Submit</button></a></div></div>
			<div class="pull-right"><div><a><button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></a></div></div>
		</div>
	  
			</form>
    </div>

	</div>
</div>
<!-- update -->
<div><a id="bcd" data-toggle="modal" data-target="#update"></a></div>
<div id="update" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
		<h4>Update Content</h4>
      </div>
	
	<form action="<?php echo site_url();?>/service/update" method="post" class="form-horizontal" enctype="multipart/form-data" >
		<div class="modal-body">
		<!-- Start Controller --> 
			<div id="test"></div>
		<!-- End Controller --> 
		  <div class="modal-footer">
			<input  type="submit" class="btn btn-primary pull-left" value="update"></button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		  </div>
	</form>
    </div>
  </div>
</div>
</div>
<script>
	function my(id)
	{
		$.ajax({
			type: "GET",
			url: "<?php echo site_url('service/get_services_data/') ?>"+id,
			success: function(data){
				$('#bcd').click();
				$('#test').append(data);
			
			}
		});
	}
</script>

<!--Prefix Add-->
<div id="prefix" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title text-center" >Add Prefix</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal col-sm-12" method="POST" action="<?php echo site_url('')?>/service/prefixadd" autocomplete="off" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group form-material">
							<label class="col-sm-4 control-label">Prefix Name *</label>
							<div class="col-sm-8">
							  <input type="text" placeholder="" name="txtname" value="" required class="form-control" />
							</div>
						</div>
					</div>
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="pull-left"><div><a><button class="btn btn-primary  waves-effect waves-round waves-light" type="submit">Submit</button></a></div></div>
				<div class="pull-right"><div><a><button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></a></div></div>
			</div>
				</form>
		</div>
	</div>
</div>




	  

	