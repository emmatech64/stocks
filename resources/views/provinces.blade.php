@extends('layouts.master')

@section('title','Provinces')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form>

                    <div class="form-group row">
                        <label for="province" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <select id="province" class="form-control">
                                <option value=""></option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->provincecode }}">
                                        {{ $province->provincename }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ditrict" class="col-sm-2 col-form-label">District</label>
                        <div class="col-sm-10">
                            <select id="district" class="form-control">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sector" class="col-sm-2 col-form-label">Sector</label>
                        <div class="col-sm-10">
                            <select id="sector" class="form-control">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sector" class="col-sm-2 col-form-label">Cell</label>
                        <div class="col-sm-10">
                            <select id="cell" class="form-control">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="village" class="col-sm-2 col-form-label">Villages</label>
                        <div class="col-sm-10">
                            <select id="village" class="form-control">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                </form>
            </div>

            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <td>Province</td>
                        <td>District</td>
                        <td>Sector</td>
                        <td>Cell</td>
                        <td>Village</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($provinces as $province)
                        <tr>
                            <td>{{ $province->provincename }}</td>
                            <td>
                                <ul>
                                    {{-- @foreach(\App\District::where('provincecode','=',$province->provincecode)->get() as $district)
                                         <li>{{ $district->namedistrict }}</li>

                                     @endforeach--}}
                                    @foreach($province->districts as $district)
                                        <li>{{ $district->namedistrict }}</li>
                                    @endforeach

                                </ul>
                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function () {
            $('#province').on('change', function () {
                var provinceCode = $(this).val();
                $.getJSON('/districts/province/' + provinceCode)
                    .done(function (data) {
                        var dist = $('#district');
                        dist.empty();
                        dist.append('<option value=""></option>');
                        data.forEach(function (row) {
                            dist.append('<option value="' + row.districtcode + '">' + row.namedistrict + '</option>');
                        });
                    });
            });

            $('#district').on('change', function () {
                var districtCode = $(this).val();
                $.getJSON('/sectors/district/' + districtCode)
                    .done(function (data) {
                        var sector = $('#sector');
                        sector.empty();
                        sector.append('<option value=""></option>');
                        data.forEach(function (row) {
                            sector.append('<option value="' + row.sectorcode + '">' + row.namesector + '</option>');
                        });
                    });
            });

            $('#sector').on('change', function () {
                var sectorcode = $(this).val();
                $.getJSON('/cells/sector/' + sectorcode)
                    .done(function (data) {
                        var cell = $('#cell');
                        cell.empty();
                        cell.append('<option value=""></option>');
                        data.forEach(function (row) {
                            cell.append('<option value="' + row.codecell + '">' + row.nameCell + '</option>');
                        });
                    });
            });

        });
    </script>
@endsection
