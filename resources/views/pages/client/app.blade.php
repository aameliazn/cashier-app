@extends('layouts.app')

@section('head', 'Client | Cashy')

@section('contents')

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Client</h4>
            <a href="" data-toggle="modal" data-target="#addClientModal"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fa fa-plus fa-sm text-white-50"></i>
                Add Client
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align: center;">
                            <th width="20px">No</th>
                            <th>Name</th>
                            <th width="200px">Telephone</th>
                            <th width="300px">Address</th>
                            <th width="100px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $item)
                            <tr>
                                <td style="vertical-align: middle; text-align: center;">{{ $loop->iteration }}</td>
                                <td style="vertical-align: middle;">{{ $item->name }}</td>
                                <td style="vertical-align: middle; text-align: center;">{{ $item->telephone }}</td>
                                <td style="vertical-align: middle;">{{ $item->address }}</td>
                                <td style="vertical-align: middle; text-align: center;">
                                    <form action="{{ route('client.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="" data-toggle="modal"
                                            data-target="#editClientModal{{ $item->id }}" class="btn btn-success"><i
                                                class="bi bi-pencil-fill"></i></a>
                                        <button type="submit" class="btn btn-danger"><i
                                                class="bi bi-trash3-fill"></i></button>
                                    </form>
                                </td>
                            </tr>

                            {{-- Edit Client Modal --}}
                            <div class="modal fade" id="editClientModal{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Client</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('client.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="inputClientName">Client Name</label>
                                                    <input type="text" name="name"
                                                        class="form-control form-control-user" id="inputClientName"
                                                        value="{{ $item->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputClientTelephone">Client Telephone</label>
                                                    <input type="text" name="telephone"
                                                        class="form-control form-control-user" id="inputClientTelephone"
                                                        value="{{ $item->telephone }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputClientAddress">Client Address</label>
                                                    <textarea name="address" class="form-control form-control-user" id="inputClientAddress">{{ $item->address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Cancel</button>
                                                <button class="btn btn-primary" type="submit">Update Client</button>
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

    <!-- Add Client Modal-->
    <div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Client </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('client.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputClientName">Client Name</label>
                            <input type="text" name="name" class="form-control form-control-user"
                                id="inputClientName">
                        </div>
                        <div class="form-group">
                            <label for="inputClientTelephone">Client Telephone</label>
                            <input type="text" name="telephone" class="form-control form-control-user"
                                id="inputClientTelephone">
                        </div>
                        <div class="form-group">
                            <label for="inputClientAddress">Client Address</label>
                            <textarea name="address" class="form-control form-control-user" id="inputClientAddress"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Add Client</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
