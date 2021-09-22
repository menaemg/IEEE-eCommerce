@extends('app')




@section('title')
    Edit Product
@endsection



@section('style')
    <style>
        .heading{
            color: #f7ebab;
            background-color: rgba(44, 58, 71, 1);
            font-size: 42px;
        }
        .btn {
            color: #f7ebab;
        }
        .btn:hover{
            background-color: #f7ebab ;
            color: #2C3A47;
            border-color: #2C3A47;
        }
        .form-label{
            color: #2C3A47;
            font-weight: 600;
        }
        .form-control{
            color: #2C3A47;
            border-color: rgba(44, 58, 71, 0.3);
        }
        .form-control:focus, .btn:focus{
            box-shadow: 5px 5px 5px -5px #f7ebab;
            border-color: #f7ebab;
        }
        .product-image{
            height: 200px;
            text-align: center;
        }
        .product-image img{
            max-width: 100%;
            max-height: 100%;
        }

        .btn-dashboard {
            background-color: #2C3A47 ;
            border-color: #f7ebab;
            color: #f7ebab;
        }

    </style>
@endsection




@section('content')


    <h2 class="text-center p-3 heading mb-0">Show product</h2>

    <div class="d-flex justify-content-between m-1">
        <div>
            <a class="btn btn-primary btn-dashboard" href="{{ route('product.index') }}" role="button"><i class="fas fa-long-arrow-alt-left"></i> Dashboard</a>
        </div>
        <div>
            <a class="btn btn-success" href="{{ route('product.edit' , $product->id) }}" role="button"><i class="far fa-edit"></i> Edit</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="far fa-trash-alt"></i> Delete
            </button>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>are you sure to delete this product ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{route('product.destroy',$product->id)}}"  method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <form class="container mt-5" enctype="multipart/form-data">

        <div class="product-image mb-2">
            <img src="{{ asset('storage/' . $product->path) }}" alt="{{ $product->name . " image" }}">
        </div>

        <div class="mb-4">
            <label for="name" class="form-label lead">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" readonly>
        </div>
        <div class="form-floating mb-4">
            <textarea class="form-control" placeholder="Leave a comment here" name="description" id="textarea" style="height: 100px" readonly>{{ $product->description }}</textarea>
            <label for="textarea" class="form-label">Description</label>
        </div>

        <div class="mb-4">
            <label for="price" class="form-label lead">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" readonly>
        </div>
        <div class="mb-4">
            <label for="number" class="form-label lead">Number of Pieces</label>
            <input type="text" class="form-control" id="number" name="number_of" value="{{ $product->number_of }}" readonly>
        </div>

    </form>
@endsection
