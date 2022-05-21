@extends('layouts.mainlayout',['activePage' => 'student_edit'])
      @section('page_content')

      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">@lang('dashboard.edit_student')</h4>
                  <p class="card-description">
                    @lang('dashboard.please_enter_required_information')
                  </p>
                  <form class="forms-sample" method="POST" action="{{URL('student/update/'.$id .'?lang='. app()->getLocale())}}">
                    @csrf
                    <div class="form-group">
                      <label for="name">@lang('dashboard.name')</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{$student['name']}}">
                    </div>

                     <div class="form-group">
                      <label for="identification_number">@lang('dashboard.identification_number')</label>
                      <input type="text" class="form-control" id="identification_number" name="identification_number" value="{{$student['identification_number']}}">
                    </div>

                    <div class="form-group">
                      <label for="address">@lang('dashboard.address')</label>
                      <input type="text" class="form-control" id="address" name="address" value="{{$student['address']}}">
                    </div>

                    

                    <div class="form-group">
                      <label for="email">@lang('dashboard.email')</label>
                      <input type="email" class="form-control" name="email" id="email" value="{{$student['email']}}">
                    </div>

                    <div class="form-group">
                      <label for="phone">@lang('dashboard.phone')</label>
                      <input type="phone" class="form-control" name="phone" id="phone" value="{{$student['phone']}}">
                    </div>

                    
                    <div class="form-group">
                      <label for="gender">@lang('dashboard.gender')</label>
                        <select class="form-control" name="gender" id="gender">
                          <option value="Male" @if($student['gender'] == "Male") selected @endif >@lang('dashboard.male')</option>
                          <option value="Female" @if($student['gender'] == "Female") selected @endif>@lang('dashboard.female')</option>
                        </select>
                      </div>

                    <div class="form-group">
                      <label for="section">@lang('dashboard.section')</label>
                        <select class="form-control" name="section" id="section">
                          <option value="-1">@lang('dashboard.select_section')</option>
                          @foreach($sections as $key => $section)
                            <option value="{{$key}}" @if($key == $student['section']) selected @endif >{{$section["name"]}}</option>
                          @endforeach
                        </select>

                      </div>
                       <div class="form-group">
                         <label>@lang('dashboard.select_location')</label>
                         <div id="map" style="height:400px; " class="my-3"></div>
                       </div>
                      
                      <script>
                          let map;
                          let pos = { lat: 31.490077, lng: 34.462188 };

                         

                          let data =document.getElementById('lng').value;



                          function initMap() {
                              map = new google.maps.Map(document.getElementById("map"), {
                                  center: pos,
                                  zoom: 12,
                                  scrollwheel: true,
                              });
                              const current = { lat: 31.490077, lng: 34.462188 };
                              
                              // const currentLoc =  {lat: latitude , lng:longitude}
                              let marker = new google.maps.Marker({
                                  position: current,
                                  map: map,
                                  title:pos['lat']+'//'+pos['lng'],
                                  draggable: true,
                              });
                              // google.maps.event.addListener(marker,'position_changed',
                              //     function (){
                              //         let lat = marker.position.lat()
                              //         let lng = marker.position.lng()
                              //         $('#lat').val(lat);
                              //         $('#lng').val(lng);
                              //     });
                              google.maps.event.addListener(marker,'dragend', function(evt) {
                                  document.getElementById('lat').value = this.getPosition().lat();
                                  document.getElementById('lng').value = this.getPosition().lng();
                              });
                                          google.maps.event.addListener(map,'dragend',
                                          function (event){
                                              pos = event.latLng
                                              marker.setTitle("title");
                                              marker.setPosition(pos);


                                          })
                                      }

                              </script>

                               <div class=" form-group col-12" >
        <!--                          <a class="btn btn-block btn-primary btn-sm font-weight-medium" href="{{url('select_location' .'?lang=' .app()->getLocale())}}">select Location</a>
         -->                              <div class="row">
                                              <div class="form-group name1 col-md-3">
                                         <input type="hidden" class="form-control" name="lat" id="lat" aria-describedby="emailHelp" value="{{$student['lat']}}">
                                              </div>

                                              <div class="form-group name2 col-md-3">
                                                  <input  type="hidden" class="form-control" name="lng" id="lng"  aria-describedby="emailHelp" value="{{$student['long']  }}">
                                              </div>
                                          </div>
                                                              
                                       
                                   
                                 </div>
                    <!--   <div class=" form-group col-3">
                         <a class="btn btn-block btn-primary btn-sm font-weight-medium" href="{{url('select_location'.'?id=') . $id .'&lng=' . $student['long'] .'&lat=' . $student['lat'] .'&lang=' .app()->getLocale()}}">Change Location</a>
                         <input type="text" class="form-control" name="lat" id="pos"  value="{{session()->has('lat') ? Session::get('lat') : $student['lat']  }}">
                         <input type="text" class="form-control" name="lng" id="pos"  value="{{session()->has('lng') ? Session::get('lng') : $student['long']  }}">
                         <input type="text" class="form-control" name="id" id="id"  value="{{session()->has('id') ? Session::get('id') : $id }}">
                      
                      </div> -->
                     
                       


                      
                   
                    <button type="submit" class="btn btn-primary mr-2">@lang('dashboard.edit')</button>
                    <button class="btn btn-light">@lang('dashboard.cancel')</button>
                  </form>
                </div>
              </div>
            </div>
            </div>

          </div>
        @stop