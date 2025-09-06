<?php defined( 'ABSPATH' ) || exit; ?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>سبد خرید</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    @keyframes slideDown {
      0% { transform: translateY(-50px); opacity: 0; }
      100% { transform: translateY(0); opacity: 1; }
    }
    .animate-slideDown {
      animation: slideDown 0.8s ease-out forwards;
    }
  </style>
</head>
<body class="bg-gray-50 font-sans">
<br/><br/><br/>

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
  <div class="rounded-md shadow-xl max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-8 animate-slideDown">

    <!-- جدول -->
    <div class="lg:col-span-2">
      <h2 class="text-2xl font-bold text-gray-800 mb-6 text-right">سبد خرید</h2>

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
          <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
            $_product   = $cart_item['data'];
            $product_id = $cart_item['product_id'];
            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) :
          ?>
          <tr class="border-b">
            <td class="p-3 flex items-center gap-3">
              <?php echo $_product->get_image( 'woocommerce_thumbnail', ['class' => 'w-16 h-16 rounded'] ); ?>
              <span><?php echo $_product->get_name(); ?></span>
            </td>
            <td class="p-3">
              <?php
                echo woocommerce_quantity_input([
                  'input_name'  => "cart[{$cart_item_key}][qty]",
                  'input_value' => $cart_item['quantity'],
                  'min_value'   => '1',
                  'max_value'   => $_product->get_max_purchase_quantity(),
                  'class'       => 'w-16 text-center border rounded'
                ], $_product, false);
              ?>
            </td>
            <td class="p-3 font-semibold">
              <?php echo wc_price($_product->get_price()); ?>
            </td>
            <td>
              <a href="<?php echo wc_get_cart_remove_url($cart_item_key); ?>" class="bg-purple-500 text-white font-bold text-center cursor-pointer px-2.5 py-1 rounded hover:bg-purple-700 transition">x</a>
            </td>
          </tr>
          <?php endif; endforeach; ?>
        </tbody>
      </table>

      <div class="flex justify-between mt-6">
        <button type="submit" name="update_cart" class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-700 transition">بروزرسانی سبد خرید</button>
        <?php do_action( 'woocommerce_cart_actions' ); ?>
        <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
      </div>
    </div>

    <!-- فاکتور -->
    <div class="bg-white border rounded-lg p-6 shadow text-right">
      <h3 class="text-xl font-bold text-gray-800 mb-4">مجموع سبد خرید</h3>
      <div class="space-y-2 text-gray-700">
