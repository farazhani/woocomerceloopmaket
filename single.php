<?php get_header(); ?>
<body class="bg-pink-50">

<div class="max-w-3xl mx-auto px-4 py-10 bg-pink-50 rounded-xl shadow-inner">
<article class="bg-white rounded-2xl shadow-lg p-8 transition duration-300 hover:shadow-2xl">
<h1 class="text-4xl font-bold text-rose-600 mb-6 leading-snug"><?php the_title(); ?></h1>
<div class="text-amber-500 text-sm mb-6 italic">منتشر شده در: <?php echo get_the_date(); ?></div>


    <?php if (has_post_thumbnail()) : ?>
      <img src="<?php the_post_thumbnail_url('large') ?>" alt="<?php the_title(); ?>" class="w-full rounded mb-6">
    <?php endif; ?>

<div class="prose prose-lg prose-rose max-w-none leading-relaxed">
  <?php the_content(); ?>

    </div>
  </article>
</div>
</body>
<?php get_footer(); ?>
