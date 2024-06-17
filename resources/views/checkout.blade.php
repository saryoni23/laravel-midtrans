<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    {{-- midtrans --}}
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js"
        data-client-key="{{config('midtrans.client.key')}}"></script>

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{config('midtrans.client.key')}}"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{config('midtrans.client.key')}}"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <div class="card "style="width: 18rem;">

            <h1>detail Tiket</h1>
            <img src="{{asset('download.png')}}" alt="">
         <table>

             
             <tr> 
                 <td>Name</td>
                 <td>: {{$order->name}}</td>
                </tr>
                
                <tr> 
                    <td>No Hp</td>
                    <td>: {{$order->no_hp}}</td>
                </tr>
                
                <tr> 
                    <td>alamat</td>
                    <td>: {{$order->alamat}}</td>
                </tr>
                
                <tr> 
                    <td>Qty</td>
                    <td>: {{$order->qty}}</td>
                </tr>
                <tr> 
                    <td>total</td>
                    <td>: {{$order->total_price}}</td>
                </tr>
                
            </table>   
                <button id='pay-button' class='btn btn-primary'>bayar sekarang</button>
        </div>
    </div>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.pay('{{$snapToken}}',
                {
                    onSuccess: function (result) {
                        /* You may add your own implementation here */
                        alert("payment success!"); 
                        
                        console.log(result);
                    },
                    onPending: function (result) {
                        /* You may add your own implementation here */
                        alert("wating your payment!"); console.log(result);
                    },
                    onError: function (result) {
                        /* You may add your own implementation here */
                        alert("payment failed!"); console.log(result);
                    },
                    onClose: function () {
                        /* You may add your own implementation here */
                        alert('you closed the popup without finishing the payment');
                    }
                }
            );
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>