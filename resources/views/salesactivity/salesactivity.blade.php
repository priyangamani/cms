@extends('layout.master')
@section('style')
<!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css"> -->
@endsection
@section('content')

<section class="content-header">
  <h1>
    SALES ACTIVITY
    <small>Control panel</small>
  </h1>

  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active">Sales Activity</li>
  </ol>
</section>

<div class="modal modal-info fade" id="add-activity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Sales Activity</h4>

      </div>
      <div class="modal-body">
        <!-- Custom Tabs (Pulled to the right) -->
        <form action="#" method="POST" id="frm-activity-create">
          {!! csrf_field() !!}
          <div class="row">

            <div class="form-group">
              <label for="activity" class="col-sm-3 control-label">Sales Activity Type: </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="activity" id="activity">
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
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add-activity">Add Sales Activity</button>
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
                <table class="table table-striped" id="activity-table">

                  <thead>

                    <tr class="info bg-blue">
                      <th><input type="checkbox"></th>
                      <th class="mailbox-subject"><center>SALES ACTIVITY ID</center></th>
                      <th class="mailbox-subject"><center>SALES ACTIVITY TYPE</center></th>
                      <th class="mailbox-subject"><center>OPERATION</center></th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($activities as $activity)
                    <tr class="info">
                      <td><input type="checkbox"></td>
                      <td class="mailbox-subject"><center>{{$activity->activity_id}}</center></td>
                      <td class="mailbox-subject"><center>{{$activity->activity}}</center></td>
                      <td class="mailbox-subject"><center><div class="btn-group">
                        <a class="button btn btn-success btn-sm" href="{{route('editSaleActivity', ['activity_id'=> $activity->activity_id])}}"><i class="fa fa-edit"></i> Edit</a>
                        {{ Form::open(array('url' => 'activity/' . $activity->activity_id, 'class' => 'pull-right')) }}
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
<!--
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
-->
<script>
  $(document).ready(function(){
    $('#activity-table').DataTable( {
			aoColumnDefs: [ {
				bSortable: false,
				aTargets: [ 0 ]
			} ]
		}
    );
    $('#frm-activity-create').on('submit',function(e)
    {
      e.preventDefault();
      //console.log('pressed');
      var data = $(this).serialize();
      //console.log(data);
      var formData = new FormData($(this)[0]);

      $.ajax({
        url:"{{route('createSalesActivity')}}", 
        type: "POST",
        data: formData,
        async: false,
        success: function(response)
        {
          //console.log(response);
          $("[data-dismiss = modal]").trigger({type: "click"});
          swal('SUCCESS', 'Sales Activity Added', 'success').then(function() {
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
