<?php
defined('ABSPATH') || exit;
get_header();
?>

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<style>
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .animate-fadeIn {
    animation: fadeIn 0.6s ease-out forwards;
  }
  .error-border {
    border-color: #f87171 !important;
  }
</style>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-100 to-purple-300 px-4">

  <div class="bg-white shadow-xl rounded-lg w-full max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl p-6 sm:p-8 animate-fadeIn" dir="rtl">
    <h2 class="text-xl sm:text-2xl font-bold text-gray-800 text-center mb-6">ورود به حساب سوپرمارکت</h2>

    <div id="loginSuccess" class="hidden bg-green-100 text-green-800 p-4 rounded mb-4 text-right font-medium">
      ورود شما با موفقیت انجام شد ✅
    </div>
    <div id="loginError" class="hidden bg-red-100 text-red-800 p-4 rounded mb-4 text-right font-medium">
      اطلاعات کامل نیست. لطفاً همه فیلدها را وارد کنید.
    </div>

    <?php wc_print_notices(); ?>

    <form method="post" id="customLoginForm" class="space-y-5" novalidate>
      <?php do_action( 'woocommerce_login_form_start' ); ?>

      <div>
        <label for="username" class="block text-gray-700 mb-1 text-sm sm:text-base">نام کاربری یا ایمیل</label>
        <input type="text" id="username" name="username" autocomplete="username"
          class="w-full border border-gray-300 rounded px-4 py-2 text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-purple-500 required-field">
      </div>

      <div>
        <label for="password" class="block text-gray-700 mb-1 text-sm sm:text-base">رمز عبور</label>
        <div class="relative">
          <input type="password" id="password" name="password" autocomplete="current-password"
            class="w-full border border-gray-300 rounded px-4 py-2 pr-10 text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-purple-500 required-field">

          <!-- آیکن چشم -->
          <button type="button" id="togglePassword" class="absolute inset-y-0 left-0 flex items-center px-3 text-gray-500 hover:text-purple-600 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path id="eyeIcon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z
                   M2.458 12C3.732 7.943 7.523 5 12 5
                   c4.477 0 8.268 2.943 9.542 7
                   -1.274 4.057-5.065 7-9.542 7
                   -4.477 0-8.268-2.943-9.542-7z" />
            </svg>
          </button>
        </div>
      </div>

      <?php do_action( 'woocommerce_login_form' ); ?>

      <div class="flex items-center text-sm text-gray-600">
        <input type="checkbox" name="rememberme" class="form-checkbox text-purple-600" />
        <span class="mr-2">مرا به خاطر بسپار</span>
      </div>

      <button type="submit" name="login" class="w-full bg-purple-600 text-white py-2 rounded hover:bg-purple-700 transition text-sm sm:text-base">
        ورود
      </button>

      <input type="hidden" name="redirect" value="<?php echo esc_url( home_url( '/supermarket' ) ); ?>">
      <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
<?php do_action( 'woocommerce_login_form_end' ); ?>
    </form>
    <div class="mt-6 text-center text-sm text-gray-700">
  حساب کاربری ندارید؟
  <a href="<?php echo esc_url( home_url( '/ورود' ) ); ?>" class="text-purple-600 font-semibold hover:underline">ثبت‌نام کنید</a>
</div>

  </div>

<script>
  document.getElementById('customLoginForm').addEventListener('submit', function(e) {
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const successBox = document.getElementById('loginSuccess');
    const errorBox = document.getElementById('loginError');
    let valid = true;
    [username, password].forEach(field => {
  if (!field.value.trim()) {
    field.classList.add('error-border');
    valid = false;
  } else {
    field.classList.remove('error-border');
  }
});

if (!valid) {
  e.preventDefault();
  successBox.classList.add('hidden');
  errorBox.classList.remove('hidden');
} else {
  errorBox.classList.add('hidden');
  successBox.classList.remove('hidden');
}

  });

  document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordField = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    if (passwordField.type === 'password') {
  passwordField.type = 'text';
} else {
  passwordField.type = 'password';
}
  });
</script>

</body>
<?php get_footer(); ?>
