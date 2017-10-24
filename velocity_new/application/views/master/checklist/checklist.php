<!-- Page -->
<div class="page animsition" style="animation-duration: 800ms; opacity: 1;">
  <div class="page-header">
    <h1 class="page-title">Checklist MASTER</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('dashboard'); ?>" class="icon md-home">Home</a></li>
      <li class="active">Checklist MASTER</li>
    </ol>
    <div class="page-header-actions"> <a onclick="goBack();">
      <button class="btn btn-sm btn-primary btn-round waves-effect waves-light waves-round" type="button"> <i aria-hidden="true" class="icon md-mail-reply"></i> <span class="text hidden-xs">Back</span> </button>
      </a> </div>
  </div>
  <div class="page-content container-fluid">
    <div class="panel">
      <div class="panel-heading">
        <h3 class="panel-title">All Checklist &nbsp; <span class="label label-info"><?php echo $getNum; ?></span>
          <div class="pull-right padding-bottom-20">
			<a data-toggle="modal" data-target="#add">
            <button class="btn btn-sm btn-icon btn-primary waves-effect waves-light margin-bottom-5
			waves-effect waves-light"><i class="icon md-plus"></i> Add New Checklist</button>
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
                <th>Checklist Name</th></a>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=1;
				  foreach($checklist as $data) { 
			?>
              <tr>
                <td><?php echo $i; ?></td>
               
               <td><?php echo $data->checklist_name; ?></td>
				
			
				<!--<td><a class="btn btn-sm btn-icon btn-primary waves-effect waves-light" 
				onclick="my(<?php echo $client->company_id; ?>);" ><i class="icon md-edit"></i></a></td>-->
                <td><a class="btn btn-sm btn-icon btn-primary waves-effect waves-light"
				href="<?php echo site_url('checklist/edit/'.$data->checklist_id); ?>"><i class="icon md-edit"></i></a></td>
                <td><a class="btn btn-sm btn-icon btn-primary waves-effect waves-light" 
				href="<?php echo site_url('checklist/delete/'.$data->checklist_id); ?>"><i class="icon md-delete" 
				onclick="return confirm('Are you sure you want to delete this Record ?')"></i></a></td>

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
			<form class="form-horizontal col-sm-12" id="exampleStandardForm" method="POST" action="<?php echo site_url('')?>/checklist/add" autocomplete="off" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group form-material">
						<label class="col-sm-4 control-label">checklist Name *</label>
						<div class="col-sm-8">
						  <input type="text" placeholder="" name="txtname" value="" class="form-control" required/>
						  <br>
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



<!-- Member Data --

<!-- Update --
<div><a id="bcd" data-toggle="modal" data-target="#data"></a></div>
<div id="data" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
		<h4>Update Content</h4>
      </div>
	<form action="<?php echo site_url();?>/Admin-part/Research/update_data" method="post" class="form-horizontal" enctype="multipart/form-data" >
		<div class="modal-body">
		<!-- Start Controller -- 
			<div id="test"></div>
		<!-- End Controller -- 	
		
		  </div>
		  <div class="modal-footer">
			<input  type="submit" class="btn btn-primary pull-left" value="update"></button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		  </div>
	</form>
    </div>

  </div>
</div>
<script>
	function my(id)
	{
		// alert(id);
		$.ajax({
			type: "GET",
			url: "<?php echo site_url('organisation/companymember/') ?>"+id,
			success: function(data){
				alert(data);
				$('#bcd').click();
				$('#test').append(data);
			}
		});
	}
</script>
	