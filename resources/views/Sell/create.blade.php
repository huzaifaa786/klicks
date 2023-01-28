@extends('Admin.layout')

@section('content')
    <div class="body">
        <form id="invoiceForm" method="Post" enctype="multipart/form-data" action="">
            @csrf

            <div class="col-lg-12
        col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <p> <b>City</b> </p>

                                <select class="form-select"data-placeholder="Select" name="city" id="city"required>
                                    <option selected="true" disabled="disabled">city select</option>
                                    @foreach ($citys as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <br>
                            <div class="col-lg-6 col-md-6">
                                <p> <b>mall</b> </p>
                                <select class="form-select" name="mall" id="mall">
                                    <option selected="true" disabled="disabled">Chosse...</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <p> <b>company</b> </p>
                                <select class="form-select" name="company" id="company">
                                    <option selected="true" disabled="disabled">Chosse... </option>
                                </select>
                            </div>

                        </div>
                        <br>
                        <button type="button" class="btn btn-primary" id="save">save</button>
                        <br>
                        <br>
                        <div class="col-lg-12 col-md-12 col-sm-12">

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable"
                                    id="printTable">
                                    <thead>
                                        <tr>
                                            <th>city name</th>
                                            <th>mall name</th>
                                            <th>company name</th>

                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="form-group col-md-2">

                    <button type="submit" class="btn btn-primary" class="left">save</button>
                </div>
            </div>

    </div>
    </form>
    </div>
@endsection
@section('css')
@endsection
@section('script')
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
                    $('#city').on('change', function(e) {
                        e.preventDefault();
                        let id = $(this).attr('value');
                        $.ajax({
                            url: "{{ url('mall/city') }}",
                            type: "post",
                            data: {
                                id: id
                            },
                            success: function(response) {
                                console.log(response.malls);
                                $('#mall').empty();
                                $('#mall').append(
                                    '<option  selected="true" disabled="disabled"">Select mall</option>'
                                );
                                $.each(response.malls, function(index, mall) {

                                    $('#mall').append('<option value="' + mall.id + '">' +
                                        mall.name + '</option>');
                                })
                            }
                        })

                    });
                    $('#mall').on('change', function(e) {
                        e.preventDefault();
                        let id = $(this).attr('value');
                        alert(id);
                        $.ajax({
                            url: "{{ url('company/city') }}",
                            type: "post",
                            data: {
                                id: id
                            },
                            success: function(response) {
                                name = response.name

                                console.log(response.companys);
                                $('#company').empty();
                                $('#company').append(
                                    '<option  selected="true" disabled="disabled"">Select company</option>'
                                );
                                $.each(response.companys, function(index, company) {
                                    $('#company').append('<option value="' + company.id + '">' +
                                        company.name + '</option>');
                                })
                            }
                        });
                    });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection
