@extends('layouts.admin-dashboard')
@section('title')
    {{__('Admin')}} : {{__('Manage Vehicles')}}
@endsection
@section('sidebar-equipment')
    active
@endsection

@section('main-content')
    <h1>{{__('Manage Vehicles')}}</h1>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        {{-- <h4 class="box-title">Table head options</h4> --}}
                        <a href="{{ route('equipment.create') }}" class="btn btn-info" style="float:right">{{__('Add new Vehicle')}}
                            <i class="fa fa-user-plus" aria-hidden="true"></i></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{__('Reg. No.')}}</th>
                                        <th scope="col">{{__("Amount of Seats")}}</th>
                                        <th scope="col">{{__("Equipments in Vehicle")}}</th>
                                        <th scope="col">{{__("Year of registration")}}</th>
                                        <th scope="col">{{__("Emission Class")}}</th>
                                        <th scope="col">{{__('Next Inspection')}}</th>
                                        <th scope="col">{{__('Place Of Bussiness')}}</th>
                                        <th scope="col"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sr = 1;
                                    @endphp
                                    @if (sizeof($equipment) > 0)
                                        @foreach ($equipment as $item)
                                            <tr>
                                                <th scope="row">{{ $sr }}</th>
                                                <td>{{ $item->reg_no }}</td>
                                                <td>{{ $item->amount_of_seats }}</td>
                                                <td>{{ $item->equipments_in_vehicle }}</td>
                                                <td>{{ $item->reg_year }}</td>
                                                <td>{{ $item->emmission_classification }}</td>
                                                <td>{{ $item->next_inspection }}</td>
                                                <td>{{ $item->getBusinessPlace ? $item->getBusinessPlace->name : null }}
                                                </td>
                                                <td style="display: flex">



                                                    <a class="btn btn-primary m-1"
                                                        href="{{ route('equipment.edit', $item->id) }}">
                                                        <i style="font-size:20px" class="fa fa-edit" aria-hidden="true"></i>
                                                    </a>

                                                    <form action="{{ route('equipment.destroy', $item->id) }}"
                                                        method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger m-1"
                                                            id="driver_delete_btn">
                                                            <i style="font-size:20px" class="fa fa-trash-o"
                                                                aria-hidden="true"></i>
                                                        </button>

                                                    </form>
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
