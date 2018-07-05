@extends('layout.masteradmin')
@section('style')
@endsection
@section('content')

<section class="content-header">
  <h1>
    DATA PROFILE
    <small>Control Panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('admindashboard',['user_id'=>$admins->user_id])}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
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

        <dt>Applicant Name</dt>
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

                        <div class="box-body">
                          <!-- SECTION 1 --><h4><u><b>SALES INFORMATION</b></u></h4><br>
                          
                          <dl class="dl-horizontal form-group">
                            <dt>Agent ID :</dt>
                            <dd>{{$appforms->users->altuser_id}}</dd>
                          </dl>

                          <dl class="dl-horizontal form-group">
                            <dt>Sales Activity :</dt>
                            <dd>{{$appforms->activities->activity}}</dd>
                          </dl>

                          <dl class="dl-horizontal form-group">
                            <dt>Application Type :</dt>
                            <dd>{{$appforms->apptypes->type}}</dd>
                          </dl>
                          <br>

                          <!-- SECTION 2 --><h4><u><b>RESIDENTIAL APPLICANT INFORMATION</b></u></h4><br>

                          <dl class="dl-horizontal form-group">
                            <dt>Existing Service :</dt>
                            <dd>{{$appforms->exservs->exservice}}</dd>
                          </dl>

                          @if($appforms->existing_service == 11)
                          <dl class="dl-horizontal form-group">
                            <dt>Streamyx Tel No :</dt>
                            <dd>{{$appforms->streamyx_tel_no}}</dd>
                          </dl>
                          @endif

                          <dl class="dl-horizontal form-group">
                            <dt>Package :</dt>
                            <dd>{{$appforms->packages->internet_package}}</dd>
                          </dl>

                          <dl class="dl-horizontal form-group">
                            <dt>Applicant Name :</dt>
                            <dd>{{$appforms->applicant_name}}</dd>
                          </dl>

                          @if($appforms->ic_passport_num == 1)
                          <dl class="dl-horizontal form-group">
                            <dt>Mykad :</dt>
                            <dd>{{$appforms->ic}}</dd>
                          </dl>

                          @elseif($appforms->ic_passport_num == 11)
                          <dl class="dl-horizontal form-group">
                            <dt>Passport Number :</dt>
                            <dd>{{$appforms->passport}}</dd>
                          </dl>

                          <dl class="dl-horizontal form-group">
                            <dt>Nationality :</dt>
                            <dd>{{$appforms->countries->nationality}}</dd>
                          </dl>

                          <dl class="dl-horizontal form-group">
                            <dt>DOB :</dt>
                            <dd>{{$appforms->date_of_birth}}</dd>
                          </dl>

                          <dl class="dl-horizontal form-group">
                            <dt>Passport Exp Date :</dt>
                            <dd>{{$appforms->passport_exp_date}}</dd>
                          </dl>
                          @endif

                          <dl class="dl-horizontal form-group">
                            <dt>Installation Address :</dt>
                            <dd>{{$appforms->inst_address}}</dd>
                          </dl>

                          <dl class="dl-horizontal form-group">
                            <dt>Contact No :</dt>
                            <dd>{{$appforms->contact_num}}</dd>
                          </dl>

                          <dl class="dl-horizontal form-group">
                            <dt>Email Address :</dt>
                            <dd>{{$appforms->email_address}}</dd>
                          </dl>

                          <dl class="dl-horizontal form-group">
                            <dt>Agent Remarks :</dt>
                            <dd>{{$appforms->remark}}</dd>
                          </dl>

                          <dl class="dl-horizontal form-group">
                            <dt>Thumbprint Collected :</dt>
                            <dd>{{$appforms->thumbprints->status}} <input type="hidden" name="thumbprint_coll" value="{{$appforms->thumbprint_coll}}"></dd>
                          </dl>

                          @if($appforms->thumbprint_coll == 11)

                          @if($appforms->runner_name)

                          <dl class="dl-horizontal form-group">
                            <dt>Assign to :</dt>
                            <dd>{{$appforms->runners->name}}</dd>
                          </dl>

                          @else
                          <div class="form-group">
                            <label for="runner_name" class="col-sm-3 control-label">Assign to: </label>
                            <div class="col-sm-9">
                              <select class="form-control" name="runner_name" id="runner_name" placeholder="Select...">
                                <option value="">Select</option>
                                @foreach($runners as $runner)
                                <option value="{{$runner->user_id}}"  @if($runner->user_id == $appforms->runner_name) selected @endif>{{$runner->name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          @endif

                          @else
                          <dl class="dl-horizontal form-group">
                            <dt>Assign to :</dt>
                            @if(isset($appforms->runners))
                            <dd>{{$appforms->runners->name}}</dd>
                            @else
                            <dd>No Runner Assigned</dd>
                            @endif
                          </dl>

                          @endif
                          <br>
                          <!-- SECTION 4 --><h4><u><b>E-FORM INFORMATION</b></u></h4><br>
                          @if($appforms->eform_id)
                          <dl class="dl-horizontal form-group">
                            <dt>E-Form ID :</dt>
                            <dd>{{$appforms->eform_id}}<input type="hidden" name="eform_id" value="{{$appforms->eform_id}}"></dd>
                          </dl>
                          @else
                          <div class="form-group">
                            <label for="eform_id" class="col-sm-3 control-label">E-Form ID: </label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="eform_id" id="eform_id" value="{{$appforms->eform_id}}">
                            </div>
                          </div>
                          @endif

                          @if($appforms->docs_uploaded == 1)
                          <dl class="dl-horizontal form-group">
                            <dt>Document Uploaded :</dt>
                            <dd>{{$appforms->docsups->docsup}}<input type="hidden" name="docs_uploaded" value="{{$appforms->docs_uploaded}}"></dd>
                          </dl>
                          @else
                          <div class="form-group">
                            <label for="docs_uploaded" class="col-sm-3 control-label">Document Uploaded: </label>
                            <div class="col-sm-9">
                              <select class="form-control" name="docs_uploaded" id="docs_uploaded" data-placeholder="Select">
                                <option value="">Select</option>
                                @foreach($docsups as $docsup)
                                <option value="{{$docsup->docs_id}}" @if($docsup->docs_id == $appforms->docs_uploaded) selected @endif>{{$docsup->docsup}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          @endif
                          <br>

                          <!-- SECTION 4 --><h4><u><b>ADMIN REMARKS</b></u></h4><br>

                          <div class="form-group">
                            <label for="process_status" class="col-sm-3 control-label">Processing Status: </label>
                            <div class="col-sm-9">
                              <select class="form-control" name="process_status" id="process_status" data-placeholder="Select">
                                <option value="">Select</option>
                                @foreach($status as $status)
                                <option value="{{$status->status_id}}" @if($status->status_id == $appforms->process_status) selected @endif>{{$status->status}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="eform_id" class="col-sm-3 control-label">Admin Remarks: </label>
                            <div class="col-sm-9">
                              <textarea class="form-control" name="admin_remark" id="admin_remark">{{$appforms->admin_remark}}</textarea>
                            </div>
                          </div>

                          <input type="hidden" name="appform_id" value="{{$appforms->appform_id}}">
                          <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save Change</button>
                            <a class="button btn btn-success btn-sm" href="#"><i class="fa fa-gear"></i>Export as PDF</a>
                            <a class="button btn btn-primary btn-sm" href="{{route('adminappforms',['user_id'=>$admins->user_id])}}">Back</a>
                          </div>
                        </div>
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
      url:"{{route('updateAdminAppform',['user_id'=> $admins->user_id,'appform_id'=> $appforms->appform_id])}}", 
      type: "POST",
      data: formData,
      async: false,
      success: function(response){
        console.log(response);
        $("[data-dismiss = modal]").trigger({type: "click"});
        swal('SUCCESS', 'Appform Updated', 'success').then(function() {
         window.location.replace("{{route('adminappforms',['user_id'=>$admins->user_id])}}");
       });

      },
      cache: false,
      contentType: false,
      processData: false
    });
  });

</script>
@endsection
