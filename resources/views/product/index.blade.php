@extends('layout.main')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h2>Product</h2>
                    <hr>
                    <a href="{{ route('product.create') }}"
                        class="btn btn-primary btn-lg mb-5">Tambah</a>

                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Description</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->stock }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            <a href="{{ route('product.edit', ['id' => $item->id]) }}"
                                                class="btn btn-info">Edit</a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#modalDelete{{ $item->id }}">
                                                Hapus
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Apakah kamu yakin ?</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Menghapus product <strong>{{ $item->name }}</strong>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <a href="{{ route('product.destroy',['id' => $item->id]) }}" class="btn btn-danger">Iya</a>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tidak</button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data tidak ada..</td>
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
@endsection
