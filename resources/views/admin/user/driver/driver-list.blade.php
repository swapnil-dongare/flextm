@extends('layouts.admin-dashboard')
@section('title')
    {{__('Admin')}} : {{__('Driver')}}
@endsection
@section('sidebar-driver')
    active
@endsection

@section('main-content')
    <h1>{{__('Driver')}}</h1>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        {{-- <h4 class="box-title">Table head options</h4> --}}
                        @can('create-driver')
                            <a href="{{ route('driver.create') }}" class="btn btn-info" style="float:right">{{__('Add new driver')}}
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
                                        <th scope="col">{{__('Licenses')}}</th>
                                        <th scope="col">{{__('Valid')}}</th>
                                        <th scope="col">{{__('Social Sec. No.')}}</th>
                                        <th scope="col"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sr = 1;
                                    @endphp
                                    @if (sizeof($driver) > 0)
                                        @foreach ($driver as $item)
                                            <tr>
                                                <th scope="row">{{ $sr }}</th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->mobile }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->liscense_no }}</td>
                                                <td>{{ $item->valid_until }}</td>
                                                <td>{{ $item->social_security_no }}</td>
                                                <td style="display: flex">


                                                    @can('edit-driver')
                                                        <a class="btn btn-primary m-1"
                                                            href="{{ route('driver.edit', $item->id) }}">
                                                            <i style="font-size:20px" class="fa fa-edit" aria-hidden="true"></i>
                                                        </a>
                                                    @endcan


                                                    @can('delete-driver')
                                                        <form action="{{ route('driver.destroy', $item->id) }}"
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
                                            <td>{{__('No data found')}}</td>
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
@section('footer-script')
    <script>
        // $(document).ready(function() {
        //     $('#driver_delete_btn').click(function() {
        //         alert("hi")
        //         $('#driver_delete').submit();
        //     })
        // })
    </script>
@endsection
