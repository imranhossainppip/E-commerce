@extends('admin.master');
@section('title')
    Add Product
@endsection
@section('content')
    <br/>
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <h1 class="text-center text-success">{{Session::get('message')}}</h1>


                <form action="{{url('/update-product')}}" method="POST" class="form-horizontal" enctype="multipart/form-data" name="editProductForm">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-3">Category Name</label>
                        <div class="col-sm-9">
                            <select name="category_id" class="form-control">
                                <option>---Select Category Name---</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3">Brand Name</label>
                        <div class="col-sm-9">
                            <select name="brand_id" class="form-control">
                                <option>---Select Brand Name---</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3">Product Name</label>
                        <div class="col-sm-9">
                            <input type="text" value="{{$product->product_name}}" name="product_name" class="form-control"/>
                            <input type="hidden" value="{{$product->id}}" name="product_id" class="form-control"/>
                            <span style="color: red">{{$errors->has('product_name') ? $errors->first('product_name') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3">Product Code</label>
                        <div class="col-sm-9">
                            <input type="text" value="{{ $product->product_code }}" name="product_code" class="form-control"/>
                            <span style="color: red">{{$errors->has('product_code') ? $errors->first('product_code') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3">Product Price</label>
                        <div class="col-sm-9">
                            <input type="number" value="{{ $product->product_price }}" name="product_price" class="form-control"/>
                            <span style="color: red">{{$errors->has('product_price') ? $errors->first('product_price') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3">Product Quantity</label>
                        <div class="col-sm-9">
                            <input type="number" value="{{ $product->product_quantity }}" name="product_quantity" class="form-control"/>
                            <span style="color: red">{{$errors->has('product_quantity') ? $errors->first('product_quantity') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3">Product Short Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="short_description">{{ $product->short_description }}</textarea>
                            <span style="color: red">{{$errors->has('short_description') ? $errors->first('short_description') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Product Long Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="long_description">{{ $product->long_description }}</textarea>
                            <span style="color: red">{{$errors->has('long_description') ? $errors->first('long_description') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Product Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="product_image" accept="image/*"/>
                            <img src="{{asset($product->product_image)}}" alt="" height="80" width="80" />
                            <span style="color: red">{{$errors->has('product_image') ? $errors->first('product_image') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Publication Status</label>
                        <div class="col-sm-9">
                            <select name="publication_status" class="form-control">
                                <option>---Select Publication Status---</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Product Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.forms['editProductForm'].element['category_id'].value = '{{ $product->category_id }}'
        document.forms['editProductForm'].element['brand_id'].value = '{{ $product->brand_id }}'
        document.forms['editProductForm'].element['publication_status'].value = '{{ $product->publication_status }}'
    </script>
@endsection