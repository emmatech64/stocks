@extends('layouts.master')
@section('title','Stocking')
@section('content')
    <section class="content">
        <div class="col-12">
            <button class="btn btn btn-primary btn-sm pull-right" id="addButton">
                <i class="fa fa-plus"></i>
                Add New
            </button>
            <div class="clearfix"></div>
            <div class="box box-primary flat">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        Manage Stock
                    </h4>
                </div>
                <div class="box-body">
                    <table class="table table-condensed table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">Qty</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stocks as $stock)
                            <tr>
                                <td>
                                    <a href="{{ route('products.all') }}?q={{ $stock->product->name}}">
                                        {{ $stock->product->name}}
                                    </a>
                                </td>
                                <td>{{ $stock->supplier->name}}</td>
                                <td>{{ $stock->qty}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button
                                                data-url="{{ route('stocks.show',['id'=>$stock->id]) }}"
                                                class="btn btn-default js-edit">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </button>
                                        <button
                                                data-url="{{ route('stocks.destroy',['id'=>$stock->id]) }}"
                                                class="btn btn-danger js-delete">
                                            <i class="glyphicon glyphicon-trash"></i>
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

    </section>


    <div class="modal fade myModal" tabindex="-1" role="dialog" id="addModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Stock
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h4>
                </div>
                <form novalidate action="{{ route('stocks.store') }}" method="post" id="submitForm"
                      class="form-horizontal">
                    <input type="hidden" id="id" name="id" value="0">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        @include('layouts._loader')
                        <div class="edit-result">
                            <div class="form-group">
                                <label for="supplier_id" class="col-sm-3  control-label">Supplier</label>
                                <div class="col-sm-9">
                                    <select required class="form-control" id="supplier_id" name="supplier_id">
                                        <option></option>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{ $supplier->id}}">
                                                {{$supplier->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product_id" class="col-sm-3  control-label">Product</label>
                                <div class="col-sm-9">
                                    <select required class="form-control" id="product_id" name="product_id">
                                        <option></option>
                                        @foreach($products as $prod)
                                            <option value="{{ $prod->id}}">
                                                {{$prod->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="qty" class="col-sm-3 control-label">Qty</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="qty" id="qty"
                                           required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer editFooter">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" id="createBtn" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('.tr-products').addClass('active');
            $('.mn-stocks').addClass('active');
            //edit product
            $('.js-edit').on('click', function () {
                var url = $(this).attr('data-url');
                $('#addModal').modal('show');
                showLoader();
                $.getJSON(url)
                    .done(function (data) {
                        hideLoader();
                        $('#supplier_id').val(data.supplier_id);
                        $('#product_id').val(data.product_id);
                        $('#id').val(data.id);
                        $('#qty').val(data.qty);
                        $('#price').val(data.price);
                        $('#expiry_date').val(data.expiry_date);
                    });
            });


        });
    </script>
@endsection
