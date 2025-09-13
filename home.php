<?php get_header(); ?>
<body class="bg-pink-50 w-full">

<div class="max-w-5xl mx-auto px-4 py-8 bg-pink-50 rounded-xl shadow-inner ">

<h1 class="text-4xl font-bold text-center text-rose-500 mb-8"> بلاگ‌های خوشمزه فروشگاه ما</h1>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
        <?php if (has_post_thumbnail()) : ?>
<a href="<?php the_permalink(); ?>" class="hover:text-rose-400 transition">
<img src="<?php the_post_thumbnail_url('medium') ?>" alt="<?php the_title(); ?>" class="w-full h-48 object-cover rounded-t-xl shadow-sm">
          </a>
        <?php endif; ?>
        <div class="p-4">
          <h2 class="text-xl font-semibold text-gray-800 mb-2">
            <a href="<?php the_permalink(); ?>" class="hover:text-pink-500 transition"><?php the_title(); ?></a>
          </h2>
          <p class="text-gray-600 text-sm"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
        </div>
      </div>
    <?php endwhile; endif; ?>
  </div>
</div>
</body>
<?php get_footer(); ?>
