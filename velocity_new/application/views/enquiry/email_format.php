<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/site.min.css">
<style>
    table,th,td{
        border: 1px solid black;
        border-collapse: collapse;
    }
</style> 


<!-- <div class="page animsition" style="animation-duration: 800ms; opacity: 1;">
 	<div class="page-content container-fluid">
    	<div class="panel">
      		<div class="panel-body container-fluid"> -->
        		<div class="responsive container-fluid">
        			<!-- <table class="tablesaw table-striped table-bordered tablesaw-columntoggle mytable dataTable no-footer"> -->
                    <table>
			            <thead>
			              <tr role="row">
			              	<th>Sr No.</th>
							<th>Checklist name</th>
			                <th>Checklist description</th>
			              </tr>
			            </thead>
            			<tbody>
            			<?php 
            			$counter=0;
            				foreach($chk_desc as $c_id=>$c_desc){
            					if($c_desc==""){
            						continue;
            					}
            					echo "<tr><td>".$counter."</td><td>".$chk_name[$c_id]."</td><td>".$c_desc."</td></tr>";
            					$counter++;
            				}
            			?>
            			</tbody>
        			</table>


                    <?php 
                    if(!empty($terms_service)){
                        echo "<h4>Terms & Conditions are as follows:</h4>";
                        echo "<ul  class='list-group' >";
                            foreach ($terms_service as $key => $note) {
                                echo "<li class='list-group-item ' style='border:1px solid #ddd'>".$note['note_name']."</li>";
                            }
                        echo "</ul>";
                    }
                    ?>


                    <?php 
                        if(!empty($bkng)){
                    ?>
                        <table>
                            <thead>
                              <tr role="row">
                                <th>Sr No.</th>
                                <th>NaME</th>
                                <th>Description</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                            $counter=1;
                                foreach ($bkng as $name => $value) {
                                    if(empty($value)){
                                        continue;
                                    }
                                    echo "<tr><td>".$counter."</td><td>".$name."</td><td>".$value."</td></tr>";
                                    $counter++;
                                }
                            ?>
                            </tbody>
                        </table>
                    <?php        
                        }
                    ?>


                     <?php 
                        if(!empty($agent_data)){
                    ?>
                        <table>
                            <thead>
                              <tr role="row">
                                <th>Name</th>
                                <th colspan="2">Agent Details</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr><td>First Name</td><td><?php echo $first_name; ?></td></tr>
                                <tr><td>Mobile No</td><td><?php echo $mob_no; ?></td></tr>
                                <tr><td>Telephone No</td><td><?php echo $tel_no; ?></td></tr>
                                <tr><td>Company Name</td><td><?php echo $company_name; ?></td></tr>
                                <tr><td>Company Address</td><td><?php echo $addr; ?></td></tr>
                            </tbody>
                        </table>
                    <?php        
                        }
                    ?>


    			</div>
<!-- 			</div>
		</div>
	</div>
</div> -->
