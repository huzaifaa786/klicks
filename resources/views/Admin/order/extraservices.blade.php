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
                        <th scope="col">Service  Name</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $key => $service)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td> @if ($service->service->count()>0)
                              {{$service->service_name}}
                            @else
                                no image avalible
                            @endif</td>




                        </tr>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with stripped rows -->

        </div>
    </div>

@endsection
