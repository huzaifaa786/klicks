@extends('Admin.layout')

@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">Add Images</h5>

      <!-- Vertical Form -->
      <form class="row g-3"  method="POST"  action="{{route('save-images')}}" enctype="multipart/form-data">
        @csrf
   
        <div class="col-12">
          <label for="inputEmail4" class="form-label">Image 1</label>
          <input type="file" name="image1" class="form-control" id="mall" required>
        </div>
         <div class="col-12">
          <label for="inputNanme4" class="form-label">Image 2</label>
          <input type="file" class="form-control" id="image2" name="image2"required>
        </div>
        <div class="col-12">
            <label for="inputNanme4" class="form-label">Image 3</label>
            <input type="file" class="form-control" id="image3" name="image3"required>
          </div>

        <div class="d-flex  justify-content-end">
            <button type="reset" class="btn btn-secondary m-1">Cancel</button>
          <button type="submit" class="btn btn-primary m-1">Submit</button>

        </div>
      </form><!-- Vertical Form -->

    </div>
  </div>
</div>
  <div class="card">
    <div class="card-body">
        <h5 class="card-title">Coupon List</h5>

        <!-- Table with stripped rows -->
        <table id="example" class="datatable" style="width:100%">
            <thead>
                <tr>
                 
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($images as $key => $image)
                    @if ($image->image1 != null)
                        <tr>
                         
                            <td>
                                <a href="{{ asset($image->image1) }}" target="blank">
                                    <img src="{{ asset($image->image1) }}" width="50" height="60">
                                </a>
                            </td>
                         
                            <td>
                                <button type="button" class="btn btn-success m-r-20 btn-sm edit-btn" id="{{ $image->id }}"
                                    image1="{{ $image->image1}}"
                                    data-bs-toggle="modal" data-bs-target="#defaultModal">Edit
                                </button>
                            </td>
                        </tr>
                    @endif
                    @if ($image->image2 != null)
                        <tr>
                           
                            <td>
                                <a href="{{ asset($image->image2) }}" target="blank">
                                    <img src="{{ asset($image->image2) }}" width="50" height="60">
                                </a>
                            </td>
                          
                            <td>
                                <button type="button" class="btn btn-success m-r-20 btn-sm edit-btn" id="{{ $image->id }}"
                                    image2="{{ $image->image2}}"
                                    data-bs-toggle="modal" data-bs-target="#defaultModal">Edit
                                </button>
                            </td>
                        </tr>
                    @endif
                    @if ($image->image3 != null)
                        <tr>
                        
                            <td>
                                <a href="{{ asset($image->image3) }}" target="blank">
                                    <img src="{{ asset($image->image3) }}" width="50" height="60">
                                </a>
                            </td>
                          
                            <td>
                                <button type="button" class="btn btn-success m-r-20 btn-sm edit-btn" id="{{ $image->id}}"
                                    image3="{{ $image->image3}}"
                                    data-bs-toggle="modal" data-bs-target="#defaultModal">Edit
                                </button>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        
        <!-- End Table with stripped rows -->

    </div>
</div>



<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Edit images</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3"  method="POST"  action="{{route('edit-image')}}" enctype="multipart/form-data">
                
                <div class="modal-body">

                    @csrf
            
                    <label>image 1</label>
                    <div class="form-group form-float">
                        <input type="file" class="form-control" id="image1" placeholder="Name" name="image1"
                            >
                    </div>
                    <label>image 2</label>
                    <div class="form-group form-float">
                        <input type="file" class="form-control" id="image2" placeholder="image2"
                            name="image2" >
                    </div>
                    <label>image 3</label>
                    <div class="form-group form-float">
                        <input type="file" class="form-control" id="image3" placeholder="Name" name="image3"
                            >
                    </div>
                    <input type="hidden" id="id" name="id">
                   
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

            $('#deleteForm').attr('action', '{{ route('delete/image', '') }}'+ '/' + id);

        });
        $('tbody').on('click', '.edit-btn', function() {

            let id = this.id;

            let image1 = $(this).attr('image1');

            let image2 = $(this).attr('image2');

            let image3 = $(this).attr('image3');

            $("#id").val(id);
            $("#image1").val(image1);
            $('#image2').val(image2);
            $('#image3').val(image3);
            // $('#updateForm').attr('action', '{{ route('edit-image', '') }}'+ '/' + id);

        });




    })
</script>
  @endsection
