@extends('admin.layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Company List</h5>

            <!-- Table with stripped rows -->
            <table id="example" class="datatable" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Mall Name</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Company logo</th>
                        <th scope="col">Company Address</th>
                        <th scope="col">Action</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($companys as $key => $company)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $company->mall->name }}</td>
                            <td>{{ $company->name }}</td>
                            <td>
                                {{-- {{dd($product->productimage->count())}} --}}
                                @if ($company->count() > 0)
                                    <a href="{{ asset($company->image) }} " target="blank">
                                        <img src="{{ asset($company->image) }} "width="50" height="60">

                                    </a>
                                @else
                                    no image avalible
                                @endif
                            </td>
                            <td>{{ $company->address }}</td>
                            <td> <button type="button" class="btn btn-danger waves-effect m-r-20 btn-sm delete-btn"
                                    id="{{ $company->id }}" data-bs-toggle="modal"
                                    data-bs-target="#basicModal">Delete</button>
                            </td>
                            <td> <button type="button" class="btn btn-success m-r-20 btn-sm edit-btn"
                                    id="{{ $company->id }}" mall_id="{{ $company->mall->id }}"
                                    name="{{ $company->name }}"  image="{{ $company->image }}" address="{{ $company->address }}"  data-bs-toggle="modal"
                                    data-bs-target="#defaultModal">Edit</button></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Company</h5>
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
                    <h4 class="title" id="defaultModalLabel">Edit Company</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateForm" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        @csrf
                        <label>city Name</label>
                        <label for="inputEmail4" class="form-label">City</label>
                        <select id="mall" name="mall_id" class="form-select">

                            @foreach (App\Models\Mall::all() as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                        <label>Name</label>
                        <div class="form-group form-float">
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                                required>
                        </div>
                        <label>address</label>
                        <div class="form-group form-float">
                            <input type="text" class="form-control" id="address" placeholder="Name" name="address"
                                required>
                        </div>
                        {{-- <label>Name</label>
                        <div class="form-group form-float">
                            <input type="file" class="form-control" id="image" placeholder="Name" name="image"
                                required>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">SAVE CHANGES</button>
                        <button type="button"class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
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
                alert(id);
                $('#deleteForm').attr('action', '{{ route('delete/company', '') }}' + '/' + id);

            });
            $('tbody').on('click', '.edit-btn', function() {

                let id = this.id;

                let image = $(this).attr('image');

                let address = $(this).attr('address');
                let name = $(this).attr('name');
                let mall_id = $(this).attr('mall_id');

                // let image = $(this).attr('image');


                $("#mall").val(mall_id).change();
                $('#name').val(name);
                $('#address').val(address);
                $('#image').val(image);

                $('#updateForm').attr('action', '{{ route('edit-company', '') }}' + '/' + id);

            });
        })
    </script>
@endsection
