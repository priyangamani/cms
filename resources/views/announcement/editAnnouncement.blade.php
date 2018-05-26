@extends('layout.master')
@section('style')
@endsection
@section('content')

<section class="content-header">
  <h1>
    ANNOUNCEMENT
    <small>Control Panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Announcement</li>
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
              <form action="#" method="POST" id="frm-ann-edit" enctype ="multipart/form-data" class="form-horizontal">
                {!! csrf_field() !!}
                <div class="row">

                  <div class="form-group">
                    <label for="ann_title" class="col-lg-3 col-md-3 col-sm-3 control-label">Title <span style="color:red">*</span></label>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                    <input type="text" class="form-control" name="ann_title" id="ann_title" required value="{{$announcements->ann_title}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="ann_picture" class="col-lg-3 col-md-3 col-sm-3 control-label">Image </label>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                      <input type="file" class="form-control" name="ann_picture" id="ann_picture">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="ann_content" class="col-lg-3 col-md-3 col-sm-3 control-label">Content </label>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                      <textarea class="form-control" name="ann_content" id="ann_content">{{$announcements->ann_content}}</textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="ann_content" class="col-lg-3 col-md-3 col-sm-3 control-label">When To Post  <span style="color:red">*</span></label>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                      <input type="date" class="form-control" required="true" name="when_to_post" id="when_to_post">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="ann_content" class="col-lg-3 col-md-3 col-sm-3 control-label">Post To Which Group  <span style="color:red">*</span></label>
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
                <input type="hidden" name="ann_id" value="{{$announcements->ann_id}}">
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
<script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>

<script>
  $('#frm-ann-edit').on('submit',function(e){
    //CKEDITOR.replace('ann_content');
    e.preventDefault();
    //console.log('pressed');
    var data = $(this).serialize();
    //console.log(data);
    var formData = new FormData($(this)[0]);
    //formData.append('ann_content', CKEDITOR.instances.ann_content.getData());

    $.ajax({
      url:"{{route('updateAnnouncement')}}", 
      type: "POST",
      data: formData,
      async: false,
      success: function(response){
        //console.log(response);
        $("[data-dismiss = modal]").trigger({type: "click"});
        swal('SUCCESS', 'Announcement Updated', 'success').then(function() {
         window.location.replace("{{route('announcement')}}");
       });

      },
      cache: false,
      contentType: false,
      processData: false
    });
  });

</script>
@endsection
