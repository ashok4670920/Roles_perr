
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cities</h2>
            </div>
            <div class="pull-right">
                @can('city-create')
                <a class="btn btn-success" href="{{ route('city.create') }}"> Create New city</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Zip</th>
            <th>Full name</th>
            <th>Short name</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($cities as $city)
	    <tr>
	        <td>{{ $loop->index+1 }}</td>
	        <td>{{ $city->zip }}</td>
	        <td>{{ $city->city_fullname }}</td>
            <td>{{ $city->city_shortname }}</td>
	        <td>
                <form action="{{ route('city.destroy',$city->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('city.show',$city->id) }}">Show</a>
                    @can('city-edit')
                    <a class="btn btn-primary" href="{{ route('city.edit',$city->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('city-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

@endsection 