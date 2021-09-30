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
        .btn-danger
        {
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

        .btn-info:hover,.btn-danger:hover,.btn-light:hover,.btn-primary:hover,.btn-primary:active,.btn-danger:focus {
            box-shadow: 5px 5px 5px -5px #2C3A47;
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

      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

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


                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">!!!</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="true">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Do you really want to delete these element?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('product.index')}}"  method="POST" class="form-show">
                                        <button type="button" class="btn btn-danger" style="background-color: gray"  data-dismiss="modal">Close</button>
                                        </form>
                                        <form action="{{route('product.destroy',$element->id)}}"  method="POST" class="form-delete">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn btn-danger" >Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

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
