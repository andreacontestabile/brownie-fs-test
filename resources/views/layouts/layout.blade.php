<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href={{asset("/css/app.css")}}>
  <title>Customize Your T-shirt.</title>
</head>
<body>

  @include('layouts.partials.header')

  <main>
    @yield('content')
  </main>
  
  @include('layouts.partials.footer')

</body>
</html>