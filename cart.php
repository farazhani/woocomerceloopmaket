<?php
/*
Template Name: سبد خرید اصلی
*/
defined('ABSPATH') || exit;
get_header();
?>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<style>
  @keyframes slideDown {
    0% { transform: translateY(-50px); opacity: 0; }
    100% { transform: translateY(0); opacity: 1; }
  }
  .animate-slideDown {
    animation: slideDown 0.8s ease-out forwards;
  }
  .error-border {
    border-color: #f87171 !important;
  }
</style>

<body class="bg-gray-50 font-sans">
<div class="rounded-md shadow-xl max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-8 animate-slideDown" dir="rtl">

  <!-- جدول سبد خرید -->
  <div class="lg:col-span-2">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-right">سبد خرید</h2>

    <?php if ( WC()->cart->is_empty() ): ?>
      <div class="bg-yellow-100 text-yellow-800 p-4 rounded mb-4 text-right font-medium">
        سبد خرید شما خالی است.
      </div>
      <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="block w-full bg-purple-600 text-white text-center py-3 rounded hover:bg-purple-700 transition">
        افزودن کالا به سبد خرید
      </a>
    <?php else: ?>
      <form method="post" action="<?php echo esc_url( wc_get_cart_url() ); ?>">
        <table class="w-full text-right border rounded overflow-hidden">
          <thead class="bg-gray-100 text-gray-700">
            <tr>
              <th class="p-3">محصول</th>
              <th class="p-3">تعداد</th>
              <th class="p-3">قیمت</th>
              <th class="p-3"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ):
              $product = $cart_item['data'];
              $product_id = $cart_item['product_id'];
              ?>
              <tr class="border-b">
                <td class="p-3 flex items-center gap-3">
                  <?php echo $product->get_image( 'woocommerce_thumbnail', ['class' => 'w-16 h-16 rounded'] ); ?>
                  <span><?php echo esc_html( $product->get_name() ); ?></span>
                </td>
                <td class="p-3">
                  <input type="number"
                    name="cart[<?php echo $cart_item_key; ?>][qty]"
                    value="<?php echo esc_attr( $cart_item['quantity'] ); ?>"
                    min="1"
                    class="qty-input w-16 text-center border rounded"
                    data-price="<?php echo esc_attr( $product->get_price() ); ?>">
                </td>
                <td class="p-3 font-semibold"><?php echo wc_price( $product->get_price() ); ?></td>
                <td class="p-3">
                  <a href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item_key ) ); ?>" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-700 transition">x</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

        <div class="flex justify-between mt-6">
          <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-800 transition">
            بروزرسانی سبد خرید
          </a>
        </div>
      </form>
    <?php endif; ?>
  </div>

  <!-- فاکتور -->
  <div class="bg-white border rounded-lg p-6 shadow text-right">
<h3 class="text-xl font-bold text-gray-800 mb-4">مجموع سبد خرید</h3>
    <div class="space-y-2 text-gray-700">

      <div class="flex justify-between">
        <span>هزینه ارسال:</span>
        <span>رایگان</span>
      </div>
    </div>
    <!-- فیلد آدرس ارسال -->
<form method="post" class="mt-8">
  <label for="delivery_address" class="block text-right text-gray-700 mb-2">آدرس ارسال بسته:</label>
  <textarea name="delivery_address" id="delivery_address" rows="3"
    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
    placeholder="مثلاً: تهران، خیابان آزادی، پلاک ۱۲۳"><?php echo isset($_POST['delivery_address']) ? esc_textarea($_POST['delivery_address']) : ''; ?></textarea>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['delivery_address'])): ?>
    <div class="bg-red-100 text-red-800 p-3 rounded mt-2 text-sm font-medium">
      لطفاً آدرس خود را وارد کنید.
    </div>
  <?php endif; ?>
</form>
      <div class="flex justify-between font-bold text-lg mt-4">
        <span class="text-right w-1/2">مجموع کل:</span>
        <span class="text-left w-1/2" id="cart-total">0 ریال</span>
      </div>
  </br>
      <hr/>
<!-- دکمه ادامه جهت تسویه حساب -->
<div class="mt-6">
<a 
   class="block w-full bg-purple-600 text-white text-center py-3 rounded hover:bg-purple-700 transition cursor-pointer">
  ادامه جهت تسویه حساب
</a>

</div>


  </div>
</div>

<!-- اسکریپت محاسبه مجموع کل -->
<script>
  function calculateCartTotal() {
    let total = 0;
    const inputs = document.querySelectorAll('.qty-input');
    inputs.forEach(input => {
  const quantity = parseInt(input.value) || 0;
  const price = parseInt(input.dataset.price) || 0;
  total += quantity * price;
});

const totalBox = document.getElementById('cart-total');
if (totalBox) {
  totalBox.textContent = total.toLocaleString() + ' ریال';
}

  }

  document.addEventListener('DOMContentLoaded', calculateCartTotal);
  document.querySelectorAll('.qty-input').forEach(input => {
    input.addEventListener('input', calculateCartTotal);
  });
</script>

<?php get_footer(); ?>
