@extends('admin.layouts.default')
@section('main')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h3 class="card-title">Product</h3>
      <p class="card-description">Product Show</p>
      @if(session()->has('message'))
      <div class="alert alert-success">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
         {{session()->get('message')}}
      </div>
      @endif
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
              <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{ url('admin_product_search') }}" method="get" >
                        @csrf
                          <input type="text" class="form-control" placeholder="Search products" name="admin_productsearch">
                      </form>
                <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($product as $product)
                  <tr>
                    <td>{{ $product->title }}</td>
                    <td>
                      <div class="description-container" style="max-width: 300px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                        {{ $product->description }}
                      </div>
                    </td>
                    <td>{{ $product->catagory }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->discount_price }}</td>
                    <td>
                      <img src="/product/{{ $product->image }}"  style="width: 150px; height: 150px; object-fit: cover; border-radius: 0;">
                    </td>
                    <td>
                        <a class="badge badge-success" href="{{ url('update_product',$product->id) }}">Edit</a>  
                        <a onclick="return confirm('Are You Sure!!')" class="badge badge-danger" href="{{ url('delete_product',$product->id) }}">Delete</a>  
                    </td>
                  </tr>

                  @empty
                          <tr>
                            <td>
                              <div class="badge badge-outline-danger"> No Data Founded</div>
                            </td>
                          </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
