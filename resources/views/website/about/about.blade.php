@extends('website.layout')
@section('content')
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>About us</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('website.partials.why')
    @include('website.partials.arrival')
@endsection
