@extends('layouts.admin-dashboard')
@section('title')
    {{__("Admin")}} : {{__("Customer")}}
@endsection
@section('sidebar-organization')
    active
@endsection

@section('main-content')
    <h1>{{__("Customer")}}</h1>
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
                <h3 class="box-title">{{__('Customer List')}}</h3>
                <h6 class="box-subtitle">{{__("Export data to Copy, CSV, Excel, PDF & Print")}}
                </h6>
                @can('create-sp')
                    <a href="{{ route('organization.create') }}" class="btn btn-info" style="float:right;">{{__("Add Customer")}}
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
                                <th scope="col">{{__("Name")}}</th>
                                <th scope="col">{{__("Mobile")}}</th>
                                <th scope="col">{{__("E-mail")}}</th>
                                <th scope="col">{{__("Country")}}</th>
                                <th scope="col">{{__("Free Trial")}}</th>
                                <th scope="col">{{__("VAT-ID")}}</th>
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
                                                    <button type="submit" class="btn btn-danger m-1" id="driver_delete_btn">
                                                        <i style="font-size:20px" class="fa fa-trash-o" aria-hidden="true"></i>
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
                                    <td>{{__("No Data found")}}</td>
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
