<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muran</title>
    <link href = "fonts/gotham pro/stylesheet.css" rel = "stylesheet" type = "text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Adamina&family=Montserrat&display=swap" rel="stylesheet">
    
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
</head>
<body>
    @include('beanie')
    
    <section class="section1">
      
      <p><a name="Главная"></a></p>

      <div class="container">

        <div class="line line1"></div>
        
        <div class="above"> 
          <div class="between">
          <h1 class="section1_h1"> ПРЕДСТАВИТЕЛЬ КОСМЕТИКИ MURAN</h1>
          <div class="line line2"></div>
          </div>
          <img src="img/Mask Group.png" alt="Foto" class="section1_Foto">
        </div>
        <div class="between">
          <i class='ph fa fa-phone'></i>
          <p class="section1_nomber">+38 099 947 19 23</p>
        </div>
        
        <button class="magazin"><a href="{{ route('products') }}" class="mag" > В магазин </a> </button>
        <div class="arrow"></div>
      </div>
    </section>

    @include('footer')
</body>
</html>