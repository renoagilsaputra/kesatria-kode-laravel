@extends('layout.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <h1>Create Product</h1>
                    <form action="{{ route('product.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" name="stock" class="form-control">
                            @error('stock')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                           <textarea name="description" class="form-control"></textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg mt-5">
                            Submit
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection