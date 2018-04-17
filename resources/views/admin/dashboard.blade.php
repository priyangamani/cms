@extends('layout.masteradmin')

@section('style')
@endsection

@section('content')
    <!-- Small boxes (Stat box) -->
<center>
<br><br>
<section class="content">
      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$totalapplicant}}</h3>

              <p><b>TOTAL APPLICANT</b></p>
            </div>
            <div class="icon">
              <i class="fa fa-check-circle"></i>
            </div>
            <a href="#" class="small-box-footer"></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$completeapplicant}}</h3>

              <p><b>COMPLETE APPLICANT</b></p>
            </div>
            <div class="icon">
              <i class="fa fa-share-square"></i>
            </div>
            <a href="#" class="small-box-footer"></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$incompleteapplicant}}</h3>

              <p><b>INCOMPLETE APPLICANT</b></p>
            </div>
            <div class="icon">
              <i class="fa fa-exclamation-circle"></i>
            </div>
            <a href="#" class="small-box-footer"></a>
          </div>
        </div>

        

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$pendingapplicant}}</h3>

              <p><b>CANCELLED APPLICANT</b></p>
            </div>
            <div class="icon">
              <i class="fa fa-times-circle"></i>
            </div>
            <a href="#" class="small-box-footer"></a>
          </div>
        </div>

        <!-- ./col -->
      </div>
      <!-- /.row -->
      </section>
      </center>
      
@endsection