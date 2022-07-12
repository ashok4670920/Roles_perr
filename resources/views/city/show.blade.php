
@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show city</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('city.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Zip code:</strong>
                {{ $city->zip }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City name:</strong>
                {{ $city->city_fullname }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City short name:</strong>
                {{ $city->city_shortname }}
            </div>
        </div>
    </div>
@endsection
