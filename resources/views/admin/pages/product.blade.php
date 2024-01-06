@extends('admin.layouts.default')
@section('main')

    <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Adding Product</h3>
                    <p class="card-description"> Add Product </p>
                    <form class="forms-sample" action="{{ url('/add_product') }}" method="post" enctype="multipart/form-data">
                     @csrf 

                      @if(session()->has('message'))
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                          {{session()->get('message')}}
                      </div>
                      @endif 

                      <div class="form-group">
                        <label for="exampleInputName1">Product Title</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Write a Title" name="title" required>
                      </div>
                      <div class="form-group" >
                        <label for="exampleTextarea1">Product Description</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="About product" name="description" required></textarea>
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <div class="input-group col-xs-12">
                            <input type="file" class="form-control" name="image" id="uploadImage" aria-describedby="uploadButton" required>
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="exampleSelectGender">Product Catagory</label>
                        <select class="form-control" id="exampleSelectGender" name="catagory" required>
                          <option value="" selected>Add a Catagory</option>
                          @foreach($catagory as $cat)
                          <option value="{{ $cat->catagory_name }}">{{ $cat->catagory_name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Product Quantity</label>
                        <input type="number" min="0" class="form-control" id="exampleInputCity1" placeholder="Add quantity" name="quantity" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Product Price</label>
                        <input type="number" class="form-control" id="exampleInputCity1" placeholder="Add price" name="price" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Discount Price</label>
                        <input type="number" class="form-control" id="exampleInputCity1" placeholder="Add discount Price" name="discount_price">
                      </div>
                      <input type="submit" class="btn btn-primary mr-2" value="Add Product">
                      <!-- <button type="submit" class="btn btn-primary mr-2">Add Product</button> -->
                      <!-- <button class="btn btn-dark">Cancel</button> -->
                    </form>
                    </div>
@endsection