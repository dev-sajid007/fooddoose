@extends('merchant.rider.index')

@section('rider_content')
    <form method="post" class="row ms-4" action="{{ route('merchant.rider.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-7 mb-3">
            <div class="card">
                <div class="card-header" style="background: #f46f22">
                    <h5 class="fw-bold text-white">Rider Add</h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Enter Name">
                        </div>
                        @if ($errors->has('name'))
                            <span class="text-danger">
                                    <p>{{ $errors->first('name') }}</p>
                                </span>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="exampleInputEmail1">Email Address</label>
                                    <input class="form-control" type="email" name="email"
                                           placeholder="Enter Email Address">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="text-danger">
                                    <p>{{ $errors->first('email') }}</p>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="exampleInputEmail1">Contact Number</label>
                                    <input class="form-control" type="tel" name="phone"
                                           placeholder="Enter Phone Number">
                                </div>
                                @if ($errors->has('phone'))
                                    <span class="text-danger">
                                    <p>{{ $errors->first('phone') }}</p>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input class="form-control" type="text" name="address"
                                           placeholder="Enter Address">
                                </div>
                                @if ($errors->has('address'))
                                    <span class="text-danger">
                                    <p>{{ $errors->first('address') }}</p>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input class="form-control" type="password" name="password"
                                           placeholder="*******">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="text-danger">
                                    <p>{{ $errors->first('password') }}</p>
                                </span>
                                @endif
                            </div>
                        </div>
                        <button type="submit"
                                class="justify-content-end float-end btn btn-outline-success mt-4">Save
                        </button>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header" style="background: #f46f22">
                    <h5 class="fw-bold text-white">Profile Image</h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">Image</label>
                            <input class="form-control" type="file" name="image" accept=".jpg, .png, .gif"
                                   onchange="readURL(this, 'profileImageView');">
                            <b id="profileImageViewAlert" class="text-danger hide">
                                Maximum allowed size is 5 MB
                            </b>
                            <img id="profileImageView" alt="image" class="mt-2 img-fluid img-thumbnail hide">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
