{{-- @extends('templates/mainTemplate')

@section('title')
    Home
@endsection

@section('body')
	@extends('templates/navBar')
	
    
@endsection --}}
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no"
    />
    <meta
      name="description"
      content="Semantic-UI-Forest, collection of design, themes and templates for Semantic-UI."
    />
    <meta name="keywords" content="Semantic-UI, Theme, Design, Template" />
    <meta name="author" content="PPType" />
    <meta name="theme-color" content="#ffffff" />
    <title>Carousel Template for Semantic-UI</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
      type="text/css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
    />
    <style type="text/css">
      body {
        -webkit-font-smoothing: antialiased;
        -moz-font-smoothing: grayscale;
      }

      .ui.inverted.segment {
        background-color: #777;
      }

      .ui.vertical.segment:not(.inverted) {
        padding-top: 6rem;
        padding-bottom: 6rem;
      }

      .six.wide.column img {
        width: 100%;
      }

      .ui.borderless.inverted.menu {
        background-color: #2f2f2f;
        border-radius: 4px;
        flex-wrap: wrap;
      }

      .ui.borderless.inverted.menu .active.item {
        background-color: black;
      }

      span.sub {
        color: rgba(0, 0, 0, 0.6);
      }

      .ten.wide.column h1 {
        font-size: 3rem;
      }

      .ten.wide.column p {
        font-size: 1.5rem;
      }

      p code {
        color: #c7254e;
        background-color: #f9f2f4;
        border-radius: 4px;
        margin-left: 0.5rem;
        margin-right: 0.5rem;
      }

      .ui.tablet.computer.only.padded.grid {
        position: absolute;
        z-index: 8;
        width: 100%;
        top: 1rem;
      }

      .ui.mobile.only.grid .ui.menu .ui.vertical.menu {
        display: none;
      }

      .ui.mobile.only.grid .ui.vertical.menu .dropdown.icon {
        float: unset;
      }

      .ui.mobile.only.grid .ui.vertical.menu .dropdown.icon:before {
        content: "\f0d7";
      }

      .ui.mobile.only.grid .ui.vertical.menu .ui.dropdown.item .menu {
        position: static;
        width: 100%;
        background-color: unset;
        border: none;
      }

      .ui.mobile.only.grid .ui.vertical.menu .ui.dropdown.item {
        background-color: rgb(47, 47, 47);
      }

      .ui.mobile.only.grid .ui.vertical.menu .ui.dropdown.item .menu {
        margin-top: 6px;
      }

      .ui.mobile.only.grid .ui.vertical.menu .ui.dropdown.item .menu .header,
      .ui.mobile.only.grid .ui.vertical.menu .ui.dropdown.item .menu .item {
        color: rgba(255, 255, 255, 0.9) !important;
      }

      .slide .ui.inverted.vertical.segment {
        padding-top: 16rem;
        padding-bottom: 4rem;
        height: 600px;
      }

      .slide .ui.text.container {
        max-width: 70%;
      }

      .slick-dotted.slick-slider {
        margin-bottom: 0;
      }

      .slick-prev.slick-arrow {
        padding-left: 8rem;
        padding-right: calc(8rem + 20px);
        display: inline-block;
        height: 100%;
        z-index: 32;
        background: linear-gradient(
          to right,
          rgba(0, 0, 0, 0.5) 0%,
          rgba(0, 0, 0, 0.0001) 100%
        );
      }

      .slick-next.slick-arrow {
        padding-left: 8rem;
        padding-right: calc(8rem + 20px);
        display: inline-block;
        height: 100%;
        z-index: 32;
        background: linear-gradient(
          to left,
          rgba(0, 0, 0, 0.5) 0%,
          rgba(0, 0, 0, 0.0001) 100%
        );
      }

      @media only screen and (max-width: 767px) {
        .slick-prev.slick-arrow {
          padding-left: 4rem;
          padding-right: calc(4rem + 20px);
        }

        .slick-next.slick-arrow {
          padding-left: 4rem;
          padding-right: calc(4rem + 20px);
        }
      }

      .slick-dots {
        bottom: 15px;
      }

      .slide .ui.segment h1 {
        font-size: 3rem;
      }

      .slide .ui.segment p {
        font-size: 1.5rem;
      }
    </style>
  </head>

  <body id="root">
    <div class="ui tablet computer only padded grid">
      <div class="ui container">
        <div class="ui inverted borderless huge menu">
          <a class="header item">TaxiVIP</a>
		<a class="active item">Home</a> <a class="item" href="{{route('login')}}">Login</a>
          
        </div>
      </div>
    </div>
    <div class="ui mobile only grid">
      <div class="ui top fixed inverted borderless huge menu">
        <a class="header item">TaxiVIP</a>
        <div class="right menu">
          <div class="item">
            <button class="ui icon toggle basic inverted button">
              <i class="content icon"></i>
            </button>
          </div>
        </div>
        <div class="ui vertical borderless inverted fluid menu">
          <a class="active item">Home</a> <a class="item" href="{{route('login')}}" >Login</a>          
        </div>
      </div>
    </div>
    <div class="slide">
		
      <div class="ui inverted vertical center aligned segment" style="background-image: url({{asset('img/compromiso.jpg')}});">
		  
        <div class="ui active text container" >
			
		  <h1 class="ui inverted header">COMPROMISO</h1>
		  {{-- <img src="{{asset('img/taxi.jpg')}}" alt=""> --}}
          <p>
			Somos responsables de atenderle de la mejor manera y 
			de la mejor calidad posible brindandole una atención 
			de primera siempre.
          </p>
        </div>
      </div>
      <div class="ui inverted vertical center aligned segment"  style="background-image: url({{asset('img/respeto.jpg')}});">
        <div class="ui active text container">
          <h1 class="ui inverted header">RESPETO</h1>
          <p>
			Al viajar en nuestros taxis VIP se encontrará con el 
			personal altamente calificado para atender al cliente 
			con el más alto profesionalismo y atención.
          </p>
        </div>
      </div>
      <div class="ui inverted vertical center aligned segment"  style="background-image: url({{asset('img/taxi.jpg')}});">
        <div class="ui active text container">
          <h1 class="ui inverted header">HONESTIDAD</h1>
          <p>
			Cuidamos de cada detalle de nuestro servicio ofreciendo 
			los precios justos y cuidamos del cliente qué llegué a 
			su destino de una forma segura
          </p>
        </div>
      </div>
    </div>
    <div class="ui container">
      <div class="ui vertical segment">
        <div class="ui three column stackable center aligned grid container">
          <div class="column">
            <img
              class="ui centered small circular image"
              src="{{asset('img/mision.jpg')}}"
            />
            <h1 class="ui header">Misión</h1>
            <p>
				Satisfacer con un excelente servicio las necesidades de 
				nuestros clientes y del mercado. Buscando siempre la honestidad, 
				seguridad y calidad en el servicio ofrecido.
            </p>
          
          </div>
          <div class="column">
            <img
              class="ui centered small circular image"
              src="{{asset('img/vision.jpg')}}"
            />
            <h1 class="ui header">Visión</h1>
            <p>
				Asumimos el reto de ser la empresa operadora más confiable en 
				el ramo del Servicio de Transporte Terrestre en Tegucigalpa.
            </p>
          </div>
          <div class="column">
            <img
              class="ui centered small circular image"
              src="{{asset('img/valor.jpg')}}"
            />
            <h1 class="ui header">Valores</h1>
            <p>
				 <strong> Servicio al cliente: </strong>Superar las expectativas con actitud y vocación de servicio. <br>
				<strong>Honestidad: </strong>  Ser una empresa que cuente con atributos positivos y virtuosos tales como la integridad, veracidad y sinceridad.
            </p>
            
          </div>
        </div>
      </div>
      
    
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <script>
      $(document).ready(function() {
        $(".ui.toggle.button").click(function() {
          $(".mobile.only.grid .ui.vertical.menu").toggle(100);
        });

        $(".ui.dropdown").dropdown();

        $(".slide").slick({
          autoplay: true,
          dots: true,
          speed: 500
        });
      });
    </script>
  </body>
</html>