<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<table class="table table-responsive">
    <tr><th>id</th><th>name</th><th>edit</th><th>delete</th><th>show products</th></tr>

    @foreach($cats as $cat)
        <form method="post" action="edit/{{$cat->id}}">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <tr>
                <td></td>
                <td><input name="name" value="{{$cat->name}}" ></td>
                <td><button type="submit" class="btn btn-primary">edit</button></td>
                <td><a href="delete/{{$cat->id}}" class="btn btn-danger">delete</a></td>
                <td><a href="show_products/{{$cat->id}}" class="btn btn-success">show products</a></td>
                <input type="hidden" name="id" value="{{$cat->id}}" />
            </tr>
        </form>
   
        @endforeach
</table>


<form method="post" action="add">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    name: <input name="name" placeholder=" name" />
    <button type="submit" class="btn btn-success">Add</button>
  </form>
