@extends('layouts.app')

@inject('myAdvertisements', 'App\Http\Controllers\Advertisements\MyAdvertisementsController')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Profile settings') }}</div>

                    <div class="card-body">

                    </div>
                </div>


                {{$myAdvertisements->index()}}
            </div>
        </div>
    </div>
@endsection
