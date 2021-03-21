@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{$data['pageTitle']}}</div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <form action="{{ url($data['actionRoute'])}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" maxlength="255" value="{{old('title', $data['title'])}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description here" maxlength="255">{{old('description', $data['description'])}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" step="0.01" min="0" class="form-control" id="price" name="price" placeholder="0.00" value="{{old('price', $data['price'])}}">
                            </div>
                            <button type="submit" class="btn btn-primary">{{$data['buttonText']}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
