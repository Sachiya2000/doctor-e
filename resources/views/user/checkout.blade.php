@extends('dashboard')

@section('cards')
<script src="https://js.stripe.com/v3/"></script>
<form id="payment-form">
    <input type="text" id="amount" name="amount" placeholder="Enter amount">
    <div id="card-element"></div>
    <button id="card-button">Pay Now</button>
</form>
<div id="payment-message"></div>

<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    var cardButton = document.getElementById('card-button');
    var form = document.getElementById('payment-form');
    var message = document.getElementById('payment-message');

    cardButton.addEventListener('click', function(ev) {
        ev.preventDefault();
        stripe.confirmCardPayment("{{ $client_secret }}", {
            payment_method: {
                card: cardElement
            }
        }).then(function(result) {
            if (result.error) {
                message.textContent = result.error.message;
            } else {
                form.submit();
            }
        });
    });
</script>

@endsection
