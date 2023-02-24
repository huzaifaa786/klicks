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
                        <th scope="col">Company Name</th>
                        <th scope="col">Cartype</th>
                        <th scope="col">floor number</th>
                        <th scope="col">plate number</th>
                        <th scope="col">parking</th>
                        <th scope="col">Extra service</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $order)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $order->city->name }}</td>
                            <td>{{ $order->mall->name }}</td>
                            <td>{{ $order->company->name }}</td>
                            <td>{{ $order->cartype }}</td>
                            <td>{{ $order->floor }}</td>
                            <td>{{ $order->number_plate }}</td>
                            <td>{{ $order->parking}}</td>
<td><a href="{{ url('admine/orders/detail', $order->id) }}" class="btn btn-sm btn-info">Detail</a></td>


                        </tr>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with stripped rows -->

        </div>
    </div>

@endsection
