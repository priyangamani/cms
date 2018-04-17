@extends('layout.master')
@section('style')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@endsection
@section('content')

<section class="content-header">
  <h1>
    Branch
    <small>Control panel</small>
  </h1>

  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active">Branch</li>
  </ol>
</section>

<div class="modal modal-info fade" id="add-branch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Branch</h4>

      </div>
      <div class="modal-body">
        <!-- Custom Tabs (Pulled to the right) -->
        <form action="#" method="POST" id="frm-branch-create">
          {!! csrf_field() !!}
          <div class="row">

            <div class="form-group">
              <label for="branch_name" class="col-sm-3 control-label">Branch Name: </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="branch_name" id="branch_name">
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<section class="content">
  <div class="col-md-12">
    <!-- Custom Tabs (Pulled to the right) -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs ">
        <li class="active"><a href="#tab_1" data-toggle="tab">Active</a></li>
        <li class="pull-right"> 
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add-branch">Add Branch</button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">

              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped" id="branch-table">

                  <thead>

                    <tr class="info bg-blue">
                      <th><input type="checkbox"></th>
                      <th class="mailbox-subject"><center>Branch ID</center></th>
                      <th class="mailbox-subject"><center>Branch Name</center></th>
                      <th class="mailbox-subject"><center>Operation</center></th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($branches as $branch)
                    <tr class="info">
                      <td><input type="checkbox"></td>
                      <td class="mailbox-subject"><center>{{$branch->branch_id}}</center></td>
                      <td class="mailbox-subject"><center>{{$branch->branch_name}}</center></td>
                      <td class="mailbox-subject"><center><div class="btn-group">
                        <a class="button btn btn-success btn-sm" href="{{route('editBranch', ['branch_id'=> $branch->branch_id])}}"><i class="fa fa-edit"></i> Edit</a>
                        {{ Form::open(array('url' => 'branch/' . $branch->branch_id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'button btn btn-warning btn-sm')) }}
                        {{ Form::close() }}
                      </center>
                    </td>
                  </tr>
                  @endforeach

                </tbody>

              </table>
              <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
          </div>
          <!-- /.box-body -->
        </div>
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
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<script>
  $(document).ready(function(){
    $('#branch-table').DataTable();
    $('#frm-branch-create').on('submit',function(e)
    {
      e.preventDefault();
      console.log('pressed');
      var data = $(this).serialize();
      console.log(data);
      var formData = new FormData($(this)[0]);

      $.ajax({
        url:"{{route('createBranch')}}", 
        type: "POST",
        data: formData,
        async: false,
        success: function(response)
        {
          console.log(response);
          $("[data-dismiss = modal]").trigger({type: "click"});
          swal('SUCCESS', 'Branch Added', 'success').then(function() {
           window.location.reload();
         });

        },
        cache: false,
        contentType: false,
        processData: false
      });
    });
  });

</script>
@endsection