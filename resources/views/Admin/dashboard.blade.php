@extends('Admin.layout')

@section('content')
    <div class="row">
        <div class="card col-md-6 col-lg-6 col-xl-4">
            <div class="row m-1">

              <div class="col-md-12">
                <div class="card-body">
                  <h5 class="card-title ">Total City</h5>
                  <h1 class=" display-5 "><strong>{{App\Models\City::all()->count()}}</strong></h1>
                </div>
              </div>
            </div>
          </div>
          <div class="card col-md-6 col-lg-6 col-xl-4">
            <div class="row m-1">

              <div class="col-md-12">
                <div class="card-body">
                  <h5 class="card-title">Total Mall</h5>
                  <p class=" display-5"><strong>{{App\Models\Mall::all()->count()}}</strong></p>
                </div>
              </div>
            </div>
          </div>
          <div class="card col-md-6 col-lg-6 col-xl-4">
            <div class="row m-1">

              <div class="col-md-12">
                <div class="card-body">
                  <h5 class="card-title">Total Company</h5>
                  <p class=" display-5"><strong>{{App\Models\Company::all()->count()}}</strong></p>
                </div>
              </div>
            </div>
          </div>
        {{-- <div class="col-md-6 col-lg-6 col-xl-4">
            <a href="{{url('admin/cars')}}">
                <div class="max-stat clearfix bg-primary">
                    <span class="mini-stat-icon"><i class="fa fa-car"></i></span>
                    <div class="mini-stat-info text-center text-white">
                        <span class="counter">{{App\Models\Company::all()->count()}}</span>
                        Company
                    </div>
                </div>
            </a>
        </div> --}}

        {{-- <div class="col-md-6 col-lg-6 col-xl-3">
            <a href="{{url('admin/orders/completed')}}">
                <div class="mini-stat clearfix bg-primary">
                    <span class="mini-stat-icon"><i class="fa fa-cart-plus"></i></span>
                    <div class="mini-stat-info text-right text-white">
                        <span class="counter">{{App\Order::all()->count()}}</span>
                        Orders
                    </div>
                </div>
            </a>
        </div> --}}
    </div>

@endsection
