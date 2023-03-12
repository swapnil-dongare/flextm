@extends('layouts.admin-dashboard')
@section('title')
    {{__('Admin')}} : {{__('Add Business Place')}}
@endsection
@section('sidebar-business-place')
    active
@endsection

@section('main-content')
    <h1>{{__('Add Business Place')}}</h1>
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="box">
                    <form class="form" action="{{ route('business-place.store') }}" method="POST">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="form-label">{{__('Name')}}</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="{{__('Name')}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __($message) }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-warning me-1">
                                <i class="ti-trash"></i> {{__('Cancel')}}
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="ti-save-alt"></i> {{__('Save')}}
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
@endsection
