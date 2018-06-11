@extends('layout.master')
@section('style')
@endsection
@section('content')

<!-- Small boxes (Stat box) -->
<center>
<br><br>
<section class="content">
      <div class="row">
		  <div style="" class="col-lg-12">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$totalapplicant}}</h3>

              <p><a href="{{route('manappform')}}" style="color:#fff"><b>TOTAL APPLICANTS</b></a></p>
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

              <p><a href="{{route('manappform',['status'=>1])}}" style="color:#fff"><b>COMPLETE APPLICANT</b></a></p>
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

              <p><a href="{{route('manappform',['status'=>2])}}" style="color:#fff"><b>INCOMPLETE APPLICANT</b></a></p>
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

              <p><a href="{{route('manappform',['status'=>3])}}" style="color:#fff"><b>CANCELLED APPLICANT</b></a></p>
            </div>
            <div class="icon">
              <i class="fa fa-ban"></i>
            </div>
            <a href="#" class="small-box-footer"></a>
          </div>
        </div>
        <!-- ./col -->
        </div>
<div style="" class="col-lg-12">
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="">
  <!-- Indicators -->
  <ol class="carousel-indicators">
	  
	  @foreach($announcements as $key => $announcement)
		@if($key === 0)
		<li data-target="#myCarousel" data-slide-to="{{$key}}" class="active"></li>
		@else
		<li data-target="#myCarousel" data-slide-to="{{$key}}" class=""></li>
		@endif
		@endforeach
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" style="">
	  @foreach($announcements as $key => $announcement)
		@if($key === 0)
			<div class="item active" style="">
		@else
			<div class="item" style="">
		@endif
			  <img src="{{asset($announcement->ann_picture)}}" alt="{{$announcement->ann_title}}">
				<!-- <div style="min-height:inherit;background-image:url('{{asset($announcement->ann_picture)}}');background-size:cover" >
				<div style="position: absolute;top: 10%;left:45%;text-align:center;color:#fff !important" > -->
				<div style="" class="annTitle">
						<h1>{{$announcement->ann_title}}</h1>
				</div>
				<!-- <div style="position: absolute;top: 40%;left:15%;text-align:center;color:#000 !important" > -->
				<div style="" class="annContent">
						<h2>{{$announcement->ann_content}}</h2>
				</div>
			</div>
		@endforeach
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
</div>
      </div>
      <!-- /.row -->
      </section>
      </center>
      

@endsection
