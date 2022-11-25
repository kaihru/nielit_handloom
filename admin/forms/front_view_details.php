<!-- <div class="container-xxl py-5">
        <div class="container">
            <div class="row"> 
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="inputProjectname">Project Name</label>
                         </div>
                    </div>
            </div>
        </div>
</div>   -->
     <div class="container-xxl py-5">
        <div class="container">
            <div class="row"> 
                <div class="col-md-10 text-dark">
                    <h5>Project Name - </h5>
                    <p><?php echo htmlspecialchars($edit ? $project['proj_name'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr> 
                </div>  
                   
                <div class="col-md-2 text-dark"> 
                    <h5>No. of Assets -</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['no_of_assets'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div class="col-md-12 text-dark">  
                    <h5 class="transparent-color">Project Summary & Objective -</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['summary_objective'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr> 
                </div>
                <div class="col-md-6 text-dark">  
                    <h5>Project Class -</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['proj_class'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr> 
                </div>
                <div class="col-md-6 text-dark"> 
                    <h5>Project Type -</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['proj_type'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr> 
                </div>
                <div class="col-md-6 text-dark">  
                    <h5>Address -</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['location'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr> 
                </div>
                <div class="col-md-6 text-dark"> 
                    <h5>District Name -</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['district_name'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>  
                </div>
                <div class="col-md-12 text-dark"> 
                     <h5>Coordinate -</h5>
                    <p>Lat- <?php echo htmlspecialchars($edit ? $project['lat'] : '', ENT_QUOTES, 'UTF-8'); ?> Lng- <?php echo htmlspecialchars($edit ? $project['lng'] : '', ENT_QUOTES, 'UTF-8'); ?></p>            
                    <hr>
                </div> 
                <div class="col-md-12 text-dark"> 
                    <h5>Estimated Project Cost - </h5>
                    <p><?php echo htmlspecialchars($edit ? $project['estimated_cost'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div class="col-md-6 text-dark"> 
                    <h5>Fund Sanctioned - </h5>
                    <p><?php echo htmlspecialchars($edit ? $project['fund_sanctioned'] : '', ENT_QUOTES, 'UTF-8'); ?> Rs. <?php echo htmlspecialchars($edit ? $project['fund_sanctioned_amt'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div class="col-md-6 text-dark"> 
                    <h5>Fund Sanctioned Date - </h5>
                    <p><?php echo htmlspecialchars($edit ? $project['fund_sanctioned_date'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div class="col-md-12 text-dark"> 
                    <h5>CSR Funding Organisation -</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['csr_funding'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div class="col-md-12 text-dark"> 
                    <h5>Sector</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['sector'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div class="col-md-12 text-dark"> 
                    <h5>DPR Preparation Status</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['dpr_prep_status'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div class="col-md-12 text-dark"> 
                    <h5>Tender/RFP Status</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['tender_req_for_prop'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>                    
                </div>
                <div class="col-md-6 text-dark"> 
                    <h5>Signing of MOU</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['signing_of_mou'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr> 
                </div>
                <div class="col-md-6 text-dark"> 
                    <h5>Signing of MOU Date</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['signing_of_mou_date'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div class="col-md-6 text-dark"> 
                    <h5>Issue of Work Order</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['issue_of_work_order'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div class="col-md-6 text-dark"> 
                    <h5>Issue of Work Order Date</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['issue_of_work_date'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>

                <div class="col-md-12 text-dark"> 
                    <h5>Project Implementing Agency/Vendor</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['proj_imp_dept'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div class="col-md-12 text-dark"> 
                    <h5>Project Deadline</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['project_deadline'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div class="col-md-6 text-dark"> 
                    <h5>Release of Payment</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['release_of_payment'] : '', ENT_QUOTES, 'UTF-8'); ?> Rs. <?php echo htmlspecialchars($edit ? $project['release_of_paymt_amt'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div class="col-md-6 text-dark"> 
                    <h5>Release of Payment Date</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['release_of_paymt_date'] : '', ENT_QUOTES, 'UTF-8'); ?> </p>
                    <hr>
                </div>
                <div class="col-md-6 text-dark"> 
                    <h5>Start of Work</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['start_of_work'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div class="col-md-6 text-dark"> 
                    <h5>Start of Work Date</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['start_of_work_date'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div class="col-md-12 text-dark"> 
                    <h5>Materials At site</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['materials_onsite'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div><div class="col-md-12 text-dark"> 
                    <h5>Work Progress Status(% completion)</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['work_prog_status'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div class="col-md-12 text-dark"> 
                    <h5>Fund Utilized</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['fund_utilized'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>  
                </div>
                <div class="col-md-6 text-dark"> 
                    <h5>Project Status</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['proj_approval_status'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr> 
                </div>
                <div class="col-md-6 text-dark"> 
                    <h5>Reason for Delay</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['reason_for_delay'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr> 
                </div>
                <div class="col-md-12 text-dark"> 
                    <h5>Project Completion Date</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['proj_completion_date'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div class="col-md-6 text-dark"> 
                    <h5>Handing/Taking Over of Project</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['handing_over'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div class="col-md-6 text-dark"> 
                    <h5>Handing Taking Over Date</h5>
                    <p> <?php echo htmlspecialchars($edit ? $project['handing_over_date'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr> 
                </div>
                <div class="col-md-12 text-dark"> 
                    <h5>Project Stakeholder</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['proj_stakeholder'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div class="col-md-12 text-dark"> 
                    <h5>Whether Assets Under AMC </h5>
                    <p><?php echo htmlspecialchars($edit ? $project['amc_or_not'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div> 
                <div class="col-md-12 text-dark"> 
                    <h5>Assets Status</h5>
                    <p> <?php echo htmlspecialchars($edit ? $project['assets_status'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr> 
                </div>
                <div class="col-md-6 text-dark"> 
                    <h5>Maintenance Issue</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['assets_maintenance'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div class="col-md-6 text-dark"> 
                    <h5>Date of Issue Registered</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['date_of_issue'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr> 
                </div>
                <div class="col-md-12 text-dark"> 
                    <h5>Issue Fixed Date</h5>
                    <p><?php echo htmlspecialchars($edit ? $project['issue_fixed_date'] : '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <hr>
                </div>
                <div  class="col-md-12 text-dark">  
                <h5>Materials At Site Images</h5> 
                   <img id="myImg" class="photo" onclick="showImage(this)"   src="assets/imgUploads/materialsOnsite/<?php echo htmlspecialchars($edit ? $project['onsite_images'] : '', ENT_QUOTES, 'UTF-8'); ?>" alt="Materials At Site Images" style="width: 33%; height: 50%;"/> 
                      <?php 
                        if(!empty($query)){ $i=0;                            
                            foreach($query as $images) {
                                $imageURL = 'assets/imgUploads/materialsOnsite/'.$images["materials_onsite_images"];                                                   
                    ?> 
                            <?php echo' 
                             <img id="myImg" class="photo" onclick="showImage(this)" src="'.$imageURL.'"  alt="Materials At Site Images" style="width: 33%; height: 50%;">'?>
                   
                        
                    <?php }  } else { ?>
                        <?php   echo htmlspecialchars($edit ? 'No images were added..': '', ENT_QUOTES, 'UTF-8');?>
                    <?php } ?>  
                </div>
                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>
            </div>
        </div>
    </div> 
<style>
 h5 {
    font-size:18px;
/*     font-weight:bold;
 */ }
  p {
    font-size:18px; 
 }
 .text-dark {
    color: #1A2A36 !important;
} #myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
 </style>
 <script> 
var modal = document.getElementById('myModal');
var modalImg = document.getElementById('img01');

function showImage(imgElement) { 
   var src = imgElement.getAttribute("src");
   modal.style.display = "block";
   modalImg.src = src;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>
 