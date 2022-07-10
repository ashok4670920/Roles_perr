
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Storages</h2>
            </div>
            <div class="pull-right">
                @can('storage-create')
                <a class="btn btn-success" href="{{ route('storage.create') }}"> Create New Storage</a>
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
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($storages as $storage)
	    <tr>
	        <td>{{ $loop->index+1 }}</td>
	        <td>{{ $storage->name }}</td>
	        <td>{{ $storage->detail }}</td>
	        <td>
                <form action="{{ route('storage.destroy',$storage->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('storage.show',$storage->id) }}">Show</a>
                    @can('storage-edit')
                    <a class="btn btn-primary" href="{{ route('storage.edit',$storage->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('storage-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

@endsection 