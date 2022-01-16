@extends('merchant.restaurant.index')

@section('restaurant_content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header" style="background: #f46f22">
                    <h5 class="fw-bold text-white">Restaurant Edit</h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form method="POST" action="{{ route('merchant.restaurant.update', $restaurant->restaurant_id) }}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="form-group mt-3">
                                <label for="exampleInputEmail1">Restaurant Name</label>
                                <input class="form-control" type="text" name="name" placeholder="Restaurant Name" value="{{$restaurant->restaurant_name}}">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Restaurant Address</label>
                                        <input class="form-control" type="text" name="address" value="{{$restaurant->address}}"
                                               placeholder="Restaurant Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Contact Number</label>
                                        <input class="form-control" type="text" name="contact_no" value="{{$restaurant->contact_no}}"
                                               placeholder="Phone Number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">TIN No</label>
                                        <input class="form-control" type="number" name="tin" placeholder="Enter TIN Number" value="{{$restaurant->tin}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">URL Link</label>
                                        <input class="form-control" type="url" name="url_link" placeholder="https//example.com" value="{{$restaurant->url_link}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Longitude</label>
                                        <input class="form-control" type="number" name="longitude" placeholder="0.00" value="{{$restaurant->longitude}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Latitude</label>
                                        <input class="form-control" type="number" name="latitude" placeholder="0.00" value="{{$restaurant->latitude}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Banner Image</label>
                                        <input class="form-control" type="file" name="image" accept=".jpg, .png, .gif"
                                               onchange="readURL(this, 'photoView');">
                                        <b id="photoViewAlert" class="text-danger hide">
                                            Maximum allowed size is 5 MB
                                        </b><br>
{{--                                        <img src="{{ asset('images/restaurant_images/' . $restaurant->image) }}" class="mt-2 img-fluid img-thumbnail {{$restaurant->image? '': 'd-none'}}">--}}
                                        <img id="photoView" src="{{ asset('images/restaurant_images/' . $restaurant->image) }}" alt="image" class="mt-2 img-fluid img-thumbnail {{ $restaurant->image ? '': 'd-none'}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h4 class="mt-3">Restaurant Schedule</h4>
                                <div class="col-md-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" {{$restaurant->schedule->sunday ? 'checked' : ''}} name="sunday" id="isSundayCheck">
                                        <label class="form-check-label" for="isSundayCheck">
                                            Sunday
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" {{$restaurant->schedule->monday ? 'checked' : ''}} name="monday" id="isMondayCheck">
                                        <label class="form-check-label" for="isMondayCheck">
                                            Monday
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1 ms-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="tuesday" {{$restaurant->schedule->tuesday ? 'checked' : ''}} id="isTuesdayCheck">
                                        <label class="form-check-label" for="isTuesdayCheck">
                                            Tuesday
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1 ms-2 me-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="wednesday" {{$restaurant->schedule->wednesday ? 'checked' : ''}} id="isWedCheck">
                                        <label class="form-check-label" for="isWedCheck">
                                            Wednesday
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1 ms-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="thursday" {{$restaurant->schedule->thursday ? 'checked' : ''}} id="isThurdayCheck">
                                        <label class="form-check-label" for="isThurdayCheck">
                                            Thursday
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1 ms-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="friday" {{$restaurant->schedule->friday ? 'checked' : ''}} id="isFridayCheck">
                                        <label class="form-check-label" for="isFridayCheck">
                                            Friday
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1 ms-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="saturday" {{$restaurant->schedule->saturday ? 'checked' : ''}} id="isSatdayCheck">
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
                                        <input class="form-control" type="time" name="opening_time" value="{{$restaurant->schedule->shop_open}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">Close Time</label>
                                        <input class="form-control" type="time" name="closing_time" value="{{$restaurant->schedule->shop_close}}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit"
                                    class="justify-content-end float-end btn btn-outline-success mt-4">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
