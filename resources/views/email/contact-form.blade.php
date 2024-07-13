<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Message</title>
</head>
<body>
    <h1>Contact Form Message</h1>
    <p>Name: {{ $details['name'] }}</p>
    <p>Email: {{ $details['email'] }}</p>
    <p>Phone: {{ $details['phone'] }}</p>
    <p>Subject: {{ $details['subject'] }}</p>
    <p>Message: {{ $details['message'] }}</p>
</body>
</html>
