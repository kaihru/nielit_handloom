<div style="overflow-x:auto;">
<div class="form-group">
    <input class="btn btn-warning" type="button" value="Download In" />
</div> 
<table class="table table-striped table-bordered table-condensed" class="display" style="width:100%;white-space: nowrap;"  id="data">  
        <thead>
            <tr>
                <th>ID</th>
                <th>Project Name</th>
                <th>Project Class</th>
                <th>No. of Assets</th>
                <th>Project Summary & Objective</th>
                <th>Project Type</th>
                <th>Location</th>
                <th>Propose Project</th>
                <th>Propose Project Amount</th>
                <th>District Name</th>
                <th>CSR Funding Organization</th>
                <th>Project Implementing Department/Agency</th>
                <th>Project Approval Status</th>
                <th>DPR Preparation Status</th>
                <th>Whether under AMC or not</th>
                <th>Signing of MOU</th>
                <th>Tender/RFP</th>
                <th>Issue of Work Order</th>
                <th>Sector</th>
                <th>Release of Payment</th>
                <th>Amount</th>
                <th>Start of Work</th>
                <th>Materials Onsite</th>                   
                <th>Work Progress Status</th>
                <th>Estimated Cost</th>
                <th>Fund Utilized</th>
                <th>Project Completion Date</th>
                <th>Handing/Taking over of project</th>
                <th>Handing/Taking over date</th>
                <th>Project Stakeholder/Agency</th>
                <th>Images</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody> 
            <tr>
                <td><?php echo htmlspecialchars($edit ? $project['id'] : '', ENT_QUOTES, 'UTF-8'); ?></td> 
                <td><?php echo htmlspecialchars($edit ? $project['proj_name'] : '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['proj_class']: '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['no_of_assets']: '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['summary_objective']: '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['proj_type']: '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['location']: '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['propose_proj']: '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['propose_proj_amount']: '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['district_name']: '', ENT_QUOTES, 'UTF-8'); ?></td> 
                <td><?php echo htmlspecialchars($edit ? $project['csr_funding']: '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['proj_imp_dept']: '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['proj_approval_status']: '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['dpr_prep_status']: '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['amc_or_not']: '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['signing_of_mou']: '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['tender_req_for_prop']: '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['issue_of_work_order']: '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['sector']: '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['release_of_payment']: '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['release_of_paymt_amt']: '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['start_of_work']: '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($edit ? $project['materials_onsite']: '', ENT_QUOTES, 'UTF-8'); ?></td>                
                <td><?php echo htmlspecialchars($edit ? $project['work_prog_status']: '', ENT_QUOTES, 'UTF-8'); ?></td>                
                <td><?php echo htmlspecialchars($edit ? $project['estimated_cost']: '', ENT_QUOTES, 'UTF-8'); ?></td>                
                <td><?php echo htmlspecialchars($edit ? $project['fund_utilized']: '', ENT_QUOTES, 'UTF-8'); ?></td>                
                <td><?php echo htmlspecialchars($edit ? $project['proj_completion_date']: '', ENT_QUOTES, 'UTF-8'); ?></td>                
                <td><?php echo htmlspecialchars($edit ? $project['handing_over']: '', ENT_QUOTES, 'UTF-8'); ?></td>                
                <td><?php echo htmlspecialchars($edit ? $project['handing_over_date']: '', ENT_QUOTES, 'UTF-8'); ?></td>                
                <td><?php echo htmlspecialchars($edit ? $project['proj_stakeholder']: '', ENT_QUOTES, 'UTF-8'); ?></td>                
                <td><a href="<?php echo $imageURL = 'assets/imgUploads/materialsOnsite/'.$project["onsite_images"];?>" download><img style="width:100%;white-space: nowrap;" src="<?php echo $imageURL = 'assets/imgUploads/materialsOnsite/'.$project["onsite_images"];?>" alt="Click To Download" /></a></td>
                 <td><?php echo htmlspecialchars($edit ? $project['created_at']: '', ENT_QUOTES, 'UTF-8'); ?></td> 
                <td><a href="edit_project.php?id=<?php echo $project['id']; ?>&operation=edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>Edit Details</a></td>
                </tr>  
        </tbody>
    </table>
</div>                                     	                            

<style>
.dataTables_filter {
    display: block;
}
</style> 
<script>
	$(document).ready(function() {
    $('#data').DataTable( {
        dom: 'Bfrtip', 
        paging:   false,
       // "ordering": false,
        buttons: [ 
            {
                extend: 'excelHtml5', 
                orientation: 'landscape',
                pageSize: 'A2',
                title: 'CSR Projects'
            },
            {
                extend: 'pdfHtml5', 
                orientation: 'landscape',
                pageSize: 'A2',
                title: 'CSR Projects'
            }
        ]
    } );
} );
</script>