<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customer Receipt</title>
  <style>
    body {
      font-family: DejaVu Sans, sans-serif;
      background-color: #f4f4f4;
      color: #333;
      margin: 0;
      padding: 20px;
    }

    .container {
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      border: 1px solid #ccc;
      width: 90%;
      margin: auto;
      text-align: center;
    }

    h2 {
      color: #0a75ad;
      margin-top: 20px;
    }

    h3 {
      margin: 10px 0;
    }

    .product-image {
      margin-top: 30px;
    }

    .product-image img {
      width: 300px;
      height: 250px;
      object-fit: contain;
      border: 2px solid #ddd;
      border-radius: 5px;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Customer Receipt</h2>

    <h3><strong>Customer Name:</strong> {{ $data->name }}</h3>
    <h3><strong>Address:</strong> {{ $data->rec_address }}</h3>
    <h3><strong>Phone:</strong> {{ $data->phone }}</h3>

    <hr style="margin: 30px 0; border: none; border-top: 1px solid #ccc;">

    <h3><strong>Product Title:</strong> {{ $data->product->title }}</h3>
    <h3><strong>Product Price:</strong> Rs. {{ $data->product->price }}</h3>

    <div class="product-image">
      <img src="{{ public_path('products/'.$data->product->image) }}" alt="Product Image">
    </div>
  </div>

</body>
</html>
