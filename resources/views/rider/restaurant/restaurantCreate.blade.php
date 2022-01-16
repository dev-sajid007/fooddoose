@extends('merchant.restaurant.index')

@section('restaurant_content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header" style="background: #f46f22">
                    <h5 class="fw-bold text-white">Restaurant Create</h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form method="post" action="{{ route('merchant.restaurant.store') }}">
                            @csrf
                            <div class="form-group mt-3">
                                <label for="exampleInputEmail1">Restaurant Name</label>
                                <input class="form-control" type="text" name="name" placeholder="Restaurant Name">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Restaurant Address</label>
                                        <input class="form-control" type="text" name="address"
                                            placeholder="Restaurant Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Contact Number</label>
                                        <input class="form-control" type="text" name="contact_no"
                                            placeholder="Phone Number">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleInputEmail1">URL Link</label>
                                <input class="form-control" type="url" name="url_link" placeholder="https//example.com">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Longitude</label>
                                        <input class="form-control" type="number" name="longitude" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Latitude</label>
                                        <input class="form-control" type="number" name="latitude" placeholder="0.00">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h4 class="mt-3">Restaurant Schedule</h4>
                                <div class="col-md-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="isSundayCheck">
                                        <label class="form-check-label" for="isSundayCheck">
                                            Sunday
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="isMondayCheck">
                                        <label class="form-check-label" for="isMondayCheck">
                                            Monday
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1 ms-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="isTuesdayCheck">
                                        <label class="form-check-label" for="isTuesdayCheck">
                                            Tuesday
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1 ms-2 me-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="isWedCheck">
                                        <label class="form-check-label" for="isWedCheck">
                                            Wednesday
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1 ms-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="isThurdayCheck">
                                        <label class="form-check-label" for="isThurdayCheck">
                                            Thursday
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1 ms-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="isFridayCheck">
                                        <label class="form-check-label" for="isFridayCheck">
                                            Friday
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1 ms-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="isSatdayCheck">
                                        <label class="form-check-label" for="isSatdayCheck">
                                            Saturday
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Start Time</label>
                                        <input class="form-control" type="number" name="longitude" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Close Time</label>
                                        <input class="form-control" type="number" name="latitude" placeholder="0.00">
                                    </div>
                                </div>
                            </div>
                            <button type="submit"
                                class="justify-content-end float-end btn btn-outline-success mt-4">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

















{{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #f46f22">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Restaurant Create</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
{{-- </div>

            <form method="post" action="{{route('merchant.restaurant.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Restaurant Name</label>
                        <input class="form-control" type="text" name="name" placeholder="Restaurant Name">
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Restaurant Address</label>
                        <input class="form-control" type="text" name="address"
                               placeholder="Restaurant Address">
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Contact Number</label>
                        <input class="form-control" type="text" name="contact_no"
                               placeholder="Phone Number">
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">URL Link</label>
                        <input class="form-control" type="url" name="url_link" placeholder="https//example.com">
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Longitude</label>
                        <input class="form-control" type="number" name="longitude" placeholder="0.00">
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Latitude</label>
                        <input class="form-control" type="number" name="latitude" placeholder="0.00">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
