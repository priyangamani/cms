@extends('layout.master')
@section('style')
<!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css"> -->
@endsection
@section('content')

<section class="content-header">
  <h1>
    PRODUCT MANAGEMENT
    <small>Control panel</small>
  </h1>

  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active">Product Management</li>
  </ol>
</section>

<div class="modal modal-info fade" id="add-package" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Product</h4>

      </div>
      <div class="modal-body">
        <!-- Custom Tabs (Pulled to the right) -->
        <form action="#" method="POST" id="frm-package-create">
          {!! csrf_field() !!}
          <div class="row">

            <div class="form-group">
              <label for="internet_package" class="col-sm-3 control-label">Product Name: </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="internet_package" id="internet_package">
              </div>
            </div>

            <div class="form-group">
              <label for="package_type" class="col-sm-3 control-label">Product Type: </label>
              <div class="col-sm-9">
              <select class="form-control" name="package_type" id="package_type" data-placeholder="Select">
                <option value="">Select</option>
                  @foreach($packtypes as $packtype)
                  <option value="{{$packtype->packtype_id}}">{{$packtype->type}}</option>
                  @endforeach
                </select>
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
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add-package">Add Product</button>
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
                <table class="table table-bordered" id="package-table">

                  <thead>

                    <tr class="info bg-blue">
                      <!-- <th><input type="checkbox"></th> -->
                      <th></th>
                      <th class="mailbox-subject"><center>Product Id</center></th>
                      <th class="mailbox-subject"><center>Product Name</center></th>
                      <th class="mailbox-subject"><center>Product Type</center></th>
                      <th class="mailbox-subject"><center>Operation</center></th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($packages as $package)
                    <tr class="info">
                      <td><input type="checkbox"></td>
                      <td class="mailbox-subject"><center>{{$package->intpackage_id}}</center></td>
                      <td class="mailbox-subject"><center>{{$package->internet_package}}</center></td>
					  @foreach($packtypes as $packtype)
						@if($packtype->packtype_id == $package->package_type)
							<td class="mailbox-subject"><center>{{$packtype->type}}</center></td>
							<!--<option value="{{$packtype->packtype_id}}">{{$packtype->type}}</option>-->
						@endif
					  @endforeach
                      <td class="mailbox-subject"><center><div class="btn-group">
                        <a class="button btn btn-success btn-sm" href="{{route('editIntPackage', ['intpackage_id'=> $package->intpackage_id])}}"><i class="fa fa-edit"></i> Edit</a>
                        {{ Form::open(array('url' => 'internetpackage/' . $package->intpackage_id, 'class' => 'pull-right')) }}
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
    $('#package-table').DataTable( {
		aoColumnDefs: [ {
				bSortable: false,
				aTargets: [ 0 ]
			} ]
		}
    );
    $('#frm-package-create').on('submit',function(e)
    {
      e.preventDefault();
      console.log('pressed');
      var data = $(this).serialize();
      console.log(data);
      var formData = new FormData($(this)[0]);

      $.ajax({
        url:"{{route('createIntPackage')}}", 
        type: "POST",
        data: formData,
        async: false,
        success: function(response)
        {
          console.log(response);
          $("[data-dismiss = modal]").trigger({type: "click"});
          swal('SUCCESS', 'Product Added', 'success').then(function() {
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
