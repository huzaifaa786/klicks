@extends('Admin.layout')

@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Add  Copen</h5>

      <!-- Vertical Form -->
      <form class="row g-3"  method="POST"  action="{{route('savecopen')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <label for="inputEmail4" class="form-label">Company</label>
                <select id="inputState" name="company_id" class="form-select">
                  <option selected>Choose...</option>
                  @foreach ($companys as $company)
                  <option value="{{ $company->id }}">{{ $company->name }}
                  </option>
              @endforeach
                </select>

        </div>
        <div class="col-12">
          <label for="inputEmail4" class="form-label">Enter Copen</label>
          <input type="text" name="copen" class="form-control" id="Copen">
        </div>
        <div class="col-12">
            <label for="inputEmail4" class="form-label"> Copen percentage</label>
            <input type="text" name="percentage" class="form-control" id="percentage">
          </div>


        <div class="d-flex  justify-content-end">
            <button type="reset" class="btn btn-secondary m-1">Cancel</button>
          <button type="submit" class="btn btn-primary m-1">Submit</button>

        </div>
      </form><!-- Vertical Form -->

    </div>
  </div>

@endsection
