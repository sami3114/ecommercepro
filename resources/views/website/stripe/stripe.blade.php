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
    @include('website.partials.message')
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

                        <div class='form-row row'>
                            <div class='col-xs-12 inputbox mt-3 mr-2 required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 inputbox mt-3 mr-2 card required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-num' size='20'
                                    type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label>
                                <input autocomplete='off' class='form-control card-cvc' placeholder='e.g 415' size='4'
                                       type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-md-12 hidden error form-group'>
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


<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function() {
        var $form         = $(".validation");
        $('form.validation').bind('submit', function(e) {
            var $form         = $(".validation"),
                inputVal = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'].join(', '),
                $inputs       = $form.find('.required').find(inputVal),
                $errorStatus = $form.find('div.error'),
                valid         = true;
            $errorStatus.addClass('hidden');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorStatus.removeClass('hidden');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-num').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeHandleResponse);
            }

        });

        function stripeHandleResponse(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hidden')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>
@endsection
