@extends('layouts.admin')

@section('title', 'Add Car')

@section('content')
<main class="main">
    <div class="container-fluid">
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Car</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Car Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="stok">Car Stok</label>
                                    <input type="text" name="stok" class="form-control" value="{{ old('stok') }}" required>
                                    <p class="text-danger">{{ $errors->first('stok') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="price">Car price</label>
                                    <input type="text" name="price" class="form-control" value="{{ old('price') }}" required>
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</main>
@endsection