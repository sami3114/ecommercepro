@extends('admin.layout.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-3">
                    <h3 class="mx-auto" style="width: 200px;">Update</h3>
                    <div class="row justify-content-md-center">
                        <div class="col-sm-12 col-xl-4">
                            <div class="bg-secondary rounded h-100 p-4">
                                <div class="mb-3">
                                    <img class="mb-3 rounded" src="{{ Storage::url($product->image) }}" height="450" width="450" alt="" />
                                    <label class="mx-auto">Current Image</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-8">
                            <div class="bg-secondary rounded h-100 p-4">
                                <form method="POST" action="{{route('update.product',['product'=>$product->id])}}" enctype="multipart/form-data">
                                    @csrf
{{--                                    @method('put')--}}
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingTitle"
                                                       name="title"
                                                       placeholder="Write product title"
                                                       value="{{$product->title}}"
                                                    {{ old('title')}}>
                                                <label for="floatingTitle">Product Title</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingStock"
                                                       name="stock"
                                                       {{ old('stock')}}
                                                       value="{{$product->stock}}"
                                                       placeholder="Enter Stock">
                                                <label for="floatingStock">Stock</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingPrice"
                                                       name="price"
                                                       {{ old('price')}}
                                                       value="{{$product->price}}"
                                                       placeholder="Write product title">
                                                <label for="floatingPrice">Price</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingDiscount"
                                                       name="discount_price"
                                                       {{ old('discount_price')}}
                                                       value="{{$product->discount_price}}"
                                                       placeholder="Enter Stock">
                                                <label for="floatingDiscount">Discount Price</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="floatingSelect"
                                                aria-label="Floating label select example"
                                                name="category_id">
                                            <option selected>Open this select menu</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}"@if($category->id==$product->category_id){{'selected'}}@endif>{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect">Works with selects</label>
                                    </div>
                                    <div class="mb-3">

                                        <input name="image"
                                               value="{{$product->image}}"
                                               class="form-control  form-control-lg bg-dark" type="file">
                                    </div>
                                    <div class="form-floating mb-3">
                                         <textarea
                                             name="description"
                                             class="form-control" placeholder="Leave a comment here"
                                          id="floatingTextarea" style="height: 150px;">{{$product->description}}</textarea>
                                          <label for="floatingTextarea">Description</label>
                                    </div>
                                    <button type="submit" class="btn btn-outline-success">Update Product</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
