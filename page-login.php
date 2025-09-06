<?php defined( 'ABSPATH' ) || exit; ?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ورود به سیستم سوپرمارکت</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-purple-100 to-purple-300 min-h-screen flex items-center justify-center font-sans">

  <div class="bg-white shadow-xl rounded-lg w-full max-w-md p-8 animate-fadeIn">
    <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">ورود به حساب سوپرمارکت</h2>

    <?php wc_print_notices(); ?>

    <form method="post" class="space-y-5">
      <?php do_action( 'woocommerce_login_form_start' ); ?>

      <div>
        <label for="username" class="block text-gray-700 mb-1">نام کاربری یا ایمیل</label>
        <input type="text" id="username" name="username" autocomplete="username"
          class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500" required>
      </div>

      <div>
        <label for="password" class="block text-gray-700 mb-1">رمز عبور</label>
        <input type="password" id="password" name="password" autocomplete="current-password"
          class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500" required>
      </div>

      <?php do_action( 'woocommerce_login_form' ); ?>

      <div class="flex items-center justify-between text-sm text-gray-600">
        <label class="flex items-center">
          <input type="checkbox" name="rememberme" class="form-checkbox text-purple-600" />
          <span class="ml-2">مرا به خاطر بسپار</span>
        </label>
        <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="text-purple-600 hover:underline">فراموشی رمز عبور</a>
      </div>

      <button type="submit" class="w-full bg-purple-600 text-white py-2 rounded hover:bg-purple-700 transition">
        ورود
      </button>

      <input type="hidden" name="redirect" value="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>">
      <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
      <?php do_action( 'woocommerce_login_form_end' ); ?>
    </form>

    <div class="mt-6 text-center text-sm text-gray-700">
      حساب کاربری ندارید؟
      <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>#register" class="text-purple-600 font-semibold hover:underline">ثبت‌نام کنید</a>
    </div>
  </div>

  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.6s ease-out forwards;
    }
  </style>

</body>
</html>
