@extends('layouts.app') 
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Listing <a href="/dashboard" class="float-right btn btn-secondary btn-xs">Go Back</a></div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif You are logged in!
            </div>
            <div class="card-body">

                {!! Form::open(['action' => ['ListingController@update',$listing->id],'method'=>'PUT']) !!}
                
                    {{Form::bsText('name',$listing->name,['placeholder' => 'Company Name'])}}
                    {{Form::bsText('website',$listing->website,['placeholder'=> 'Company Website'])}}
                    {{Form::bsText('email',$listing->email,['placeholder'=> 'Contact Email'])}}
                    {{Form::bsText('phone',$listing->phone,['placeholder'=> 'Contact Phone'])}}
                    {{Form::bsText('address',$listing->address,['placeholder'=> 'Business Address'])}}
                    {{Form::bsTextArea('bio',$listing->bio,['placeholder'=> 'About This Business '])}}
                    {{Form::hidden('_method','PUT')}}
                    {{Form::bsSubmit('submit')}}   

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection