@extends('layouts.admin-dashboard')
@section('title')
    {{__("Admin")}} : {{__("Manage Users")}}
@endsection
@section('sidebar-transport-manager')
    active
@endsection

@section('main-content')
    <h1>{{__("Manage Users")}}</h1>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        @can('create-tm')
                            <a href="{{ route('transport-manager.create') }}" class="btn btn-info" style="float:right">Add
                                 {{__("User")}}
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
                                        <th scope="col">{{__("Name")}}</th>
                                        <th scope="col">{{__("E-mail")}}</th>
                                        <th scope="col"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sr = 1;
                                    @endphp
                                    @if (sizeof($tm) > 0)
                                        @foreach ($tm as $item)
                                            <tr>
                                                <th scope="row">{{ $sr }}</th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td style="display: flex">
                                                    @can('delete-tm')
                                                        <form action="{{ route('transport-manager.destroy', $item->id) }}"
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
                                                    @can('edit-tm')
                                                        <a class="btn btn-primary m-1"
                                                            href="{{ route('transport-manager.edit', ['transport_manager' => $item->id]) }}">
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
                                            <td>{{__("No Data found")}}</td>
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
