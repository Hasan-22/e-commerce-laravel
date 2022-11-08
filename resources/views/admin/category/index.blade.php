@extends('layouts.admin')

@section('body')
    <div class="card text-center">
        <div class="card-body">
            <h4 class="card-title">Category title</h4>
            <p class="card-text">Body</p>
            <a class="btn btn-primary" href="{{ url('/addCategory') }}">Add Category</a>
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
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($categories as $category)
                        <tr class="table-primary text-center">
                            <td scope="row">{{ $category->id }}</td>
                            <td> {{ $category->name }} </td>
                            <td> {{ $category->description }} </td>
                            <td>
                                <img src="{{ asset('assets/uploads/category/' . $category->image) }}" alt=""
                                    width="150" alt="Image here">
                            </td>
                            <td>
                                <a type="button" href="{{ url('/editCategory' . '/' . $category->id) }}"
                                    class="btn btn-primary">Edit</a>


                                <form action="{{ url('/deleteCategory' . '/' . $category->id) }}" method="POST">
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
