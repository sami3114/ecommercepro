@extends('admin.layout.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-3">
                    <h3 class="mx-auto" style="width: 200px;">Add Product</h3>
                    <div class="row justify-content-md-center">
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-secondary rounded h-100 p-4">
                                <form method="POST" action="{{route('store.product')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingTitle"
                                                       name="title"
                                                       placeholder="Write product title"
                                                    {{ old('title')}}>
                                                <label for="floatingTitle">Product Title</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingStock"
                                                       name="stock"
                                                       {{ old('stock')}}
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
                                                       placeholder="Write product title">
                                                <label for="floatingPrice">Price</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingDiscount"
                                                       name="discount_price"
                                                       {{ old('discount_price')}}
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
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect">Works with selects</label>
                                    </div>
                                    <div class="mb-3">
                                        <input name="image"
                                               {{ old('image')}}
                                               class="form-control  form-control-lg bg-dark" type="file">
                                    </div>
                                    <div class="form-floating mb-3">
                                         <textarea
                                             name="description"
                                             class="form-control" placeholder="Leave a comment here"
                                          id="floatingTextarea" style="height: 150px;">{{ old('description')}}</textarea>
                                          <label for="floatingTextarea">Description</label>
                                    </div>

                                    <button type="submit" class="btn btn-outline-success">Add Product</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
