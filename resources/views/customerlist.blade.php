<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('app-css')
</head>
<body>
    @include('header')
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Customers</a></li>
                  <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
              </nav>
            </div>
          </div>

          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="card" style="width: 100%;">
                  <div class="card-body">
                   <div class="table-responsive">
                    <table class="table align-items-center" id="datatable-basic">

                        <thead class="thead-light">
                        <div class="col-md-12">
                          
                        </div>
                          <tr>
                            <th scope="col" class="sort" data-sort="name">Id</th>
                            <th scope="col" class="sort" data-sort="name">Name</th>
                            <th scope="col" class="sort" data-sort="name">email</th>
                            <th scope="col" class="sort" data-sort="budget">Images</th>
                            <th scope="col" class="sort" data-sort="budget">state</th>
                            <th scope="col" class="sort" data-sort="budget">gender</th>
                            <th scope="col" class="sort" data-sort="budget">Action</th>
                          </tr>
                        </thead>
                        <tbody class="list">
                        @if(count($customerdata['customer']) > 0)
                        <?php $i=1; ?>
                        @foreach($customerdata['customer'] as $customer)
                  <tr>
                  <td>{{$i++}}</td>
                  <td>{{ $customer->name}}</td>
                  <td>{{ $customer->email}}</td>
                  <td><img src="{{asset($customer->images)}}" alt="" width="100" height="100"></td>
                  <td>{{ $customer->state}}</td>
                  <td>{{ $customer->gender}}</td>
                 
                  <td><a href="{{url('/customerlist-delete')}}/{{$customer->id}}"  class="btn btn-primary">Delete</a>
                  <a href="{{url('/customerlist-edit')}}/{{$customer->id}}"  class="btn btn-danger">Edit</a>
                  </td>
             </tr>
            @endforeach
                    @else
                        <tr><td colspan="6"> No Records Found</td></tr>
                    @endif
                </tbody>
</body>
</html>