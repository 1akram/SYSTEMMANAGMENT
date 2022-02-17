@extends('mainLayout.main')
@section('pageTitle'  )
@lang('mother Board')
@endsection
@section('customCSS')

@endsection
@section('content')
      
        {{-- alert msg --}}
        @include('includes.alertMsg')
        {{-- end alert msg --}}
       <!-- start add motherBoard  -->
       <div class="section  container ">
        <div class="form-holder bg-second">
            <form action="{{route('saveMotherBoard')}}" method="POST" enctype="multipart/form-data" class="linear-form">
                <div class="col-sm-12 col-md-4">
                    @csrf
                     <input type="text" placeholder="brand" name="brand" value="{{old('brand')}}" class="input">
                    <input type="text" placeholder="refrence"  value="{{old('refrence')}}" name="refrence" class="input">
                    <div class="input">
                        <input id="files" data-target='#motherBoadAddimage' style="display:none;font-size: 0.8em;" name="image" type="file">
                        <span id="motherBoadAddimage" class="js-files-names color-third">no image selectd</span>
                        <label for="files" class="btn">Select Image</label>
                    </div>

                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="list-multy-selection input bg-main">
                        @foreach ($components as $component)
                            <!-- list item start  -->
                            <div class="list-item">
                                <div class="image-holder">
                                    <img src="
                                    @if (empty($component->url))
                                                img/defaultNoteImage.jpg
                                    @else
                                        {{asset($component->url)}}
                                    @endif">
                                </div>
                                <label for="comp{{$component->id}}">{{$component->type.' '.$component->model.' '.$component->refrence}}</label>
                                <input type="checkbox" @if (!empty(old('components')) && in_array($component->id, old('components')))
                                    checked
                                @endif name="components[]" value="{{$component->id}}" id="comp{{$component->id}}">
                            </div>
                            <!-- list item end  -->
                         @endforeach
                         
                        
                        
                        

                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <input type="submit" class="btn input" value="add">

                </div>


            </form>

        </div>
    </div>
    <!-- end  add motherBoard  -->
    <!-- search section  -->
    @include('includes.searchComponentForm')
    <!-- end search section  -->

     <!-- table section  -->
     <div class="section container">
        <div class="table-holder">
             
                <div class=" table-header ">
                    <div class="col-sm">id</div>
                    <div class="col-sm">image</div>
                    <div class="col-sm">brand</div>
                     
                    <div class="col-sm">refrence</div>
                    <div class="col-sm">actions</div>
                </div>
                <div class="table-body">
                    @foreach ($motherBoards as $motherBoard)
                        <!-- tr -->
                        <div class="row tr">
                            <div class="col-sm-12 col-md 
                            @if (count($motherBoard->components)<1)
                                bg-danger
                            @endif
                            ">{{$motherBoard->id}}</div>
                            <div class="col-sm-12 col-md">
                                <div class="image-holder">
                                    <img src="@if (empty($motherBoard->url))
                                    img/defaultNoteImage.jpg
                                @else
                                    {{asset($motherBoard->url)}}
                                @endif">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md">{{$motherBoard->brand}}</div>
                            
                            <div class="col-sm-12 col-md">{{$motherBoard->refrence}}</div>
                            <div class="col-sm-12 col-md">
                                <a href="#"data-id="{{$motherBoard->id}}" class="js-editMotherBoard"><i class="fas fa-edit"></i></a>
                                <a href="{{route('deletemotherBoard',['id'=>$motherBoard->id])}}"><i class="fas fa-trash"></i></a>
                                <a href="#" data-id="{{$motherBoard->id}}" class="js-showMotherBoard"><i class="fas fa-eye"></i></a>
                                
                            </div>
                            
                        </div>
                        <!-- tr -->
                        
                    @endforeach
                    
              
                     
                     
                   
                </div>
                
            </table>

        </div>

    </div>
    <!-- end table section  -->

    <div class=" " id="Details">
        {{-- @include('includes.editMotherBoard') --}}

    </div>


@endsection

@section('customJS')
    
<script type="text/javascript">
  
        
    $( ".js-showMotherBoard" ).click(function() {
        
         
        $.get( "/motherBoard/"+ $(this).attr('data-id'), function( data ) {
            $( "#Details" ).html( data );
            
        });
    });
    $( ".js-editMotherBoard" ).click(function() {
        
        
       
        $.get( "/motherBoard/edit/"+ $(this).attr('data-id'), function( data ) {
           
            $( "#Details" ).html( data );
            
        });
    });
    
</script>
@endsection