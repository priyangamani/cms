@extends('layout.master')
@section('style')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<style type="text/css">
  .dt-buttons {
    display: inline;
  }
</style>
@endsection
@section('content')

    <section class="content-header">
      <h1>
        ADMIN APPLICATION-FORM 
        <small>Control panel</small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Application-Form</li>
      </ol>
    </section>

    <!-- Modal -->
    <div class="modal modal-info fade" id="add-appform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" >Add Application-Form</h4>
          </div>

          <div class="modal-body">
                  <!-- Custom Tabs (Pulled to the right) -->
                  <form action="#" method="POST" id="frm-appform-create" enctype ="multipart/form-data">
                  {!! csrf_field() !!}
                    <div class="row">

                    
                        
                    </div>
                      <div class="modal-footer">
                       <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                  </form>
          </div>
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
              <!-- <a href="#" class="btn btn-info btn-sm">Add Application-Form</a> -->
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="box">

                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <div class="mailbox-controls">

                    </div>
                    <div class="table-responsive mailbox-messages">
                      <table class="table table-bordered" id="appform-table">
                        <thead>
                          <tr class="info bg-blue">
                            <th class="mailbox-name"><center>Date</center></th>
                            <th class="mailbox-name"><center>Customer Name</center></th>
                            <th class="mailbox-name"><center>Segment</center></th>
                            <th class="mailbox-name"><center>Product</center></th>
                            <th class="mailbox-name"><center>Agent ID</center></th>
                            <th class="mailbox-name"><center>Customer ID</center></th>
                            <th class="mailbox-name"><center>Order No</center></th>
                            <th class="mailbox-name"><center>Processing Status</center></th>
                            <th class="mailbox-name"><center>Thumbprint Status</center></th>
                            <th class="mailbox-name"><center>eForm ID</center></th>
                            <th class="mailbox-name"><center>Approval Status</center></th>
                          </tr>
                        </thead>
                        <thead id="searchHead">
                          <tr class="info">
                            <th class=""></th>
                            <th>Customer Name</th>
                            <th class=""></th>
                            <th class=""></th>
                            <th class="">Agent ID</th>
                            <th class="">Customer ID</th>
                            <th class="">Order No</th>
                            <th class=""></th>
                            <th class=""></th>
                            <th class=""></th>
                            <th class=""></th>
                          </tr>
                        </thead>
                        <tbody>        
                         @foreach($appformdetails as $appform)
                         <tr class="info">
                          <td class="mailbox-star"><center>{{date('d-m-Y', strtotime($appform->created_at))}}</center></td>
                          <td class="mailbox-star"><center>{{$appform->applicant_name}}</center></td>
                          <td class="mailbox-star"><center>{{$appform->apptypes->type}}</center></td>
                          <td class="col-md-3"><center>{{$appform->packages->internet_package}}</center></td>
						  <td class="mailbox-star"><center>{{$appform->user_id}}</center></td>
                          @if($appform->application_type == 1)
                          @if($appform->ic_passport_num == 1)
                          <td class="mailbox-star"><center>{{$appform->ic}}</center></td>
                          @else
                          <td class="mailbox-star"><center>{{$appform->passport}}</center></td>
                          @endif
                          @else($appform->application_type == 11)
                          <td class="mailbox-star"><center>{{$appform->ic}}</center></td>
                          @endif

                          @if($appform->job_status == 1 && $appform->process_status == 1)
                          <td class="mailbox-star"><center><a href="#">{{$appform->appform_id}}</a></center></td>
                          @else($appform->thumbprint_coll == 1 && $appform->docs_uploaded == 1 && $appform->job_status == 21 || $appform->process_status == 11)
                          <td class="mailbox-star"><center><a href="#">{{$appform->appform_id}}</a></center></td>
                          @endif

                          <td class="mailbox-star"><center>{{$appform->status->status}}</center></td>
                          <td class="mailbox-star">
							<center>
							  @if($appform->thumbprints->status == 'No')
								<p style="display:none">0</p><i class="glyphicon glyphicon-remove"></i>
								@elseif($appform->thumbprints->status == 'Yes')
								<p style="display:none">1</p><i class="glyphicon glyphicon-ok"></i>
								@endif
							</center>
						  </td>
                          <td class="mailbox-star"><center>{{$appform->eform_id}}</center></td>
                          <td class="mailbox-star"><center>{{isset($appform->finals->status) ? $appform->finals->status : ''}}</center></td>
                           
                         </div>
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
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

<script>
$(document).ready(function(){
    var table = $('#appform-table').DataTable(
    {
        dom: 'lfrtBp',
        aaSorting: [ [5,'desc'] ],
		aoColumnDefs: [ {
			bSortable: false,
			aTargets: [ 0,8 ]
		} ],
        buttons: [{
          extend: 'excel',
          text: 'Export as Excel',
          exportOptions: {
            columns: [0,1,2,3,4,5,6,7,8,9,10]
          }
        }]
    }
    );
    $('#frm-appform-create').on('submit',function(e)
    {
        e.preventDefault();
        //console.log('pressed');
        var data = $(this).serialize();
        //console.log(data);
        var formData = new FormData($(this)[0]);

        $.ajax(
        {
            url:"#", 
            type: "POST",
            data: formData,
            async: false,
            success: function(response)
            {
                //console.log(response);
                 $("[data-dismiss = modal]").trigger({type: "click"});
            },
               cache: false,
               contentType: false,
               processData: false,
        });
    });
    // Setup - add a text input to each footer cell
    $('#searchHead th').each( function () {
        var title = $(this).text();
        if(title != '')
			$(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
    } );
    // Apply the search
    var i=0;
    table.columns().every( function () {
        var that = this;
        var searchHead = jQuery('#searchHead tr th')[i];
        i++;
        $( 'input', searchHead ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that.search( this.value ).draw();
            }
        } );
    } );
});

</script>
@endsection
