<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
  <title>@yield('title')</title>

  <link rel="stylesheet" href="/vendor/foundation-6.2.3-complete/css/foundation.min.css">


  @yield('css')
  <link rel="stylesheet" href="/css/main.css">

</head>

<body id="@yield('page_id')">

@yield('content')

<script src="/vendor/jQuery/jQuery-2.1.4.min.js"></script>
<script src="/vendor/foundation-6.2.3-complete/js/vendor/foundation.min.js"></script>
<script>
  $(document).foundation();
</script>
<script src="/vendor/vuejs/vue.js"></script>

@yield('js')

</body>
</html>