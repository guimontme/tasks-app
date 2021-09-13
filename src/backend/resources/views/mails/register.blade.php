<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New user registered</title>
</head>
<body style="background-color: #1a202c; font-family: 'Poppins', 'Arial', 'Helvetica', verdana,  sans-serif; color: #fff;">
<table>
    <tr>
        <td>
            <h1>New user registered</h1>
            <p>Name: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
        </td>
    </tr>
</table>
</body>
</html>
