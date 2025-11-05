<?php 
  $pageTitle = "Ozone Baral | Portfolio";
  include('includes/header.php'); 
?>

<!-- Hero Section -->
<section class="h-screen flex flex-col justify-center items-center text-center px-4">
  <h2 class="text-4xl md:text-6xl font-bold mb-4">
    Hi, I'm <span class="text-red-500">Ozone Baral</span>
  </h2>
  <p class="text-lg md:text-xl max-w-2xl text-gray-300 mb-8">
    Designer • Developer • Creator • F1 Enthusiast
  </p>
  <div class="space-x-4">
    <a href="capturesbyozon3.php" class="bg-red-600 hover:bg-red-700 px-6 py-3 rounded-full text-white font-semibold transition">Captures</a>
    <a href="f1withozon3.php" class="border border-red-600 px-6 py-3 rounded-full hover:bg-red-600 transition">F1 Live</a>
  </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-zinc-900 text-center px-4">
  <h3 class="text-3xl font-bold mb-6 text-red-500">About Me</h3>
  <p class="max-w-3xl mx-auto text-gray-300 text-lg">
    I'm a passionate web designer and developer with over 2 years of experience in creating 
    modern, responsive, and visually appealing web applications. I also love capturing 
    moments through my lens and creating F1-inspired content.
  </p>
</section>

<!-- Skills Section -->
<section id="skills" class="py-20 text-center px-4">
  <h3 class="text-3xl font-bold mb-6 text-red-500">What I Do</h3>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
    <?php
      $skills = [
        ["title" => "Web Design", "desc" => "Crafting beautiful and intuitive interfaces using Figma, Tailwind, and modern design systems."],
        ["title" => "Web Development", "desc" => "Building responsive and dynamic websites using HTML, CSS, JavaScript, PHP, and ASP.NET."],
        ["title" => "Content Creation", "desc" => "Creating engaging tech and F1 content across platforms like Instagram and TikTok."]
      ];
      foreach($skills as $skill): ?>
        <div class="p-6 bg-zinc-900 rounded-xl shadow-lg hover:-translate-y-2 transition">
          <h4 class="text-xl font-semibold mb-3 text-red-400"><?= $skill['title'] ?></h4>
          <p class="text-gray-400"><?= $skill['desc'] ?></p>
        </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-20 bg-zinc-900 text-center px-4">
  <h3 class="text-3xl font-bold mb-6 text-red-500">Explore My Work</h3>
  <div class="flex flex-wrap justify-center gap-8">
    <?php
      $projects = [
        ["link" => "capturesbyozon3.php", "text" => "Captures by Ozon3", "type" => "primary"],
        ["link" => "f1withozon3.php", "text" => "F1 with Ozon3", "type" => "border"],
        ["link" => "https://www.ozonebaral.com.np", "text" => "Portfolio", "type" => "dark"]
      ];

      foreach($projects as $project):
        $classes = match($project['type']) {
          'primary' => 'bg-red-600 hover:bg-red-700',
          'border'  => 'border border-red-600 hover:bg-red-600',
          default   => 'bg-zinc-800 hover:bg-zinc-700'
        };
    ?>
      <a href="<?= $project['link'] ?>" target="_blank" class="block <?= $classes ?> px-8 py-4 rounded-lg font-semibold transition"><?= $project['text'] ?></a>
    <?php endforeach; ?>
  </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 text-center px-4">
  <h3 class="text-3xl font-bold mb-6 text-red-500">Get In Touch</h3>
  <p class="text-gray-300 mb-6">Have a project in mind or just want to say hi? Let’s connect!</p>
  <a href="mailto:ozonebaral@gmail.com" class="bg-red-600 hover:bg-red-700 px-8 py-4 rounded-full font-semibold transition">Say Hello</a>
</section>

<?php include('includes/footer.php'); ?>
