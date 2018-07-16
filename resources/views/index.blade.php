@extends('layouts.app') 
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Latest Business Listings</div>

            <div class="panel-body">
                @if(count($listings) > 0)
                   <ul class="list-group">
                    @foreach($listings as $listing)
                    <li class="list-group-item">
                            <a href="/listings/{{$listing->id}}">{{$listing->name}}</a>
                            </li>
                    @endforeach
                </ul> 
                @else
                <h4 class="btn btn-outline-warning">No Listing Found</h4>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection