<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <!-- Include your header content here -->
    </header>

    <main class="container mt-5">
        <h1>Checkout</h1>

        @if($cartItems->isEmpty())
            <div class="alert alert-info">
                Your cart is empty.
            </div>
        @else
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>{{ $item->course->name }}</td>
                            <td>${{ number_format($item->course->fee, 2) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->course->fee * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <script src="https://js.stripe.com/v3/"></script>
            <form id="payment-form" method="POST" action="{{ route('checkout.process') }}">
                @csrf
                <input type="hidden" name="payment_method" id="payment-method">
                <!-- Your other form fields -->
                <button type="submit">Pay</button>
            </form>
            
            <script>
                const stripe = Stripe('{{ env('STRIPE_KEY') }}');
                const elements = stripe.elements();
                const form = document.getElementById('payment-form');
            
                // Create an instance of Elements
                const cardElement = elements.create('card');
                cardElement.mount('#card-element');
            
                form.addEventListener('submit', async (event) => {
                    event.preventDefault();
            
                    const {paymentMethod, error} = await stripe.createPaymentMethod({
                        type: 'card',
                        card: cardElement,
                    });
            
                    if (error) {
                        console.error(error);
                    } else {
                        document.getElementById('payment-method').value = paymentMethod.id;
                        form.submit();
                    }
                });
            </script>

            <div class="d-flex justify-content-between">
                <h4>Total: ${{ number_format($cartTotal, 2) }}</h4>
                <!-- Add your payment form or button here -->
                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Proceed to Payment</button>
                </form>
            </div>
        @endif
    </main>

    <footer class="footer mt-5">
        <!-- Include your footer content here -->
    </footer>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>