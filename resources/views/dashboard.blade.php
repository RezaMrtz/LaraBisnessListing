@extends('layouts.app') 
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard 
                <span class="float-right">
                    <a href="/listings/create" class="btn btn-success btn-xs">Add Listing</a>
                </span>
            </div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif You are logged in!
            </div>
            <div class="panel-body">
                @if(count($listings) > 0)
                <table class="table table-striped">
                    <tr>
                        <th>Company</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($listings as $listing)
                    <tr>
                        <td>{{$listing->name}}</td>
                        <td><a class="flot-left btn btn-primary" href="/listings/{{$listing->id}}/edit">Edit</a></td>
                        <td>
                            {!! Form::open([
                                'action' => ['ListingController@destroy',$listing->id],
                                'method'=>'POST','class'=>'float-right','onsubmit'=>'return confirm("Are you sure?")'
                                ]) !!} 
                                {{Form::hidden('_method','DELETE')}}    
                                {{Form::submit('Delete',['class'=>'btn btn-danger float-left'])}}   
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection