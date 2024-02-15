@extends('layouts.app')

@section('head', 'Product | Cashy')

@section('contents')

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Product</h4>
            <a href="" data-toggle="modal" data-target="#addProductModal"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fa fa-plus fa-sm text-white-50"></i>
                Add Product
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align: center;">
                            <th>Name</th>
                            <th width="200px">Price</th>
                            <th width="200px">Stock</th>
                            <th width="100px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td style="vertical-align: middle;">{{ $item->name }}</td>
                                <td style="vertical-align: middle; text-align: end;">${{ $item->price }}</td>
                                <td style="vertical-align: middle; text-align: end;">{{ $item->stock }}</td>
                                <td style="vertical-align: middle; text-align: center;">
                                    <a href="" class="btn btn-success"><i class="bi bi-pencil-fill"></i></a>
                                    <form action="{{ route('product.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
