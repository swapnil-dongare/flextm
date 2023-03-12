@extends('layouts.admin-dashboard')
@section('title')
    {{__("Dashboard")}} : {{__("Calendar")}}
@endsection
@section('sidebar-report-calendar')
    active
@endsection

@section('main-content')
    <h1>{{__("Calendar Report")}}</h1>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer-script')
    <script src="{{asset('assets/vendor_components/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/vendor_components/perfect-scrollbar-master/perfect-scrollbar.jquery.min.js')}}"></script>
	<script src="{{asset('assets/vendor_components/fullcalendar/lib/moment.min.js')}}"></script>
	<script src="{{asset('assets/vendor_components/fullcalendar/fullcalendar.min.js')}}"></script>

    <script src="{{ asset('main/js/pages/calendar.js') }}"></script>
@endsection
