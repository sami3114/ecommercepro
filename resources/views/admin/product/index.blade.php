@extends('admin.layout.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-3">
                    <h3 class="mx-auto" style="width: 200px;">Add Product</h3>
                    <div class="table-responsive">
                        <table id="mytable" class="table text-start align-middle table-hover mb-0">
                            <thead>
                            <tr class="text-white">
                                <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                <th scope="col">Product Title</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Discount Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr class="text-white">
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->stock}}</td>
                                    <td>{{$product->getCategory->category_name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->discount_price}}</td>
                                    <td>
                                        <a href="{{ route('change.product.status',['id'=>$product->id,'status'=>$product->is_active==1 ? 0: 1])}}"
                                           class="btn btn-sm btn-outline-{{$product->is_active==1 ? 'danger':'success'}}">
                                            {{$product->is_active==1 ? 'Deactive': 'Active'}}</a>
                                    </td>
                                    <td>
                                        <img src="{{ Storage::url($product->image) }}" height="75" width="75" alt="" />
                                    </td>


                                    <td>
                                        <form action="{{ route('delete.product',['product'=>$product->id]) }}" method="POST">
                                            <a href="{{route('edit.product',['product'=>$product->id])}}" class="btn btn-sm btn-warning">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure to delete this?')" type="submit" class="btn btn-outline-danger m-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
