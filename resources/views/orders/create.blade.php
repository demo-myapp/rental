@extends('layouts.admin')

@section('title', 'Add Car')

@section('content')
<main class="main">
    <div class="container-fluid">
            <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Car</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="customer_name">Customer Name</label>
                                    <input type="text" name="customer_name" class="form-control" value="{{ old('customer_name') }}" required>
                                    <p class="text-danger">{{ $errors->first('customer_name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Customer Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="telp">Customer Telp</label>
                                    <input type="text" name="telp" class="form-control" value="{{ old('telp') }}" required>
                                    <p class="text-danger">{{ $errors->first('telp') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="id">Car</label>
                                    <select name="id" class="form-control">
                                        <option value="">Choose</option>
                                        @foreach ($product as $row)
                                        <option value="{{ $row->id }}" {{ old('id') == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    @foreach ($product as $row)
                                    <input type="hidden" name="price" class="form-control" value="{{ $row->price }}">
                                    @endforeach
                                    <p class="text-danger">{{ $errors->first('id') }}</p>
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