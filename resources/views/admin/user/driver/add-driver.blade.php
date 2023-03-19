@extends('layouts.admin-dashboard')
@section('title')
    {{__('Admin')}} : {{__('Add Driver')}}
@endsection
@section('sidebar-driver')
    active
@endsection

@section('main-content')
    <h1>{{__('Add Driver')}}</h1>
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="box">
                    <form class="form" action="{{ route('driver.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> {{__('Personal Info')}}</h4>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{__('Name')}}</label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control @error('name') is-invalid @enderror" placeholder="{{__('Name')}}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __($message) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{__('E-mail')}}</label>
                                        <input type="text" name="email" value="{{ old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror" placeholder="{{__('E-mail')}}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __($message) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{__('Mobile')}}</label>
                                        <input type="text" name="mobile" value="{{ old('mobile') }}"
                                            class="form-control @error('mobile') is-invalid @enderror" placeholder="{{__('Mobile')}}">
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __($message) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{__('Social Security Number')}}</label>
                                        <input type="text" name="social_security_no"
                                            value="{{ old('social_security_no') }}"
                                            class="form-control @error('social_security_no') is-invalid @enderror"
                                            placeholder="{{__('Social Security Number')}}">
                                        @error('social_security_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __($message) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{__("Address")}}</label>
                                <textarea rows="5" name="address" class="form-control @error('address') is-invalid @enderror"
                                    placeholder="{{__('Address')}}">{{ old('address') }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __($message) }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i> {{__('Requirements')}} </h4>
                            <hr class="my-15">
                            {{-- <div class="form-group">
                                <label class="form-label">Directives</label>
                                <input type="text" name="directive" value="{{old('directive')}}"
                                    class="form-control @error('directive') is-invalid @enderror" placeholder="Directives">
                                @error('directive')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __($message) }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{__('Licenses')}}</label>
                                        <input type="text" name="liscense_no" value="{{ old('liscense_no') }}"
                                            class="form-control @error('liscense_no') is-invalid @enderror"
                                            placeholder="{{__('Licenses Number')}}">
                                        @error('liscense_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __($message) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="display: flex;margin-top:30px">
                                        <label class="form-label " style="width: 100px">{{__('Valid until')}}:</label>

                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="valid_until" class="form-control pull-right"
                                                value="{{ old('valid_until') }}" data-date-format="dd-mm-yyyy"
                                                id="datepicker">
                                            @error('valid_until')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ __($message) }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{__('Language')}}</label>
                                        <select class="form-control select2  @error('language_id') is-invalid @enderror"
                                            name="language_id" style="width: 100%;">
                                            @if ($language)
                                                @foreach ($language as $item)
                                                    <option value={{ $item->id }}
                                                        {{ old('language_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            @else
                                                <option value="">{{__('No language found')}}</option>
                                            @endif
                                        </select>
                                        @error('language_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __($message) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{__('Location')}}</label>
                                        <select class="form-control select2  @error('location') is-invalid @enderror"
                                            name="location" style="width: 100%;">
                                            <option value="Lahti" {{ old('location') == 'Lahti' ? 'selected' : '' }}>Lahti
                                            </option>
                                            <option value="Levi" {{ old('location') == 'Levi' ? 'selected' : '' }}>Levi
                                            </option>
                                            <option value="Rovaniemi"
                                                {{ old('location') == 'Rovaniemi' ? 'selected' : '' }}>Rovaniemi</option>
                                            <option value="Helsinki" {{ old('location') == 'Helsinki' ? 'selected' : '' }}>
                                                Helsinki</option>
                                        </select>
                                        @error('location')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __($message) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">

                                <div class="row">
                                    <div class="col-md-4 m-2">
                                        <div class="form-group">
                                            <input type="checkbox" id="md_checkbox_3"
                                                {{ old('expired') == 'on' ? 'checked' : '' }}
                                                class="chk-col-success @error('expired') is-invalid @enderror"
                                                name="expired" />
                                            <label for="md_checkbox_3">{{__('Expired')}}</label>
                                            @error('expired')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ __($message) }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="image" style="margin-top: 100px">{{__('Select Image')}}</label>
                                    </div>
                                    <div class="col-md-10 text-center">
                                        <input type="file" id="image" name="image" id="profile_image" hidden>
                                        <img width="50%" id="img_frame" style="cursor: pointer"
                                            src="{{ asset('images/avtar.png') }}" alt="">
                                    </div>
                                </div>
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
@section('footer-script')
    <script>
        $(document).ready(function() {
            $('#img_frame').click(function() {
                $('#image').click();
            });

            $('#image').change(function() {
                const file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#img_frame').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        })
    </script>
@endsection
