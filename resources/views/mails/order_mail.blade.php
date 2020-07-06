<!DOCTYPE html>
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Conteny-Type" content = "text/html; charset=UTF-8"/>
</head>
<body>
<p> Dear {{$name}}</p>
<p>
    Thank you for choosing our shop.
</p>
<p> Your order:</p>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td>{{$item['item']['image_url']}}</td>
            <td>{{$item['item']['title']}}</td>
            <td>{{$item['item']['description']}}</td>
            <td>{{$item['item']['price']}}</td>
            <td>{{$item['qty']}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<p>Total price is: {{$totalPrice}}$</p>

<h3>Your address: {{$address}}</h3>
</body>
</html>
