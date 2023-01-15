@extends('layouts.admin-dashboard')
@section('title')
    Admin : Add Customer
@endsection
@section('sidebar-customer')
    active
@endsection

@section('main-content')
    <h1>Add Customer</h1>
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="box">
                    <form class="form" action="" method="POST">
                        @csrf
                        <div class="box-body">
                            <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Personal Info</h4>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" value="{{old('name')}}"
                                            class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">E-mail</label>
                                        <input type="text" name="email" value="{{old('email')}}"
                                            class="form-control @error('email') is-invalid @enderror" placeholder="E-mail">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Contact Number</label>
                                        <input type="text" name="mobile" value="{{old('mobile')}}"
                                            class="form-control @error('mobile') is-invalid @enderror" placeholder="Phone">
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i> Requirements</h4>
                            <hr class="my-15">
                            <div class="form-group">
                                <label class="form-label">Company</label>
                                <input type="text" name="company_name" value="{{old('company_name')}}"
                                    class="form-control @error('company_name') is-invalid @enderror"
                                    placeholder="Company Name">
                                @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Company Contact Number</label>
                                        <input type="text" name="company_phone" value="{{old('company_phone')}}"
                                            class="form-control @error('company_phone') is-invalid @enderror"
                                            placeholder="Contact Number">
                                        @error('company_phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">VAT-ID</label>
                                        <input type="text" name="vat_id" value="{{old('vat_id')}}"
                                            class="form-control @error('vat_id') is-invalid @enderror" placeholder="VAT-ID">
                                        @error('vat_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Address</label>
                                <textarea rows="3" name="company_address" class="form-control @error('company_address') is-invalid @enderror"
                                    placeholder="Company Address">{{old('company_address')}}</textarea>
                                @error('company_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {{-- <label class="form-label">Post Address</label> --}}
                                <input type="text" name="company_post_address" value="{{old('company_post_address')}}"
                                    class="form-control @error('company_post_address') is-invalid @enderror" placeholder="Post Address">
                                @error('company_post_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {{-- <label class="form-label">Zip Code</label> --}}
                                <input type="text" name="company_zipcode" value="{{old('company_zipcode')}}"
                                    class="form-control @error('company_zipcode') is-invalid @enderror" placeholder="Zip Code">
                                @error('company_zipcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {{-- <label class="form-label">City</label> --}}
                                <input type="text" name="company_city" value="{{old('company_city')}}"
                                    class="form-control @error('company_city') is-invalid @enderror" placeholder="City">
                                @error('company_city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {{-- <label class="form-label">country</label> --}}
                                <input type="text" name="company_country" value="{{old('company_country')}}"
                                    class="form-control @error('company_country') is-invalid @enderror" placeholder="Country">
                                @error('company_country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">

                                <div class="col-md-6">
                                    <input type="checkbox" id="md_checkbox_4" {{old('newsletter') == 'on' ? 'checked' :''}}
                                        class="chk-col-info @error('newsletter') is-invalid @enderror" name="newsletter" />
                                    <label for="md_checkbox_4">Data Privacy Policy accepted</label>
                                    @error('newsletter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" id="md_checkbox_3" {{old('marketing_permission') == 'on' ? 'checked' :''}}
                                        class="chk-col-success @error('marketing_permission') is-invalid @enderror"
                                        name="marketing_permission" />
                                    <label for="md_checkbox_3">All marketing permissions accepted</label>
                                    @error('marketing_permission')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-warning me-1">
                                <i class="ti-trash"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="ti-save-alt"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
@endsection
