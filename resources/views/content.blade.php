@extends('app')



@section('title')
    products
@endsection

@section('style')
    <style>
        body{
            background-color:white;
        }
        .thead-light{
            color: whitesmoke;
            background-color: #2C3A47;
        }
        .table{

            text-align: center;
            vertical-align: middle;
        }
        .table-hover{
            background-color: white;
        }
        .feature{

            column-count: 3;
        }
        .btn-light{
            background-color: #ccf0bb;
            text-align: center;
            display: inline-block;
            font-weight: bolder;
            font-size: 16px;
            border-radius:12px;
            border: 2px solid #ccf0bb;
            width: 75px;
            color: black;
        }
        .btn-danger{
            background-color: #adc2c9;
            text-align: center;
            font-size: 16px;
            display: inline-block;
            border-radius: 12px;
            border: 2px solid #adc2c9;
            width: 75px;
            font-weight: bolder;
            text-align: center;
            color: black;

        }


        .form-delete,.form-show{
            display: inline-block;
        }
        .btn-info{
            text-align: center;
            font-size: 16px;
            display: inline-block;
            border-radius: 12px;
            border: 2px solid #adc2c9;
            width: 75px;
            font-weight: bolder;
            text-align: center;
            color: black;
            border: 2px solid #ffe6e6;
            background-color:#ffe6e6;
        }
        .btn-info:hover,.btn-danger:hover,.btn-light:hover,.btn-primary:hover {
            background-color: #2C3A47;
            border: 2px solid #2C3A47;
            font-weight: bolder;
            color: whitesmoke;
        }
        .btn-primary,btn-lg {
            float: right;
            width: 30%;
            margin:20px 20px;
            padding: 20px 20px;
            font-weight: bolder;
            color: black;
            border-radius: 12px;
            background-color: #ffffcc;
            border: 2px solid  #ffffcc;
        }

        .no-posts{
            font-weight: bolder;
            font-size:large ;
        }
        .alert{
            color: #2C3A47;
            font-size: 18px;
            background-color:#e3e7e8;
            font-weight: bolder;
            text-align: center;
            margin: auto;
        }

    </style>
@endsection

@section('content')


    <div class="container">
        <div >
            <form action="{{route('product.create')}}"  method="POST" class="form-create">
                @csrf
                @method('GET')
                <button type="submit" class="btn btn-primary btn-lg">Create</button>
            </form>

        </div>
        <table class="table table-hover">
            <thead class="thead-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Product name</th>
                <th scope="col">price</th>
                <th scope="col">quantity</th>
                <th scope="col" class="feature" >feature</th>
            </tr>
            </thead>
            <tbody>

            @forelse($data as $element)
                <tr>
                    <th scope="row">{{$loop->index+1 }}</th>
                    <td>{{$element->name}}</td>
                    <td>{{$element->price}}</td>
                    <td>{{$element->number_of}}</td>
                    <td>

                        <a href="{{route('product.edit',$element->id)}}" class="btn btn-light">Edit</a>
                        <form action="{{route('product.destroy',$element->id)}}"  method="POST" class="form-delete">
                            @csrf
                            @method('DELETE')
                            <button  type="submit" class="btn btn-danger" >Delete </button>
                        </form>
                        <form action="{{route('product.show',$element->id)}}"  method="POST" class="form-show">
                            @csrf
                            @method('GET')
                            <button  type="submit"  class="btn btn-info">Show </button>
                        </form>

                    </td>
                </tr>
            @empty
                <td class="no-posts">No stored data yet</td>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection


@if (Session::has('msg'))
    <div class="alert mb-0" role="alert">
        {{Session::get('msg')}}
    </div>
@endif
