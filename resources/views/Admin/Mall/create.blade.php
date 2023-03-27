@extends('Admin.layout')

@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">Add Mall</h5>

      <!-- Vertical Form -->
      <form class="row g-3"  method="POST"  action="{{route('save-mall')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <label for="inputEmail4" class="form-label">City</label>
                <select id="inputState" name="city_id" class="form-select" required>
                  <option selected>Choose...</option>
                  @foreach ($citys as $city)
                  <option value="{{ $city->id }}">{{ $city->name }}
                  </option>
              @endforeach
                </select>

        </div>
        <div class="col-12">
          <label for="inputEmail4" class="form-label">Mall Name</label>
          <input type="text" name="name" class="form-control" id="mall" required>
        </div>
         <div class="col-12">
          <label for="inputNanme4" class="form-label">Mall logo</label>
          <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="d-flex  justify-content-end">
            <button type="reset" class="btn btn-secondary m-1">Cancel</button>
          <button type="submit" class="btn btn-primary m-1">Submit</button>

        </div>
      </form><!-- Vertical Form -->

    </div>
  </div>
  @endsection
