<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <!-- Include your header content here -->
    </header>

    <main class="container mt-5">
        <h2>Your Cart</h2>
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
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>{{ $item->course->name }}</td>
                            <td>${{ number_format($item->course->fee, 2) }}</td>
                            <td>
                                <form action="{{ route('front.cart.remove', $item->id)}} " method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between">
                <h4>Total: ${{ number_format($cartTotal, 2) }}</h4>
                <a href="{{ route('front.orderConfirm') }}" class="btn btn-success">Pay using cart</a>
            </div>
        @endif
    </main>

    <footer class="footer mt-5">
        <!-- Include your footer content here -->
    </footer>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>