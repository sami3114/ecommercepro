@extends('admin.layout.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-3">
                    <h3 class="mx-auto" style="width: 200px;">Add Category</h3>
                    <div class="row justify-content-md-center">
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-secondary rounded h-100 p-4">
                                <form method="POST" action="{{route('store.category')}}">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control"
                                               placeholder="Add Category"
                                               name="category_name">
                                        <button type="submit" class="btn btn-outline-success" style="margin-left: 10px">Add Category</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-white text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0 text-black-50">Categories</h6>
            </div>
            <div class="table-responsive">
                <table id="mytable" class="table text-start align-middle table-hover mb-0">
                    <thead>
                    <tr class="text-black-50">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>
                            <form action="{{ route('delete.category',['category'=>$category->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
{{--                                <button onclick="confirmation(event)" type="submit" class="btn btn-outline-danger m-2">Delete</button>--}}
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
@endsection
