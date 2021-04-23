@extends('layouts.app')

@section('title') Site Sales @endsection

@section('content')
{!! breadcrumbs(['Site Sales' => 'sales']) !!}
<h1 class="text-center">Site Sales</h1>
<div class="text-center"> <br><br></div>
<div class="text-center row" style="font-size: 1.2rem; padding: 20px 20px 40px 20px; ">
  <div class="col-sm">
    <i class="fas fa-play-circle" style="padding-right: 10px; font-size: 1.2rem;"></i> open
  </div>
  <div class="col-sm">
    <i class="fas fa-pause-circle" style="padding-right: 10px; font-size: 1.2rem;"></i> preview
  </div>
  <div class="col-sm">
    <i class="fas fa-dot-circle" style="font-size: 1.2rem;"></i> closed
  </div>
</div>
  <p> </p>
  <hr style="width: 75%;">
  <p><br><br></p>


@if(count($saleses))
  <div class="row col-lg-12">

    {!! $saleses->render() !!}
    @foreach($saleses as $sales)


    @if($sales->is_closed)
    <div class="col-sm-4" style="opacity: .4; padding-bottom: 10px; padding-top: 10px;">
    @else
    <div class="col-sm-4" style="padding-bottom: 10px; padding-top: 10px;">
    @endif

    <a href="sales/{{ $sales->id }}">
      <div class="w-100 d-flex" style='height:200px; background: #edeaed url("{{ $sales->arturl }}") repeat-x center;background-size:cover; border-radius: .6rem; padding: 3px 3px 3px 3px;'>
        @if($sales->is_open)

          <div style="font-size: 1.6rem;"><i class="fas fa-play-circle" data-toggle="tooltip" title=" Open "></i></div>

        @endif
        @if($sales->is_closed)

          <div style="font-size: 1.6rem;"><i class="fas fa-pause-circle" data-toggle="tooltip" title=" Closed "></i></div>

        @endif
        @if($sales->is_preview)

        <div style="font-size: 1.6rem;"><i class="fas fa-dot-circle" data-toggle="tooltip" title=" Preview - opens soon "></i></div>

        @endif
        
      </div>
    </a>
  </div>


    @endforeach
    {!! $saleses->render() !!}

  </div>
@else
    <div>No sales posts yet.</div>
@endif
@endsection
