@extends('website.layout')
@section('content')
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>Card Payment</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container mt-5 px-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card p-3">
                    <h6 class="h6 text-uppercase">Payment details</h6>
                    <form role="form" action="{{ route('stripe.payment',['totalAmount'=>$totalAmount]) }}" method="post" class="validation"
                          data-cc-on-file="false"
                          data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                          id="payment-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="inputbox mt-3 mr-2">
                                    <input class='form-control' size='4' type='text'>
                                    <span>Name on card</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputbox mt-3 mr-2 card required">
                                    <input autocomplete='off' class='form-control card-num' size='20'
                                        type='text'>
                                    <i class="fa fa-credit-card"></i> <span>Card Number</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-row">
                                    <div class="inputbox mt-3 mr-2 cvc required">
                                        <input autocomplete='off' class='form-control card-cvc' placeholder='e.g 415' size='4'
                                               type='text'>
                                        <span>CVV</span>
                                    </div>
                                    <div class="inputbox mt-3 mr-2 expiration required">
                                        <input
                                            class='form-control card-expiry-month' placeholder='MM' size='2'
                                            type='text'>
                                        <span>Month</span>
                                    </div>
                                    <div class="inputbox mt-3 mr-2 expiration required">
                                        <input
                                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                            type='text'>
                                        <span>Expiry</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-md-12 hide error form-group'>
                                <div class='alert-danger alert'>Fix the errors before you begin.</div>
                            </div>
                        </div>
                        <div class="mt-4 mb-4 d-flex justify-content-between">
                            <button class="btn btn-outline-success px-3 btn-lg btn-block" type="submit">Pay Now</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">

                <div class="card card-blue text-white p-3 mb-3">

                    <span>You have to pay</span>
                    <div class="d-flex flex-row align-items-end mb-3">
                        <h1 class="mb-0 h1 yellow">{{$totalAmount}}</h1> <span>.00</span>
                    </div>

                    <span>Enjoy all the features and perk after you complete the payment</span>
                    <a href="#" class="yellow decoration">Know all the features</a>

                    <div class="hightlight">
                        <span>100% Guaranteed support and update for the next 5 years.</span>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
