<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Dashboard</title>
  </head>
  <body>
   <div class="container">
         <div class="row">
                <div class="col-sm-12 mt-5">
                @if(session()->has('message'))
                    <div class="alert alert-success">{{session()->get('message')}}</div>
                     @endif
                <div class="card mt-5" style="width:100%;">
                           @if ($errors->any())
                               <div class="alert alert-danger">
                                <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                                 @endforeach
                             </ul>
                            </div>
                           @endif
                        <div class="card-body">

                        <form action="{{url('customerlist-update')}}" method="post" enctype = "multipart/form-data">
                             @csrf
                           <h1 align="center">Customer Table</h1>
                           <input type="hidden" name="id" value="{{$customer->id}}">
                              <div class="form-group">
                                <label for="example-number-input" class="form-control-label">Name</label>
                                <input class="form-control" type="text" name="name" placeholder="Enter Name" value="{{$customer->name}}" id="example-number-input">
                              </div>
                              <div class="form-group autocomplete">
                                <label for="example-number-input" class="form-control-label">email</label>
                                <input class="form-control" type="text"  id="myInput" name="email" placeholder="Enter email" value="{{$customer->email}}" id="example-number-input">
                              </div>
                              <div class="form-group">
                                    <label for="example-text-input" class="form-control-label"> Image</label>
                                    <input class="form-control" type="file" placeholder=" " id="example-text-input" name="image">
                                </div>
                              <br>
                              <div class="form-group">
                                <label for="example-number-input" class="form-control-label">state</label>
                                  <select name="state" id="" class="form-control">
                                     <option value="tamilnadu">Tamilnadu</option>
                                     <option value="kerala">Kerala</option>
                                     <option value="goa">Goa</option>
                                     <option value="karnataka">Karnataka</option>
                                     <option value="telugana">Telugana</option>
                                  </select>
                              </div>
                             <br>
                               
                              <div class="form-group">
                              <label for="example-number-input" class="form-control-label">Gender</label>
                              <br>
                              <input type="radio" name="gender" value="male" {{( $customer == 'male') ? 'checked' : '' }}> Male<br>
                               <input type="radio" name="gender" value="female" {{ ($customer == 'female') ? 'checked' : '' }}> Female<br>                  
                              </div>
                              
                      

                             
                              <button type="submit" name="submit"  class="btn btn-success form-control" >Update</button>
                               
                            </form>
                        </div>
                </div>
                </div>
        </div>
   </div>



 
</div>
       </div>
      
      </div>


      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
