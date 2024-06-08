<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    @include('libraries.admincss')

  </head>
  <body>
    <header class="header">
      @include('admin.adminnavbar')
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')

      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            @include('admin.count')

        </section>
        <section class="no-padding-bottom">
            @include('admin.chart')

        </section>
        <section class="no-padding-bottom">
            @include('admin.anothercount')

        </section>
        <section class="no-padding-bottom">

        </section>
        <section class="margin-bottom-sm">
            @include('admin.saleschart')

        </section>
        <section class="no-padding-bottom">
            @include("admin.todolist")

        </section>
        <section>
            @include("admin.totalcount")

        </section>
        <footer class="footer">
          @include("admin.footer")
        </footer>
      </div>
    </div>
    @include("libraries.adminscript")
  </body>
</html>
