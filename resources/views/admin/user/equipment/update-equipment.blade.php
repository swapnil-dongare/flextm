@extends('layouts.admin-dashboard')
@section('title')
    Admin : Update Vehicles
@endsection
@section('sidebar-equipment')
    active
@endsection

@section('main-content')
    <h1>Update Vehicles</h1>
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="box">
                    <form class="form" action="{{ route('equipment.update', $equipment->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="box-body">
                            <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i> Requirements</h4>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Registartion Number</label>
                                        <input type="text" name="reg_no" value="{{ $equipment->reg_no }}"
                                            class="form-control @error('reg_no') is-invalid @enderror"
                                            placeholder="Registration Number">
                                        @error('reg_no')
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
                                        <label class="form-label">Amount Of Seats</label>
                                        <input type="text" name="amount_of_seats"
                                            value="{{ $equipment->amount_of_seats }}"
                                            class="form-control @error('amount_of_seats') is-invalid @enderror"
                                            placeholder="Amount Of Seats">
                                        @error('amount_of_seats')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Equipments in vehicle</label>
                                        <input type="text" name="equipments_in_vehicle"
                                            value="{{ $equipment->equipments_in_vehicle }}"
                                            class="form-control @error('equipments_in_vehicle') is-invalid @enderror"
                                            placeholder="Equipments in vehicle">
                                        @error('equipments_in_vehicle')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="checkbox" id="md_checkbox_3"
                                    class="chk-col-success @error('disablity') is-invalid @enderror" name="disablity"
                                    {{ $equipment->disablity ? 'checked' : '' }} />
                                <label for="md_checkbox_3">Disability</label>
                                @error('disablity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Registartion Year</label>
                                        <input type="text" name="reg_year" value="{{ $equipment->reg_year }}"
                                            id="regYear" class="form-control @error('reg_year') is-invalid @enderror"
                                            placeholder="Registartion Year">
                                        @error('reg_year')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Emission class</label>
                                        <input type="text" name="emmission_classification"
                                            value="{{ $equipment->emmission_classification }}"
                                            class="form-control @error('emmission_classification') is-invalid @enderror"
                                            placeholder="Emission class">
                                        @error('emmission_classification')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-6">
                                    <div class="form-group" style="display: flex">
                                        <label class="form-label " style="width: 200px">Next Inspection</label>

                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="next_inspection"
                                                value="{{ $equipment->next_inspection }}"
                                                class="form-control pull-right @error('next_inspection') is-invalid @enderror"
                                                data-date-format="dd-mm-yyyy" id="datepicker">
                                            @error('next_inspection')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="display: flex">
                                        <label class="form-label mt-2" style="width: 200px">Location</label>
                                        <select class="form-select" name="place_of_business">
                                            <option value="">Select--</option>
                                            @if (sizeof($place) > 0)
                                                @foreach ($place as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $equipment->place_of_business == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            @else
                                                <option value="">No data found</option>
                                            @endif
                                        </select>
                                        @error('place_of_bussiness')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Maintenance</label>
                                <textarea rows="5" name="maintenance" value=""
                                    class="form-control @error('maintenance') is-invalid @enderror" placeholder="Maintenance">{{ $equipment->maintenance }}</textarea>
                                @error('maintenance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
            $("#datepicker").datepicker({
                format:'dd-mm-yyyy'
            })
            $("#regYear").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
        })
    </script>
@endsection
