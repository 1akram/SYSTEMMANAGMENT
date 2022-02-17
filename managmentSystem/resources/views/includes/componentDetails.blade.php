 <div class="box" id="DetailsBox" style="width: 500px;justify-content: center">
     
     <div class="row" >
         <img src="@if (empty($component->url))
         img/defaultNoteImage.jpg
     @else
         {{asset($component->url)}}
     @endif" style="width: 120px;height:120px" alt="">
     </div>
     <div class=" row">
         <div class="col-sm-5">type</div>
         <div class="col-sm-5">{{$component->type}}</div>
         
     </div>
     <div class=" row">
         <div class="col-sm-5">model</div>
         <div class="col-sm-5">{{$component->model}}</div>
         
     </div>
     <div class=" row">
         <div class="col-sm-5">refrence</div>
         <div class="col-sm-5">{{$component->refrence}}</div>
         
     </div>
     <div class="row list">
         <div class="col-sm-5">motherBoards</div>
         <div class="col-sm-5">

            <ul> 
                @if (count($component->motherBoards)<1)
                    <li>no motherBoards related</li>
                @endif
                @foreach ($component->motherBoards as $motherBoard )                
                   <li>{{$motherBoard->brand.' '.$motherBoard->refrence}}</li>
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