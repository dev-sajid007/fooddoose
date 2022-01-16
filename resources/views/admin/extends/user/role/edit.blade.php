@extends('admin.admin_master')
@section('content')
<div class="row">
  <div class="col-lg-12 text-right">
   

    <a href="{{ route('admin-role-index') }}"><button class="btn btn-dark text-right">{{ __('Back To Role') }} Back To Role</button></a>
  </div>
</div>
<div class="add-product-content">
  <div class="row">
    <div class="col-lg-12">
      <div class="product-description">
        <div class="body-area">
          <div class="gocover" style="background: url({{asset('assets/images/')}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
          <form id="geniusform" action="{{route('admin-role-update',$data->role_id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @include('admin.include.admin.form-both')
            <div class="row">
              <div class="col-lg-4">
                <div class="left-area">
                  <h4 class="heading">{{ __("Name") }} *</h4>
                  <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                </div>
              </div>
              <div class="col-lg-7">
                <input type="text" class="input-field" name="name" placeholder="{{ __('Name') }}" value="{{$data->name}}" required="">
              </div>
            </div>
            <hr>
            <h5 class="text-center text-danger font-weight-bold">{{ __('Frontend Request') }}</h5>
            <hr>
         
            
           
            
           
           
            <div class="row justify-content-center">
              <div class="col-lg-4 d-flex justify-content-between">
                <label class="control-label">{{ __('Contact Us') }} *</label>
                <label class="switch">
                  <input type="checkbox" name="section[]" value="contact_us" {{ $data->sectionCheck('contact_us') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>
              </div>
              <div class="col-lg-2">
                 <label class="control-label">{{ __('Request Section') }} *</label>
<label class="switch">
                  <input type="checkbox" name="section[]" value="frontend_request" {{ $data->sectionCheck('frontend_request') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>

              </div>
              <div class="col-lg-4 d-flex justify-content-between">
                <label class="control-label">{{ __('Subscribe Us') }} *</label>
                <label class="switch">
                  <input type="checkbox" name="section[]" value="subscribe_us" {{ $data->sectionCheck('subscribe_us') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <!-- start general setting -->
          

            <!-- Branch Managment -->
            <hr>
            <h5 class="text-center text-danger font-weight-bold">{{ __('Branch Managment') }}</h5>
            <hr>
             <div class="row justify-content-center">
              <div class="col-lg-4 d-flex justify-content-between">
                <label class="control-label">{{ __('Manage Branch') }} *</label>
                <label class="switch">
                  <input type="checkbox" name="section[]" value="manage_branch" {{ $data->sectionCheck('manage_branch') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>
              </div>
              <div class="col-lg-2">
                 <label class="control-label">{{ __('Branch Section') }} *</label>
<label class="switch">
                  <input type="checkbox" name="section[]" value="branch_section" {{ $data->sectionCheck('branch_section') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>

              </div>
              <div class="col-lg-4 d-flex justify-content-between">
                <label class="control-label">{{ __('Rider Managment') }} *</label>
                <label class="switch">
                  <input type="checkbox" name="section[]" value="rider_managment" {{ $data->sectionCheck('rider_managment') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
  <!-- area managment -->
            <hr>
            <h5 class="text-center text-danger font-weight-bold">{{ __('Area Managment') }}</h5>
            <hr>
             <div class="row justify-content-center">
              <div class="col-lg-4 d-flex justify-content-between">
                <label class="control-label">{{ __('Manage District') }} *</label>
                <label class="switch">
                  <input type="checkbox" name="section[]" value="district_setting" {{ $data->sectionCheck('district_setting') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>
              </div>
              <div class="col-lg-2">
                 <label class="control-label">{{ __('Area Section') }} *</label>
<label class="switch">
                  <input type="checkbox" name="section[]" value="area_section" {{ $data->sectionCheck('area_section') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>

              </div>
              <div class="col-lg-4 d-flex justify-content-between">
                <label class="control-label">{{ __('Area Managment') }} *</label>
                <label class="switch">
                  <input type="checkbox" name="section[]" value="area_setting" {{ $data->sectionCheck('area_setting') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <!-- end area managment -->
            <!-- end branch managment -->
            <hr>
            <h5 class="text-center text-danger font-weight-bold">{{ __('General Setting') }}</h5>
            <hr>


  <div class="row justify-content-center">
              <div class="col-lg-4 d-flex justify-content-between">
                <label class="control-label">{{ __('Website Section') }} *</label>
                <label class="switch">
                  <input type="checkbox" name="section[]" value="website_section" {{ $data->sectionCheck('website_section') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>
              </div> 
              <div class="col-lg-2"></div>
              <div class="col-lg-4 d-flex justify-content-between">
                <label class="control-label">{{ __('Website Setting') }} *</label>
                <label class="switch">
                  <input type="checkbox" name="section[]" value="website_setting" {{ $data->sectionCheck('website_setting') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-4 d-flex justify-content-between">
                <label class="control-label">{{ __('Website Slider') }} *</label>
                <label class="switch">
                  <input type="checkbox" name="section[]" value="website_slider" {{ $data->sectionCheck('website_slider') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>
              </div>
              <div class="col-lg-2"></div>
              <div class="col-lg-4 d-flex justify-content-between">
                <label class="control-label">{{ __('Website Footer Page') }} *</label>
                <label class="switch">
                  <input type="checkbox" name="section[]" value="website_footer_page" {{ $data->sectionCheck('website_footer_page') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-4 d-flex justify-content-between">
                <label class="control-label">{{ __('Frontend Review') }} *</label>
                <label class="switch">
                  <input type="checkbox" name="section[]" value="frontend_review" {{ $data->sectionCheck('frontend_review') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>
              </div>
              <div class="col-lg-2"></div>
              <div class="col-lg-4 d-flex justify-content-between">
                <label class="control-label">{{ __('Website About Us') }} *</label>
                <label class="switch">
                  <input type="checkbox" name="section[]" value="website_about_us" {{ $data->sectionCheck('website_about_us') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-4 d-flex justify-content-between">
                <label class="control-label">{{ __('Website Social Link') }} *</label>
                <label class="switch">
                  <input type="checkbox" name="section[]" value="website_social_links" {{ $data->sectionCheck('website_social_links') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>
              </div>
              <div class="col-lg-2"></div>
               <div class="col-lg-4 d-flex justify-content-between">
                <label class="control-label">{{ __('Team Members') }} *</label>
                <label class="switch">
                  <input type="checkbox" name="section[]" value="team_members" {{ $data->sectionCheck('team_members') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>
              </div>
             
            </div>

            <!-- end general setting -->
            <hr>
            <h5 class="text-center text-danger font-weight-bold">{{ __('User Managment') }}</h5>
            <hr>
            
            <div class="row justify-content-center">
              <div class="col-lg-4 d-flex justify-content-between">
                <label class="control-label">{{ __('Human Resource Section') }} *</label>
                <label class="switch">
                  <input type="checkbox" name="section[]" value="HRM_Sector" {{ $data->sectionCheck('HRM_Sector') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>
              </div>
              <div class="col-lg-2">
                 <label class="control-label">{{ __('Manage Staff') }} *</label>
                <label class="switch">
                  <input type="checkbox" name="section[]" value="manage_staff" {{ $data->sectionCheck('manage_staff') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>

              </div>
              <div class="col-lg-4 d-flex justify-content-between">
                <label class="control-label">{{ __('Marchants') }} *</label>
                <label class="switch">
                  <input type="checkbox" name="section[]" value="marchant_managment" {{ $data->sectionCheck('marchant_managment') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            


             <div class="row justify-content-center">
              <div class="col-lg-4 d-flex justify-content-between">
                <label class="control-label">{{ __('Create Role') }} *</label>
                <label class="switch">
                  <input type="checkbox" name="section[]" value="create_role" {{ $data->sectionCheck('create_role') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>
              </div>
              <div class="col-lg-2"></div>
              <div class="col-lg-4 d-flex justify-content-between">
                <label class="control-label">{{ __('Manage Role') }} *</label>
                <label class="switch">
                  <input type="checkbox" name="section[]" value="role_managment" {{ $data->sectionCheck('role_managment') ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

           


            <div class="row">
              <div class="col-lg-5">
                <div class="left-area">
                  
                </div>
              </div>
              <div class="col-lg-7">
                <button class="btn btn-danger" type="submit">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection