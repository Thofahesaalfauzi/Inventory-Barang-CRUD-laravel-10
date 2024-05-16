@extends('layouts.app')
  
@section('title', 'List Product')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('products.create') }}" class="btn btn-success">Add Product</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-success">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Produk</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($product->count() > 0)
                @foreach($product as $rs)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $rs->title }}</td>
                    <td class="align-middle">{{ $rs->price }}</td>
                    <td class="align-middle">{{ $rs->product_code }}</td>
                    <td class="align-middle">{{ $rs->description }}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('products.show', $rs->id) }}" class="btn btn-secondary mx-1 rounded">Detail</a>
                            <a href="{{ route('products.edit', $rs->id)}}" class="btn btn-primary mx-1 rounded">Edit</a>
                            <form action="{{ route('products.destroy', $rs->id) }}" method="POST" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mx-1 rounded">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Product not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
