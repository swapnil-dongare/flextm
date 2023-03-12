@extends('layouts.admin-dashboard')
@section('title')
    {{__("Admin")}} : {{__("Add Customer")}}
@endsection
@section('sidebar-organization')
    active
@endsection

@section('main-content')
    <h1>{{__("Add Customer")}} </h1>
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="box">
                    <form class="form" action="{{ route('organization.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i>{{__("Personal Info")}}</h4>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__("Name")}}</label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control @error('name') is-invalid @enderror" placeholder="{{__('Name')}}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ {{__($message)}} }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{__('E-mail')}}</label>
                                        <input type="text" name="email" value="{{ old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror" placeholder="{{__('E-mail')}}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ {{__($message)}} }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{__("Contact Number")}}</label>
                                        <input type="text" name="mobile"
                                            class="form-control @error('mobile') is-invalid @enderror" placeholder="Contact Number"
                                            value="{{ old('mobile') }}">
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ {{__($message)}} }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i> {{__("Requirements")}}</h4>
                            <hr class="my-15">
                            <div class="form-group">
                                <label class="form-label">{{__("Country")}}</label>
                                <input type="text" name="country" value="{{ old('country') }}"
                                    class="form-control @error('country') is-invalid @enderror" placeholder="{{__('Country Name')}}">
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ {{__($message)}} }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{__('Language')}} </label>
                                        <select class="form-control select2  @error('language_id') is-invalid @enderror"
                                            name="language_id" style="width: 100%;">
                                            @if ($language)
                                                @foreach ($language as $item)
                                                    <option value={{ $item->id }}
                                                        {{ old('language_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            @else
                                                <option value="">{{__("No language found")}}</option>
                                            @endif
                                        </select>
                                        @error('language_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ {{__($message)}} }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{__('VAT-ID')}}</label>
                                        <input type="text" name="vat_id" value="{{ old('vat_id') }}"
                                            class="form-control @error('vat_id') is-invalid @enderror" placeholder="{{__('VAT-ID')}}">
                                        @error('vat_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ {{__($message)}} }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i> {{__('Address')}}</h4>
                                <hr class="my-15">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            {{-- <label class="form-label">Post Address</label> --}}
                                            <input type="text" name="post_address" value="{{ old('post_address') }}"
                                                class="form-control @error('post_address') is-invalid @enderror"
                                                placeholder="{{__('Post Address')}}">
                                            @error('post_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ {{__($message)}} }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {{-- <label class="form-label">Zip Code</label> --}}
                                            <input type="text" name="zipcode" value="{{ old('zipcode') }}"
                                                class="form-control @error('zipcode') is-invalid @enderror"
                                                placeholder="{{__('Zip Code')}}">
                                            @error('zipcode')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ {{__($message)}} }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{-- <label class="form-label">City</label> --}}
                                            <input type="text" name="city" value="{{ old('city') }}"
                                                class="form-control @error('city') is-invalid @enderror"
                                                placeholder="{{__('City')}}">
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ {{__($message)}} }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {{-- <label class="form-label">country</label> --}}
                                            <input type="text" name="country" value="{{ old('country') }}"
                                                class="form-control @error('country') is-invalid @enderror"
                                                placeholder="{{__('Country')}}">
                                            @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ {{__($message)}} }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea rows="3" name="company_address" class="form-control @error('company_address') is-invalid @enderror"
                                                placeholder="{{__('Address')}}">{{ old('company_address') }}</textarea>
                                            @error('company_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ {{__($message)}} }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- </div> --}}
                                {{-- <div class="col-md-6"> --}}
                                <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i> {{__('Invocing Address')}}
                                </h4>
                                <hr class="my-15">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea rows="3" name="invoice_address" class="form-control @error('invoice_address') is-invalid @enderror"
                                                placeholder="{{__('Invocing Address')}}">{{ old('invoice_address') }}</textarea>
                                            @error('invoice_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ {{__($message)}} }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {{-- <label class="form-label">Post Address</label> --}}
                                            <input type="text" name="post_invoice_address"
                                                value="{{ old('post_invoice_address') }}"
                                                class="form-control @error('post_invoice_address') is-invalid @enderror"
                                                placeholder="{{__('Post Address')}}">
                                            @error('post_invoice_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ {{__($message)}} }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {{-- <label class="form-label">Zip Code</label> --}}
                                            <input type="text" name="zipcode_invoice_address"
                                                value="{{ old('zipcode_invoice_address') }}"
                                                class="form-control @error('zipcode_invoice_address') is-invalid @enderror"
                                                placeholder="{{__('Zip Code')}}">
                                            @error('zipcode_invoice_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ {{__($message)}} }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {{-- <label class="form-label">City</label> --}}
                                            <input type="text" name="city_invoice_address"
                                                value="{{ old('city_invoice_address') }}"
                                                class="form-control @error('city_invoice_address') is-invalid @enderror"
                                                placeholder="{{__('City')}}">
                                            @error('city_invoice_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ {{__($message)}} }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {{-- <label class="form-label">country</label> --}}
                                            <input type="text" name="country_invoice_address"
                                                value="{{ old('country_invoice_address') }}"
                                                class="form-control @error('country_invoice_address') is-invalid @enderror"
                                                placeholder="{{__('Country')}}">
                                            @error('country_invoice_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ {{__($message)}} }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- </div> --}}
                            </div>
                            <div class="form-group">

                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="checkbox" id="md_checkbox_4"
                                            {{ old('free_trial') == 'on' ? 'checked' : '' }}
                                            class="chk-col-info @error('free_trial') is-invalid @enderror"
                                            name="free_trial" />
                                        <label for="md_checkbox_4">{{__('Free Trial')}}</label>

                                        @error('free_trial')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6" id="freeTrialDiv" hidden>
                                        <label class="form-label">{{__('Free Trial End Date')}}</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="free_trial_end_date"
                                                class="form-control datepicker pull-right @error('free_trial_end_date') is-invalid @enderror"
                                                value="{{ old('free_trial_end_date') }}" data-date-format="dd-mm-yyyy"
                                            >
                                            @error('free_trial_end_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" id="md_checkbox_3"
                                        {{ old('subscription') == 'on' ? 'checked' : '' }}
                                        class="chk-col-success @error('subscription') is-invalid @enderror"
                                        name="subscription" />
                                    <label for="md_checkbox_3">{{__('Subscription')}}</label>
                                    @error('subscription')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="image" style="margin-top: 100px">{{__("Select Logo")}}</label>
                                        </div>
                                        <div class="col-md-10 text-center">
                                            <input type="file" id="image" name="logo_url" id="profile_image"
                                                hidden>
                                            <img width="50%" id="img_frame" style="cursor: pointer"
                                                src="{{ asset('images/avtar.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{ route('organization.index') }}" class="btn btn-warning me-1">
                                <i class="ti-trash"></i> {{__("Cancel")}}
                            </a>
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
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
                // startDate: '-3d'
            });
            $('#md_checkbox_4').change(function(){
                console.log($(this).is(':checked'));
                if($(this).is(':checked')){
                    $('#freeTrialDiv').removeAttr('hidden')
                }else{
                    $('#freeTrialDiv').attr('hidden',true)
                }
            })
        })
    </script>
@endsection
