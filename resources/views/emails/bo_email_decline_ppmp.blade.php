<!-- resources/views/emails/welcome.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
    <h1>Greetings Ma'am/Sir,</h1>
    <p>I would like to remind you for the Project Procurement Management Plan you submited to our office has been <b>DECLINE</b> due to reason <b style="color:red">{{ $mailData['body'] }}</b></p>
    <p>Please website to know more about your PPMP status Thank YOU!!</p>
    <!-- Add the email content here -->
</body>
</html>
