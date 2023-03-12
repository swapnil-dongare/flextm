@extends('layouts.admin-dashboard')
@section('title')
    {{__('Admin')}} : {{__('Manage Customer')}}
@endsection
@section('sidebar-customer')
    active
@endsection

@section('main-content')
    <h1>{{__('Manage Customer')}}</h1>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        @can('create-customer')
                            <a href="{{ route('get-add-customer') }}" class="btn btn-info" style="float:right">{{__('Add new Customer')}}
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
                                        <th scope="col">{{__('Name')}}</th>
                                        <th scope="col">{{__('Mobile')}}</th>
                                        <th scope="col">{{__('E-mail')}}</th>
                                        <th scope="col">{{__('Company')}}</th>
                                        <th scope="col">{{__('Company Phone')}}</th>
                                        <th scope="col">{{__('VAT-ID')}}</th>
                                        <th scope="col"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sr = 1;
                                    @endphp
                                    @if (sizeof($customer) > 0)
                                        @foreach ($customer as $item)
                                            <tr>
                                                <th scope="row">{{ $sr }}</th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->mobile }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->company_name }}</td>
                                                <td>{{ $item->company_phone }}</td>
                                                <td>{{ $item->vat_id }}</td>
                                                <td>
                                                    @can('delete-customer')
                                                        <a href="{{ route('delete-customer', $item->id) }}">
                                                            <i style="font-size:20px" class="fa fa-trash-o"
                                                                aria-hidden="true"></i>
                                                        </a>
                                                    @endcan
                                                    @can('edit-customer')
                                                        <a href="{{ route('update-customer', $item->id) }}">
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
                                            <td>{{__('No Data found')}}</td>
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
        </div>
    </div>
@endsection
