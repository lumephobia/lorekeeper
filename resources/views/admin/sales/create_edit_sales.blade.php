@extends('admin.layout')

@section('admin-title') Sales @endsection

@section('admin-content')
{!! breadcrumbs(['Admin Panel' => 'admin', 'Sales' => 'admin/sales', ($sales->id ? 'Edit' : 'Create').' Post' => $sales->id ? 'admin/sales/edit/'.$sales->id : 'admin/sales/create']) !!}

<h1>{{ $sales->id ? 'Edit' : 'Create' }} Sale
    @if($sales->id)
        <a href="#" class="btn btn-danger float-right delete-sales-button">Delete Post</a>
    @endif
</h1>

{!! Form::open(['url' => $sales->id ? 'admin/sales/edit/'.$sales->id : 'admin/sales/create', 'files' => true]) !!}

<h3>Basics</h3>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Title') !!}
            {!! Form::text('title', $sales->title, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Post Time (Optional)') !!} {!! add_help('This is the time that the sales post should be posted. Make sure the Is Viewable switch is off.') !!}
            {!! Form::text('post_at', $sales->post_at, ['class' => 'form-control datepicker']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('Species') !!}
    {!! Form::text('species', $sales->species, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Designer') !!} {!! add_help('Use the website username, please.') !!}
    {!! Form::text('design', $sales->design, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Traits') !!}
    {!! Form::text('trait', $sales->trait, ['class' => 'form-control']) !!}
</div>

<p><br></p>

<h3>Design</h3>

<div class="form-group">
    {!! Form::label('Artwork') !!}
    {!! Form::text('arturl', $sales->arturl, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Link') !!}
    {!! Form::text('artlink', $sales->artlink, ['class' => 'form-control']) !!}
</div>

<p><br></p>

<h3> Description </h3>
<div class="form-group">
    {!! Form::label('Description') !!}
    {!! Form::textarea('text', $sales->text, ['class' => 'form-control wysiwyg']) !!}
</div>

<p><br></p>

<h3> Sale Type </h3>

<div class="row">
  <div class="col-sm">
    <div class="form-group">
      {!! Form::checkbox('is_auction', 1, $sales->id ? $sales->is_auction : 0, ['class' => 'form-check-input', 'data-toggle' => 'toggle']) !!}
      {!! Form::label('is_auction', 'Auction', ['class' => 'form-check-label ml-3']) !!}
    </div>
    </div>
  <div class="col-sm">
    <div class="form-group">
      {!! Form::checkbox('is_sale', 1, $sales->id ? $sales->is_sale : 0, ['class' => 'form-check-input', 'data-toggle' => 'toggle']) !!}
      {!! Form::label('is_sale', 'Sale', ['class' => 'form-check-label ml-3']) !!}
    </div>
  </div>
  <div class="col-sm">
    <div class="form-group">
      {!! Form::checkbox('is_offer', 1, $sales->id ? $sales->is_offer : 0, ['class' => 'form-check-input', 'data-toggle' => 'toggle']) !!}
      {!! Form::label('is_offer', 'OTA', ['class' => 'form-check-label ml-3']) !!} {!! add_help('The design is an Offer to Adopt.') !!}
  </div>
</div>
</div>
<div class="row">
<div class="col-sm">
  <div class="form-group">
    {!! Form::checkbox('is_xta', 1, $sales->id ? $sales->is_xta : 0, ['class' => 'form-check-input', 'data-toggle' => 'toggle']) !!}
    {!! Form::label('is_xta', 'xTA', ['class' => 'form-check-label ml-3']) !!} {!! add_help('The design is an Draw to Adopt, Write to Adopt or something simmilar.') !!}
</div>
</div>
<div class="col-sm">
  <div class="form-group">
    {!! Form::checkbox('is_raffle', 1, $sales->id ? $sales->is_raffle : 0, ['class' => 'form-check-input', 'data-toggle' => 'toggle']) !!}
    {!! Form::label('is_raffle', 'Raffle', ['class' => 'form-check-label ml-3']) !!} {!! add_help('The design will be an free or flatsale Raffle') !!}
</div>
</div>
<div class="col-sm">
</div>
</div>


<p><br></p>

<h3>Auction</h3>
This are fields which are needed for auctions only.

<div class="form-group">
    {!! Form::label('Start Bit') !!}
    {!! Form::text('startbit', $sales->startbit, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Min. Increase') !!}
    {!! Form::text('minbit', $sales->minbit, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Autobuy') !!}
    {!! Form::text('autobuy', $sales->autobuy, ['class' => 'form-control']) !!}
</div>

<p><br></p>

<h3> Sales</h3>
This are fields which are needed for sales only.
<div class="form-group">
    {!! Form::label('Price') !!}
    {!! Form::text('price', $sales->price, ['class' => 'form-control']) !!}
</div>

<p><br></p>


<h3> Other </h3>
This are optional fields which can be useful for Offer To Adopts, Raffles and Draw/Write To Adopts
<div class="form-group">
    {!! Form::label('Autobuy') !!}
    {!! Form::text('autobuy', $sales->autobuy, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('End Time') !!}
    {!! Form::text('time', $sales->time, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Notes') !!}
    {!! Form::text('notes', $sales->notes, ['class' => 'form-control']) !!}
</div>











<p><br></p>

<h3> Settings </h3>

<div class="row">
    <div class="col-md">
        <div class="form-group">
            {!! Form::checkbox('is_visible', 1, $sales->id ? $sales->is_visible : 1, ['class' => 'form-check-input', 'data-toggle' => 'toggle']) !!}
            {!! Form::label('is_visible', 'Is Viewable', ['class' => 'form-check-label ml-3']) !!} {!! add_help('If this is turned off, the post will not be visible. If the post time is set, it will automatically become visible at/after the given post time, so make sure the post time is empty if you want it to be completely hidden.') !!}
        </div>
    </div>
    @if($sales->id && $sales->is_visible)
        <div class="col-md">
            <div class="form-group">
                {!! Form::checkbox('bump', 1, null, ['class' => 'form-check-input', 'data-toggle' => 'toggle']) !!}
                {!! Form::label('bump', 'Bump Sale', ['class' => 'form-check-label ml-3']) !!} {!! add_help('If toggled on, this will alert users that there is a new sale. Best in conjunction with a clear notification of changes!') !!}
            </div>
        </div>
    @endif
    <div class="col-md">
        <div class="form-group">
            {!! Form::label('comments_open_at', 'Comments Open At (Optional)') !!} {!! add_help('The time at which comments open to members. Staff can post comments before this time.') !!}
            {!! Form::text('comments_open_at', $sales->comments_open_at, ['class' => 'form-control datepicker']) !!}
        </div>
    </div>
</div>
<p><br></p>
<h3>Status</h3>
<p>This are optinal status marker for your sale, which will add a colored ribbon to the header of your post to show the current status of the sale and enable/disable comments.</p>
<div class="row">
  <div class="col-sm">
    <div class="form-group">
      {!! Form::checkbox('is_open', 1, $sales->id ? $sales->is_open : 0, ['class' => 'form-check-input', 'data-toggle' => 'toggle']) !!}
      {!! Form::label('is_open', 'Is Open', ['class' => 'form-check-label ml-3']) !!} {!! add_help('If this is turned on the sale will be marked with a green ribbon.') !!}
    </div>
    </div>
  <div class="col-sm">
    <div class="form-group">
      {!! Form::checkbox('is_closed', 1, $sales->id ? $sales->is_closed : 0, ['class' => 'form-check-input', 'data-toggle' => 'toggle']) !!}
      {!! Form::label('is_closed', 'Is Closed', ['class' => 'form-check-label ml-3']) !!} {!! add_help('If this is turned on the sale will be marked with an red ribbon') !!}
    </div>
  </div>
  <div class="col-sm">
    <div class="form-group">
      {!! Form::checkbox('is_preview', 1, $sales->id ? $sales->is_preview : 0, ['class' => 'form-check-input', 'data-toggle' => 'toggle']) !!}
      {!! Form::label('is_preview', 'Is Preview', ['class' => 'form-check-label ml-3']) !!} {!! add_help('If this is turned on the sale will be marked with an blue ribbon. Comments will be disabled while this status is active.') !!}
  </div>
</div>
</div>
<p><br></p>

<div class="text-right">
    {!! Form::submit($sales->id ? 'Edit' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>

{!! Form::close() !!}

@endsection

@section('scripts')
@parent
<script>
$( document ).ready(function() {
    $('.delete-sales-button').on('click', function(e) {
        e.preventDefault();
        loadModal("{{ url('admin/sales/delete') }}/{{ $sales->id }}", 'Delete Post');
    });

    $( ".datepicker" ).datetimepicker({
        dateFormat: "yy-mm-dd",
        timeFormat: 'HH:mm:ss',
    });
});
</script>
@endsection
