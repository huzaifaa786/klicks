@extends('Admin.layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Mall List</h5>

            <!-- Table with stripped rows -->
            <table id="example" class="datatable" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">City Name</th>
                        <th scope="col">Mall Name</th>
                        <th scope="col">Action</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($malls as $key => $mall)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $mall->city->name }}</td>
                            <td>{{ $mall->name }}</td>
                            <td> <button type="button" class="btn btn-danger waves-effect m-r-20 btn-sm delete-btn"
                                    id="{{ $mall->id }}" data-bs-toggle="modal"
                                    data-bs-target="#basicModal">Delete</button>
                            </td>
                            <td> <button type="button" class="btn btn-success m-r-20 btn-sm edit-btn"
                                    id="{{ $mall->id }}" city_id="{{ $mall->city->id }}" name="{{ $mall->name }}"
                                    data-bs-toggle="modal" data-bs-target="#defaultModal">Edit</button></td>



                        </tr>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with stripped rows -->

        </div>
    </div>
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Mall</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="deleteForm" method="Get">
                        <div class="modal-body">
                            <h4>Are you sure you want to delete?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="submit"class="btn btn-success">Yes</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="defaultModalLabel">Edit Mall</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateForm" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        @csrf
                        <label>City Name</label>

                        <select id="city" name="city_id" class="form-select">
                            @foreach (App\Models\City::all() as $city)
                                <option  value="{{ $city->id }}">{{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                        <label>Name</label>
                        <div class="form-group form-float">
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                                required>
                        </div>






                    </div>
                    <div class="modal-footer">
                        <button type="submit"class="btn btn-success">SAVE CHANGES</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css" />
@endsection
@section('script')
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>



    <script>
        $(document).ready(function() {
            $('tbody').on('click', '.delete-btn', function() {

                let id = this.id;

                $('#deleteForm').attr('action', '{{ route('delete/city', '') }}' + '/' + id);

            });
            $('tbody').on('click', '.edit-btn', function() {

                let id = this.id;

                let city_id = $(this).attr('city_id');

                let name = $(this).attr('name');

                // let image = $(this).attr('image');


                $("#city").val(city_id).change();
                $('#name').val(name);
                // $('#city_name').val(city_name);
                // $('#image').val(image);

                $('#updateForm').attr('action', '{{ route('edit-mall', '') }}' + '/' + id);

            });



            // $('tbody').on('click', '.delete-btn', function() {

            //     let id = this.id;
            //     alert(id);
            //     $('#deleteForm').attr('action', '{{ route('delete/mall', '') }}' + '/' + id);

            // });
            // $('tbody').on('click', '.edit-btn', function() {
            //     alert('sdfjdjf');
            //     let id = this.id;
            //     let city name = $(this).attr('city name');
            //     alertcity(name);
            //     let name = $(this).attr('name');
            //     // let image = $(this).attr('image');



            //     $('#city name').val(city name);
            //     $('#name').val(name);

            //     // $('#image').val(image);

            //     $('#updateForm').attr('action', '{{ route('edit-mall', '') }}' + '/' + id);

            // });

        })
    </script>
@endsection
