<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>A World</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      @include('libraries.homestyle')

   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')

         <!-- banner section start -->
         @include('home.banner')
         <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- services section start -->
      @include('home.services')
      <!-- services section end -->
      <!-- about section start -->
      @include('home.about')
      <!-- about section end -->
      <!-- blog section start -->
     @include('home.blogsection')
      <!-- blog section end -->
      <!-- client section start -->
      @include('home.clientsection')
      <!-- client section start -->
      <!-- choose section start -->
      @include('home.choosesection')
      <!-- choose section end -->
      <!-- footer section start -->
      @include('home.footer')
      <!-- footer section end -->
      <!-- copyright section start -->
      @include('home.copyright')
      <!-- copyright section end -->
      <!-- Javascript files-->
      @include('libraries.script')

   </body>
</html>
