<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<script src="{{asset('js/bootstrap.min.js')}}"></script>


<p>best sale :</p><br>
   @foreach($best_sale as $best)
    <img src="{{asset('images/'.$best['img'])}}" style="width:100px;height: 100px;border-radius: 12px;" /><br>
    <p> name:{{$best['name']}}</p>
       <p>price: {{$best['price']}} $</p>   <br>     
    @endforeach


<table class="table table-responsive">
    <tr><th>id</th><th>name</th><th>img</th><th>price</th><th>quantity</th><th>edit</th><th>delete</th><th>show suppliers</th></tr>
    @foreach($prods as $prod)
        <form method="post" action="{{url('edit_prod',$prod->id)}}">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <tr>
                <td>{{$prod->id}}</td><td><input name="name" value="{{$prod->name}}" ></td>
                <td><img src="{{asset('images/'.$prod->img)}}" style="width:100px;height: 100px;border-radius: 12px;" /></td>
                <td><input name="price" value="{{$prod->price}}" ></td>
                <td><input name=" quantity" value="{{$prod->quantity}}" ></td>
                <td><button type="submit" class="btn btn-primary">edit</button></td>
                <td><a href="{{url('delete_prod',$prod->id)}}" class="btn btn-danger">delete</a></td>
                <td><a href="{{url('show_suppliers_of',$prod->id)}}" class="btn btn-success">show suppliers</a></td>
                <input type="hidden" name="id" value="{{$prod->id}}" />
                <input type="hidden" name="cat_id" value="{{$prod->cat_id}}" />

                <td><a href="{{url('buy_prod',$prod->id)}}" class="btn btn-danger">Buy</a></td>


            </tr>
        </form>
    @endforeach

</table>
<br/><h2>Add new Product</h2>
<table class="table">
<form method="post" action="{{url('add_prod')}}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <tr><td>name:</td><td> <input name="name" placeholder="product name" /></td></tr>
    <tr><td>img: </td><td><input type="file" name="img" /></td></tr>
    <tr><td>category: </td><td><select name="cat_id">
        @foreach($cats as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
    </select></td>
    </tr>
    <tr><td>price:  </td><td><input name="price" placeholder="product price" /></td></tr>
    <tr><td>quantity:  </td><td><input name="quantity" placeholder="product quantity" /></td></tr>
    <tr><td colspan="2"><button type="submit" class="btn btn-success btn-lg">Add</button></td></tr>

</form>
</table>
<a class="btn btn-primary" href="{{url('aa')}}"> go to home page</a>
