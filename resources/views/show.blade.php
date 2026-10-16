<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $portfolio->full_name }}</title>
</head>

<style>

     body{

         background: linear-gradient(
             120deg, 
             #02f522c0 0%, 
             #87d18b 45%,
             #28a128 100%
        ); 
    }
</style>
<body>
    

    @include('template-' . $portfolio->template)
        <p><a href="{{ route('dashboard') }}">Back</a></p>
</body>
</html>