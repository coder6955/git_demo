<!-- Page -->
<div class="page animsition" style="animation-duration: 800ms; opacity: 1;">
  <div class="page-header">
    <h1 class="page-title">Genrate Invoice</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('dashboard'); ?>" class="icon md-home">MASTER</a></li>
      <li class="active">Genrate Invoice MASTER</li>
    </ol>
    <div class="page-header-actions"> <a onclick="goBack();">
      <button class="btn btn-sm btn-primary btn-round waves-effect waves-light waves-round" type="button"> <i aria-hidden="true" class="icon md-mail-reply"></i> <span class="text hidden-xs">Back</span> </button>
      </a> </div>
  </div>
  <div class="page-content container-fluid">
    <div class="panel">
      <div class="panel-heading">
			<br>
			<div class="panel-body container-fluid">
				<form class="form-horizontal col-sm-12" id="exampleStandardForm" method="POST" action="<?php echo site_url('invoice/save'); ?>" autocomplete="on" enctype="multipart/form-data">
				  
		   		<div class="row">
					<div class="col-sm-6">
						<div class="form-group form-material1">
							 <label class="col-sm-3 control-label"  for="Invoice_unique_no" >Invoice No</label>
							  <div class="col-sm-9">
								<input class="form-control" name="Invoice_unique_no" id="Invoice_unique_no" type="text" readonly="Invoice_unique_no" value="VGL/I/1718/00001">							
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group form-material1">
							<label class="control-label col-sm-3" for="date">Invoice Date</label>
							<div class="col-sm-9">
								<input class="form-control" name="Invoice_date" id="Invoice_date" type="text" readonly="Invoice_date" value="<?php echo date("d/m/Y");?>">
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group form-material1">
							<label class="control-label col-sm-3">Consignee</label>
							<div class="col-sm-9">
						     <select class="form-control" id="consignee" name="consignee">
								<option value="">-- Select Consignee-- </option>
							   <?php foreach($Allcompany as $con) { ?>
								<option value="<?php echo $con->consignee_id;?>"><?php echo $con->consignee_name;?></option>
							   <?php } ?>
							</select>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group form-material1">
							<label class="control-label col-sm-3">Notify</label>
							<div class="col-sm-9">
						    <select class="form-control" id="notify" name="notify">
								<option value="">-- Select Notify-- </option>
							   <?php foreach($Allcompany as $con) { ?>
								<option value="<?php echo $con->consignee_id;?>"><?php echo $con->consignee_name;?></option>
							   <?php } ?>
							</select>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group form-material1">
							<label class="control-label col-sm-3">Shipper</label>
							<div class="col-sm-9">
						    <select class="form-control" id="shipper" name="shipper">
								<option value="">-- Select Shipper -- </option>
							   <?php foreach($Allcompany as $con) { ?>
								<option value="<?php echo $con->consignee_id;?>"><?php echo $con->consignee_name;?></option>
							   <?php } ?>
							</select>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group form-material1">
							 <label class="col-sm-3 control-label"  for="Invoice_unique_no" >IGM No</label>
							  <div class="col-sm-5">
								<input class="form-control" name="invoice_unique_no" id="invoice_unique_no" type="text" placeholder="" value="">							
							</div>
							 <div class="col-sm-4">
							    <input type="text" name="igm_date" value="" class="form-control datepicker" placeholder="IGM Date" />				
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group form-material1">
							<label class="control-label col-sm-3" for="date">Item No</label>
							<div class="col-sm-9">
								<input class="form-control" name="Invoice_date" id="Invoice_date" type="text" >
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group form-material1">
							<label class="control-label col-sm-3">Supply</label>
							<div class="col-sm-9">
						    <select class="form-control" id="shipper" name="shipper">
								<option value="">-- Select Place of Supply -- </option>
							   <?php foreach($Allsupplier as $sup) { ?>
								<option value="<?php echo $sup->state_id;?>"><?php echo $sup->state_name;?></option>
							   <?php } ?>
							</select>
							</div>
						</div>
					</div>
				</div>
				<h3>Shipment Details</h3>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group form-material1">
							 <label class="col-sm-3 control-label" >HBL No</label>
							  <div class="col-sm-5">
								<input class="form-control" name="hbl_no" id="hbl_no" type="text"  placeholder="" value="">							
							</div>
							 <div class="col-sm-4">
							    <input type="text" name="hbl_date" value="" class="form-control datepicker" placeholder="HBL Date" />				
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group form-material1">
						 <label class="col-sm-4 control-label" >Vesel Name</label>
							<div class="col-sm-8">
							  	<input class="form-control" name="hbl_no" id="hbl_no" type="text" placeholder="" value="">							
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group form-material1">
							<label class="col-sm-4 control-label" >Arrived Date</label>
							<div class="col-sm-8">
								<input type="text" name="arrvied_date" value="" class="form-control datepicker" placeholder="" />	
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group form-material1">
							<label class="col-sm-5 control-label" >Agent Reference</label>
							<div class="col-sm-7">
							<input type="text" name="agent_reference" value="" class="form-control" placeholder="" />	
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group form-material1">
							<label class="col-sm-5 control-label" >FD Vessel Name</label>
							<div class="col-sm-7">
							<input type="text" name="agent_reference" value="" class="form-control" placeholder="" />	
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group form-material1">
							<label class="col-sm-5 control-label" >FD Voy No</label>
							<div class="col-sm-7">
							<input type="text" name="agent_reference" value="" class="form-control" placeholder="" />	
							</div>
						</div>
					</div>
				</div>
				<h3>Port Details</h3>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group form-material1">
						<label class="col-sm-3 control-label" >Port Of Load</label>
						<div class="col-sm-9">
							<select class="form-control" id="shipper" name="shipper">
								<option value="">-- Select Port Of Load -- </option>
							   <?php foreach($Allportload as $sup) { ?>
								<option value="<?php echo $sup->port_of_load_id;?>"><?php echo $sup->port_of_load_name;?></option>
							   <?php } ?>
							</select>
						</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group form-material1">
						<label class="col-sm-3 control-label" >Port Of Delivery</label>
						<div class="col-sm-9">
							<select class="form-control" id="shipper" name="shipper">
								<option value="">-- Select Port Of Delivery -- </option>
							   <?php foreach($Allportdelivery as $pd) { ?>
								<option value="<?php echo $pd->port_of_delivery_id;?>"><?php echo $pd->port_of_delivery_name;?></option>
							   <?php } ?>
							</select>
						</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group form-material1">
						<label class="col-sm-3 control-label" >Port Of Discharge</label>
						<div class="col-sm-9">
							<input type="text" name="port_load" value="" class="form-control" placeholder="" />	
						</div> 
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group form-material1">
						<label class="col-sm-3 control-label" >Final Destination</label>
						<div class="col-sm-9">
							<input type="text" name="port_load" value="" class="form-control" placeholder="" />	
						</div>
						</div>
					</div>
				</div>
				<h3>Container Details</h3>
				<div class="row">
					<div class="col-sm-4">
					<div class="form-group form-material1">
						<label class="col-sm-5 control-label" >No. of container</label>
						<div class="col-sm-7">
							<input type="text" name="container_no" value="" class="form-control" placeholder="" id="container_no" />	
						</div>
					</div>
					</div>
					<div class="col-sm-4">
					<div class="form-group form-material1">
						<label class="col-sm-4 control-label" > Volume</label>
						<div class="col-sm-8">
							<select class="form-control" id="shipper" name="shipper">
								<option value="">-- Select Volume -- </option>
							   <?php foreach($Allvolume as $vp) { ?>
								<option value="<?php echo $vp->volume_id;?>"><?php echo $vp->volume_name;?></option>
							   <?php } ?>
							</select>
						</div>
					</div>
					</div>
					<div class="col-sm-4">
					<div class="form-group form-material1">
						<label class="col-sm-4 control-label" >Container Type </label>
						<div class="col-sm-8">
							<select class="form-control" id="shipper" name="shipper">
								<option value="">-- Select Container Type -- </option>
							   <?php foreach($Allcontainer as $con1) { ?>
								<option value="<?php echo $con1->container_id;?>"><?php echo $con1->container_name;?></option>
							   <?php } ?>
							</select>
						</div>
					</div>
					</div>
				</div>
				<div class="row">
					<div id="cotainer_details"></div>
				</div>
					<br>
					  <button class="btn btn-primary pull-right" type="submit">Submit</button>
				</form>
			</div>
	  </div>
	</div>
  </div>
</div>
	<script>
		function container() 
		{
			var no_of_container = $('#container_no').val();
			$('#cotainer_details').empty();
			for (var i = 1; i <= no_of_container; i++) 
			{
				$('#cotainer_details').append('<div class="row new_con" style="margin-bottom:10px;"><div class="col-sm-2"><input type="text" name="container_no[]" value="" class="form-control" placeholder="container_no" id="container_no_(' + i + ')" /></div><div class="col-sm-2"><input type="text" name="PKGS[]" value="" class="form-control" placeholder="PKGS" id="PKGS_(' + i + ')"/></div><div class="col-sm-2"><input type="text" name="grossWT[]" value="" class="form-control" placeholder="Gross WT" id="grossWT_(' + i + ')" /></div><div class="col-sm-2"><input type="text" name="cubicmts[]" value="" class="form-control" placeholder="Cubic MTS"  id="cubicmts_(' + i + ')" /></div><div class="col-sm-1"><input type="text" name="size[]" value="" class="form-control" placeholder="Size" id="size_(' + i + ')"/></div><div class="col-sm-2"><input type="text" name="freight[]" value="" class="form-control" placeholder="Freight" id="freight_(' + i + ')"/></div> <div class="col-sm-1"><a class="btn btn-sm btn-icon btn-primary waves-effect waves-light" onclick=deletecontainer(' + i + ') id="deletecontainer_(' + i + ')"><i class="icon md-delete" ></i></a></div></div>');
			}		
		} 
		function deletecontainer(id)
		{
			alert(id);
			var data = $('#container_no_' + id).val();
			alert(data);
		}
	</script>	
	