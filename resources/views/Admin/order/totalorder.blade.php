@extends('Admin.layout')

@section('content')
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
                    @foreach ($orders as $key => $order)
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
                                    <a href="{{ URL('admin/orders/detail/' . $order->id) }}"
                                        class="btn btn-sm btn-info">Detail</a>
                                @else
                                    (--)
                                @endif

                            </td>



                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with stripped rows -->

        </div>
    </div>
@endsection
