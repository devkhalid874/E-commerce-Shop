<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  @include('home.css')

  <style>






    .div_center{
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 60px;
    }

    table{
        border: 2px solid black;
        text-align: center;
        width: 800px;
    }
    th{
      border: 2px solid skyblue;
      background-color: black;
      color: white;
      font-size: 19px;
      font-weight: bold;
      text-align: center;
    }
    td{
      border: 1px solid skyblue;
      padding: 10px;
      
    }



    .table thead th {
  background-color: #343a40;
  color: white;
  font-size: 18px;
}
.table td, .table th {
  vertical-align: middle;
}
.table img {
  transition: transform 0.3s ease;
}
.table img:hover {
  transform: scale(1.05);
}



  </style>

</head>
<body>

  <div class="hero_area">
    <!-- header section strats -->

   @include('home.header') 

    <!-- end header section -->

    <div class="container py-5">
      <div class="text-center mb-4">
        <h2 class="fw-bold">Your Orders</h2>
        <p class="text-muted">Track the status of your recent purchases</p>
      </div>
    
      <div class="table-responsive shadow rounded">
        <table class="table table-bordered table-hover text-center align-middle bg-white">
          <thead class="table-dark">
            <tr>
              <th scope="col">Product Name</th>
              <th scope="col">Price</th>
              <th scope="col">Delivery Status</th>
              <th scope="col">Image</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($order as $orders)
            <tr>
              <td class="fw-semibold">{{ $orders->product->title }}</td>
              <td class="text-success fw-bold">${{ $orders->product->price }}</td>
              <td>
                @if ($orders->status == 'deliverd')
                  <span class="badge bg-success">{{ $orders->status }}</span>
                @elseif ($orders->status == 'on the way')
                  <span class="badge bg-primary">{{ $orders->status }}</span>
                @elseif ($orders->status == 'in progress')
                  <span class="badge bg-danger">{{ $orders->status }}</span>
                @endif
              </td>
              <td>
                <img src="{{ asset('products/'.$orders->product->image)}}" alt="Product Image" class="img-fluid rounded" style="max-width: 150px;">
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
  </div>

  @include('home.footer')

</body>
</html>