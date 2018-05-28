@extends('layout.masteragent')
@section('style')
@endsection
@section('content')

<section class="content-header">
  <h1>
    DATA PROFILE
    <small>Control Panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('agentdashboard',['user_id'=>$agents->user_id])}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">Data Profile</li>
  </ol>
</section>

<!-- test -->
<div class="row">
  <div class="col-xs-12">
    <div class="box box-solid">
     <div class="box-header with-border">
      <!-- <i class="fa fa-flag"></i> -->
      <dl class="dl-horizontal">
        <dt>ORDER NUMBER: {{$appforms->appform_id}}</dt>
      </dl>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <dl class="dl-horizontal">

        <dt>Company Name</dt>
        <dd>{{$appforms->company_name}}</dd>

        <dt>Director's Name</dt>
        <dd>{{$appforms->applicant_name}}</dd>

        <dt>Processing Status</dt>
        <dd>{{$appforms->status->status}}</dd>

        <dt>Package Name</dt>
        <dd>{{$appforms->packages->internet_package}}</dd>

      </dl>
              <!-- <a class="btn btn-warning"
                  href="#">
                <i class="fa fa-edit"></i> Edit
              </a> -->
            </div>
            <!-- /.box-body -->
          </div> <!-- /.box-solid -->
        </div> <!-- /.col -->
      </div> <!-- /.box -->
      <!-- test -->

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
                  <div class="modal-body">
                    <!-- Custom Tabs (Pulled to the right) -->
                    <form action="#" method="POST" id="frm-profile-edit" enctype ="multipart/form-data">
                      {!! csrf_field() !!}
                      <div class="form-horizontal">

                        <!-- SECTION 1 -->
                        
                        <div class="form-group">
                          <label for="altuser_id" class="col-sm-3 control-label">Agent ID: </label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="altuser_id" id="altuser_id" value="{{$appforms->users->altuser_id}}" disabled>
                          </div>
                        </div>
                        

                        <div class="form-group">
                          <label for="sales_activity" class="col-sm-3 control-label">Sales Activity: </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="sales_activity" id="sales_activity" data-placeholder="Select" disabled>
                              @foreach($activities as $activity)
                              <option value="{{$activity->activity_id}}" @if($activity->activity_id == $appforms->sales_activity) selected @endif>{{$activity->activity}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>


                        <div class="form-group">
                          <label for="application_type" class="col-sm-3 control-label">Application Type: </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="application_type" id="application_type" data-placeholder="Select" disabled>
                              @foreach($apptypes as $apptype)
                              <option value="{{$apptype->apptype_id}}" @if($apptype->apptype_id == $appforms->application_type) selected @endif>{{$apptype->type}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <!-- SECTION 2 --><h4><u><center><b>BUSINESS</b></center></u></h4><br>

                        @if($appforms->ic_passport_num == 1)
                        <div class="form-group">
                          <label for="ic" class="col-sm-3 control-label">Business Type: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="ic" id="ic" value="Local" disabled>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="ic" class="col-sm-3 control-label">IC: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="ic" id="ic" value="{{$appforms->ic}}" disabled>
                          </div>
                        </div>

                        @elseif($appforms->ic_passport_num == 11)
                        <div class="form-group">
                          <label for="ic" class="col-sm-3 control-label">Business Type: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="ic" id="ic" value="Foreigner" disabled>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="passport" class="col-sm-3 control-label">Passport No: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="passport" id="passport" value="{{$appforms->passport}}" disabled>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="nationality" class="col-sm-3 control-label">Nationality: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nationality" id="nationality" value="{{$appforms->nationality}}" disabled>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="date_of_birth" class="col-sm-3 control-label">DOB: </label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{$appforms->date_of_birth}}" disabled>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="passport_exp_date" class="col-sm-3 control-label">Passport Exp Date: </label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="passport_exp_date" id="passport_exp_date" value="{{$appforms->passport_exp_date}}" disabled>
                          </div>
                        </div>
                        @endif

                        <div class="form-group">
                          <label for="existing_service" class="col-sm-3 control-label">Existing Service: </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="existing_service" id="existing_service" data-placeholder="Select" disabled>
                              @foreach($exservs as $exserv)
                              <option value="{{$exserv->exserv_id}}" @if($exserv->exserv_id == $appforms->existing_service) selected @endif>{{$exserv->exservice}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        @if($appforms->streamyx_tel_no == 11)
                        <div class="form-group">
                          <label for="streamyx_tel_no" class="col-sm-3 control-label">Streamyx Tel No: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="streamyx_tel_no" id="streamyx_tel_no">
                          </div>
                        </div>
                        @endif

                        <div class="form-group">
                          <label for="streamyx_package" class="col-sm-3 control-label">Package: </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="streamyx_package" id="streamyx_package" data-placeholder="Select" disabled>
                              @foreach($packages as $package)
                              <option value="{{$package->intpackage_id}}" @if($package->intpackage_id == $appforms->streamyx_package) selected @endif>{{$package->internet_package}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="company_name" class="col-sm-3 control-label">Company Name: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="company_name" id="company_name" disabled>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="buss_reg_num" class="col-sm-3 control-label">Business Reg No: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="buss_reg_num" id="buss_reg_num" disabled>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="applicant_name" class="col-sm-3 control-label">Director Name: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="applicant_name" id="applicant_name" disabled>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="ic_passport_num" class="col-sm-3 control-label">Director NRIC: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="ic_passport_num" id="ic_passport_num" disabled>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inst_address" class="col-sm-3 control-label">Installation Address: </label>
                          <div class="col-sm-9">
                          <textarea class="form-control" name="inst_address" id="inst_address" disabled>{{$appforms->inst_address}}</textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="contact_num" class="col-sm-3 control-label">Contact No: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="contact_num" id="contact_num" value="{{$appforms->contact_num}}" disabled>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="email_address" class="col-sm-3 control-label">Email Address: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="email_address" id="email_address" value="{{$appforms->email_address}}" disabled>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="remark" class="col-sm-3 control-label">Remarks: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="remark" id="remark" value="{{$appforms->remark}}">
                          </div>
                        </div>

                        @if($appforms->finalstatus == 1)

                        <div class="form-group">
                          <label for="thumbprint_coll" class="col-sm-3 control-label">Thumbprint Collected: </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="thumbprint_coll" id="thumbprint_coll" data-placeholder="Select" readonly>
                              @foreach($thumbprints as $thumbprint)
                              <option value="{{$thumbprint->thumbstat_id}}" @if($thumbprint->thumbstat_id == $appforms->thumbprint_coll) selected @endif>{{$thumbprint->status}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        
                        @else
                        <div class="form-group">
                          <label for="thumbprint_coll" class="col-sm-3 control-label">Thumbprint Collected: </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="thumbprint_coll" id="thumbprint_coll" data-placeholder="Select">
                              @foreach($thumbprints as $thumbprint)
                              <option value="{{$thumbprint->thumbstat_id}}" @if($thumbprint->thumbstat_id == $appforms->thumbprint_coll) selected @endif>{{$thumbprint->status}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        @endif

                        <!-- SECTION 4 --><h4><u><center><b>E-FORM</b></center></u></h4><br>
                        @if($appforms->finalstatus == 1)
                        <div class="form-group">
                          <label for="eform_id" class="col-sm-3 control-label">E-Form ID: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="eform_id" id="eform_id" value="{{$appforms->eform_id}}" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="docs_uploaded" class="col-sm-3 control-label">Document Uploaded: </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="docs_uploaded" id="docs_uploaded" data-placeholder="Select" readonly>
                              @foreach($docsups as $docsup)
                              <option value="{{$docsup->docs_id}}" @if($docsup->docs_id == $appforms->docs_uploaded) selected @endif>{{$docsup->docsup}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        
                        @else
                        <div class="form-group">
                          <label for="eform_id" class="col-sm-3 control-label">E-Form ID: </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="eform_id" id="eform_id" value="{{$appforms->eform_id}}">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="docs_uploaded" class="col-sm-3 control-label">Document Uploaded: </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="docs_uploaded" id="docs_uploaded" data-placeholder="Select">
                              @foreach($docsups as $docsup)
                              <option value="{{$docsup->docs_id}}" @if($docsup->docs_id == $appforms->docs_uploaded) selected @endif>{{$docsup->docsup}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        @endif

                      </div>
                      <input type="hidden" name="appform_id" value="{{$appforms->appform_id}}">
                      <div class="box-footer">
                      @if($appforms->finalstatus == 1)
                        <a class="button btn btn-primary btn-sm" href="{{route('appforms',['user_id'=>$agents->user_id])}}">Back</a>
                        @else
                        <button type="submit" class="btn btn-primary">Save Change</button>
                        @endif
                        <a class="button btn btn-success btn-sm" href="{{ url('/agent/pdf') }}"><i class="fa fa-gear"></i>Export as PDF</a>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- Main content -->
      </section>
      @endsection

      @section('script')
      <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>

      <script>
// CKEDITOR.replace('product_desc');
$('#frm-profile-edit').on('submit',function(e){
  e.preventDefault();
  console.log('pressed');
  var data = $(this).serialize();
  console.log(data);
  var formData = new FormData($(this)[0]);
    // formData.append('product_desc', CKEDITOR.instances.product_desc.getData());

    $.ajax({
      url:"{{route('updateAppform',['user_id'=> $agents->user_id,'appform_id'=> $appforms->appform_id])}}", 
      type: "POST",
      data: formData,
      async: false,
      success: function(response){
        console.log(response);
        $("[data-dismiss = modal]").trigger({type: "click"});
        swal('SUCCESS', 'Appform Updated', 'success').then(function() {
         window.location.replace("{{route('appforms',['user_id'=>$agents->user_id])}}");
       });

      },
      cache: false,
      contentType: false,
      processData: false
    });
  });

</script>
@endsection
