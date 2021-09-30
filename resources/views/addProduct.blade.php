@extends('app')





@section('title')
Add Product
@endsection



@section('style')
<style>
    .heading{
        color: #f7ebab;
        background-color: rgba(44, 58, 71, 1);
        font-size: 42px;
    }
    .btn{
        background-color: #2C3A47 ;
        border-color: #f7ebab;
        color: #f7ebab;
        font-size: 24px;
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
    .form-control:focus, .btn:focus {
        box-shadow: 5px 5px 5px -5px #f7ebab;
        border-color: #f7ebab;
    }
    .alert{
        color: #2C3A47;
        font-size: 18px;
        background-color:#ffffcc;
        font-weight: bolder;
    }


</style>
@endsection




@section('content')

<h2 class="text-center p-3 heading">Add a new product</h2>
<form action="{{route('product.store')}}" method="POST" class="container mt-5">
    @csrf
    <div class="mb-4">
        <label for="name" class="form-label lead">Name</label>
        <input type="text" class="form-control" id="name" name="name"   value="{{ old('name') }}">
    </div>
    <div class="form-floating mb-4">
        <textarea class="form-control" placeholder="Leave a comment here" name="description" id="textarea" style="height: 100px" value="{{ old('description') }}"></textarea>
        <label for="textarea" class="form-label">Description</label>
    </div>
    <div class="mb-4">
        <label for="image" class="form-label lead">Image</label>
        <input type="file" name="path" placeholder="Choose image" id="image"  class="form-control" value="{{ old('path') }}">
    </div>
    <div class="mb-4">
        <label for="price" class="form-label lead">Price</label>
        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
    </div>
    <div class="mb-4">
        <label for="number" class="form-label lead">Number of Pieces</label>
        <input type="text" class="form-control" id="number" name="number_of" value="{{ old('number_of') }}">
    </div>

    <button type="submit" class="btn py-1 w-100">Submit</button>
</form>
@endsection




@if (Session::has('msg'))
    <div class="alert mb-0" role="alert">
        {{Session::get('msg')}}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
