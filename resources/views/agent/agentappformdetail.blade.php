@extends('layout.masteragent')
@section('style')
@endsection
@section('content')

<section class="content-header">
  <h1> 
    APPLICATION-FORM
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('agentdashboard',['user_id'=>$agents->user_id])}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">Application-Form</li>
  </ol>
</section>

<section class="content">
  <div class="col-md-12">
    <!-- Custom Tabs (Pulled to the right) -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs ">
        <li class="active"><a href="#tab_1" data-toggle="tab">Active</a></li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          <div class="box">

            <!-- /.box-header -->

            <!-- Custom Tabs (Pulled to the right) -->
            <!-- <form action="#" method="POST" id="frm-appform-create" enctype ="multipart/form-data"> -->
            {!! csrf_field() !!}
            <div class="form-horizontal">


              <!-- SECTION 1 --><h2><center><b>TM UNIFI SALES REGISTRATION</b></center></h2><br>

              <div class="form-group">
                <label for="sales_activity" class="col-sm-3 control-label">Sales Activity </label>
                <div class="col-sm-9">
                  <select class="form-control" name="sales_activity" id="sales_activity" data-placeholder="Select" required="true" onchange="">
                    <option value="">Select</option>
                    @foreach($activities as $activity)
                    <option value="{{$activity->activity_id}}">{{$activity->activity}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="application_type" class="col-sm-3 control-label">Application Type </label>
                <div class="col-sm-9">
                  <ul class="nav nav-pills" role="tablist">
                    @foreach($apptypes as $type)
                    <li role="presentation" @if($type->apptype_id == 1) class="" @endif><a href="#apptype_{{$type->apptype_id}}" aria-controls="apptype_{{$type->apptype_id}}" role="tab" data-toggle="tab">{{$type->type}}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <br>

              <div class="tab-content">
                <div role="tabpanel" class="tab-pane" id="apptype_1">
                  <form action="#" method="POST" id="frm-residential-create" enctype ="multipart/form-data" novalidate>
                    {!! csrf_field() !!}

                    <!-- SECTION 2 --><h4><u><b>RESIDENTIAL</b></u></h4>
                    <input type="hidden" name="application_type" value="1">
                    <input type="hidden" name="sales_activity" id="resident_sales_activity" value="1">
                    <input type="hidden" name="existing_service" id="resident_existing_service" value="1">
                    <div class="form-group">
                      <label for="existing_service" class="col-sm-3 control-label">Existing Service: </label>
                      <div class="col-sm-9">
                        <ul class="nav nav-pills" role="tablist">
                          @foreach($exservs as $exserv)
                          <li role="presentation" @if($exserv->exserv_id == 1) class="" @endif><a href="#exr_{{$exserv->exserv_id}}" aria-controls="exr_{{$exserv->exserv_id}}" role="tab" data-toggle="tab" onclick="document.getElementById('resident_existing_service').value='{{$exserv->exserv_id}}'">{{$exserv->exservice}}</a></li>
                          @endforeach
                        </ul>
                      </div>
                    </div>

                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane" id="exr_1"></div> <!-- none not change -->
                      <div role="tabpanel" class="tab-pane" id="exr_11">

                        <div class="form-group">
                          <label for="streamyx_tel_no" class="col-sm-3 control-label">Streamyx Tel No: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="streamyx_tel_no" id="streamyx_tel_no">
                          </div>
                        </div>
                      </div>

                      <div role="tabpanel" class="tab-pane" id="exr_21"></div>
                    </div>

                    <div class="form-group">
                      <label for="streamyx_package" class="col-sm-3 control-label">Package: </label>
                      <div class="col-sm-9">
                        <select class="form-control" name="streamyx_package" id="streamyx_package" data-placeholder="Select">
                          <option value="">Select</option>
                          @foreach($packages as $package)
                          <option value="{{$package->intpackage_id}}">{{$package->internet_package}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="applicant_name" class="col-sm-3 control-label">Applicant Name: </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="applicant_name" id="applicant_name" required>
                      </div>
                    </div>

                    <input type="hidden" name="ic_passport_num" id="resident_ic_passport_num" value="1">
                    <!-- <div class="form-group">
                      <label for="ic_passport_num" class="col-sm-3 control-label">IC / Passport: </label>
                      <div class="col-sm-9">
                        <ul class="nav nav-pills" role="tablist">
                          @foreach($icpass as $icpass)
                          <li role="presentation" @if($icpass->icpass_id == 1) class="" @endif><a href="#ipr_{{$icpass->icpass_id}}" aria-controls="ipr_{{$icpass->icpass_id}}" role="tab" data-toggle="tab" onclick="document.getElementById('resident_ic_passport_num').value='{{$icpass->icpass_id}}'">{{$icpass->icpass}}</a></li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
					-->
                    <div class="form-group">
                      <label for="ic_passport_num" class="col-sm-3 control-label">IC / Passport </label>
                      <div class="col-sm-9">
                        <ul class="nav nav-pills" role="tablist">
							<li role="presentation"><a href="#ipr_1" aria-controls="ipr_1" role="tab" data-toggle="tab" onclick="document.getElementById('resident_ic_passport_num').value='1'">IC</a></li>
							<li role="presentation"><a href="#ipr_11" aria-controls="ipr_11" role="tab" data-toggle="tab" onclick="document.getElementById('resident_ic_passport_num').value='11'">Passport</a></li>
                        </ul>
                      </div>
                    </div>

                    <div class="tab-content">

                      <div role="tabpanel" class="tab-pane" id="ipr_1">
                        <div class="form-group">
                          <label for="ic" class="col-sm-3 control-label">IC: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="ic" id="ic" required>
                          </div>
                        </div>
                      </div>

                      <div role="tabpanel" class="tab-pane" id="ipr_11">
                        <div class="form-group">
                          <label for="passport" class="col-sm-3 control-label">Passport No: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="passport" id="passport" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="nationality" class="col-sm-3 control-label">Nationality: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nationality" id="nationality" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="date_of_birth" class="col-sm-3 control-label">Date Of Birth: </label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="passport_exp_date" class="col-sm-3 control-label">Passport Exp Date: </label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="passport_exp_date" id="passport_exp_date" required>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="form-group">
                      <label for="inst_address" class="col-sm-3 control-label">Installation Address: </label>
                      <div class="col-sm-9">
                        <textarea class="form-control" name="inst_address" id="inst_address" required></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="contact_num" class="col-sm-3 control-label">Contact No: </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="contact_num" id="contact_num" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="email_address" class="col-sm-3 control-label">Email Address: </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="email_address" id="email_address" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="remark" class="col-sm-3 control-label">Remarks: </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="remark" id="remark">
                      </div>
                    </div>

                    <input type="hidden" name="thumbprint_coll" id="resident_thumbprint_coll" value="1">
                    <div class="form-group">
                      <label for="thumbprint_coll" class="col-sm-3 control-label">Thumbprint Collected: </label>
                      <div class="col-sm-9">
                        <ul class="nav nav-pills" role="tablist">
                          @foreach($thumbprints as $thumbprint)
                          <li role="presentation" @if($thumbprint->thumbstat_id == 1) class="" @endif><a href="#tsr_{{$thumbprint->thumbstat_id}}" aria-controls="tsr_{{$thumbprint->thumbstat_id}}" role="tab" data-toggle="tab" onclick="document.getElementById('resident_thumbprint_coll').value='{{$thumbprint->thumbstat_id}}'">{{$thumbprint->status}}</a></li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                    <br>

                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane" id="tsr_1">
                        <!-- SECTION 4 --><h4><u><b>E-FORM</b></u></h4>

                        <div class="form-group">
                          <label for="eform_id" class="col-sm-3 control-label">E-Form ID: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="eform_id" id="eform_id" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="docs_uploaded" class="col-sm-3 control-label">Document Uploaded: </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="docs_uploaded" id="docs_uploaded" data-placeholder="Select">
                              <option value="">Select</option>
                              @foreach($docsups as $docsup)
                              <option value="{{$docsup->docs_id}}">{{$docsup->docsup}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        
                      </div>
                      
                      <div role="tabpanel" class="tab-pane" id="tsr_11"></div>

                    </div>

                    <div>
                      <center>
                        <input type="hidden" name="user_id" value="{{$agents->user_id}}">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </center>
                    </div>

                  </form>
                </div>

                <div role="tabpanel" class="tab-pane" id="apptype_11">
                  <form action="#" method="POST" id="frm-business-create" enctype ="multipart/form-data" novalidate>
                    {!! csrf_field() !!}


                    <!-- SECTION 3 --><h4><u><b>BUSINESS</b></u></h4>
                    <input type="hidden" name="application_type" value="11">
                    <input type="hidden" name="sales_activity" id="business_sales_activity" value="">
                    <input type="hidden" name="existing_service" id="business_existing_service" value="">
                    <input type="hidden" name="business_type" id="business_type" value="">

                    <div class="form-group">
                      <label for="existing_service" class="col-sm-3 control-label">Business Type </label>
                      <div class="col-sm-9">
                        <ul class="nav nav-pills" role="tablist">
                          <li role="presentation"><a href="#bus_type_1" aria-controls="bus_type_1" role="tab" data-toggle="tab" onclick="document.getElementById('business_type').value='1'">Local</a></li>
                          <li role="presentation"><a href="#bus_type_2" aria-controls="bus_type_2" role="tab" data-toggle="tab" onclick="document.getElementById('business_type').value='11'">Foreigner</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane" id="bus_type_1">
						<div class="form-group">
						  <label for="ic" class="col-sm-3 control-label">IC </label>
						  <div class="col-sm-9">
							<input type="text" class="form-control" name="ic" id="ic" required>
						  </div>
						</div>
                      </div>
                      <div role="tabpanel" class="tab-pane" id="bus_type_2">
						<div class="form-group">
						  <label for="passport" class="col-sm-3 control-label">Passport No: </label>
						  <div class="col-sm-9">
							<input type="text" class="form-control" name="passport" id="passport" required>
						  </div>
						</div>

						<div class="form-group">
						  <label for="nationality" class="col-sm-3 control-label">Nationality: </label>
						  <div class="col-sm-9">
							<input type="text" class="form-control" name="nationality" id="nationality" required>
						  </div>
						</div>

						<div class="form-group">
						  <label for="date_of_birth" class="col-sm-3 control-label">DOB: </label>
						  <div class="col-sm-9">
							<input type="date" class="form-control" name="date_of_birth" id="date_of_birth" required>
						  </div>
						</div>

						<div class="form-group">
						  <label for="passport_exp_date" class="col-sm-3 control-label">Passport Exp Date: </label>
						  <div class="col-sm-9">
							<input type="date" class="form-control" name="passport_exp_date" id="passport_exp_date" required>
						  </div>
						</div>
                      </div>
                     </div>

                    <div class="form-group">
                      <label for="existing_service" class="col-sm-3 control-label">Existing Service </label>
                      <div class="col-sm-9">
                        <ul class="nav nav-pills" role="tablist">
                          @foreach($exservs as $exserv)
                          <li role="presentation" @if($exserv->exserv_id == 1) class="" @endif><a href="#exb_{{$exserv->exserv_id}}" aria-controls="exb_{{$exserv->exserv_id}}" role="tab" data-toggle="tab" onclick="document.getElementById('business_existing_service').value='{{$exserv->exserv_id}}'">{{$exserv->exservice}}</a></li>
                          @endforeach
                        </ul>
                      </div>
                    </div>

                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="exb_1"></div>
                      <div role="tabpanel" class="tab-pane" id="exb_11">

                        <div class="form-group">
                          <label for="streamyx_tel_no" class="col-sm-3 control-label">Streamyx Tel No: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="streamyx_tel_no" id="streamyx_tel_no" required>
                          </div>
                        </div>
                      </div>

                      <div role="tabpanel" class="tab-pane" id="exb_21"></div>
                    </div>

                    <div class="form-group">
                      <label for="streamyx_package" class="col-sm-3 control-label">Package: </label>
                      <div class="col-sm-9">
                        <select class="form-control" name="streamyx_package" id="streamyx_package" data-placeholder="Select">
                          <option value="">Select</option>
                          @foreach($intpackages as $package)
                          <option value="{{$package->intpackage_id}}">{{$package->internet_package}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="company_name" class="col-sm-3 control-label">Company Name: </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="company_name" id="company_name" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="buss_reg_num" class="col-sm-3 control-label">Business Reg No: </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="buss_reg_num" id="buss_reg_num" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="applicant_name" class="col-sm-3 control-label">Director Name: </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="applicant_name" id="applicant_name" required>
                      </div>
                    </div>

                    <!-- <div class="form-group">
                      <label for="ic_passport_num" class="col-sm-3 control-label">Director NRIC: </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="ic_passport_num" id="ic_passport_num" required>
                      </div>
                    </div> -->

                    <div class="form-group">
                      <label for="inst_address" class="col-sm-3 control-label">Installation Address: </label>
                      <div class="col-sm-9">
                        <textarea class="form-control" name="inst_address" id="inst_address" required></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="contact_num" class="col-sm-3 control-label">Contact No: </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="contact_num" id="contact_num" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="email_address" class="col-sm-3 control-label">Email Address: </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="email_address" id="email_address" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="remark" class="col-sm-3 control-label">Remarks: </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="remark" id="remark">
                      </div>
                    </div>


                    <input type="hidden" name="thumbprint_coll" id="business_thumbprint_coll" value="1">
                    <div class="form-group">
                      <label for="thumbprint_coll" class="col-sm-3 control-label">Thumbprint Collected: </label>
                      <div class="col-sm-9">
                        <ul class="nav nav-pills" role="tablist">
                          @foreach($thumbprints as $thumbprint)
                          <li role="presentation" @if($thumbprint->thumbstat_id == 1) class="" @endif><a href="#tsb_{{$thumbprint->thumbstat_id}}" aria-controls="tsb_{{$thumbprint->thumbstat_id}}" role="tab" data-toggle="tab" onclick="document.getElementById('business_thumbprint_coll').value='{{$thumbprint->thumbstat_id}}'">{{$thumbprint->status}}</a></li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                    <br>

                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane" id="tsb_1">
                        <!-- SECTION 4 --><h4><u><b>E-FORM</b></u></h4>

                        <div class="form-group">
                          <label for="eform_id" class="col-sm-3 control-label">E-Form ID: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="eform_id" id="eform_id" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="docs_uploaded" class="col-sm-3 control-label">Document Uploaded: </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="docs_uploaded" id="docs_uploaded" data-placeholder="Select">
                              <option value="">Select</option>
                              @foreach($docsups as $docsup)
                              <option value="{{$docsup->docs_id}}">{{$docsup->docsup}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        
                      </div>
                      <div role="tabpanel" class="tab-pane" id="tsb_11"></div>
                    </div>

                    <div>
                      <center>
                        <input type="hidden" name="user_id" value="{{$agents->user_id}}">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </center>
                    </div>

                  </form>
                </div>
              </div>  



              <div class="box-footer"><center>
              </center>
            </div>
          </div>
          <!-- </form> -->


        </div>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
  <!-- /.tab-pane -->
</div>
<!-- /.tab-content -->
</section>
@endsection

@section('script')
<script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>

<script>
  $(document).ready(function(){
    $('#resident_sales_activity').val($('#sales_activity').val());
    $('#business_sales_activity').val($('#sales_activity').val());
    
    $('#sales_activity').change(function(){
      $('#resident_sales_activity').val($(this).val());
      $('#business_sales_activity').val($(this).val());
    });

    $('#frm-residential-create').on('submit',function(e)
    {
      e.preventDefault();
      console.log('pressed');
      var data = $(this).serialize();
      console.log(data);
      var formData = new FormData($(this)[0]);
      console.log(formData);

      $.ajax(
      {
        url:"{{route('createAppformDetail',['user_id'=> $agents->user_id])}}", 
        type: "POST",
        data: formData,
        async: false,
        success: function(response)
        {
          console.log(response);
          $("[data-dismiss = modal]").trigger({type: "click"});
          swal('SUCCESS', 'Appform Added', 'success').then(function() 
          {
           window.location.replace("{{route('appforms',['user_id'=> $agents->user_id])}}");
         });

        },
        cache: false,
        contentType: false,
        processData: false,
      });
    });

    $('#frm-business-create').on('submit',function(e)
    {
      e.preventDefault();
      //console.log('pressed');
      var data = $(this).serialize();
      //console.log(data);
      var formData = new FormData($(this)[0]);
      //console.log(formData);

      $.ajax(
      {
        url:"{{route('createAppformDetail',['user_id'=> $agents->user_id])}}", 
        type: "POST",
        data: formData,
        async: false,
        success: function(response)
        {
          //console.log(response);
          $("[data-dismiss = modal]").trigger({type: "click"});
          swal('SUCCESS', 'Appform Added', 'success').then(function() {
           window.location.replace("{{route('appforms',['user_id'=> $agents->user_id])}}");
         });

        },
        cache: false,
        contentType: false,
        processData: false,
      });
    });
  });

</script>
@endsection
