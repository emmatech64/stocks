@extends('layouts.master')
@section('title','Sales')
@section('content')
    <div class="page-wraper">
        <div class="container-fruid">
            <div class="row">
                <div class="col lg-12">
                    <h2>Ezee Sotre Sales Page</h2>
                </div>
            </div>
            <div class="row">
                <div class="col lg-6">
                    <div class="form-group">
                        <label class="control-label">Products</label>
                        <select class="form-control"  id="basicSelect" name="products" >
                            @foreach($stocks as $stock)
                                <option value="{{$stock->id}}">
                                    {{$stock->pname}}
                                </option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col lg-4">
                    <div class="form-group">
                        <label class="control-label">Quantity</label>
                        <input type="number" name="qty" id="qty" placeholder="Quantity">
                    </div>
                </div>
                <div class="col lg-4">
                    <div class="form-group">
                        <label class="control-label">Discount</label>
                        <input type="number" name="discount" id="discount" placeholder="Discount">
                    </div>
                </div>
                <div class="col lg-2">
                    <div class="form-group">
                        <label class="control-lable">Action</label>
                        <button class="form-control btn-primary">Add</button>
                    </div>
                </div>
                <div class="col-md-2">
                    <h5>Sales categories</h5>
                    <div class="btn-group">
                        <button class="btn btn-success">Loans</button>
                        <button class="btn btn-info">View all</button>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row" ng-show="salesOrders.length&&add_order">
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Qty </th>
                            <th>Discount</th>
                            <th>Amount </th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td>
                                <button class="btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="2"><h3>Total Amount</h3></th>
                            <th colspan="3"></th>
                            <th colspan="2" class="success" align="right"><h3></h3></th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="col-md-4 well">
                    <div class="form-group" ng-show="!modify">
                        <label>Customer name</label>
                        <input type="text" class="form-control" ng-model="order.client">
                    </div>
                    <div class="form-group" ng-show="!modify">
                        <label>Selet waiter</label>
                        <select class="form-control" ng-model="order.waiter">
                            <option value=""></option>
                            <option ng-repeat="w in waiters" value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <hr>
                        <div class="btn-group" >
                            <button class="form-control btn-primary">Save orders</button>

                            <button class="btn-danger" >Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

                    <div class="table-responsive" >
                        <form class="form-inline" >

                            <div class="form-group pull-right">
                                <input type="text" placeholder="Search" class="form-control"/>
                            </div>
                        </form>
                        <table class="table table-bordered">
                            <tr>
                                <th>#</th><th>Date</th><th>Client</th><th>Invoice</th><th>Amount</th><th>Amount paid</th><th>Balance</th><th>Payment method</th><th>Status</th><th>Received</th>
                            </tr>
                            <tr pagination-id="allsales", dir-paginate="">
                                <td ></td>
                                <td ></td>
                                <td ></td>
                                <td>
                                    <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#receipt_Modal">
                                        <i class="glyphicon glyphicon-print"></i>
                                    </button>
                                </td>
                                <td ng-bind="sale.amount"></td>
                                <td ng-bind="sale.amount_paid"></td>
                                <td ng-bind="sale.balance"></td>
                                <td ng-bind="sale.paid_with"></td>
                                <td>
                                    <button class="btn-xs">
                                        <span class="btn-xs btn-danger" data-toggle="modal" data-target="#check_out_Modal"></span>
                                        <span class="btn-xs btn-success" ng-if=""></span>
                                        <span class="btn-xs btn-info" data-toggle="modal" data-target="#check_out_Modal"  ng-if="">Loan</span>
                                    </button>
                                </td>
                                <td>
                                    <button class="btn-xs">
                                        <span class="btn-xs btn-danger" ng-bind="sale.received" ng-if="sale.received=='No'" ng-click="setReceived(sale)"></span>
                                        <span class="btn-xs btn-success" ng-bind="sale.received" ng-if="sale.received=='Yes'"></span>
                                    </button>
                                </td>
                            </tr>
                        </table>

                    </div>

                </div>
            </div>

        </div>
    </div>


@endsection
