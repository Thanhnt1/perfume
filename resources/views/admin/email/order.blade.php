<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Thank you for trust using our products.</h2>
    <p>Order detail: {{ sprintf('#SF%07d', $id)}}</p>
    <p>Total price: {{ number_format($total_price, 0) }}đ</p>
    <p>Receive date: {{ $receive_date }}</p>
    <hr>
    <h3>Any question please contact: <a href="{{ url('/') }}">Sunflower</a></h3>
</body>
</html>