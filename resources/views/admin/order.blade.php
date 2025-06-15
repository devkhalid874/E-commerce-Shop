<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style>
    table{
      border: 1px solid skyblue;
      text-align: center;
    }

    th{
      background-color: skyblue;
      padding: 10px;
      font-size: 18px;
      font-weight: bold;
      text-align: center;
      color: white;
    }

    td{
      color: white;
      padding: 10px;
      border: 1px solid skyblue;
    }

    .table_center{
      display: flex;
      justify-content: center;
      align-items: center;
    }
   </style>
   
  </head>
  <body>
    @include('admin.header')

   @include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
           <div class="table_center">
            <table>
              <tr>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Status</th>
                <th>Change Status</th>
                <th>Generate PDF</th>
              </tr>
              @foreach ($data as $data)
              <tr>
                <td>{{ $data->name}}</td>
                <td>{{ $data->rec_address}}</td>
                <td>{{ $data->phone}}</td>
                <td>{{ $data->product->title}}</td>
                <td>{{ $data->product->price}}</td>
                <td>
                  <img src="{{ asset('products/'.$data->product->image)}}" alt="" width="150px">
                </td>
                <td>
                  @if ($data->status == 'in progress')
                      <span style="color: red;">{{ $data->status }}</span>

                      @elseif ($data->status == 'on the way')
                      <span style="color: skyblue;">{{ $data->status }}</span>

                      @else
                      <span style="color: rgb(83, 214, 22);">{{ $data->status }}</span>
                  @endif
                </td>
                <td>
                  <a href="{{ url('on_the_way',$data->id)}}" class="btn btn-primary btn-sm">On the way</a>
               
                  <a href="{{ url('deliverd',$data->id)}}" class="btn btn-success btn-sm">Delivered</a>
                </td>
                <td><a href="{{ url('print_pdf',$data->id)}}" class="btn btn-secondary">Print PDF</a></td>
              
              </tr>
              @endforeach
            </table>
          </div>

          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js')  }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js')  }}"> </script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js')  }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js')  }}"> </script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js')  }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js')  }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js')  }}"></script>
    <script src="{{ asset('admincss/js/front.js')  }}"></script>
  </body>
</html>