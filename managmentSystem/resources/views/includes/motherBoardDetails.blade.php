<div class="box" id="DetailsBox" style="width: 500px;justify-content: center">
     
    <div class="row" >
        <img src="@if (empty($motherBoard->url))
        img/defaultNoteImage.jpg
    @else
        {{asset($motherBoard->url)}}
    @endif" style="width: 120px;height:120px" alt="">
    </div>
    <div class=" row">
        <div class="col-sm-5">brand</div>
        <div class="col-sm-5">{{$motherBoard->brand}}</div>
        
    </div>
   
    <div class=" row">
        <div class="col-sm-5">refrence</div>
        <div class="col-sm-5">{{$motherBoard->refrence}}</div>
        
    </div>
    <div class="row list">
        <div class="col-sm-5">components</div>
        <div class="col-sm-5">

           <ul> 
               @if (count($motherBoard->components)<1)
                   <li>no components related</li>
               @endif
               @foreach ($motherBoard->components as $component )
                  <li>{{$component->type.' '.$component->model.' '.$component->refrence}}</li>
               @endforeach
               

           </ul>
        </div>
    </div>
    <div class="row">
        <div>

            <button class="btn" onclick="getElementById('DetailsBox').remove();">close</button>
        </div>
    </div>

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
   .box .row>div,.box .row img{
       margin: auto;
       background-color: var(--third-color);
   }
   .box .list ul{
       max-height: 300px;
       overflow-y: auto

   }
   .box .list ul li{
      padding: 10px 0px;
      border-bottom: 1px solid var(--second-color);

   }
</style>

</div>