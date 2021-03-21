@extends('layouts.app')

@inject('bids', 'App\Http\Controllers\Advertisements\AdvertisementBidsController')
@inject('createBids', 'App\Http\Controllers\Advertisements\CreateBidsController')

@section('content')
    <div class="container container--advertisement-details">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Advertisement details') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-thumbnail" src="{{ URL::to('/') }}/img/product.png" alt="Product">
                            </div>
                            <div class="col-md-6">
                                <div class="product-title">
                                    {{$data['advertisement'][0]->title}}
                                </div>
                                <div class="product-description">
                                    {{$data['advertisement'][0]->description}}
                                </div>
                                <div class="product-price">
                                    € {{$data['advertisement'][0]->price}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($data['placeBid'])
                <div class="col-md-4">
                    {{$createBids->index($data['advertisement'][0]->id)}}
                </div>
            @endif

            <div class="{{$data['placeBid'] ? 'col-md-8' : 'col-md-12'}}">
                {{$bids->index($data['advertisement'][0]->id)}}
            </div>
        </div>
    </div>
@endsection
