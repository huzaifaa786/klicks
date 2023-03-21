@extends('Admin.layout')

@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">Add City</h5>

      <!-- Vertical Form -->
      <form class="row g-3"  method="POST"  action="{{route('admine-city')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
          <label for="inputNanme4" class="form-label">City Name</label>
          <input type="text" class="form-control" id="city" name="name">
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">City logo</label>
          <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="d-flex  justify-content-end">
            <button type="reset" class="btn btn-secondary m-1">Cancel</button>


          <button type="submit" class="btn btn-primary m-1">Submit</button>

        </div>
      </form><!-- Vertical Form -->

    </div>
  </div>
  <div class="card">
    <div class="card-body">
        <h5 class="card-title">City List</h5>

        <!-- Table with stripped rows -->
        <table id="example" class="datatable" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">City Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Delete City </th>
                    <th scope="col">Edit City </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($citys as $key => $city)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td>{{ $city->name }}</td>
                         <td>
                                {{-- {{dd($product->productimage->count())}} --}}
                                @if ($city->image!=null)
                                    <a href="{{ asset($city->image) }} " target="blank">
                                        <img src="{{ asset($city->image) }} "width="50" height="60">

                                    </a>
                                @else
                                    no image avalible
                                @endif
                            </td>
                        <td> <button type="button" class="btn btn-danger waves-effect m-r-20 btn-sm delete-btn"
                                id="{{ $city->id }}" data-bs-toggle="modal"
                                data-bs-target="#basicModal">Delete</button>
                        </td>
                        <td> <button type="button" class="btn btn-success m-r-20 btn-sm edit-btn"
                            id="{{ $city->id }}" name="{{ $city->name }}"  data-bs-toggle="modal"
                            data-bs-target="#defaultModal">Edit</button></td>





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
                <h5 class="modal-title">Delete City</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deleteForm" method="Get">
                    <div class="modal-body">
                        <h4>Are you sure you want to delete?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Yes</button>
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
                <h4 class="title" id="defaultModalLabel">Edit City</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateForm" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    @csrf
                    <label>Name</label>
                    <div class="form-group form-float">
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                            required>
                    </div>
                     {{-- <label>logo</label>
                        <div class="form-group form-float">
                            <input type="file" class="form-control" id="image" placeholder="Name" name="image"
                                required>
                        </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">SAVE CHANGES</button>
                    <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
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
            let image = $(this).attr('image');
            let name = $(this).attr('name');

            // let image = $(this).attr('image');



            $('#name').val(name);

            $('#image').val(image);

            $('#updateForm').attr('action', '{{ route('edit-city', '') }}' + '/' + id);

        });

    })
</script>
@endsection

