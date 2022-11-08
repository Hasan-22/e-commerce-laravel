@extends('layouts.admin')

@section('body')
    <div class="card text-center">
        <div class="card-body">
            <h4 class="card-title">Product title</h4>
            <p class="card-text">Body</p>
            <a class="btn btn-primary" href="{{ url('/addProduct') }}">Add Product</a>
        </div>
    </div>

    <div class="card mt-3">
        <div class="table-responsive p-2">
            <table
                class="table table-striped
        table-hover	
        table-borderless
        table-primary
        align-middle">
                <thead class="table-light">
                    <caption>Categories</caption>
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Selling Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($products as $product)
                        <tr class="table-primary text-center">
                            <td scope="row">{{ $product->id }}</td>
                            <td> {{ $product->category->name }} </td>
                            <td> {{ $product->name }} </td>
                            <td> {{ $product->selling_price }} </td>
                            <td>
                                <img src="{{ asset('assets/uploads/product/' . $product->image) }}" alt=""
                                    width="150" alt="Image here">
                            </td>
                            <td>
                                <a type="button" href="{{ url('/editproduct' . '/' . $product->id) }}"
                                    class="btn btn-primary">Edit</a>


                                <form action="{{ url('/deleteProduct' . '/' . $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>
@endsection
