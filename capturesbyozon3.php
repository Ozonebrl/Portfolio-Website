<?php 
  $pageTitle = "Captures by Ozon3 | Ozone Baral";
  include('includes/header.php'); 
?>

<!-- Hero Section -->
<section class="h-[60vh] flex flex-col justify-center items-center text-center bg-zinc-900">
  <h2 class="text-4xl md:text-5xl font-bold text-red-500 mb-4">Captures by Ozon3</h2>
  <p class="text-gray-300 text-lg max-w-2xl">
    A collection of my creative captures and videos shared on Instagram & TikTok.  
    All moments. All energy. All passion.
  </p>
</section>

<!-- Videos Section -->
<section class="py-16 px-6">
  <h3 class="text-3xl font-bold text-center mb-10 text-red-500">My Latest Uploads</h3>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">

    <?php
      // Add your Instagram and TikTok post links here
      $videos = [
        [
          "platform" => "instagram",
          "url" => "https://www.instagram.com/reel/DQGSuYYjCAE/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==" // replace with your reel link
        ],
        [
          "platform" => "tiktok",
          "url" => "https://www.tiktok.com/@capturesbyozon3/video/7566439655881690388?is_from_webapp=1&sender_device=pc" // replace with your TikTok video link
        ],
        [
          "platform" => "instagram",
          "url" => "https://www.instagram.com/reel/DQEdvJWDGnh/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA=="
        ],
        [
          "platform" => "tiktok",
          "url" => "https://www.tiktok.com/@capturesbyozon3/video/7565745541905124629?is_from_webapp=1&sender_device=pc"
        ]
      ];

      foreach($videos as $video):
        if($video['platform'] === 'instagram'): ?>
          <!-- Instagram Embed -->
          <div class="bg-zinc-900 p-4 rounded-xl shadow-lg hover:-translate-y-2 transition">
            <blockquote class="instagram-media" data-instgrm-permalink="<?= $video['url']; ?>" data-instgrm-version="14"></blockquote>
          </div>
        <?php else: ?>
          <!-- TikTok Embed -->
          <div class="bg-zinc-900 p-4 rounded-xl shadow-lg hover:-translate-y-2 transition">
            <blockquote class="tiktok-embed" cite="<?= $video['url']; ?>" data-video-id="<?= basename($video['url']); ?>">
              <section></section>
            </blockquote>
          </div>
        <?php endif;
      endforeach;
    ?>

  </div>
</section>

<!-- Scripts for Instagram & TikTok Embeds -->
<script async src="https://www.instagram.com/embed.js"></script>
<script async src="https://www.tiktok.com/embed.js"></script>

<!-- Contact Section -->
<section class="py-20 text-center bg-zinc-900">
  <h3 class="text-3xl font-bold mb-6 text-red-500">Follow Me</h3>
  <p class="text-gray-300 mb-6">Stay connected for more creative content!</p>
  <div class="flex justify-center space-x-6">
    <a href="https://www.instagram.com/capturesbyozon3" target="_blank" class="bg-red-600 hover:bg-red-700 px-6 py-3 rounded-full font-semibold transition">Instagram</a>
    <a href="https://www.tiktok.com/@capturesbyozon3" target="_blank" class="border border-red-600 hover:bg-red-600 px-6 py-3 rounded-full font-semibold transition">TikTok</a>
  </div>
</section>

<?php include('includes/footer.php'); ?>
