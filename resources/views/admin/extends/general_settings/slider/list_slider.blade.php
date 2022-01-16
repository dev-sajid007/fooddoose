@extends('admin.admin_master')
@section('content')
<div class="frame-wrap">

 @if ($message = Session::get('message'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>success!</strong> {{ Session::get('message') }}  .
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  @endif

  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
  Add Slider
  </button>
  <table class="table table-white m-0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Slider Details</th>
        <th>Slider Immage</th>
        <th>Slider Status</th>
        <th>Language</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($select_all_slider as $select_all_sliders)
      <tr>
        <td scope="row">{{$select_all_sliders->slider_id}}</td>
        <td>{{$select_all_sliders->slider_details}}</td>

          <img width="100px" height="auto" src="{{asset('./frontend_upload_asset/general_settings/slider/'.$select_all_sliders->slider_image)}}">
        </td>
        <td>
          @if($select_all_sliders->slider_status==0)
          <a href="{{url('admin/change-slider-status/'.$select_all_sliders->slider_id)}}"><button class="btn btn-danger"><i class="fas fa-exclamation-triangle"></i></button></a>
          @elseif($select_all_sliders->slider_status==1)
          <a href="{{url('admin/change-slider-status/'.$select_all_sliders->slider_id)}}">
            <button class="btn btn-info text-white"><i class="fas fa-check-circle"></i></button>
          </a>
          @endif
        </td>
        <td>
          @if($select_all_sliders->language==1)
          <p>Bangla</p>
          @elseif($select_all_sliders->language==2)
          <p>English</p>
          @endif
        </td>
        <td>
          <a href="{{url('admin/slider-delete/'.$select_all_sliders->slider_id)}}" class=" text-white">
            <button class="btn btn-danger ">
            <i class="fa fa-trash"></i>

            </button>
          </a>
          <a href="{{url('admin/single-slider-select/'.$select_all_sliders->slider_id)}}" class=" text-white">
            <button class=" btn btn-info"><i class="fas fa-edit"></i></button>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <!-- Button trigger modal -->
  <!-- Modal -->
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#f46f22;color:white">
        <h5 class="modal-title" id="exampleModalLabel">Add Slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{url('admin/store-slider')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="form-label"  for="simpleinput">Header 1</label>
            <input  name="header_1" type="text"  class="form-control" placeholder="Header 1">
          </div>
          <div class="form-group">
            <label class="form-label"  for="simpleinput">Header 2</label>
            <input  name="header_2" type="text"  class="form-control" placeholder="Header 2">
          </div>
          <div class="form-group">
            <label for="slider_details">Slider Details</label>
            <textarea type="text" name="slider_details" class="form-control" id="slider_details" aria-describedby="emailHelp" placeholder="Enter Slider Details"></textarea>

          </div>
          <div class="form-group">
            <label for="slider_details">Slider Link</label>
            <input type="text" name="slider_link" class="form-control" id="slider_details" aria-describedby="emailHelp" placeholder="Enter slider Link">
          </div>
          <div class="form-group">
            <label for="slider_details">Slider Immage</label>
            <input type="file"  name="slider_immage" class="form-control" id="slider_details" aria-describedby="emailHelp" placeholder="Enter slider Link">

          </div>
          <div class="form-group">
            <label class="form-label" for="">Select Language</label>
            <div class="form-group">
              <div class="input-group">
                <select class="custom-select " name="language"  id="language" required="">
                  <option value="1" selected="">Bangla</option>
                  <option value="2">English</option>
                </select>
                <div class="input-group-append">
                  <label class="input-group-text" for="">Language</label>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" style="background:#f46f22;color:white" class="btn ">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
