<div class="card">
    <div class="card-header">{{ __('Bids') }}</div>

    <div class="card-body">
        @if ($bids && count($bids) > 0)
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">User</th>
                    <th scope="col">amount</th>
                    <th scope="col" class="d-none d-lg-table-cell">Placed at</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($bids as $bid)
                    <tr>
                        <td class="truncate">{{ $bid->email }}</td>
                        <td class="truncatel">€ {{ $bid->amount }}</td>
                        <td class="d-none d-lg-table-cell">{{ $bid->placed_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            This advertisements currently has no bids
        @endif
        {{ $bids->links("pagination::bootstrap-4") }}
    </div>
</div>
