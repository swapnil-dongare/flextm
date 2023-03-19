@extends('layouts.admin-dashboard')
@section('title')
    {{__('Admin')}} : {{__('Add Customer')}}
@endsection
@section('sidebar-customer')
    active
@endsection

@section('main-content')
    <h1>{{__('Add Customer')}}</h1>
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="box">
                    <form class="form" action="" method="POST">
                        @csrf
                        <div class="box-body">
                            <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> {{__('Personal Info')}}</h4>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{__('Select Customer')}}</label>
                                        <select class="form-control select2  @error('customer_type') is-invalid @enderror"
                                            name="customer_type" id="customer_type" style="width: 100%;">
                                            <option value="1">{{__('Business')}}</option>
                                            <option value="2">{{__('Consumer')}}</option>
                                        </select>
                                        @error('customer_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __($message) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
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
                            </div>
                            <div class="row">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{__('Contact Number')}}</label>
                                        <input type="text" name="mobile" value="{{ old('mobile') }}"
                                            class="form-control @error('mobile') is-invalid @enderror" placeholder="{{__('Contact Number')}}">
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __($message) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i> {{__('Requirements')}}</h4>
                            <hr class="my-15">
                            <div id="companyReqDiv">
                                <div class="form-group">
                                    <label class="form-label">{{__('Company')}}</label>
                                    <input type="text" name="company_name" value="{{ old('company_name') }}"
                                        class="form-control @error('company_name') is-invalid @enderror"
                                        placeholder="{{__('Company Name')}}">
                                    @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ __($message) }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">{{__('Company Contact Number')}}</label>
                                            <input type="text" name="company_phone" value="{{ old('company_phone') }}"
                                                class="form-control @error('company_phone') is-invalid @enderror"
                                                placeholder="{{__('Company Contact Number')}}">
                                            @error('company_phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ __($message) }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">{{__('VAT-ID')}}</label>
                                            <input type="text" name="vat_id" value="{{ old('vat_id') }}"
                                                class="form-control @error('vat_id') is-invalid @enderror"
                                                placeholder="{{__('VAT-ID')}}">
                                            @error('vat_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ __($message) }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i>
                                {{ __('Address') }}
                            </h4>
                            <hr class="my-15">
                            {{-- <div class="form-group">
                                <label class="form-label">{{__('Address')}}</label>
                                <textarea rows="3" name="company_address" class="form-control @error('company_address') is-invalid @enderror"
                                    placeholder="{{__('Address')}}">{{ old('company_address') }}</textarea>
                                @error('company_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __($message) }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                {{-- <label class="form-label">Post Address</label> --}}
                                <input type="text" name="company_post_address" value="{{ old('company_post_address') }}"
                                    class="form-control @error('company_post_address') is-invalid @enderror"
                                    placeholder="{{__('Post Address')}}">
                                @error('company_post_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __($message) }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {{-- <label class="form-label">Zip Code</label> --}}
                                <input type="text" name="company_zipcode" value="{{ old('company_zipcode') }}"
                                    class="form-control @error('company_zipcode') is-invalid @enderror"
                                    placeholder="{{__('Zip Code')}}">
                                @error('company_zipcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __($message) }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {{-- <label class="form-label">City</label> --}}
                                <input type="text" name="company_city" value="{{ old('company_city') }}"
                                    class="form-control @error('company_city') is-invalid @enderror" placeholder="{{__('City')}}">
                                @error('company_city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __($message) }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {{-- <label class="form-label">country</label> --}}
                                <input type="text" name="company_country" value="{{ old('company_country') }}"
                                    class="form-control @error('company_country') is-invalid @enderror"
                                    placeholder="{{__('Country')}}">
                                @error('company_country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __($message) }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">

                                <div class="col-md-6">
                                    <input type="checkbox" id="md_checkbox_4"
                                        {{ old('newsletter') == 'on' ? 'checked' : '' }}
                                        class="chk-col-info @error('newsletter') is-invalid @enderror"
                                        name="newsletter" />
                                    <label for="md_checkbox_4">{{__('Data Privacy Policy Accepted')}}</label>
                                    @error('newsletter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ __($message) }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" id="md_checkbox_3"
                                        {{ old('marketing_permission') == 'on' ? 'checked' : '' }}
                                        class="chk-col-success @error('marketing_permission') is-invalid @enderror"
                                        name="marketing_permission" />
                                    <label for="md_checkbox_3">{{__('All Marketing Permission Accepted')}}</label>
                                    @error('marketing_permission')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ __($message) }}</strong>
                                        </span>
                                    @enderror
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
        $('#customer_type').change(function() {

            if ($(this).val() == 2) {
                $('#companyReqDiv').attr('hidden', true)
            } else {
                $('#companyReqDiv').removeAttr('hidden')
            }
        })
    </script>
@endsection
