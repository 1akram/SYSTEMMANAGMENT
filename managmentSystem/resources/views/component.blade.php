@extends('mainLayout.main')
@section('pageTitle'  )
   component
@endsection
@section('customCSS')
 
@endsection
@section('content')
        {{-- alert msg --}}
        @include('includes.alertMsg')
        {{-- end alert msg --}}
       
        
        <!-- start add component  -->
        <div class="section  container ">
            <div class="form-holder bg-second">
                <form method="POST" enctype="multipart/form-data" action="{{route('saveComponent')}}" class="linear-form">
                    <div class="col-sm-12 col-md-4">
                        @csrf
                        <input type="text" placeholder="type" name="type" value="{{old('type')}}" class="input">
                        <input type="text" placeholder="model" name="model" value="{{old('model')}}"  class="input">
                        <input type="text" placeholder="refrence" name="refrence" value="{{old('refrence')}}"  class="input">
                        <div class="input">
                            <input type="file"data-target="#add-component-target" id="files" style="display:none;font-size: 0.8em;"   class="input" accept="image/png, image/jpg, image/jpeg" name="image">
                           
                            <span id="add-component-target" class="js-files-names color-third">no image selectd</span>
                            <label for="files" class="btn">Select Image</label>
                        </div>

                    </div>
                   
                    <div class="col-sm-12 col-md-4">
                        <input type="submit" class="btn input" value="add">

                    </div>


                </form>

            </div>
        </div>
        <!-- end  add component  -->
        <!-- search section  -->
        @include('includes.searchComponentForm')
        <!-- end search section  -->

        <!-- table section  -->
        <div class="section container">
            <div class="table-holder">
                 
                    <div class=" table-header ">
                        <div class="col-sm">id</div>
                        <div class="col-sm">image</div>
                        <div class="col-sm">type</div>
                        <div class="col-sm">model</div>
                        <div class="col-sm">refrence</div>
                        <div class="col-sm">actions</div>
                    </div>
                    <div class="table-body">
                        @if (empty($components)||count($components)<1)
                            {{'no components yet'}}
                        @else
                            
                            @foreach ($components as $component)
                                <!-- tr -->
                                <div class="row tr">
                                    <div class="col-sm-12 col-md">{{$component->id}}</div>
                                    <div class="col-sm-12 col-md">
                                        <div class="image-holder">
                                            <img src="@if (empty($component->url))
                                                img/defaultNoteImage.jpg
                                            @else
                                                {{asset($component->url)}}
                                            @endif" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md ">{{$component->type}}</div>
                                    <div class="col-sm-12 col-md ">{{$component->model}}</div>
                                    <div class="col-sm-12 col-md">{{$component->refrence}}</div>
                                    <div class="col-sm-12 col-md">
                                        <a href="#" class="js-editComponent"data-id="{{$component->id}}" ><i class="fas fa-edit"></i></a>
                                        <a href="{{route('deleteComponent',['id'=>$component->id])}}"><i class="fas fa-trash"></i></a>
                                        <a href="#" class="js-showComponent" data-id="{{$component->id}}"><i class="fas fa-eye"></i></a>
                                    </div>
                                    
                                </div>
                                <!-- tr --> 

                            @endforeach
                        @endif
                    </div>
                    
              

            </div>

        </div>

        <!-- end table section  -->
        <div class=" " id="Details">
 
        </div>
     
        

        </div>
         


@endsection

@section('customJS')
    
    <script type="text/javascript">
  
        
        $( ".js-showComponent" ).click(function() {
            console.log('dfd');
             
            $.get( "/component/"+ $(this).attr('data-id'), function( data ) {
                $( "#Details" ).html( data );
                
            });
        });
        $( ".js-editComponent" ).click(function() {
            
             
           
            $.get( "/component/edit/"+ $(this).attr('data-id'), function( data ) {
                $( "#Details" ).html( data );
                
            });
        });
        
    </script>
@endsection