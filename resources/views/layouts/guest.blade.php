<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
          
       
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
         

.min-h-screen
{
position:relative;
overflow:hidden;
display:flex;
-webkit-background-size:cover;
background-size:cover;
background-position:center center;
background-repeat:no-repeat;
height:100vh;
width:100%;
}
.min-h-screen:after
{
content:' ';
position:absolute;
z-index:-1;
left:0;
bottom:0;
}
.min-h-screen:before
{
content:' ';
width:100%;
height:100%;
position:absolute;
top:0;
left:0;
-webkit-backface-visibility:hidden;
-moz-backface-visibility: hidden;
-ms-backface-visibility: hidden;
backface-visibility: hidden;
-webkit-transform: translatez(0) scale(1.0, 1.0);
-ms-transform: translatez(0) scale(1.0, 1.0);
-o-transform: translatez(0) scale(1.0, 1.0);
transform: translatez(0) scale(1.0, 1.0);
-webkit-background-size:cover;
background-size:cover;
background-attachment:fixed;
animation:increase 60s linear 10ms infinite;
-webkit-transition:all 0.2s ease-in-out;
-moz-transition:all 0.2s ease-in-out;
-ms-transition:all 0.2s ease-in-out;
-o-transition:all 0.2s ease-in-out;
transition:all 0.2s ease-in-out;
z-index:-2;
background-image:url('/images/loginbg2.jpg');

}
@keyframes increase { 
     
     0%{transform:scale(1)}
   
     100%{transform:scale(1.5)}
}
.blur-box {
    background: rgba(255, 255, 255, 0.20);   /* transparency */
    backdrop-filter: blur(10px);            /* blur effect */
    -webkit-backdrop-filter: blur(10px);    /* safari support */
    border-radius: 16px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.btn-primary-custom {
        background-color: var(--primary);
        border-color: var(--primary);
    }

    .btn-primary-custom {
  position: relative;
  
  background: #ffd000;
  color: black !important;
  border: none;
  
  padding: 8px 20px;
  font-weight: 500;
  text-decoration: none;
  transition: all 0.4s ease;
  overflow: hidden;
  z-index: 1;
  cursor: pointer;
}

/* Glowing border animation */
.btn-primary-custom::before {
  content: "";
  position: absolute;
  inset: 0;
  
  padding: 2px;
  
  background-size: 200%;
  -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
  -webkit-mask-composite: xor;
  mask-composite: exclude;
  animation: glowBorder 3s linear infinite;
  transition: all 0.5s ease;
}

/* Subtle inner light flash */
.btn-primary-custom::after {
  content: "";
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);
  transform: scale(0);
  transition: transform 0.5s ease;
  z-index: 0;
}

/* Hover effects */
.btn-primary-custom:hover::after {
  transform: scale(1);
}

.btn-primary-custom:hover {
  background: #000;
  color: #fff !important;
  box-shadow: 0 0 25px rgba(0, 123, 255, 0.6), 0 0 35px rgba(0, 224, 255, 0.4);
}

.mt-4{
    color:black;
}


            </style>
    <body>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 blur-box shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
