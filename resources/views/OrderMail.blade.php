
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Order</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 style="color: #0c5460 ;text-align: center">OBA Shop</h1>
            <p style="color: black ;text-align: center  ; ">
                Dear   @php
                $user=Auth::user()->name;
                echo $user;
            @endphp,

                We are delighted to inform you that your order has been successfully processed! We wanted to take a moment to express our gratitude for choosing our services and entrusting us with your order.

                At omar shop, we strive to provide an exceptional shopping experience, and we are thrilled that we could meet your expectations. Our dedicated team has worked diligently to ensure that your order was handled with care and efficiency.

                Rest assured that we are now proceeding with the necessary steps to prepare your items for shipment. Our fulfillment team will carefully package your order, ensuring that it reaches you in pristine condition and within the estimated delivery timeframe.

                If you have any questions or require further assistance regarding your order, please don't hesitate to reach out to our customer support team. We are always here to help and provide any necessary information.

                Once again, thank you for choosing Omar shop . We genuinely appreciate your business and look forward to serving you again in the future.

                Warm regards,



            </p>
<ul>
    <li>
        @php
        $user=Auth::user()->name;
        echo $user;
    @endphp



    </li>
    <li> @php
        $user=Auth::user()->email;
        echo $user;
    @endphp</li>
    <li>  Omar Shop</li>
</ul>



        </div>
    </div>
</div>
</body>

</html>
