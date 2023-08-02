

<!-- resources/views/emails/my_email_view.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <!-- <title>Welcome to My Website</title> -->
</head>
<body>
    <!-- <h1>Welcome to My Website</h1> -->
    <p>Dear AIRCoDe,</p>
    <p>{{ $contactMessage->message }}</p>
    <p>Thanks,<br>{{ $contactMessage->name }}</p>
</body>
</html>

