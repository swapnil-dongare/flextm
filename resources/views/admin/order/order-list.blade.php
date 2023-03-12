@extends('layouts.admin-dashboard')
@section('title')
    {{__('Admin')}} : {{__('Order Request')}}
@endsection
@section('sidebar-order')
    active
@endsection

@section('main-content')
    <h1>{{__('Order Request')}}</h1>
    <div class="container">
        {{-- <div class="row">
            <div class="col-12 col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        @can('create-sp')
                            <a href="{{ route('organization.create') }}" class="btn btn-info" style="float:right">Add Service
                                Provider
                                <i class="fa fa-user-plus" aria-hidden="true"></i></a>
                        @endcan
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Free Trial</th>
                                        <th scope="col">VAT-ID</th>
                                        <th scope="col"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sr = 1;
                                    @endphp
                                    @if (sizeof($sp) > 0)
                                        @foreach ($sp as $item)
                                            <tr>
                                                <th scope="row">{{ $sr }}</th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->mobile }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->country }}</td>
                                                <td>{{ $item->free_trial ? 'Yes' : 'No' }}</td>
                                                <td>{{ $item->vat_id }}</td>
                                                <td style="display: flex">
                                                    @can('delete-sp')
                                                        <form action="{{ route('organization.destroy', $item->id) }}"
                                                            method="POST">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger m-1"
                                                                id="driver_delete_btn">
                                                                <i style="font-size:20px" class="fa fa-trash-o"
                                                                    aria-hidden="true"></i>
                                                            </button>

                                                        </form>
                                                    @endcan
                                                    @can('edit-sp')
                                                        <a class="btn btn-primary m-1"
                                                            href="{{ route('organization.edit', ['organization' => $item->id]) }}">
                                                            <i style="font-size:20px" class="fa fa-edit" aria-hidden="true"></i>
                                                        </a>
                                                    @endcan

                                                </td>
                                            </tr>
                                            @php
                                                $sr++;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>No Data found</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div> --}}

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{__('Order Request List')}}</h3>
                <h6 class="box-subtitle">{{__('Export data to Copy, CSV, Excel, PDF & Print')}}
                </h6>
                @can('create-order-request')
                    <a href="{{ route('order-request.create') }}" class="btn btn-info" style="float:right;">{{__('Create New Order')}}

                        <i class="fa fa-user-plus" aria-hidden="true"></i></a>
                @endcan

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example"
                        class="table table-bordered table-striped table-hover display nowrap margin-top-10 w-p100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('Order type')}}</th>
                                <th scope="col">{{__('Start Location')}}</th>
                                <th scope="col">{{__('Start Date')}}</th>
                                <th scope="col">{{__('Start Time')}}</th>
                                <th scope="col">{{__('Present in Location')}}</th>
                                <th scope="col">{{__('End Location')}}</th>
                                <th scope="col">{{__('End Date')}}</th>
                                <th scope="col">{{__('End Time')}}</th>
                                {{-- <th scope="col">Present in Service Hall</th> --}}
                                <th scope="col">{{__('Amount of passangers')}}</th>
                                <th scope="col">{{__('Mobility Restrictions')}}</th>
                                <th scope="col">{{__('Price')}}</th>
                                <th scope="col">{{__('Tax Rate')}}</th>
                                <th scope="col">{{__('Price Incl. Tax')}}</th>
                                <th scope="col">{{__('Invoiced')}}</th>
                                <th scope="col">{{__('Driver')}}</th>
                                <th scope="col">{{__('Equipment')}}</th>
                                <th scope="col">{{__('Route')}}</th>
                                <th scope="col">{{__('Language')}}</th>
                                <th scope="col">{{__('Other Wishesh')}}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sr = 1;
                            @endphp
                            @if (count($order) > 0)
                                @foreach ($order as $item)
                                    <tr>
                                        <th scope="row">{{ $sr }}</th>
                                        <td>{{ $item->request_type == 1 ? "Order" : "Quote" }}</td>
                                        <td>{{ $item->start_location }}</td>
                                        <td>{{ $item->start_date }}</td>
                                        <td>{{ $item->start_time }}</td>
                                        <td>{{ $item->present_in_location }}</td>
                                        <td>{{ $item->end_location }}</td>
                                        <td>{{ $item->end_date }}</td>
                                        <td>{{ $item->end_time }}</td>
                                        {{-- <td>{{ $item->present_in_service_hall }}</td> --}}
                                        <td>{{ $item->head_count }}</td>
                                        <td>{{ $item->mobility_restrictions ? 'Yes' : 'No' }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->tax_rate }}%</td>
                                        <td>{{ $item->price_incl_tax }}</td>
                                        <td>{{ $item->invoiced ? 'Yes' : 'No' }}</td>
                                        <td>{{ $item->getDriverDetails ? $item->getDriverDetails->name : 'NA' }}</td>
                                        <td>{{ $item->getEquipmentDetails ? $item->getEquipmentDetails->reg_no : 'NA' }}</td>
                                        <td>{{ $item->route }}</td>
                                        <td>{{ $item->getLanguageDetails ? $item->getLanguageDetails->name : 'NA' }}</td>
                                        <td>{{ $item->other_wishes }}</td>
                                        <td style="display: flex">
                                            @can('delete-order-request')
                                                <form action="{{ route('order-request.destroy', $item->id) }}"
                                                    method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger m-1" id="driver_delete_btn">
                                                        <i style="font-size:20px" class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </button>

                                                </form>
                                            @endcan
                                            @can('edit-order-request')
                                                <a class="btn btn-primary m-1"
                                                    href="{{ route('order-request.edit', ['order_request' => $item->id]) }}">
                                                    <i style="font-size:20px" class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                            @endcan

                                        </td>
                                    </tr>
                                    @php
                                        $sr++;
                                    @endphp
                                @endforeach
                            @else
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{__("No Data found")}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
@endsection
@section('footer-script')
    <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('main/js/pages/data-table.js') }}"></script>
@endsection
