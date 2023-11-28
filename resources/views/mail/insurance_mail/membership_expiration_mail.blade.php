<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <p class=""> Dear Sir/ Ma'am</p>
    <p>Your membership program is set to expire in just 15 days. Renew your account conveniently through our official website or by visiting our Red Cross office.</p>

    <p>Here are your membership account informations:</p>
    <p>Program: {{$mail['level']}}</p>
    <p>Validity: {{$mail['start_at']}}-{{$mail['end_at']}}</p>
    <p>Status: {{$mail['status']}}</p>

    <p>Thank you!</p>

</body>
</html>