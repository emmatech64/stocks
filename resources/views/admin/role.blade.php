@extends('layouts.master')
@section('title','Categories')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h4>Manage Roles

                            <button class="btn btn-light float-right" id="addButton" class="btn btn-primary" data-toggle="modal" data-target="#addroles">
                                Add Roles
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                               @foreach($roles as $role)
                                  <tr>
                                    <th scope="row">{{ $role->id }}</th>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <!-- <button class="btn btn-info" data-mytitle="{{$role->name}}" data-mydescription="" data-catId="" data-toggle="modal" data-target="#editroles">Edit</button>
                                            </button> -->
                                            <button class="btn btn-secondary role-edit"
                                                    data-url="{{ route('roles.show',['id'=>$role->id]) }}">
                                                Edit</button>
                                            <button class="btn btn-danger role-delete"
                                                    data-url="{{ route('roles.destroy',['id'=>$role->id]) }}">
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


    <div class="modal fade" tabindex="-1" role="dialog" id="addroles">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Roles
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('roles.store') }}" method="post" id="submitForm">
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
        $(function () {

            $('#addButton').on('click', function () {
                $('#addroles').modal();
                $('#id').val(0);
               $('#submitForm')[0].reset(); //resetting form
            }); 
            $('.role-edit').on('click', function () {
                    var url = $(this).attr('data-url');
                    $('#addroles').modal();
                    $.getJSON(url)
                        .done(function (data) {
                            $('#id').val(data.id);
                            $('#name').val(data.name);
                        });
                });

             $('.role-delete').on('click', function () {
                var result = confirm('Are you sure?');
                if (result) {
                    var url = $(this).attr('data-url');
                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        data: {_token: $('input[name="_token"]').val()},
                        dataType: 'json'
                    }).done(function () {
                        location.reload();
                    });
                }
            });

         });

    </script>

   
@endsection