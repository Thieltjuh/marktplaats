<div class="card">
    <div class="card-header">{{ __('My advertisements') }}</div>
    @if(session('successful_message'))
        <div class="alert alert-success">
            {{ session('successful_message') }}
        </div>
    @endif
    <div class="card-body">
        @if ($myAdvertisements && count($myAdvertisements) > 0)
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col" class="d-none d-md-table-cell">Description</th>
                    <th scope="col" class="d-none d-lg-table-cell">Price</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($myAdvertisements as $advertisement)
                    <tr>
                        <td class="truncate">{{ $advertisement->title }}</td>
                        <td class="truncate d-none d-md-table-cell">{{ $advertisement->description }}</td>
                        <td class="d-none d-lg-table-cell">{{ $advertisement->price }}</td>
                        <td>
                            <form method="POST" action="{{ url('/advertisements/delete', $advertisement->id) }}">
                                <a class="btn btn-info btn-sm rounded-2" title="view" href="{{ url('/advertisements', $advertisement->id) }}"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-success btn-sm rounded-2" title="edit" href="{{ url('/advertisements/edit', $advertisement->id) }}"><i class="fas fa-edit"></i></a>
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm rounded-2" title="delete" onclick="return confirm('Are you sure you want to delete this?')" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $myAdvertisements->links("pagination::bootstrap-4") }}
        @else
            You have no advertisements
        @endif
    </div>
</div>
