<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style>
    .img-box img {
    transition: transform 0.3s ease;
  }
  .img-box:hover img {
    transform: scale(1.05);
  }
  .card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
  }
  
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->

   @include('home.header') 

    <!-- end header section -->

    <!-- slider section -->


    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->



  
  <section class="shop_section layout_padding bg-light py-5">
    <div class="container">
      <div class="heading_container heading_center mb-5">
        <h2 class="text-uppercase fw-bold">Latest Products</h2>
        <p class="text-muted">Check out our newest arrivals</p>
      </div>
  
      <div class="row g-4">
        @foreach ($product as $products)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card h-100 shadow-sm border-0">
            
            <div class="img-box position-relative overflow-hidden">
              <img src="{{ asset('products/'.$products->image) }}" class="card-img-top img-fluid" alt="{{ $products->title }}">
            </div>
  
            <div class="card-body text-center">
              <h5 class="card-title fw-semibold">{{ $products->title }}</h5>
              <p class="card-text text-primary fw-bold">${{ $products->price }}</p>
            </div>
  
            <div class="card-footer bg-transparent border-0 d-flex justify-content-around pb-3">
              <a href="{{ url('product_details',$products->id)}}" class="btn btn-outline-danger btn-sm">Details</a>
              <a href="{{ url('add_cart',$products->id)}}" class="btn btn-outline-primary btn-sm">Add to Cart</a>
            </div>
  
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  





  <!-- end shop section -->



  <!-- contact section -->

 @include('home.contact')

  <!-- end contact section -->

   

  <!-- info section -->

 @include('home.footer')

</body>

</html>