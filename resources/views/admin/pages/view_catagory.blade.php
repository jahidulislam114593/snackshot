@extends('admin.layouts.default')
@section('main')
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
   <h3 class="card-title">Adding Catagory</h3>
   <p class="card-description"> Add Catagory </p>
   <form class="forms-sample" action="{{ url('/add_catagory') }}" method="post">
      @csrf 
      @if(session()->has('message'))
      <div class="alert alert-success">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
         {{session()->get('message')}}
      </div>
      @endif
      <div class="form-group">
         <label for="exampleInputName1"></label>
         <input type="text" class="form-control" id="exampleInputName1" placeholder="Catagory Name" name="catagory">
      </div>
      <!-- <div class="form-group">
         <label for="exampleInputEmail3">Email address</label>
         <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
         </div>
         <div class="form-group">
         <label for="exampleInputPassword4">Password</label>
         <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
         </div>
         <div class="form-group">
         <label for="exampleSelectGender">Gender</label>
         <select class="form-control" id="exampleSelectGender">
           <option>Male</option>
           <option>Female</option>
         </select>
         </div>
         <div class="form-group">
         <label>File upload</label>
         <input type="file" name="img[]" class="file-upload-default">
         <div class="input-group col-xs-12">
           <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
           <span class="input-group-append">
             <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
           </span>
         </div>
         </div>
         <div class="form-group">
         <label for="exampleInputCity1">City</label>
         <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
         </div>
         <div class="form-group">
         <label for="exampleTextarea1">Textarea</label>
         <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
         </div> -->
      <button type="submit" class="btn btn-primary mr-2">Submit</button>
      <!-- <button class="btn btn-dark">Cancel</button> -->
   </form>
   <!-- <div class="col-lg-12 grid-margin stretch-card">
     <div class="card"> -->
   <div class="card-body">
     <div class="table-responsive">
       <table class="table table-hover">
         <thead>
           <tr>
             <th>Catagory Name</th>
             <!-- <th>Product Name</th> -->
             <!-- <th>Sale</th> -->
             <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $data)
            <tr>
              <td>{{ $data->catagory_name}}</td>
              <!-- <td>{{ $data->product_name}}</td> -->
              <!-- <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i></td> -->
              <td>
                <a onclick="return confirm('Are You Sure!!')" class="badge badge-danger" href="{{ url('delete_catagory',$data->id) }}">Delete</a>  
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
    
@endsection