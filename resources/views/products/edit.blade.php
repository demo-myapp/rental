@extends('layouts.admin')

@section('title', 'Car Edit')

@section('content')
<main class="main">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Car Edit</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Car Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="stok">Car stok</label>
                                    <input type="text" name="stok" class="form-control" value="{{ $product->stok }}" required>
                                    <p class="text-danger">{{ $errors->first('stok') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="price">Car price</label>
                                    <input type="text" name="price" class="form-control" value="{{ $product->price }}" required>
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection