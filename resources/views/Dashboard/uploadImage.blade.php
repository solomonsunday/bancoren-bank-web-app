@extends('layouts.dasboardlayout')

@section('dashboard-header')
    <div class="breadcrumb text-center">
        <div class="section-headline white-headline text-center">
            Settings
        </div>
        <ul>
            <li class="home-bread">Dashboard</li>
            <li>settings</li>
        </ul>
    </div>
@endsection

@section('pageStyle')
    <style>
        form{
                position: absolute;
                top: 200%;
                left: 50%;
                margin-top: -100px;
                margin-left: -250px;
                width: 500px;
                height: 200px;
                border: 4px dashed #fff;
                }
                form p{
                width: 100%;
                height: 100%;
                text-align: center;
                line-height: 170px;
                color: #ffffff;
                font-family: Arial;
                }
                form input{
                position: absolute;
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
                outline: none;
                opacity: 0;
                }
                form button{
                margin: 0;
                color: #fff;
                background: #16a085;
                border: none;
                width: 508px;
                height: 35px;
                margin-top: -20px;
                margin-left: -4px;
                border-radius: 4px;
                border-bottom: 4px solid #117A60;
                transition: all .2s ease;
                outline: none;
                }
                form button:hover{
                background: #149174;
                    color: #0C5645;
                }
                form button:active{
                border:0;
                }
                #imagePreview{
                    width: 192px;
                    height: 192px;
                }
    </style>

@endsection

@section('content-body')

      <div class="col-md-9 col-sm-9 col-xs-12">
         <div class="dashboard-content">
              <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12">
                       <div class="form-text">
                              <h4 class="form-top">Upload Image</h4>
                               <div class="form-inner">
                                   <div class="alert alert-success" style="display:none;"></div>

                                   @if (session('success'))
                                       <div class="alert alert-success">
                                        {{ session('success') }}
                                        </div>
                                   @endif

                                   @if (session('danger'))
                                        <div class="alert alert-danger">
                                            {{ session('danger') }}  

                                        </div>
                                    @endif

                                   <form action="{{route('upload.image')}}" method="POST" enctype="multipart/form-data">
                                        <input type="file" name="image">
                                        @csrf
                                        {{-- <p id="imagePreview">Drag your file here or click in this area</p> --}}

                                        <button type="submit" style="margin-top:30px;">Upload</button>
                                   </form>

                               </div>

                               </div>
                 </div>
              </div>
         </div>
      </div>
    
@endsection

@section('scripts')
      <script>
            $('form input').change(function () {
                //$('form p').text(this.files.length + " file(s) selected");

                readURL(this)
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
        }
            reader.readAsDataURL(input.files[0]);
     }
    }
      </script>
  
@endsection