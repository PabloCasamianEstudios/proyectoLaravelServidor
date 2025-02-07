<!-- ESTE FICHERO SERÁ LA BASE DEL RESTO -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? ''}}</title>
    @vite(["resources/css/app.css"])
</head>
<body>
<x-layouts.header/>
<x-layouts.nav/>
{{$slot}}
</body>
</html>
