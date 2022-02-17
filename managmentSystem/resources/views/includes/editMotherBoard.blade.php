<div class="box" id="DetailsBox" style="width: 500px;justify-content: center">
      
    <form action="{{route('updatemotherBoard' )}}" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="row">
       <div class="col-sm-12">
           <input name="id" type="hidden" value="{{$motherBoard->id}}">
           <input type="text" placeholder="brand" value="{{$motherBoard->brand}}" name="brand"  class="input">
           

       </div>
       <div class="col-sm-12"><input type="text" placeholder="refrence" value="{{$motherBoard->refrence}}"  name="refrence" class="input">
       </div>
       <div class="col-sm-12">
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
                    <label for="compE{{$component->id}}">{{$component->type.' '.$component->model.' '.$component->refrence}}</label>
                    <input type="checkbox" @if (!empty($motherBoard->components) && $motherBoard->components()->where('component_id', $component->id)->count()>0 ))
                        checked
                    @endif name="components[]" value="{{$component->id}}" id="compE{{$component->id}}">
                </div>
                <!-- list item end  -->
          @endforeach
        </div>
     
       </div>
        @if (!empty($motherBoard->url))
           <div class="col-sm-12">
               <img src="{{asset($motherBoard->url)}}" style="width: 120px;height:120px" alt="">
           </div>
       @endif

       <div class="col-sm-12">
           <div class="input">
               <input data-target="#edit-motherBoard-target" type="file" name="image"  id="motherBoardEdit" style="display:none "   class="input" accept="image/png, image/jpg, image/jpeg">
               <label  for="motherBoardEdit" class="btn">Select Image</label>
           </div>
           <div id="edit-motherBoard-target" class="js-files-names color-third">no image selectd</div>
           
       </div>
       <div class="col-sm-12">
           <input type="submit" class="btn input" value="edit">

       </div>
   </div>
   
   
   </form>
   <div class="row">
       <div class="col-sm-12">

           <button class="btn input" onclick="getElementById('DetailsBox').remove();">close</button>
       </div>
   </div>




<script>
  $("input[type='file']").change(function() {
 
   filename = this.files[0].name;

  $($(this).attr('data-target')).text(filename);
    
 });
</script>

<style>
#Details{
  width: 100vw;
  height: 100vh;
  position: fixed;
  display:flex;
  top: 50%;
  z-index: 150;
  right: 50%;
  background-color: rgba(112, 112, 112, 0.308);
  transform: translate( 50%,-50%);
  justify-content: center;
  }
.box{
  padding: 10px;
  background-color: var(--second-color);
  border-radius: 5px;
  overflow-y: auto;
}
.box .row{
 
  text-align: center;
  padding:10px 0px;
  
}

</style>

</div>