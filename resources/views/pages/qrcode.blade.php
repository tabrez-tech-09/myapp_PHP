<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Payment QR Code</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;

            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .qr-container {
            background: white;

            width: 380px;

            padding: 30px;

            border-radius: 15px;

            text-align: center;

            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 10px;
            color: #222;
        }

        .amount {
            font-size: 28px;
            font-weight: bold;

            margin: 20px 0;

            color: #16a34a;
        }

        .payment-box {
            display: flex;
            justify-content: center;
            align-items: center;

            margin: 20px 0;
        }

        .qr-box svg {
            width: 250px;
            height: 250px;
        }

        .status {
            display: none;
            margin: 24px 0;
            font-size: 20px;
            font-weight: bold;
        }

        .status.success {
            color: #16a34a;
        }

        .status.failure {
            color: #dc2626;
        }

        .instruction {
            color: #666;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .back-btn {
            display: inline-block;

            padding: 12px 25px;

            background: #111827;
            color: white;

            text-decoration: none;

            border-radius: 8px;
        }

        .back-btn:hover {
            background: #000;
        }
    </style>
</head>

<body>

    <div class="qr-container">

        <h1>Scan & Pay</h1>

        <p>Payment Amount</p>

        <div class="amount">
            ₹{{ number_format($amount, 2) }}
        </div>

        <div class="qr-box">
            {!! $qr !!}
        </div>

        <p class="instruction">
            Scan this QR with any UPI app, or use Pay Now for verified payment status.
        </p>

        <div class="payment-box" id="payment-box">
            <button id="pay-button" class="back-btn" type="button">Pay Now</button>
        </div>

        <p id="payment-success" class="status success">Payment successful</p>
        <p id="payment-failure" class="status failure">Payment unsuccessful</p>

        <a href="{{ url('/') }}" class="back-btn">
            Back to Home
        </a>

    </div>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        const paymentBox = document.getElementById('payment-box');
        const successMessage = document.getElementById('payment-success');
        const failureMessage = document.getElementById('payment-failure');
        let paymentFinished = false;

        document.getElementById('pay-button').addEventListener('click', function () {
            const checkout = new Razorpay({
                key: @json($razorpayKey),
                amount: @json($order['amount']),
                currency: @json($order['currency']),
                name: 'Tabrez Rabbani',
                description: 'Payment',
                order_id: @json($order['id']),
                handler: async function (response) {
                    const verification = await fetch('{{ url('/api/payment/verify') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(response)
                    });

                    paymentFinished = true;
                    paymentBox.remove();
                    if (verification.ok) {
                        failureMessage.style.display = 'none';
                        successMessage.style.display = 'block';
                    } else {
                        successMessage.style.display = 'none';
                        failureMessage.style.display = 'block';
                    }
                },
                notes: {
                    amount: @json($amount)
                }
            });

            checkout.on('payment.failed', function () {
                paymentFinished = true;
                paymentBox.remove();
                successMessage.style.display = 'none';
                failureMessage.style.display = 'block';
            });

            checkout.on('modal.ondismiss', function () {
                if (!paymentFinished) {
                    failureMessage.style.display = 'none';
                }
            });

            checkout.open();
        });
    </script>

</body>

</html>
