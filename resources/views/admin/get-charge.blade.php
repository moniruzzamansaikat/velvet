@extends($activeTemplate.'layouts.master')
@section('content')
<div class="container">
    <h2>Pay with Stripe</h2>
    <form id="payment-form">
        <div id="card-element"><!--Stripe.js injects the Card Element--></div>
        <button id="submit" class="btn btn--base mt-3">Pay</button>
        <div id="payment-result"></div>
    </form>
</div>
@endsection

@push('script')
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ config("services.stripe.key") }}');
    let clientSecret;

    fetch('{{ route("admin.stripe.intent") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ amount: 300 }) // $3.00
    })
    .then(res => res.json())
    .then(data => {
        clientSecret = data.clientSecret;

        const elements = stripe.elements();
        const card = elements.create('card');
        card.mount('#card-element');

        document.getElementById('payment-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            const { paymentIntent, error } = await stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: card,
                }
            });

            if (error) {
                document.getElementById('payment-result').textContent = error.message;
            } else if (paymentIntent.status === 'succeeded') {
                document.getElementById('payment-result').textContent = 'Payment succeeded!';
            }
        });
    });
</script>
@endpush