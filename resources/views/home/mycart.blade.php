<!DOCTYPE html>
<html lang="en">
<head>
  @include('home.css')
  <style>
    .order_form_wrapper {
      background-color: #f8f9fa;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    label {
      font-weight: 500;
      margin-bottom: 5px;
    }
    textarea, input[type="text"] {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    .cart_table th {
      background-color: #343a40;
      color: white;
      font-size: 18px;
    }
    .cart_table img {
      max-width: 120px;
      border-radius: 5px;
    }
    .cart_value {
      text-align: center;
      margin-top: 40px;
      font-weight: bold;
      font-size: 22px;
    }
  </style>
</head>
<body>
  <div class="hero_area">
    @include('home.header')
  </div>

  <div class="container my-5">
    <div class="row g-5">
      <!-- Order Form -->
      <div class="col-md-5">
        <div class="order_form_wrapper">
          <h4 class="mb-4">Confirm Your Order</h4>
          <form action="{{ url('confirm_order') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label>Receiver Name</label>
              <input type="text" name="name" value="{{ Auth::user()->name }}">
            </div>
            <div class="mb-3">
              <label>Receiver Address</label>
              <textarea name="address">{{ Auth::user()->address }}</textarea>
            </div>
            <div class="mb-3">
              <label>Receiver Phone</label>
              <input type="text" name="phone" value="{{ Auth::user()->phone }}">
            </div>
            <div class="d-flex gap-2 mt-4">
              <input type="submit" value="Cash on Delivery" class="btn btn-primary">
              <a href="{{ url('stripe') }}" class="btn btn-success">Pay Using Card</a>
            </div>
          </form>
        </div>
      </div>

      <!-- Cart Table -->
      <div class="col-md-7">
        <div class="table-responsive">
          <table class="table table-bordered cart_table text-center align-middle bg-white">
            <thead>
              <tr>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Remove</th>
              </tr>
            </thead>
            <tbody>
              @php $value = 0; @endphp
              @foreach ($cart as $cart)
              <tr>
                <td class="fw-medium">{{ $cart->product->title }}</td>
                <td>${{ $cart->product->price }}</td>
                <td>
                  <img src="{{ asset('products/'.$cart->product->image) }}" alt="Product Image">
                </td>
                <td>
                  <a href="{{ url('remove_cart',$cart->id) }}" class="btn btn-danger btn-sm">Remove</a>
                </td>
              </tr>
              @php $value += $cart->product->price; @endphp
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Cart Total -->
    <div class="cart_value mt-5">
      Total Value of Cart: ${{ $value }}
    </div>
  </div>

  @include('home.footer')
</body>
</html>
