@extends('layouts.admin-dashboard')
@section('title')
    {{__("Admin")}} : {{__("Update User")}}
@endsection
@section('sidebar-transport-manager')
    active
@endsection

@section('main-content')
    <h1>{{__("Update User")}}</h1>
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="box">
                    <form class="form" action="{{ route('transport-manager.update', $tm->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="box-body">
                            <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> {{__("Personal Info")}} </h4>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__("Name")}}</label>
                                        <input type="text" name="name" value="{{ $tm->name }}"
                                            class="form-control @error('name') is-invalid @enderror" placeholder="{{__('Name')}}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __($message) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__("E-mail4")}}</label>
                                        <input type="text" name="email" value="{{ $tm->email }}"
                                            class="form-control @error('email') is-invalid @enderror" placeholder="{{__("E-mail4")}}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __($message) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-warning me-1">
                                <i class="ti-trash"></i> {{__("Cancel")}}
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="ti-save-alt"></i> {{__("Save")}}
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
@endsection
