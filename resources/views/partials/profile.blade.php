<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<divc class="">
<p>Name: {{Auth::user()->name}}</p>
<p>Email: {{Auth::user()->email}}</p>
<p>Role: {{Auth::user()->role}}</p>
</div>

</body>
</html>