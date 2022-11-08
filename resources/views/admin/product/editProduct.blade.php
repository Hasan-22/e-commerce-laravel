@extends('layouts.admin')

@section('body')
    <div class="card">
        <div class="card-header">
            Edit Product
        </div>
        <form action="{{ url('/updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">

                    <div class="col-3">
                        <label for="category" class="form-label mb-0 pb-0">Category Name '(Cannot Be Changed)'</label>
                        <input type="text" id="category" class="form-control" value="{{ $product->category->name }}"
                            disabled>
                        {{-- <select class="form-select" aria-label="Default select example">
                            <option value="">{{ $product->category->name }}</option>
                        </select> --}}
                    </div>



                    <div class="mb-2 col-6">
                        <label for="name" class="form-label mb-0 pb-0">Name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                            placeholder="Enter Name" value="{{ $product->name }}">
                    </div>


                    <div class="mb-2 col-6">
                        <label for="slug" class="form-label mb-0 pb-0">Slug</label>
                        <input type="text" class="form-control" name="slug" id="slug" aria-describedby="helpId"
                            placeholder="Enter Slug" value="{{ $product->slug }}">
                    </div>

                    <div class="mb-2
                            col-12">
                        <label for="small_description" class="form-label">Small Description</label>
                        <textarea class="form-control" name="small_description" id="small_description" placeholder="Enter Small Description"
                            rows="3">{{ $product->small_description }}</textarea>
                    </div>


                    <div class="mb-2 col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Enter Description" rows="3">{{ $product->description }}</textarea>
                    </div>

                    <div class="mb-2 col-6">
                        <label for="original_price" class="form-label mb-0 pb-0">Original Price</label>
                        <input type="number" class="form-control" name="original_price" id="original_price"
                            aria-describedby="helpId" placeholder="Enter Original Price"
                            value="{{ $product->original_price }}">
                    </div>

                    <div class="mb-2 col-6">
                        <label for="selling_price" class="form-label mb-0 pb-0">Selling Price</label>
                        <input type="number" class="form-control" name="selling_price" id="selling_price"
                            aria-describedby="helpId" placeholder="Enter Selling Price"
                            value="{{ $product->selling_price }}">
                    </div>

                    <div class="mb-2 col-6">
                        <label for="tax" class="form-label mb-0 pb-0">Tax</label>
                        <input type="number" class="form-control" name="tax" id="tax" aria-describedby="helpId"
                            placeholder="Enter Tax" value="{{ $product->tax }}">
                    </div>

                    <div class="mb-2 col-6">
                        <label for="qty" class="form-label mb-0 pb-0">Quantity</label>
                        <input type="number" class="form-control" name="qty" id="qty" aria-describedby="helpId"
                            placeholder="Enter Quantity" value="{{ $product->qty }}">
                    </div>

                    <div class="mb-2 col-12">
                        <div class="form-check">
                            <input class="form-check-input" name="status" type="checkbox" id="status"
                                {{ $product->status == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="status">
                                Status
                            </label>
                        </div>
                    </div>

                    <div class="mb-2 col-12">
                        <div class="form-check">
                            <input class="form-check-input" name="popular" type="checkbox" id="popular"
                                {{ $product->popular == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="popular">
                                Popular
                            </label>
                        </div>
                    </div>


                    <div class="mb-2 col-6">
                        <label for="meta_title" class="form-label mb-0 pb-0">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" id="meta_title"
                            aria-describedby="helpId" placeholder="Enter Meta Title" value="{{ $product->meta_title }}">
                    </div>


                    <div class="mb-2 col-12">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description"
                            rows="3">{{ $product->meta_description }}</textarea>
                    </div>



                    <div class="mb-2 col-12">
                        <label for="meta_keywords" class="form-label">Meta Keywords</label>
                        <textarea class="form-control" name="meta_keywords" id="meta_keywords" placeholder="Enter Meta Keywords"
                            rows="3">{{ $product->meta_keywords }}</textarea>
                    </div>


                    @if ($product->image)
                        <div class="col-3">
                            <img src="{{ asset('assets/uploads/product/' . $product->image) }}" alt="Product image"
                                width="200">
                        </div>
                    @endif
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
