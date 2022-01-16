@extends('admin.admin_master')
@section('content')
<div class="container">

 <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Slider
  </button>
  <table class="table table-white m-0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Slider Details</th>
        <th>Slider Immage</th>
        <th>Slider Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($select_all_slider as $select_all_sliders)
      <tr>
        <td scope="row">{{$select_all_sliders->slider_id}}</td>
        <td>{{$select_all_sliders->slider_details}}</td>
        <td>
          <img width="100px" height="auto" src="{{asset('./frontend_upload_asset/general_settings/slider/'.$select_all_sliders->slider_image)}}">
        </td>
        <td>
          @if($select_all_sliders->slider_status==0)
          <a href="{{url('admin/change-slider-status/'.$select_all_sliders->slider_id)}}"><button class="btn btn-danger"><i class="bi bi-exclamation-triangle"></i></button></a>
          @elseif($select_all_sliders->slider_status==1)
          <a href="{{url('admin/change-slider-status/'.$select_all_sliders->slider_id)}}">
            <button class="btn btn-info text-white"><i class="bi bi-check-circle-fill"></i></button>
          </a>
          @endif
        </td>
        <td>
          <a href="{{url('admin/slider-delete/'.$select_all_sliders->slider_id)}}" class=" text-white">
            <button class="btn btn-danger ">
            <i class="bi bi-trash-fill"></i>

            </button>
          </a>
          <a href="{{url('admin/single-slider-select/'.$select_all_sliders->slider_id)}}" class=" text-white">
            <button class=" btn btn-info"><i class="bi bi-pencil-square"></i></button>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#f46f22;color:white">
        <h5 class="modal-title" id="exampleModalLabel">Add Slider</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form method="post" action="store-slider" enctype="multipart/form-data">
      <div class="modal-body">
       
          @csrf
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" style="background:#f46f22;color:white" class="btn ">Save changes</button>
        </div>
      </form>
    </div>
    
  </div>
</div>
@endsection