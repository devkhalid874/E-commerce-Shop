<!DOCTYPE html>

<html>

<head>

    <title>Laravel E-commerce payment System</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>

</head>

<body>

    

<div class="container">

    

    <h1>Laravel E-commerce payment System</h1>

    

    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            <div class="panel panel-default credit-card-box">

                <div class="panel-heading display-table" >

                        <h3 class="panel-title" >Payment Details</h3>

                </div>

                <div class="panel-body">

    

                    @if (Session::has('success'))

                        <div class="alert alert-success text-center">

                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

                            <p>{{ Session::get('success') }}</p>

                        </div>

                    @endif

    

                    <form 
                        role="form" 
                        action="{{ route('stripe.post') }}" 
                        method="post" 
                        id="payment-form">
                        @csrf

                        <div class="form-row">
                            <label for="card-element">
                                Credit or debit card
                            </label>
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($100)</button>
                    </form>

                </div>

            </div>        

        </div>

    </div>

        

</div>

    

</body>



<script type="text/javascript">

document.addEventListener('DOMContentLoaded', function () {
    const stripe = Stripe("{{ env('STRIPE_KEY') }}"); // Use your publishable key
    const elements = stripe.elements();

    // Create an instance of the card Element
    const card = elements.create('card', {
        style: {
            base: {
                fontSize: '16px',
                color: '#32325d',
            },
        },
    });

    // Mount the card Element to the DOM
    card.mount('#card-element');

    // Handle form submission
    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async function (event) {
        event.preventDefault();

        const { token, error } = await stripe.createToken(card);

        if (error) {
            // Display error message
            const errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
        } else {
            // Add the token to the form and submit
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            form.submit();
        }
    });
});

</script>

</html>