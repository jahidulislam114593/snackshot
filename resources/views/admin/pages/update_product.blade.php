@extends('admin.layouts.default')
@section('main')
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
   <h3 class="card-title">Updating Product</h3>
   <p class="card-description"> Update Product </p>
   <form class="forms-sample" action="{{ url('/update_product_confirm',$product->id) }}" method="post" enctype="multipart/form-data">
      @csrf 
        @if(session()->has('message'))
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                          {{session()->get('message')}}
                      </div>
        @endif
      <div class="form-group">
         <label for="exampleInputName1">Product Title</label>
         <input type="text" class="form-control" id="exampleInputName1" placeholder="Write a Title" name="title" required value="{{ $product->title }}">
      </div>
      <div class="form-group">
         <label for="exampleTextarea1">Product Description</label>
         <textarea class="form-control" id="exampleTextarea1" rows="4" name="description" required value="{{ $product->description }}">{{ $product->description }}</textarea>
      </div>
      <div class="form-group">
         <label>Current Image</label>
         <div class="input-group col-xs-12">
            <img src="/product/{{ $product->image }}"  style="width: 150px; height: 150px; object-fit: cover; border-radius: 0;">
         </div>
      </div>
      <div class="form-group">
         <label>Change Image</label>
         <div class="input-group col-xs-12">
            <input type="file" class="form-control" name="image" id="uploadImage" aria-describedby="uploadButton">
         </div>
      </div>
      <div class="form-group">
         <label for="exampleSelectGender">Product Catagory</label>
         <select class="form-control" id="exampleSelectGender" name="catagory" required value="{{ $product->catagory }}">
            <option value="{{ $product->catagory }}" selected>{{ $product->catagory }}</option>
            @foreach($catagory as $cat)
            <option value="{{ $cat->catagory_name }}">{{ $cat->catagory_name }}</option>
            @endforeach
         </select>
      </div>
      <div class="form-group">
         <label for="exampleInputCity1">Product Quantity</label>
         <input type="number" min="0" class="form-control" id="exampleInputCity1" placeholder="Add quantity" name="quantity" required value="{{ $product->quantity }}">
      </div>
      <div class="form-group">
         <label for="exampleInputCity1">Product Price</label>
         <input type="number" class="form-control" id="exampleInputCity1" placeholder="Add price" name="price" required value="{{ $product->price }}">
      </div>
      <div class="form-group">
         <label for="exampleInputCity1">Discount Price</label>
         <input type="number" class="form-control" id="exampleInputCity1" placeholder="Add discount Price" name="discount_price" value="{{ $product->discount_price }}">
      </div>
      <input type="submit" class="btn btn-primary mr-2" value="Update Product">
      <!-- <button type="submit" class="btn btn-primary mr-2">Add Product</button> -->
      <!-- <button class="btn btn-dark">Cancel</button> -->
   </form>
</div>
@endsection