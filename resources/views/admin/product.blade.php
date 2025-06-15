<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')


   <style>
    h2{
      color: white
    }

    .div_deg{
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 60px;

    }

    .table_deg{
      border: 2px solid greenyellow;
    }

    th{
      background-color: skyblue;
      color: white;
      font-size: 19px;
      font-weight: bold;
      padding: 15px;
    }

    td{
      border: 1px solid skyblue;
      text-align: center;
      color: white;

    }

    input[type='search']
    {
      width: 500px;
      height: 60px;
      margin-left: 50px;
    }
   </style>
  </head>
  <body>
    @include('admin.header')

   @include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <form action="{{ url('product_search')}}" method="get">
              @csrf
              <input type="search" name="search">
              <input type="submit" class="btn btn-secondary" value="Search">
            </form>
        

        <div class="div_deg">
          <table class="table_deg">
            <tr>
              <th>Image</th>
              <th>Title</th>
              <th>Description</th>
              <th>Price</th>
              <th>Category</th>
              <th>Quantity</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            @foreach ($product as $products)
            <tr>
              <td>  <img src="{{ asset('products/'.$products->image) }}" width="100px" height="100px" alt=""></td>
                <td>{{ $products->title}}</td>
                <td>{!!Str::words($products->description,12) !!}</td>   
                <td>{{ $products->price}}</td>
                <td>{{ $products->category}}</td>
                <td>{{ $products->quantity}}</td>
                <td>
                  <a class="btn btn-success" href="{{ url('update_product',$products->id)}}">Update</a>
                </td>
                <td>
                  <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a>
                </td>
            </tr>
            @endforeach
          </table>
        </div>
        <div class="div_deg">
          {{ $product->links() }}
        </div>
      
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>