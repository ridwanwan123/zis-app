<?php
session_start();

if (!isset($_SESSION['page_visited'])) {
    header('Location: index.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('homepage/css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/utilites.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/checkout.css') }}">


    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

    <title>Checkout Pembayaran ZIS</title>
</head>

<body>
    <!-- Checkout Content -->
    <section class="checkout mx-auto pt-5">
        <div class="container-fluid">
            <div class="logo text-md-center text-start pb-30">
                <a class="" href="{{ url('/') }}">
                    <img src="{{ asset('homepage/image/logo.png') }}" />
                </a>
            </div>
            <div class="title-text pt-md-50 pt-0">
                <h2 class="text-4xl fw-bold color-palette-1 mb-20">Pembayaran ZIS</h2>
                <p class="text-4xl color-palette-1 mb-10 text-center"> "بركلاه لكى في أهلك و مليكة” </p>
                <p class="text-center">“Semoga Allah memberkahimu dalam keluarga dan hartamu.” (HR.
                    Bukhari)</p>
            </div>

            <hr>

            <div class="payment pt-md-50 pb-md-50 pt-50 pb-10">
                <h2 class="fw-bold text-2xl color-palette-1 mb-20">Informasi Pembayaran</h2>
                <p class="text-lg color-palette-1 mb-20">Nama Lengkap
                    <span class="purchase-details">
                        {{ $infaq->nama_donatur }}
                    </span>
                </p>
                <p class="text-lg color-palette-1 mb-20">Nomor Telepon
                    <span class="purchase-details">
                        {{ $infaq->phone }}
                    </span>
                </p>
                <p class="text-lg color-palette-1 mb-20">Nominal Pembayaran
                    <span class="purchase-details color-palette-4"> Rp.
                        {{ number_format($infaq->nominalInfaq) }}
                    </span>
                </p>
            </div>

            <div class="d-flex justify-content-md-end">
                <a class="btn btn-confirm-payment rounded-pill fw-medium text-white border-0 text-lg" role="button"
                    id="pay-button">Confirm
                    Payment</a>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    // alert("payment success!");
                    window.location.href = '/invoice/{{ $infaq->id }}'
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>

</body>

</html>
