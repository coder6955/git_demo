<!-- Page -->
<div class="page animsition" style="animation-duration: 800ms; opacity: 1;">
  <div class="page-header">
    <h1 class="page-title">Invoice MASTER</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('dashboard'); ?>" class="icon md-home">MASTER</a></li>
      <li class="active">Invoice MASTER</li>
    </ol>
    <div class="page-header-actions"> <a onclick="goBack();">
      <button class="btn btn-sm btn-primary btn-round waves-effect waves-light waves-round" type="button"> <i aria-hidden="true" class="icon md-mail-reply"></i> <span class="text hidden-xs">Back</span> </button>
      </a> </div>
  </div>
  <div class="page-content container-fluid">
    <div class="panel">
      <div class="panel-heading">
        <h3 class="panel-title">Invoice MASTER &nbsp; <span class="label label-info"><?php echo $invoiceNum; ?></span>
        
        </h3>
      </div>
      <div class="panel-body container-fluid">
   
        <div class="responsive">
        <table class="tablesaw table-striped table-bordered tablesaw-columntoggle mytable dataTable no-footer">
		
			
            <thead>
              <tr role="row">
                <th>Enquiry Unique No</th></a>
                <th>Project ID </th>
				 <th>IGM SEND </th>
                <th>Change Agent</th>
                 <th>Send FC To Client</th>
				<th>Raise Invoice</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=1;
				  foreach($allinvoice  as $invoice1) { 
			?>
             
               
               <td><?php echo $invoice1->enquiry_unique_id; ?></td>
               <td><?php echo $invoice1->project_unique_id; ?></td>
			   <td>
			
				
				</td>
				<td><button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo site_url()?>invoice/'" >Change Agent</button></td>
				<td><button type="button" class="btn btn-primary" onclick="window.location.href='Students.html';"/ >end FC Client</button></td>
			    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#invoice_format">Genrate Invoice</button>
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


<!-- IGM Modal-->



<!-- Add Modal-->
<div id="invoice_format" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center" >Invoice Fromat</h4>
      </div>
      <div class="modal-body">
			<div class="row">
				<div class="responsive">
					<table class="tablesaw table-striped table-bordered tablesaw-columntoggle mytable dataTable no-footer">
					<tr>
						<th>Format No</th>
						<th>Select Any One Format</th>
					</tr>
					  <?php $f=1;
					foreach($allinvoiceformat  as $format1) { 
					?>
					<tr>
						<td><?php echo $f; ?> </td>
						<td><a href="<?php echo site_url()?>invoice/genrate/<?php echo $format1->invoice_format_id; ?>"><?php echo $format1->invoice_format_name;?></a></td>
					</tr>
					<?php $f++;}  ?>
					</table>
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


<script>
	/*function format_id(id)
	{
		alert(id);
		$.ajax({
			type: "POST",
			url: "<?php echo site_url('invoice/format_raise/') ?>",
			success: function(data)
			{
				// alert(data);
				// $('#bcd').click();
				// $('#test').append(data);
			}
		});
	}
	*/
</script>
	