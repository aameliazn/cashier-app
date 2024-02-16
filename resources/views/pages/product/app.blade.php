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
                            <th width="20px">No</th>
                            <th>Name</th>
                            <th width="200px">Price</th>
                            <th width="200px">Stock</th>
                            <th width="100px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td style="vertical-align: middle; text-align: center;">{{ $loop->iteration }}</td>
                                <td style="vertical-align: middle;">{{ $item->name }}</td>
                                <td style="vertical-align: middle; text-align: end;">${{ $item->price }}</td>
                                <td style="vertical-align: middle; text-align: end;">{{ $item->stock }}</td>
                                <td style="vertical-align: middle; text-align: center;">
                                    <form action="{{ route('product.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="" data-toggle="modal"
                                            data-target="#editProductModal{{ $item->id }}" class="btn btn-success"><i
                                                class="bi bi-pencil-fill"></i></a>
                                        <button type="submit" class="btn btn-danger"><i
                                                class="bi bi-trash3-fill"></i></button>
                                    </form>
                                </td>
                            </tr>

                            {{-- Edit Product Modal --}}
                            <div class="modal fade" id="editProductModal{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Product </h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('product.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="inputProductName">Product Name</label>
                                                    <input type="text" name="name"
                                                        class="form-control form-control-user" id="inputProductName"
                                                        value="{{ $item->name }}">
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <label for="inputProductPrice">Product Price</label>
                                                        <input type="number" step="any" name="price"
                                                            class="form-control form-control-user" id="inputProductPrice"
                                                            value="{{ $item->price }}">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="inputProductStock">Product Stock</label>
                                                        <input type="number" name="stock"
                                                            class="form-control form-control-user" id="inputProductStock"
                                                            value="{{ $item->stock }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Cancel</button>
                                                <button class="btn btn-primary" type="submit">Add Product</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('modal')

    <!-- Add Product Modal-->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('product.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputProductName">Product Name</label>
                            <input type="text" name="name" class="form-control form-control-user"
                                id="inputProductName">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="inputProductPrice">Product Price</label>
                                <input type="number" step="any" name="price"
                                    class="form-control form-control-user" id="inputProductPrice">
                            </div>
                            <div class="col-sm-6">
                                <label for="inputProductStock">Product Stock</label>
                                <input type="number" name="stock" class="form-control form-control-user"
                                    id="inputProductStock">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
