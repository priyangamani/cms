@extends('layout.master')
@section('style')
@endsection
@section('content')

<section class="content-header">
  <h1>
    AGENT
    <small>Control Panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Agent</li>
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
              <form action="#" method="POST" id="frm-agent-edit" enctype ="multipart/form-data">
                {!! csrf_field() !!}
                <div class="row">

      

            <div class="form-group">
                    <label for="role" class="col-sm-3 control-label">User Type: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="role" id="role" value="{{$users->roles()->pluck('name')->implode(' ') }}" disabled>
                    </div>
                  </div>

                  <div class="form-group">
              <label for="state" class="col-sm-3 control-label">State: </label>
              <div class="col-sm-9">
              <select class="form-control" name="state" id="state" data-placeholder="Select">
                <option value="">Select</option>
                  @foreach($states as $state)
                  <option value="{{$state->state_id}}" @if($state->state_id == $users->state) selected @endif>{{$state->state_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="branch" class="col-sm-3 control-label">Branch: </label>
              <div class="col-sm-9">
              <select class="form-control" name="branch" id="branch" data-placeholder="Select">
                <option value="">Select</option>
                  @foreach($branches as $branch)
                  <option value="{{$branch->branch_id}}" @if($branch->branch_id == $users->branch) selected @endif>{{$branch->branch_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

                  <div class="form-group">
                    <label for="supervisor" class="col-sm-3 control-label">Supervisor: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="supervisor" id="supervisor" value="{{$users->supervisor}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="altuser_id" class="col-sm-3 control-label">User ID: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="altuser_id" id="altuser_id" value="{{$users->altuser_id}}" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="name" id="name" value="{{$users->name}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="ic_number" class="col-sm-3 control-label">Mykad: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="ic_number" id="ic_number" value="{{$users->ic_number}}" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="email" id="email" value="{{$users->email}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="phonenumber" class="col-sm-3 control-label">Phone Number: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="phonenumber" id="phonenumber" value="{{$users->phonenumber}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Address: </label>
                    <div class="col-sm-9">
                    <textarea class="form-control" name="address" id="address">{{$users->address}}</textarea>
                    </div>
                  </div> 

                  <div class="form-group">
              <label for="active" class="col-sm-3 control-label">Active: </label>
              <div class="col-sm-9">
              <select class="form-control" name="active" id="active" data-placeholder="Select">
                <option value="">Select</option>
                  @foreach($actives as $active)
                  <option value="{{$active->active_id}}" @if($active->active_id == $users->active) selected @endif>{{$active->status}}</option>
                  @endforeach
                </select>
              </div>
            </div>

                </div>
                <input type="hidden" name="user_id" value="{{$users->user_id}}">
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
  $('#frm-agent-edit').on('submit',function(e){
    e.preventDefault();
    console.log('pressed');
    var data = $(this).serialize();
    console.log(data);
    var formData = new FormData($(this)[0]);

    $.ajax({
      url:"{{route('updateAgent')}}", 
      type: "POST",
      data: formData,
      async: false,
      success: function(response){
        console.log(response);
        $("[data-dismiss = modal]").trigger({type: "click"});
          swal('SUCCESS', 'Agent Updated', 'success').then(function() {
        window.location.replace("{{route('agent')}}");
         });

      },
      cache: false,
      contentType: false,
      processData: false
    });
  });

</script>
@endsection