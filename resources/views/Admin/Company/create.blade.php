@extends('admin.layout')

@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">Add Company</h5>

      <!-- Vertical Form -->
      <form class="row g-3"  method="POST"  action="{{route('admine-company')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <label for="inputEmail4" class="form-label">Mall</label>
                <select id="inputState" name="mall_id" class="form-select">
                  <option selected>Choose...</option>
                  @foreach ($malls as $mall)
                  <option value="{{ $mall->id }}">{{ $mall->name}}
                  </option>
              @endforeach
                </select>

        </div>
        <div class="col-12">
          <label for="inputEmail4" class="form-label">Company Name</label>
          <input type="text" name="name" class="form-control" id="mall">
        </div>
        <div class="col-12">
            <label for="inputEmail4" class="form-label">Company logo</label>
            <input type="file" name="image" class="form-control" id="mall">
          </div>
          <div class="col-12">
            <label for="inputEmail4" class="form-label">Company Address</label>
            <input type="text" name="address" class="form-control" id="mall">
          </div>

        <div class="d-flex  justify-content-end">
            <button type="reset" class="btn btn-secondary m-1">Cancel</button>
          <button type="submit" class="btn btn-primary m-1">Submit</button>

        </div>
      </form><!-- Vertical Form -->

    </div>
  </div>
  @endsection
