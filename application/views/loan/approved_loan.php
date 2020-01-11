<body class="">
  
    <? $this->load->view('loading_screen');?>
    
    <div class="wrapper ">

    <!-- Top NavBar -->
    <? $this->load->view('navigation/sidebar');?>
    <!-- End of NavBar -->

    <div class="main-panel">

    <!-- Navbar -->
    <? $this->load->view('navigation/topbar');?>
    <!-- End Navbar -->

        <div class="content" style="margin-top:50px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <? $this->load->view('navigation/loan_navbar');?>

                        <div class="tab-content tab-space">
                            <div class="tab-pane active">
                                  <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0">Approved Clients Table</h4>
                            <p class="card-category"> Below is the list of all approved clients</p>
                        </div>
                        <div class="card-body container-fluid">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm" id="approved_clients_table">
                                    <thead class="text-primary">
                                        <th>Loan No.</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-right">Loan Amount</th>
                                        <th class="text-center">Approved by</th>
                                        <th>Approved Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <? foreach($approved as $key => $appr){
                                            if(!empty($appr)){  
                                        ?>
                                        <tr>
                                            <td><? echo $appr['loan_no'];?></td>
                                            <td class="text-center">
                                                <a href="<? echo base_url().'borrowers/profile/'.$appr['account_no'];?>" rel="tooltip" title="Go to profile"><? echo $appr['lastname'].','.$appr['firstname'].' '.$appr['middlename'];?></a>
                                            </td>
                                            <td class="text-right"><? echo $appr['loan_amount'];?></td>
                                            <td class="text-center"><? echo $appr['approved'];?></td>
                                            <td class="text-center"><? echo $appr['date_approved'];?></td>
                                            <td>
                                                <span class="font-italic text-muted ">
                                                    <?if($appr['status'] == 'Approved'){?>

                                                    <? echo $appr['status'].'. Waiting for cash release.';?>
                                                    <? }else{?> 
                                                    <? echo 'Loan is '.$appr['status'];?>.
                                                    <? } ?>        
                                                </span>
                                            </td>
                                            <td class="td-actions text-right">
                                                <?if($appr['status'] == 'Approved'){?>
                                                    <button type="button" rel="tooltip" title="Cash release" class="btn btn-primary btn-sm mr-2" data-target="#cash<? echo $appr['loan_no'];?>" id="cash-release<? echo $appr['loan_no'];?>" data-toggle="modal">
                                                        Release Cash
                                                    </button>
                                                <? }else{?> 
                                                    <button type="button" rel="tooltip" title="View Loan Details" class="btn btn-info btn-sm mr-2" onclick="location.href='<? echo base_url().'payments/loan-details/'.$appr['loan_no'];?>'">
                                                        View Loan
                                                    </button>
                                                <? } ?>
                                            </td>
                                        </tr>
                                         <!-- Modal  -->
                                        <div class="modal fade" id="cash<? echo $appr['loan_no'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Cash Release</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Cash has been released?</p>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-primary cash-release" id="<? echo $appr['loan_no'];?>">Yes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of modal -->
                                        <? }} ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  