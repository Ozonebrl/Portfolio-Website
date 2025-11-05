<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $pageTitle ?? 'Ozone Baral | Portfolio'; ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
</head>
<body class="bg-black text-white font-sans">

  <!-- Navbar -->
  <header class="fixed top-0 left-0 w-full bg-black/80 backdrop-blur-md z-50">
    <nav class="container mx-auto flex justify-between items-center py-4 px-6">
      <h1 class="text-2xl font-bold text-red-500">Ozone<span class="text-white">Baral</span></h1>
      <ul class="flex space-x-6 text-lg">
        <li><a href="index.php" class="hover:text-red-500 transition">Home</a></li>
        <li><a href="capturesbyozon3.php" class="hover:text-red-500 transition">Captures</a></li>
        <li><a href="f1withozon3.php" class="hover:text-red-500 transition">F1 Live</a></li>
        <li><a href="#contact" class="hover:text-red-500 transition">Contact</a></li>
      </ul>
    </nav>
  </header>

  <main class="pt-20">
