<div class="card">
    <div class="card-header">{{ __('Bids') }}</div>

    <div class="card-body card-body--yellow">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('successful_message'))
            <div class="alert alert-success">
                {{ session('successful_message') }}
            </div>
        @endif
        <div class="row">
            <div class="col">
                <form action="/advertisements/bids/post" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="bid">Bid amount</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="amount" name="amount" placeholder="0.00" value="{{old('amount')}}">
                    </div>
                    <button type="submit" class="btn btn-primary full-width">Place bid</button>
                </form>
            </div>
        </div>
    </div>
</div>
