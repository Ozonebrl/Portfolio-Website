<?php
  $pageTitle = "Games by Ozon3 | Play Online";
  include('includes/header.php');
?>

<section class="py-20 px-6 bg-zinc-900 min-h-screen text-center">
  <h2 class="text-5xl font-bold text-red-500 mb-6">Games by Ozon3</h2>
  <p class="text-gray-300 text-lg max-w-2xl mx-auto mb-12">
    Play browser-based mini games — solo or with friends. Built and curated by <span class="text-red-400 font-semibold">Ozon3</span>.
  </p>

  <?php
    // Array of games (you can expand this later)
    $games = [
      [
        "title" => "Classic Snake",
        "type" => "Single Player",
        "thumbnail" => "games/assets/snake.png",
        "link" => "games/snake.php"
      ],
      [
        "title" => "Tic Tac Toe",
        "type" => "Multiplayer",
        "thumbnail" => "games/assets/tictactoe.png",
        "link" => "games/tic-tac-toe.php"
      ],
      [
        "title" => "Memory Match",
        "type" => "Single Player",
        "thumbnail" => "games/assets/memory.png",
        "link" => "games/memory.php"
      ]
    ];
  ?>

  <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-10 max-w-6xl mx-auto">
    <?php foreach($games as $game): ?>
      <div class="bg-zinc-800 rounded-xl overflow-hidden shadow-lg hover:scale-105 transition">
        <img src="<?php echo $game['thumbnail']; ?>" class="w-full h-48 object-cover" alt="<?php echo $game['title']; ?>">
        <div class="p-5 text-left">
          <h3 class="text-2xl font-semibold text-white mb-2"><?php echo $game['title']; ?></h3>
          <span class="inline-block bg-red-600 text-white text-xs px-3 py-1 rounded-full mb-4"><?php echo $game['type']; ?></span><br>
          <a href="<?php echo $game['link']; ?>" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">Play Now</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<?php include('includes/footer.php'); ?>
