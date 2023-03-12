@extends('layouts.admin-dashboard')
@section('title')
    {{__("Admin")}} : {{__("Update Organization")}}
@endsection
@section('sidebar-organization')
    active
@endsection

@section('main-content')
    <h1>{{__("Update Organization")}}</h1>
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="box">
                    <form class="form" action="{{ route('organization.update', $sp->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="box-body">
                            <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> {{__("Personal Info")}}</h4>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__("Name")}}</label>
                                        <input type="text" name="name" value="{{ $sp->name }}"
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
                                        <input type="text" name="email" value="{{ $sp->email }}"
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
                                        <input type="text" name="mobile" value="{{ $sp->mobile }}"
                                            class="form-control @error('mobile') is-invalid @enderror" placeholder="{{__('Phone')}}">
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
                            <div class="form-group">
                                <label class="form-label">{{__('Country')}}</label>
                                <input type="text" name="country" value="{{ $sp->country }}"
                                    class="form-control @error('country') is-invalid @enderror" placeholder="{{__('Company')}}">
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __($message) }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{__('Language')}}</label>
                                        <select class="form-control select2  @error('language_id') is-invalid @enderror"
                                            name="language_id" style="width: 100%;">
                                            @if ($language)
                                                @foreach ($language as $item)
                                                    <option value={{ $item->id }}>{{ $item->name }}</option>
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
                                        <label class="form-label">{{__('VAT-ID')}}</label>
                                        <input type="text" name="vat_id" value="{{ $sp->vat_id }}"
                                            class="form-control @error('vat_id') is-invalid @enderror" placeholder="{{__('VAT-ID')}}">
                                        @error('vat_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __($message) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">{{__('Address')}}</label>
                                                <textarea rows="5" name="company_address" value=""
                                                    class="form-control @error('company_address') is-invalid @enderror" placeholder="{{__('Address')}}">{{ $sp->address }}</textarea>
                                                @error('company_address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ __($message) }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                {{-- <label class="form-label">Post Address</label> --}}
                                                <input type="text" name="post_address" value="{{ $sp->post_address }}"
                                                    class="form-control @error('post_address') is-invalid @enderror"
                                                    placeholder="{{__('Post Address')}}">
                                                @error('post_address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ __($message) }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                {{-- <label class="form-label">Zip Code</label> --}}
                                                <input type="text" name="zipcode" value="{{ $sp->zipcode }}"
                                                    class="form-control @error('zipcode') is-invalid @enderror"
                                                    placeholder="{{__('Zip Code')}}">
                                                @error('zipcode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ __($message) }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                {{-- <label class="form-label">City</label> --}}
                                                <input type="text" name="city" value="{{ $sp->city }}"
                                                    class="form-control @error('city') is-invalid @enderror"
                                                    placeholder="{{__('City')}}">
                                                @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ __($message) }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                {{-- <label class="form-label">country</label> --}}
                                                <input type="text" name="country" value="{{ $sp->country }}"
                                                    class="form-control @error('country') is-invalid @enderror"
                                                    placeholder="{{__('Country')}}">
                                                @error('country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ __($message) }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">{{__('Invocing Address')}}</label>
                                                <textarea rows="5" name="invoice_address" value=""
                                                    class="form-control @error('invoice_address') is-invalid @enderror" placeholder="{{__('Invocing Address')}}">{{ $sp->invoice_address }}</textarea>
                                                @error('invoice_address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ __($message) }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                {{-- <label class="form-label">Post Address</label> --}}
                                                <input type="text" name="post_invoice_address"
                                                    value="{{ $sp->post_invoice_address }}"
                                                    class="form-control @error('post_invoice_address') is-invalid @enderror"
                                                    placeholder="{{__('Post Address')}}">
                                                @error('post_invoice_address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ __($message) }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                {{-- <label class="form-label">Zip Code</label> --}}
                                                <input type="text" name="zipcode_invoice_address"
                                                    value="{{ $sp->zipcode_invoice_address }}"
                                                    class="form-control @error('zipcode_invoice_address') is-invalid @enderror"
                                                    placeholder="{{__('Zip Code')}}">
                                                @error('zipcode_invoice_address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ __($message) }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                {{-- <label class="form-label">City</label> --}}
                                                <input type="text" name="city_invoice_address"
                                                    value="{{ $sp->city_invoice_address }}"
                                                    class="form-control @error('city_invoice_address') is-invalid @enderror"
                                                    placeholder="{{__('City')}}">
                                                @error('city_invoice_address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ __($message) }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                {{-- <label class="form-label">country</label> --}}
                                                <input type="text" name="country_invoice_address"
                                                    value="{{ $sp->country_invoice_address }}"
                                                    class="form-control @error('country_invoice_address') is-invalid @enderror"
                                                    placeholder="{{__('Country')}}">
                                                @error('country_invoice_address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ __($message) }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group"> --}}

                            <div class="row">
                                <div class="col-md-2">
                                    <input type="checkbox" id="md_checkbox_4" name="free_trial" {{$sp->free_trial ? 'checked' :''}}
                                        value=""
                                        class="chk-col-info @error('free_trial') is-invalid @enderror" />
                                    <label for="md_checkbox_4">{{__('Free Trial')}}</label>
                                    @error('free_trial')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ __($message) }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6" id="freeTrialDiv" {{$sp->free_trial ? '' :'hidden'}} >
                                    <label class="form-label">{{__('Free Trial End Date')}}</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="free_trial_end_date"
                                            class="form-control datepicker pull-right @error('free_trial_end_date') is-invalid @enderror"
                                            value="{{ $sp->free_trial_end_date }}" data-date-format="dd-mm-yyyy">
                                        @error('free_trial_end_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __($message) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="checkbox" id="md_checkbox_3"
                                    class="chk-col-success @error('subscription') is-invalid @enderror"
                                    name="subscription" value="{{ $sp->subscription }}" />
                                <label for="md_checkbox_3">{{__('Subscription')}}</label>
                                @error('subscription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __($message) }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- </div> --}}
                            <div class="row">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="image" style="margin-top: 100px">{{__('Select Image')}}</label>
                                        </div>
                                        <div class="col-md-10 text-center">
                                            <input type="file" id="image" name="logo_url" hidden>
                                            <img width="50%" id="img_frame" style="cursor: pointer"
                                                @if ($sp->logo_url) src="{{ asset(Storage::url($sp->logo_url)) }}"
                                                @else
                                                src="{{ asset('images/avtar.png') }}" @endif>
                                        </div>
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
