<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<br/><br/>
<div class="row">
    <ul type="none" >
        @foreach($cats as $cat) 
        
            
            <li style="float:left;" class="col-sm-1" ><a class="btn btn-primary" href="{{url('show_products/'.$cat->id)}}">{{$cat->name}}</a></li>
            <li style="float:left;">"                  "</li>
            <li style="float:left;">      "       "</li>
       @endforeach
    </ul>
</div>
<br/>

@foreach($prods as $prod)
    <div class="col-md-3" style="float:left;">
        <img src="{{asset('images/'. $prod->img)}}" style="width:200px;height: 200px; border-radius: 12px"/>
        <br/><br/>
        <a class="btn btn-primary" href="details/{{$prod->id}}">{{$prod->name}} </a>
        <br/>
        <h3> {{ $prod->price}}$</h3>

    </div>
@endforeach
<br clear="left"/>

<a class="btn btn-success" href="{{url('aa')}}"> view categories</a>

