<!-- Page -->
<div class="page animsition" style="animation-duration: 800ms; opacity: 1;">
  <div class="page-header">
    <h1 class="page-title">ORGANISATION MASTER</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('dashboard'); ?>" class="icon md-home">MASTER</a></li>
     <li class="">ORGANISATION MASTER</li>
		<li class="active">MEMBER MASTER</li>
    </ol>
    <div class="page-header-actions"> <a onclick="goBack();">
      <button class="btn btn-sm btn-primary btn-round waves-effect waves-light waves-round" type="button">
	  <i aria-hidden="true" class="icon md-mail-reply"></i> <span class="text hidden-xs">Back</span> </button>
      </a> </div>
  </div>
  <div class="page-content container-fluid">
    <div class="panel">
      <div class="panel-heading">
        <h3 class="panel-title">All Members 
          <div class="pull-right padding-bottom-20">
            <a data-toggle="modal" data-target="#add">
            <button class="btn btn-sm btn-icon btn-primary waves-effect waves-light margin-bottom-5
			waves-effect waves-light"><i class="icon md-plus"></i> Add Members</button>
            </a>
            
            <!--
             <a target="_blank" href="<?/*php echo site_url('clients/exportToExcel'); */?>">
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
                <th>Contact Name</th></a>
                <th>Email Id</th>
                <th>Category Name</th>
				<th>Mobile No</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
			
            <?php $i=1;
				  foreach($AllCompanyMember as $client) { 
				  $category_name="";
					foreach($Membercategory as $category){
						if($category->category_id == $client->category_id)
						{
							$category_name = $category->category_name;
						}
					}
			?>
            <tr>
                <td><?php echo $i; ?></td>
               
				<td><?php echo $client->first_name; ?></td>
                <td><?php echo $client->email_id; ?></td>
				<td><?php echo $category_name;?></td>
				<td><?php echo $client->mobile_no; ?></td>
				
                <td><a class="btn btn-sm btn-icon btn-primary waves-effect waves-light"
				href="<?php echo site_url('organisation/editmember/'.$client->contact_id); ?>"><i class="icon md-edit"></i></a></td>
                <td><a class="btn btn-sm btn-icon btn-primary waves-effect waves-light" 
				href="<?php echo site_url('organisation/deletemeber/'.$client->contact_id); ?>"><i class="icon md-delete" onclick="return confirm('Are you sure you want to delete this Record ?')"></i></a></td>

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
		 <form class="form-horizontal col-sm-12" id="exampleStandardForm" method="POST" action="<?php echo site_url('')?>/organisation/addmember" autocomplete="on" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group form-material">
						<label class="col-sm-4 control-label">Contact Name *</label>
						<div class="col-sm-8">
						  <input type="text" placeholder="" name="txtname" value="" required class="form-control" />
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group form-material">
						<label class="col-sm-4 control-label">Email Id *</label>
						<div class="col-sm-8">
						  <textarea class="form-control" placeholder="" name="txtemail" required></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group form-material">
						<label class="col-sm-4 control-label">Mobile No</label>
						<div class="col-sm-8">
						  <input type="text" placeholder="" name="txtmobile" value="" class="form-control" />
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group form-material">
						<label class="col-sm-4 control-label">Address</label>
						<div class="col-sm-8">
								<textarea class="form-control" placeholder="" name="txtaddress"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group form-material">
						<label class="col-sm-4 control-label">Category Name </label>
						<div class="col-sm-8">
						  <select name="txtcategory" class="form-control" >
								<?php foreach($Membercategory as $category1){?>
								<option value="<?php echo $category1->category_id;?>"><?php echo $category1->category_name; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group form-material pull-right">
			  <div class="example example-buttons">
				<div> <a>
				  <button class="btn btn-primary  waves-effect waves-round waves-light"  type="submit">Submit</button>
				  </a> </div>
			  </div>
			</div>
		</form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>

	