<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style>
    input[type='text']
    {
      width: 400px;
      height: 50px;

    }

    .div_deg{
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 30px;
    }

    .table_deg{
      text-align: center;
      margin: auto;
      border: 2px solid yellowgreen;
      margin-top: 50px;
      width: 600px;
    }

    th{
      background-color: skyblue;
      padding: 15px;
      font-size: 20px;
      font-weight: bold;
      color: white;
    }

    td{
      color: white;
      padding: 10px;
      border: 1px solid skyblue;

    }
   </style>
  </head>
  <body>
    @include('admin.header')

   @include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h2 style="color: white">Add Category</h2>

            <div class="div_deg">
          <form action="{{ url('add_category') }}" method="POST">

            @csrf
            
            <div>
              <input type="text" name="category">
            
              <input type="submit" class="btn btn-primary" value="Add Category">
            </div>
          </form>
        </div>

        <div>
          <table class="table_deg">
            <tr>
              <th>Category Name</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          @foreach ($data as $category)
          <tr>
            <td>{{$category->category_name }}</td>
            <td>
              <a class="btn btn-success" href="{{ url('edit_category',$category->id)}}">Edit</a>
            </td>
            <td>
              <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_category', $category->id)}}">Delete</a>
            </td>
          </tr>
          @endforeach
           
          </table>
        </div>

          </div>
      </div>
    </div>
    <!-- JavaScript files-->
     @include('admin.js')
  </body>
</html>