@extends('layout.masterrunner')
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

              <p><b>TOTAL APPLICATION FORM</b></p>
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

              <p><b>SUBMIT FOR APPROVAL</b></p>
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
              <h3>{{$pendingapplicant}}</h3><!-- $count = Model::where('status','=','1')->count(); -->

              <p><b>PENDING APPLICANT</b></p>
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
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="{{asset('images/runner1.jpg')}}" alt="runner1">
    </div>

    <div class="item">
      <img src="{{asset('images/runner2.jpg')}}" alt="runner2">
    </div>

    <div class="item">
      <img src="{{asset('images/runner3.jpg')}}" alt="runner3">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

      </section>
      </center>
      
@endsection
