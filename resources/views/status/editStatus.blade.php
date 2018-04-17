@extends('layout.master')
@section('style')
@endsection
@section('content')

<section class="content-header">
  <h1>
    PROCESSING STATUS
    <small>Control Panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Status</li>
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
            <div class="modal-body">
              <!-- Custom Tabs (Pulled to the right) -->
              <form action="#" method="POST" id="frm-status-edit" enctype ="multipart/form-data">
                {!! csrf_field() !!}
                <div class="row">

                  <div class="form-group">
                    <label for="status" class="col-sm-3 control-label">Status: </label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="status" id="status" value="{{$status->status}}">
                    </div>
                  </div>

                </div>
                <input type="hidden" name="status_id" value="{{$status->status_id}}">
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Save Change</button>
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

<script>
  $('#frm-status-edit').on('submit',function(e){
    e.preventDefault();
    console.log('pressed');
    var data = $(this).serialize();
    console.log(data);
    var formData = new FormData($(this)[0]);

    $.ajax({
      url:"{{route('updateStatus')}}", 
      type: "POST",
      data: formData,
      async: false,
      success: function(response){
        console.log(response);
        $("[data-dismiss = modal]").trigger({type: "click"});
          swal('SUCCESS', 'Status Updated', 'success').then(function() {
        window.location.replace("{{route('status')}}");
         });

      },
      cache: false,
      contentType: false,
      processData: false
    });
  });

</script>
@endsection