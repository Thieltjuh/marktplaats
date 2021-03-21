@extends('layouts.app')

@inject('advertisements', 'App\Http\Controllers\Advertisements\AdvertisementsController')
@inject('search', 'App\Http\Controllers\Search\SearchController')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6 col-3">
                                {{ __('Home') }}
                            </div>

                            {{$search->index()}}
                        </div>
                    </div>

                    <div class="card-body">
                        @if (Route::currentRouteName() === 'search')
                            {{$advertisements->indexFiltered()}}
                        @else
                            {{$advertisements->index()}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
