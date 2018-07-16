@extends('layouts.app') 
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
        <div class="card-header">{{$listings->name}} <a href="/listings" class="float-right btn btn-light btn-xs">Go Back</a></div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">Address: {{$listings->address}}</li>
                    <li class="list-group-item">Website: <a href="{{$listings->website}}" target="_blank">{{$listings->website}}</a></li>
                    <li class="list-group-item">Email: {{$listings->email}}</li>
                    <li class="list-group-item">Phone: {{$listings->phone}}</li>
                    <div class="card">
                        <div class="card-body">
                        
                            <li class="list-group-item">Bio: {{$listings->bio}}</li>
                    </div></div>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection