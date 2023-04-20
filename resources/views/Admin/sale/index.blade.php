@extends('Admin.layout')

@section('content')
<div class="col-6">

    <form id="myForm" action="{{url('admin/company/salesall')}}" method="GET">
        <input type="hidden" name="id" class="form-control">
        <label for="inputEmail4" class="form-label">Company Name</label>
        <select id="inputState" class="form-select" name="period" onchange="submitForm()">
            <option>choose company</option>
            @foreach (App\Models\Company::all() as $company)

            <option @if (isset($id))  @if ($id==$company->id)
                selected="selected"
                @endif
                @endif
                value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
    </form>
</div>
<br>
<br>
<div class="card ">
    <div class="card-body p-1">
        <h5 class="card-title">Order List</h5>

        <!-- Table with stripped rows -->
        <table id="example" class="datatable" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order id</th>
                    <th scope="col">City </th>
                    <th scope="col">Mall </th>
                    <th scope="col">Company </th>
                    <th scope="col">User </th>
                    <th scope="col">Cartype</th>
                    <th scope="col">floor </th>
                    <th scope="col">plate Num</th>
                    <th scope="col">parking</th>
                    <th scope="col">Status</th>
                    <th scope="col">payment</th>
                    <th scope="col">Extra ser</th>
                </tr>
            </thead>
            <tbody>
            @php
                $grandTotal = 0;
            @endphp
                @foreach ($sales as $key => $order)
                @php
                    $grandTotal += $order->totalpayment
                @endphp
                <tr>
                    <th>{{ $key + 1 }}</th>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->city->name }}</td>
                    <td>{{ $order->mall->name }}</td>
                    <td>{{ $order->company->name }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->cartype }}</td>
                    <td>{{ $order->floor }}</td>
                    <td>{{ $order->number_plate }}</td>
                    <td>{{ $order->parking }}</td>
                    <td>
                        @if ($order->status == 0)
                        <div class="text-warning">inprocess</div>
                        @elseif ($order->status == 1)
                        <div class="text-primary">Accept</div>
                        @elseif ($order->status == 2)
                        <div class="text-danger">Reject</div>
                        @else
                        <div class="text-success">Completed</div>
                        @endif
                    </td>
                    <td>{{ $order->totalpayment }}</td>
                    <td>
                        @if ($order->service->count() > 0)
                        <a href="{{ URL('admin/orders/detail/' . $order->id) }}" class="btn btn-sm btn-info">Detail</a>
                        @else
                        (--)
                        @endif

                    </td>



                </tr>
                @endforeach
              
            </tbody>
        </table>
        <span class="text-end">
            <h3 class="m-5">Total : AED {{$grandTotal}}</h3>
        </span>
        <!-- End Table with stripped rows -->

    </div>
</div>
@endsection

@section('script')
<script>
    function submitForm() {
      // Get the selected company ID
      var companyId = document.getElementById("inputState").value;
  
      // Set the company ID as the value of the hidden input field
      document.getElementsByName("id")[0].value = companyId;
  
      // Submit the form
      document.getElementById("myForm").submit();
    }
</script>
@endsection