<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href='http://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  {{ $head ?? '' }}
  <!-- Link a Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  {{-- aos integrazioni --}}
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icon-css/css/flag-icon.min.css">
  <title>Presto</title>
</head>

<body class="bg-custom-loyaut min-vh-100">

  <div class="d-flex flex-column justify-content-between vh-100">
    <script>
      AOS.init();
    </script>

    <x-navbar1 />

    <div class="content">
      {{ $slot }}
    </div>

    <x-lang />

    <x-footer />
  </div>
  <!-- Link a Bootstrap JS e Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>