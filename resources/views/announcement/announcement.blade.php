@extends('layout.master')
@section('style')
<!--
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
-->
@endsection
@section('content')

<section class="content-header">
  <h1>
    ANNOUNCEMENT
    <small>Control panel</small>
  </h1>

  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active">Announcement</li>
  </ol>
</section>

<div class="modal modal-info fade" id="add-ann" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Announcement</h4>

      </div>
      <div class="modal-body">
        <!-- Custom Tabs (Pulled to the right) -->
        <form action="#" method="POST" id="frm-ann-create" class="form-horizontal">
          {!! csrf_field() !!}
          <div class="row">

            <div class="form-group">
              <label for="ann_title" class="col-lg-3 col-md-3 col-sm-3 control-label">Title <span style="color:red">*</span></label>
              <div class="col-lg-9 col-md-9 col-sm-9">
                <input type="text" class="form-control" required="true" name="ann_title" id="ann_title">
              </div>
            </div>

            <div class="form-group">
              <label for="ann_picture" class="col-lg-3 col-md-3 col-sm-3 control-label">Image <span style="color:red">*</span></label>
              <div class="col-lg-9 col-md-9 col-sm-9">
                <input type="file" class="form-control" required="true" name="ann_picture" id="ann_picture">
              </div>
            </div>

            <div class="form-group">
              <label for="ann_content" class="col-lg-3 col-md-3 col-sm-3 control-label">Content </label>
              <div class="col-lg-9 col-md-9 col-sm-9">
              <textarea class="form-control" name="ann_content" id="ann_content"></textarea>
              </div>
            </div>

			  <div class="form-group">
				<label for="ann_content" class="col-lg-3 col-md-3 col-sm-3 control-label">When To Post <span style="color:red">*</span></label>
				<div class="col-lg-9 col-md-9 col-sm-9">
				  <input type="date" class="form-control" required="true" name="when_to_post" id="when_to_post">
				</div>
			  </div>

			  <div class="form-group">
				<label for="ann_content" class="col-lg-3 col-md-3 col-sm-3 control-label">Post To Which Group <span style="color:red">*</span></label>
				<div class="col-lg-9 col-md-9 col-sm-9">
					<select class="form-control" required="true" name="post_to_which_group" id="post_to_which_group">
						<option value="">Select</option>
						@foreach($roles as $role)
							<option value="{{$role->id}}">{{$role->name}}</option>
						@endforeach
					</select>
				</div>
			  </div>

          </div>
        </div>
        <div class="modal-footer" style="margin-top:0px !important">
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
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add-ann">Add Announcement</button>
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
                <table class="table table-hover table-striped" id="ann-table">

                  <thead>

                    <tr class="info bg-blue">
                      <!-- <th><input type="checkbox"></th> -->
                      <th></th>
                      <th class="mailbox-subject"><center>Announcement Title</center></th>
                      <th class="mailbox-subject"><center>Announcement Image</center></th>
                      <th class="mailbox-subject"><center>Operation</center></th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($announcements as $announcement)
                    <tr class="info">
                      <td><input type="checkbox"></td>
                      <td class="mailbox-subject"><center>{{$announcement->ann_title}}</center></td>
                      <td class="mailbox-subject" class="background-image:url();background-repeat: no-repeat;background-size: auto;"><center>{{$announcement->ann_picture}}</center></td>
                      <td class="mailbox-subject"><center><div class="btn-group">
                        <a class="button btn btn-success btn-sm" href="{{route('editAnnouncement', ['ann_id'=> $announcement->ann_id])}}"><i class="fa fa-edit"></i> Edit</a>
                        {{ Form::open(array('url' => 'announcement/' . $announcement->ann_id, 'class' => 'pull-right')) }}
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
<script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
-->
<script>
  $(document).ready(function(){
    //CKEDITOR.replace('ann_content');
    $('#ann-table').DataTable( {
			aoColumnDefs: [ {
				bSortable: false,
				aTargets: [ 0 ]
			} ]
		}
    );
    $('#frm-ann-create').on('submit',function(e)
    {
      e.preventDefault();
      //console.log('pressed');
      var data = $(this).serialize();
      //console.log(data);
      var formData = new FormData($(this)[0]);
      var file_data = $('#ann_picture').prop('files')[0];
      formData.append('file', file_data);
      //formData.append('ann_content', CKEDITOR.instances.ann_content.getData());

      $.ajax({
        url:"{{route('createAnnouncement')}}", 
        type: "POST",
        data: formData,
        async: false,
        success: function(response)
        {
          //console.log(response);
          $("[data-dismiss = modal]").trigger({type: "click"});
          swal('SUCCESS', 'Announcement Added', 'success').then(function() {
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
