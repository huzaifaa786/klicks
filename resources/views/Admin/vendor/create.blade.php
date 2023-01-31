@extends('Admin.layout')

@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Add Vendor</h5>

      <!-- Vertical Form -->
      <form class="row g-3"  method="POST"  action="{{route('save/vendor')}}">
        @csrf
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Vendor Name</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="col-12">
            <label for="inputNanme4" class="form-label">vendor Email</label>
            <input type="text" class="form-control" id="email" name="email">
          </div>
          <div class="col-12">
            <label for="inputNanme4" class="form-label">vendor Phone</label>
            <input type="text" class="form-control" id="phone" name="phone">
          </div>
          <div class="col-12">
            <label for="inputNanme4" class="form-label">vendor password</label>
            <input type="text" class="form-control" id="password" name="password">
          </div>

        <div class="d-flex  justify-content-end">
            <button type="reset" class="btn btn-secondary m-1">Cancel</button>


          <button type="submit" class="btn btn-primary m-1">Submit</button>

        </div>
      </form><!-- Vertical Form -->

    </div>
  </div>

@endsection
