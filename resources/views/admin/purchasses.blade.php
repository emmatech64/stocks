@extends('layouts.master')
@section('title','Purchases')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h4>Manage Purchases

                            <button class="btn btn-light float-right" id="addButton" class="btn btn-primary" data-toggle="modal" data-target="#purchasesModal">
                                Add Purchase
                            </button>
                        </h4>
                    </div>
                    {{--                    {{ $products }}--}}
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">U.Price</th>
                                <th scope="col">Amount</th>
                                <th scope="col">P.Status</th>
                                <th scope="col">Supplier</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $prod)
                                <tr>
                                    <th scope="row">{{ $prod->id }}</th>
                                    <td>{{ $prod->name}}</td>
                                    <td>{{ $prod->unit_measure }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-secondary js-edit"

                                            >
                                                Edit
                                            </button>
                                            <button class="btn btn-danger js-delete">
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id="purchasesModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Purchese
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('products.store') }}" method="post" id="submitForm">
                    <input type="hidden" id="id" name="id" value="0">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <label for="name" class="col-sm-1 col-form-label">:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group row">
                                <label for="category" class="col-sm-2 col=from-label">Category</label><label for="name" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="category" name="category">
                                        <option></option>
                                        @foreach($category as $cat)

                                            <option value="{{ $cat->id}}">

                                                {{$cat->name}}

                                            </option>

                                        @endforeach


                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="unity" class="col-sm-2 col=from-label">Meseaments</label><label for="unity" class="col-sm-1 col-form-label">:</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="unity" name="unity">
                                    <option ></option>
                                    <option >Kg</option>
                                    <option >Liters</option>
                                    <option >Bottles/Wines</option>
                                    <option >Pieces</option>
                                    <option >Box</option>
                                    <option >Creates</option>

                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="unit2">Unit2</label>
                                    <input type="text" class="form-control" name="unit2" id="unit2">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="unit1">Unit1</label>
                                    <input type="text" class="form-control" name="unit1" id="unit1">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="instock">Instock</label>
                                    <input type="text" class="form-control" name="instock" id="instock">
                                </div>
                            </div>

                        </div>




                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

    </script>
@endsection
