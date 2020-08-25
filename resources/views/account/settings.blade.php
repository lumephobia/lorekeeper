@extends('account.layout')

@section('account-title') Settings @endsection

@section('account-content')
{!! breadcrumbs(['My Account' => Auth::user()->url, 'Settings' => 'account/settings']) !!}

<h1>Settings</h1>

<h3>Profile</h3>

{!! Form::open(['url' => 'account/profile']) !!}
    <div class="form-group">
        {!! Form::label('text', 'Profile Text') !!}
        {!! Form::textarea('text', Auth::user()->profile->text, ['class' => 'form-control wysiwyg']) !!}
    </div>
    <div class="text-right">
        {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
    </div>

<h3>Links</h3>
   <div class="form-group row">
        <label class="col-md-2 col-form-label">Discord</label>
        <div class="col-md-9">
            {!! Form::text('disc', Auth::user()->profile->disc, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Instagram</label>
        <div class="col-md-9">
            {!! Form::text('insta', Auth::user()->profile->insta, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Archieve Of Your Own (AO3)</label>
        <div class="col-md-9">
            {!! Form::text('arch', Auth::user()->profile->arch, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Toyhou.se</label>
        <div class="col-md-9">
            {!! Form::text('house', Auth::user()->profile->house, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="text-right">
        {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
    </div>

{!! Form::close() !!}

<h3>Email Address</h3>

<p>Changing your email address will require you to re-verify your email address.</p>

{!! Form::open(['url' => 'account/email']) !!}
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Email Address</label>
        <div class="col-md-10">
            {!! Form::text('email', Auth::user()->email, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="text-right">
        {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}

<h3>Change Password</h3>

{!! Form::open(['url' => 'account/password']) !!}
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Old Password</label>
        <div class="col-md-10">
            {!! Form::password('old_password', ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">New Password</label>
        <div class="col-md-10">
            {!! Form::password('new_password', ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Confirm New Password</label>
        <div class="col-md-10">
            {!! Form::password('new_password_confirmation', ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="text-right">
        {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}

@endsection
