<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                        <div
                            style="color: green;
                                border: 2px green solid;
                                text-align: center;
                                padding: 5px;margin-bottom: 10px;">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form id='checkout-form' method='post' action="{{url('/stripe/create-charge')}}">
                            @csrf
                            <input type='hidden' name='stripeToken' id='stripe-token-id'>
                            <label for="card-element" class="mb-5">Checkout Forms</label>
                            <br>
                            <input name="amount" id="amount" class="form-control" required placeholder="Amount"> <br />
                            <div id="card-element" class="form-control" ></div>
                            <button
                                id='pay-btn'
                                class="btn btn-success mt-3"
                                type="button"
                                style="margin-top: 20px; width: 100%;padding: 7px;"
                                onclick="createToken()">Pay Now
                            </button>
                        <form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('{{ env('STRIPE_KEY') }}')
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        function createToken() {
            document.getElementById("pay-btn").disabled = true;
            if($('#amount').val()=='' || $('#amount').val()==0)
           {
            alert("Invalid Amount Please enter correct Amount to Pay");
            document.getElementById("pay-btn").disabled = false;
           }else
           {

            stripe.createToken(cardElement).then(function(result) {



                if(typeof result.error != 'undefined') {
                    document.getElementById("pay-btn").disabled = false;
                    alert(result.error.message);
                }

                // creating token success
                if(typeof result.token != 'undefined') {
                    document.getElementById("stripe-token-id").value = result.token.id;
                    document.getElementById('checkout-form').submit();
                }
            });
           }
        }

    </script>
</body>
</html>