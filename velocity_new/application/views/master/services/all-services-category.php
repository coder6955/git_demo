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
        <h3 class="panel-title">All Category
          <div class="pull-right padding-bottom-20">
			
			
			
			<a data-toggle="modal" data-target="#add">
            <button class="btn btn-sm btn-icon btn-primary waves-effect waves-light margin-bottom-5
			waves-effect waves-light"><i class="icon md-plus"></i> Add Category</button>
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
                <th> Service Name</th></a>
                 <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=1;
			
				  foreach($category as $category1) { 
			?>
              <tr>
                <td><?php echo $i; ?></td>
             	<?php foreach($service as $service1) { 
				if($service1->service_id==$category1->service_id){?>
               <td><?php echo $service1->service_name; ?></td>
				<?php }}?>
                <td><?php echo $category1->service_cat_name; ?></td>
				
				
                <td><a class="btn btn-sm btn-icon btn-primary waves-effect waves-light"
				href="<?php echo site_url('service/edit/'.$category1->service_cat_id); ?>"><i class="icon md-edit"></i></a></td>
                <td><a class="btn btn-sm btn-icon btn-primary waves-effect waves-light" 
				href="<?php echo site_url('service/delete/'.$category1->service_cat_id); ?>"><i class="icon md-delete" 
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