<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="container--advertisement">
                @foreach ($advertisements as $advertisement)
                    <a href="{{ url('/advertisements', $advertisement->id) }}" class="card card--small">
                        <img class="card-img-top" src="{{ URL::to('/') }}/img/product.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $advertisement->title }}</h5>
                            <p class="card-text">{{ $advertisement->description }}</p>
                            <p class="card-text"><strong>€ {{ $advertisement->price }}</strong></p>
                        </div>
                    </a>
                @endforeach
                {{ $advertisements->links("pagination::bootstrap-4") }}
            </div>
        </div>
    </div>

</div>
