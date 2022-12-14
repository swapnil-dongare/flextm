@extends('layouts.admin-dashboard')
@section('title')
    Admin : Update Driver
@endsection
@section('sidebar-driver')
    active
@endsection

@section('main-content')
    <h1>Update Driver</h1>
    <div class="container">

        <div class="row">
            <div class="col-lg-2 col-12"></div>
            <div class="col-lg-8 col-12">
                <div class="box">
                    <form class="form" method="POST" action="{{route('driver.update',['driver'=>$driver->id])}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="box-body">
                            <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Personal Info</h4>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                                            value="{{ $driver->name }}">
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
                                        <input type="text" name="email"
                                            class="form-control @error('email') is-invalid @enderror" placeholder="E-mail"
                                            value="{{ $driver->email }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Mobile</label>
                                        <input type="text" name="mobile"
                                            class="form-control @error('mobile') is-invalid @enderror" placeholder="Phone"
                                            value="{{ $driver->mobile }}">
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
                                <label class="form-label">Directives</label>
                                <input type="text" name="directive"
                                    class="form-control @error('directive') is-invalid @enderror" placeholder="Directives"
                                    value="{{ $driver->directive }}">
                                @error('directive')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Liscenses</label>
                                        <input type="text" name="liscense_no"
                                            class="form-control @error('liscense_no') is-invalid @enderror"
                                            placeholder="Liscense Number" value="{{ $driver->liscense_no }}">
                                        @error('liscense_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Social Security Number</label>
                                        <input type="text" name="social_security_no"
                                            class="form-control @error('social_security_no') is-invalid @enderror"
                                            placeholder="Social Security Number"
                                            value="{{ $driver->social_security_no }}">
                                        @error('social_security_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Language</label>
                                        <select class="form-control select2  @error('language_id') is-invalid @enderror"
                                            name="language_id" style="width: 100%;">
                                            @if ($language)
                                                @foreach ($language as $item)
                                                    <option value={{ $item->id }} {{$driver->language_id == $item->id ? 'selected':''}}>{{ $item->name }}</option>
                                                @endforeach
                                            @else
                                                <option value="">NO Language found</option>
                                            @endif
                                        </select>
                                        @error('language_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="display: flex;margin-top:30px">
                                        <label class="form-label " style="width: 100px">Valid until:</label>

                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="valid_until" class="form-control pull-right"
                                            data-date-format="yyyy-mm-dd" id="datepicker"
                                            value="{{ $driver->valid_until }}">
                                        @error('valid_until')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Address</label>
                                <textarea rows="5" name="address" class="form-control @error('address') is-invalid @enderror"
                                    placeholder="Company Address" value="{{ $driver->address }}"></textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">

                                <div class="row">
                                    <div class="col-md-4 m-2">
                                        <div class="form-group">
                                            <input type="checkbox" id="md_checkbox_3"
                                                class="chk-col-success @error('expired') is-invalid @enderror"
                                                name="expired" @if ($driver->expired) checked @endif />
                                            <label for="md_checkbox_3">Expired</label>
                                            @error('expired')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="image" style="margin-top: 100px">Select Image</label>
                                    </div>
                                    <div class="col-md-10 text-center">
                                        <input type="file" id="image" name="image" id="profile_image" hidden>
                                        <img width="50%" id="img_frame" style="cursor: pointer"
                                            @if ($driver->profile_url) src="{{ asset(Storage::url($driver->profile_url)) }}"
                                            @else
                                            src="{{ asset('images/avtar.png') }}" @endif>
                                    </div>
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
