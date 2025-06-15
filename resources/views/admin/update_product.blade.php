<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style>
    .dev_deg{
      display: flex;
      justify-content: center;
      align-items: center;

    }

    label{
      display: inline-block;
      width: 200px;
      padding: 20px;
    }

    input[type='text']
    {
      width: 300px;
      height: 60px;
    }

    textarea{
      width: 450px;
      height: 100px;

    }
   </style>
  </head>
  <body>
    @include('admin.header')

   @include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

         <h2>Update Product</h2>

         <div class="dev_deg">

          <form action="{{ url('edit_product',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div>
              <label for="">Title</label>
              <input type="text" name="title" value="{{$data->title}}">
            </div>

            <div>
              <label for="">Description</label>
              <textarea  name="description">{{ $data->description}}</textarea>
            </div>

            
            <div>
              <label for="">Price</label>
             <input type="text" name="price" value="{{ $data->price }}">
            </div>

            <div>
              <label for="">Quantity</label>
             <input type="number" name="quantity" value="{{ $data->quantity }}">
            </div>

            <div>
              <label for="">Category</label>
             <select name="category">
              <option value="{{ $data->category}}">{{ $data->category }}</option>

              @foreach ($category as $categories)
                <option value="{{ $categories->category_name}}">{{ $categories->category_name}}</option>
              @endforeach
             </select>
            </div>

            <div>
              <label for="">Current Image</label>
              <img src="{{ asset('products/'.$data->image)}}" width="150px" alt="">
            </div>

            <div>
              <label for="">New Image</label>
              <input type="file" name="image">
            </div>

            <div>
              <input type="submit" class="btn btn-success" value="Update Product">
            </div>


          </form>
         </div>

          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>