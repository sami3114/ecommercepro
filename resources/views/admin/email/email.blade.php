@extends('admin.layout.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-3">
                    <h3 class="mx-auto" style="width: 600px">Send Email to {{$order->getUser->email}}</h3>
                    <div class="row justify-content-md-center">
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-secondary rounded h-100 p-4">
                                <form method="POST" action="{{route('send.email.user',['id'=>$order->id])}}">
                                    @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingTitle"
                                           name="greeting"
                                           placeholder="Write greeting"
                                        {{ old('greeting')}}>
                                    <label for="floatingTitle">Email Greeting</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingTitle"
                                           name="firstline"
                                           placeholder="Write first line"
                                        {{ old('firstline')}}>
                                    <label for="floatingTitle">Email First Line</label>
                                </div>
                                <div class="form-floating mb-3">
                                         <textarea
                                             name="body"
                                             class="form-control"
                                             id="floatingTextarea" style="height: 150px;">{{ old('body')}}</textarea>
                                    <label for="floatingTextarea">Email Body</label>
                                </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingPrice"
                                                       name="button"
                                                       {{ old('button')}}
                                                       placeholder="Write button name">
                                                <label for="floatingPrice">Email Button Name</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingDiscount"
                                                       name="url"
                                                       {{ old('url')}}
                                                       placeholder="Enter Url">
                                                <label for="floatingDiscount">Email Url</label>
                                            </div>
                                        </div>
                                    </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingTitle"
                                           name="lastline"
                                           placeholder="Write last line"
                                        {{ old('lastline')}}>
                                    <label for="floatingTitle">Email Last Line</label>
                                </div>
                                    <button type="submit" class="btn btn-outline-success">Send Email</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
