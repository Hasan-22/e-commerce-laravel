@extends('layouts.admin')

@section('body')
    <div class="card">
        <div class="card-header">
            Add Product
        </div>
        <form action="{{ url('/insertProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">

                    <div class="col-3">
                        <select class="form-select" name="category_id" aria-label="Default select example">
                            <option value="">Select A Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>



                    <div class="mb-2 col-6">
                        <label for="name" class="form-label mb-0 pb-0">Name</label>
                        <input type="text" class="form-control mt-0 pt-0" name="name" id="name"
                            aria-describedby="helpId" placeholder="Enter Name">
                    </div>


                    <div class="mb-2 col-6">
                        <label for="slug" class="form-label mb-0 pb-0">Slug</label>
                        <input type="text" class="form-control mt-0 pt-0" name="slug" id="slug"
                            aria-describedby="helpId" placeholder="Enter Slug">
                    </div>

                    <div class="mb-2 col-12">
                        <label for="small_description" class="form-label">Small Description</label>
                        <textarea class="form-control mt-0 pt-0" name="small_description" id="small_description"
                            placeholder="Enter Small Description" rows="3"></textarea>
                    </div>


                    <div class="mb-2 col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control mt-0 pt-0" name="description" id="description" placeholder="Enter Description"
                            rows="3"></textarea>
                    </div>

                    <div class="mb-2 col-6">
                        <label for="original_price" class="form-label mb-0 pb-0">Original Price</label>
                        <input type="number" class="form-control mt-0 pt-0" name="original_price" id="original_price"
                            aria-describedby="helpId" placeholder="Enter Original Price">
                    </div>

                    <div class="mb-2 col-6">
                        <label for="selling_price" class="form-label mb-0 pb-0">Selling Price</label>
                        <input type="number" class="form-control mt-0 pt-0" name="selling_price" id="selling_price"
                            aria-describedby="helpId" placeholder="Enter Selling Price">
                    </div>

                    <div class="mb-2 col-6">
                        <label for="tax" class="form-label mb-0 pb-0">Tax</label>
                        <input type="number" class="form-control mt-0 pt-0" name="tax" id="tax"
                            aria-describedby="helpId" placeholder="Enter Tax">
                    </div>

                    <div class="mb-2 col-6">
                        <label for="qty" class="form-label mb-0 pb-0">Quantity</label>
                        <input type="number" class="form-control mt-0 pt-0" name="qty" id="qty"
                            aria-describedby="helpId" placeholder="Enter Quantity">
                    </div>

                    <div class="mb-2 col-12">
                        <div class="form-check">
                            <input class="form-check-input" name="status" type="checkbox" id="status">
                            <label class="form-check-label" for="status">
                                Status
                            </label>
                        </div>
                    </div>

                    <div class="mb-2 col-12">
                        <div class="form-check">
                            <input class="form-check-input" name="popular" type="checkbox" id="popular">
                            <label class="form-check-label" for="popular">
                                Popular
                            </label>
                        </div>
                    </div>


                    <div class="mb-2 col-6">
                        <label for="meta_title" class="form-label mb-0 pb-0">Meta Title</label>
                        <input type="text" class="form-control mt-0 pt-0" name="meta_title" id="meta_title"
                            aria-describedby="helpId" placeholder="Enter Meta Title">
                    </div>


                    <div class="mb-2 col-12">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea class="form-control mt-0 pt-0" name="meta_description" id="meta_description"
                            placeholder="Enter Meta Description" rows="3"></textarea>
                    </div>



                    <div class="mb-2 col-12">
                        <label for="meta_keywords" class="form-label">Meta Keywords</label>
                        <textarea class="form-control mt-0 pt-0" name="meta_keywords" id="meta_keywords" placeholder="Enter Meta Keywords"
                            rows="3"></textarea>
                    </div>


                    <div class="mb-3">
                        <label for="file" class="form-label">Choose file</label>
                        <input type="file" class="form-control" name="image" id="file"
                            aria-describedby="fileHelpId">
                    </div>



                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <style>
        input::file-selector-button {
            font-weight: bold;
            color: dodgerblue;
            padding: 10px !important;
            border: none !important;
            border-radius: 10px !important;
            background: pink !important;
            margin-right: 10px !important;
        }
    </style>
@endsection
