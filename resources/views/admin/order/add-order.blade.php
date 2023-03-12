@extends('layouts.admin-dashboard')
@section('title')
    {{__("Admin")}} : {{__("Create Order Request")}}
@endsection
@section('sidebar-order')
    active
@endsection

@section('main-content')
    <h1>{{__("Create Order Request")}}</h1>
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="box">
                    <form class="form" action="{{ route('order-request.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> {{__('Customer Details')}}</h4>
                            <hr class="my-15">
                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control"
                                            value="{{ auth()->user()->getUserDetails ? auth()->user()->getUserDetails->name : null }}"
                                            disabled readonly>

                                    </div>
                                </div>
                            </div><input type="hidden" name="user_id" value="{{ auth()->user()->getUserDetails ? auth()->user()->getUserDetails->id : null }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">E-mail</label>
                                        <input type="text" class="form-control"
                                            value="{{ auth()->user()->getUserDetails ? auth()->user()->getUserDetails->email : null }}"
                                            readonly disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Contact Number</label>
                                        <input type="text" class="form-control"
                                            value="{{ auth()->user()->getUserDetails ? auth()->user()->getUserDetails->mobile : null }}"
                                            readonly disabled>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{_("Select Customer")}}</label>
                                        <select class="form-control select2  @error('customer_id') is-invalid @enderror"
                                            name="customer_id" style="width: 100%;">
                                            <option value="">{{_("Select Customer")}}</option>
                                            @if ($customer)
                                                @foreach ($customer as $item)
                                                    <option value={{ $item->id }} {{old('customer_id') == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                                @endforeach
                                            @else
                                                <option value="">{{__("No Customer found")}}</option>
                                            @endif
                                        </select>
                                        @error('customer_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ {{__($message)}} }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i> {{__("Requirements")}}</h4>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{__("Order Type")}}</label>
                                        <select class="selectpicker  @error('request_type') is-invalid @enderror"
                                            name="request_type">
                                            <option value="2"> {{__("Quote")}}</option>
                                            <option value="1" {{old('request_type') == 1 ? 'selected' : ''}}>{{__("Order")}}</option>
                                        </select>
                                        @error('request_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ {{__($message)}} }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="form-label">{{__('Language')}}</label>
                                        <select class="form-control select2  @error('language_id') is-invalid @enderror"
                                            name="language_id" style="width: 100%;">
                                            @if ($language)
                                                @foreach ($language as $item)
                                                    <option value={{ $item->id }} {{old('language_id') == $item->id || $item->slug == 'fi' ? 'selected' : ''}} >{{ $item->name }}</option>
                                                @endforeach
                                            @else
                                                <option value="">{{__("No Language found")}}</option>
                                            @endif
                                        </select>
                                        @error('language_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ {{__($message)}} }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Start Location Box --}}
                            <div class="box">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">{{__('Start Location')}}</label>
                                                <input type="text" name="start_location" value="{{old('start_location')}}"
                                                    class="form-control @error('start_location') is-invalid @enderror"
                                                    placeholder="{{__('Start Location')}}">
                                                @error('start_location')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ {{__($message)}} }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">{{__("Start Date")}}</label>

                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="start_date" class="form-control pull-right @error('start_date') is-invalid @enderror"
                                                value="{{old('start_date')}}"
                                                    data-date-format="dd-mm-yyyy" id="datepicker">
                                                @error('start_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ {{__($message)}} }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            {{-- <input type="text"  class="form-control" placeholder="dd-mm-yyyy" name="start_date" id=""> --}}
                                        </div>
                                        <div class="col-md-6">
                                            <div class="bootstrap-timepicker">
                                                <div class="form-group">
                                                    <label class="form-label">{{__("Start Time")}}</label>


                                                    {{-- <div class="input-group">
                                                        <input type="text" name="start_time"
                                                            class="form-control timepicker  @error('start_time') is-invalid @enderror">

                                                        <div class="input-group-addon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </div>
                                                    </div> --}}

                                                    <input type="text"  name="start_time" class="form-control @error('start_time') is-invalid @enderror" value="{{old('start_time')}}" placeholder="00:00:00">
                                                    @error('start_time')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ {{__($message)}} }}</strong>
                                                        </span>
                                                    @enderror
                                                    <!-- /.input group -->
                                                </div>
                                                <!-- /.form group -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">{{__("Present in Location")}}</label>
                                            <input type="text" name="present_in_location"  value="{{old('present_in_location')}}"
                                                class="form-control @error('present_in_location') is-invalid @enderror"
                                                placeholder="00:00:00">
                                            @error('present_in_location')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ {{__($message)}} }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Start Location box end --}}

                            {{-- End Location Box --}}
                            <div class="box">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">{{__("End Location")}}</label>
                                                <input type="text" name="end_location" value="{{old('end_location')}}"
                                                    class="form-control @error('end_location') is-invalid @enderror"
                                                    placeholder="{{__("End Location")}}">
                                                @error('end_location')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ {{__($message)}} }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">{{__("End Date")}}</label>

                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="end_date" class="form-control pull-right datepicker @error('end_date') is-invalid @enderror"
                                                value="{{old('end_date')}}" data-date-format="dd-mm-yyyy" id="">
                                                @error('end_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ {{__($message)}} }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            {{-- <input type="text"  class="form-control" placeholder="dd-mm-yyyy" name="start_date" id=""> --}}
                                        </div>
                                        <div class="col-md-6">
                                            <div class="bootstrap-timepicker">
                                                <div class="form-group">
                                                    <label class="form-label">{{__("End Time")}}</label>
                                                    <input type="text"   value="{{old('end_time')}}"  name="end_time" id=""  placeholder="00:00:00" class="form-control @error('end_time') is-invalid @enderror">
                                                    <!-- /.input group -->
                                                    @error('end_time')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ {{__($message)}} }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <!-- /.form group -->
                                            </div>
                                        </div>
                                    </div>
                                        {{-- <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Present in Service hall</label>
                                                <input type="text" name="present_in_service_hall"
                                                    class="form-control @error('present_in_service_hall') is-invalid @enderror"
                                                    placeholder="00:00:00">
                                                @error('present_in_service_hall')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ {{__($message)}} }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div> --}}
                                </div>
                            </div>
                            {{-- End Location box end --}}


                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__("Amount of passangers")}}</label>
                                        <input type="text" name="head_count" value="{{old('head_count')}}"
                                            class="form-control @error('head_count') is-invalid @enderror"
                                            placeholder="{{__("Amount of passangers")}}">
                                        @error('head_count')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ {{__($message)}} }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Tax Rate</label>
                                        <input type="text" name="tax_rate"
                                            class="form-control @error('tax_rate') is-invalid @enderror"
                                            placeholder="Tax Rate">
                                        @error('tax_rate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ {{__($message)}} }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="form-label">{{__("Tax rate")}}</label>
                                        <select name="tax_rate" id="taxRate"
                                            class="form-control priceCal select2  @error('tax_rate') is-invalid @enderror"
                                            style="width: 100%;">
                                            <option value="0" {{old('tax_rate') == '0' ? 'selected' : ''}}>0%</option>
                                            <option value="10" {{old('tax_rate') == '10' ? 'selected' : ''}}>10%</option>
                                            <option value="24" {{old('tax_rate') == '24' ? 'selected' : ''}}>24%</option>
                                        </select>
                                        @error('tax_rate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ {{__($message)}} }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{__("Price")}} (0%)</label>
                                        <input type="text" name="price" value="{{old('price')}}" id="priceInput"
                                            class="form-control priceCal @error('price') is-invalid @enderror"
                                            placeholder="{{__('Price')}}">
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ {{__($message)}} }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{__('Price')}} (incl. tax)</label>
                                        <input type="text" name="price_incl_tax"  id="priceIncTax" value="{{old('price_incl_tax')}}"
                                            class="form-control @error('price_incl_tax') is-invalid @enderror"
                                            placeholder="{{__('Price')}}" readonly>
                                        @error('price_incl_tax')
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
                                        <label class="form-label">{{_('Driver')}}</label>
                                        <select name="driver_id"
                                            class="form-control select2  @error('driver_id') is-invalid @enderror"
                                            style="width: 100%;">
                                            @if ($driver)
                                                @foreach ($driver as $item)
                                                    <option value={{ $item->id }} {{old('driver_id') == $item->id ? 'selected' :''}}> {{ $item->name }}</option>
                                                @endforeach
                                            @else
                                                <option value="100">{{__('No Driver found')}}</option>
                                            @endif
                                        </select>
                                        @error('driver_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ {{__($message)}} }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="form-label">{{__('Vehicle')}}</label>
                                        <select name="equipment_id"
                                            class="form-control select2  @error('equipment_id') is-invalid @enderror"
                                            style="width: 100%;">
                                            @if ($equipment)
                                                @foreach ($equipment as $item)
                                                    <option value={{ $item->id }} {{old('equipment_id') == $item->id ? 'selected' :''}}>{{ $item->reg_no }}</option>
                                                @endforeach
                                            @else
                                                <option value="">{{__('No Vehicle found')}}</option>
                                            @endif
                                        </select>
                                        @error('equipment_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ {{__($message)}} }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('Route')}}</label>
                                        <input type="text" name="route" value="{{old('route')}}"
                                            class="form-control @error('route') is-invalid @enderror"
                                            placeholder="{{__('Route')}}">
                                        @error('route')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ {{__($message)}} }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('Other Wishes')}}</label>
                                        <textarea style="resize:none" rows="5" name="other_wishes"
                                            class="form-control  @error('other_wishes') is-invalid @enderror" placeholder="{{__('Other wishes')}}">{{old('other_wishes')}}</textarea>
                                        @error('other_wishes')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ {{__($message)}} }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <input type="checkbox" id="md_checkbox_4" {{old('mobility_restrictions') == 'on' ? 'checked' :''}}
                                            class="chk-col-info @error('mobility_restrictions') is-invalid @enderror"
                                            name="mobility_restrictions" />
                                        <label for="md_checkbox_4">{{__('Mobility Restrictions')}} </label>
                                        @error('mobility_restrictions')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ {{__($message)}} }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="checkbox" id="md_checkbox_3" {{old('invoiced') == 'on' ? 'checked' :''}}
                                            class="chk-col-success @error('invoiced') is-invalid @enderror"
                                            name="invoiced" />
                                        <label for="md_checkbox_3">{{__('Invoiced')}}</label>
                                        @error('invoiced')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ {{__($message)}} }}</strong>
                                            </span>
                                        @enderror
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


            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
                // startDate: '-3d'
            });
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
                // startDate: '-3d'
            });

            $(".priceCal").on("change",function(){
                var priceIncTax = $("#priceIncTax");
                var priceInput = Number($("#priceInput").val());
                var taxRate = Number($("#taxRate").val());

                var percAmount = (priceInput*taxRate)/100;
                var finalAmount =percAmount+priceInput;
                priceIncTax.val(finalAmount);
                   });
        })
    </script>
@endsection
