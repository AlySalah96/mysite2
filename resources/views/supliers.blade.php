<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<table class="table table-responsive">
    <tr><th>id</th><th>name</th><th>edit</th><th>delete</th><th>show products</th></tr>
    @foreach($supliers as $suplier)
        <form method="post" action="{{url('edit_sup',$suplier->id)}}">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <tr>
                <td>{{$suplier->id}}</td><td><input name="name" value="{{$suplier->name}}" ></td>
                <td><button type="submit" class="btn btn-primary">edit</button></td>
                <td><a href="{{url('delete_sup',$suplier->id)}}" class="btn btn-danger">delete</a></td>
                <td><a href="{{url('show_products_of_sup',$suplier->id)}}" class="btn btn-success">show products</a></td>
                <input type="hidden" name="id" value="{{$suplier->id}}" />
            </tr>
        </form>
    @endforeach

</table>
<form method="post" action="{{url('add_sup')}}">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    name: <input name="name" placeholder="suplier name" />
    <button type="submit" class="btn btn-success">Add</button>
</form>
