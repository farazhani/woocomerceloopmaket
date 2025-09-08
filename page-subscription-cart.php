<?php
/*
Template Name: سبد خرید اشتراکی
*/
defined( 'ABSPATH' ) || exit;
get_header();

// دریافت ID محصولات اشتراکی از slug
$product_ids = [
  'ماهانه'   => wc_get_product_id_by_slug('monthly-subscription'),
  'سه‌ماهه'  => wc_get_product_id_by_slug('quarterly-subscription'),
  'شش‌ماهه'  => wc_get_product_id_by_slug('semiannual-subscription'),
];
?>

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-6" dir="rtl">
  <h1 class="text-xl sm:text-2xl font-bold mb-6 text-gray-800 text-right">انتخاب اشتراک سوپرمارکت</h1>

  <!-- پلن‌های اشتراک -->
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-8">
    <?php foreach ($product_ids as $label => $id): 
      $product = wc_get_product($id);
      if ($product): ?>
      <div class="border rounded-lg p-4 shadow hover:shadow-md transition text-right">
        <h2 class="text-base sm:text-lg font-semibold mb-2">اشتراک <?php echo esc_html($label); ?></h2>
        <p class="text-gray-600 mb-2 text-sm">ارسال هر <?php echo esc_html($label); ?></p>
        <p class="font-bold text-purple-700 text-sm sm:text-base"><?php echo wc_price($product->get_price()); ?></p>
        <form method="post" action="<?php echo esc_url( wc_get_cart_url() ); ?>">
          <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($id); ?>">
          <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded w-full mt-2 hover:bg-purple-700 text-sm sm:text-base">
            انتخاب اشتراک <?php echo esc_html($label); ?>
          </button>
        </form>
      </div>
    <?php endif; endforeach; ?>
  </div>

  <!-- فرم کد تخفیف -->
  <form method="post" class="discount-form mb-6">
    <label for="custom_discount_code" class="block mb-2 text-sm font-medium text-gray-700">کد تخفیف:</label>
    <div class="flex flex-col sm:flex-row-reverse gap-2">
      <input type="text" name="custom_discount_code" id="custom_discount_code" class="border rounded px-3 py-2 w-full text-right" placeholder="مثلاً: abcd1234">
      <button type="submit" name="apply_custom_discount" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 text-sm sm:text-base">
        اعمال
      </button>
    </div>
  </form>

  <!-- نمایش پیام‌ها -->
  <div class="mb-4">
    <?php wc_print_notices(); ?>
  </div>

  <!-- خلاصه سبد خرید -->
  <div class="border-t pt-6 text-right">
    <h2 class="text-lg font-semibold mb-4">سبد خرید شما</h2>
    <?php if ( WC()->cart->is_empty() ): ?>
      <p class="text-gray-600 text-sm">سبد خرید شما خالی است.</p>
    <?php else: ?>
      <?php foreach ( WC()->cart->get_cart() as $cart_item ): 
        $product = $cart_item['data'];
        ?>
        <div class="flex justify-between mb-2 text-gray-700 text-sm sm:text-base">
          <span><?php echo esc_html($product->get_name()); ?></span>
          <span class="font-bold"><?php echo wc_price($product->get_price()); ?></span>
        </div>
      <?php endforeach; ?>

      <div class="flex justify-between mb-2 text-gray-700 text-sm sm:text-base">
        <span>تخفیف:</span>
        <span class="font-bold text-green-600"><?php echo wc_price(WC()->cart->get_discount_total()); ?></span>
      </div>
      <div class="flex justify-between mb-4 text-gray-800 font-bold text-sm sm:text-base">
        <span>مجموع نهایی:</span>
          <!-- دکمه‌ها -->
  <div class="flex flex-col sm:flex-row-reverse gap-4">
    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 w-full text-sm sm:text-base text-center">
      ویرایش سبد خرید
    </a>
    <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 w-full text-sm sm:text-base text-center">
      ادامه جهت پرداخت
    </a>
  </div>
<?php endif; ?>
