@extends('layouts.admin')

@section('title', 'Orders')

@section('content')
<main class="main">
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Order List
                                <div class="float-right">
                                    <a href="{{ route('order.create') }}" class="btn btn-primary btn-sm">Add</a>
                                </div>
                            </h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Telp</th>
                                            <th>Car ID</th>
                                            <th>Created At</th>
                                            <th>Confirm</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order as $row)
                                        <tr>
                                            <td>
                                                <strong>{{ $row->customer_name }}</strong><br>
                                            </td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->telp }}</td>
                                            <td><label><span class="badge badge-info">{{ $row->id }}</span></label><br></td>
                                            <td>{{ $row->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                <form action="{{ route('order.destroy', $row->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">Confirm Order</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Empty data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</main>
@endsection