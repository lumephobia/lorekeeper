@if($sales->is_closed)
<div class="mb-2 text-center" style="opacity: .6;">
@else
<div class="mb-2 text-center">
@endif


<div class="col-lg-12">
    <p style="text-align: center;"><img src="{!! $sales->arturl !!}" style="max-width: 450px; height: auto;"></p>
    @if($sales->artlink)
    <p style="text-align: center;"><em>social media link: <a href="{!! $sales->artlink !!}">*here*</a></em></p>
    @endif

    <div class="container text-left" style="padding: 5px 15px 10px 15px; margin-left: auto; margin-right: auto; width: 70%;">
      <div class="row">
        <div class="col" style="text-transform: uppercase; font-size: 1.2rem;">Species</div>
        <div class="col">{!! $sales->species !!}</div>
      </div>
      <div class="row">
        <div class="col" style="text-transform: uppercase; font-size: 1.2rem;">Design</div>
        <div class="col">{!! $sales->design !!}</div>
      </div>
      @if($sales->trait)
      <div class="row">
        <div class="col" style="text-transform: uppercase; font-size: 1.2rem;">Traits?</div>
        <div class="col">{!! $sales->trait !!}</div>
      </div>
      @endif
    </div>
    <p>&nbsp;</p>

    <div class="card" style="padding: 5px 15px 10px 15px; margin-left: auto; margin-right: auto; width: 60%;">

          <div class="monly"><h1 class="card-title mb-0" style="color: #847885!important; font-size: 3rem;"> &nbsp; </h1><br></div>
          <h1 class="card-title mb-0" style="color: #847885!important; font-size: 2.5rem;">info</h1>

      <p><br>
        {!! $sales->parsed_text !!}
      </p>
      </div>
    </div>


    <p>&nbsp;</p>

    <div class="container text-left" style="padding: 5px 15px 10px 15px; margin-left: auto; margin-right: auto; width: 70%;">
      <div class="row">
        <div class="col" style="text-transform: uppercase; font-size: 1.2rem;">Type</div>
        <div class="col">

          @if($sales->is_auction)
          Auction
          @endif
          @if($sales->is_sale)
          Sale
          @endif
          @if($sales->is_offer)
          Offer To Adopt
          @endif
          @if($sales->is_xta)
          Draw/Write To Adopt {!! add_help('This can be either a writtind or drawing themed task. Details are listed in the description.') !!}
          @endif
          @if($sales->is_raffle)
          Raffle {!! add_help('This can be either a Flatsale Raffle or a Free Raffle. Details are listed in the description.') !!}
          @endif



        </div>
      </div>

      @if($sales->is_auction)
      <div class="row">
        <div class="col" style="text-transform: uppercase; font-size: 1.2rem;">Start Bit</div>
        <div class="col">{!! $sales->startbit !!}</div>
      </div>
      <div class="row">
        <div class="col" style="text-transform: uppercase; font-size: 1.2rem;">Min. Bit</div>
        <div class="col">{!! $sales->minbit !!}</div>
      </div>
      @endif
      @if($sales->price)
      <div class="row">
        <div class="col" style="text-transform: uppercase; font-size: 1.2rem;">Price</div>
        <div class="col">{!! $sales->price !!}</div>
      </div>
      @endif
      @if($sales->autobuy)
      <div class="row">
        <div class="col" style="text-transform: uppercase; font-size: 1.2rem;">Auto Buy</div>
        <div class="col">{!! $sales->autobuy !!}</div>
      </div>
      @endif
      @if($sales->time)
      <div class="row">
        <div class="col" style="text-transform: uppercase; font-size: 1.2rem;">Deadline</div>
        <div class="col">{!! $sales->time !!}</div>
      </div>
      @endif
      @if($sales->notes)
      <div class="row">
        <div class="col" style="text-transform: uppercase; font-size: 1.2rem;">Notes</div>
        <div class="col">{!! $sales->notes !!}</div>
      </div>
      @endif


    </div>



</div>



    @if((isset($sales->comments_open_at) && $sales->comments_open_at < Carbon\Carbon::now() ||
    (Auth::check() && Auth::user()->hasPower('edit_pages'))) ||
    !isset($sales->comments_open_at))
        <?php $commentCount = App\Models\Comment::where('commentable_type', 'App\Models\Sales')->where('commentable_id', $sales->id)->count(); ?>
        @if(!$page)
            <div class="text-right mb-2 mr-2">
                <a class="btn" href="{{ $sales->url }}"><i class="fas fa-comment"></i> {{ $commentCount }} Comment{{ $commentCount != 1 ? 's' : ''}}</a>
            </div>
        @else
            <div class="text-right mb-2 mr-2">
                <span class="btn"><i class="fas fa-comment"></i> {{ $commentCount }} Comment{{ $commentCount != 1 ? 's' : ''}}</span>
            </div>
        @endif
    @endif
</div>
