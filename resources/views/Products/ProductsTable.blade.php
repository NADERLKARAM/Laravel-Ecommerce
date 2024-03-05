
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>




@extends('layouts.master')
@section('content')


<div class="container mt-5 mb-5">
<div class="text-right">
    <a href="/products/create" class="btn btn-primary mt-5 mb-5 w-50 ">
        اضافة المنتج
        <i class="fas fa-plus"></i>
    </a>
</div>

<table id="myTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $item)
        <tr>
            <td>{{$item -> id }}</td>
            <td>{{$item -> name }}</td>
            <td>{{$item -> price }}</td>
            <td>{{$item -> quantity }}</td>
            <td>
                <img src = '{{ asset('storage/' . $item->image) }}' width="100" height="100" />
            </td>
            <td>
                <a href="/products/{{ $item->id }}/edit" class="btn btn-primary">
                    <i class="fas fa-trash"></i>
                    تعديل المنتج
                </a>


                <form action="/products/delete/{{ $item->id }}" method="POST" style="display:inline;">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">
                        <i class="fas fa-trash"></i> حذف المنتج
                    </button>
                </form>


            </td>
        </tr>
        @endforeach

    </tbody>
</table>


</div>
@endsection




<script>
    $(document).ready( function () {
        let table = new DataTable('#myTable');
});
</script>
