<?php
/*
Template Name: فرم تماس سفارشی
*/
defined('ABSPATH') || exit;
get_header();
?>
<?php
/*
Template Name: فرم تماس سفارشی
*/
defined('ABSPATH') || exit;
get_header();

$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_form_submitted'])) {
  $first_name = sanitize_text_field($_POST['first_name'] ?? '');
  $last_name = sanitize_text_field($_POST['last_name'] ?? '');
  $email = sanitize_email($_POST['email'] ?? '');
  $message = sanitize_textarea_field($_POST['message'] ?? '');

  if (empty($first_name) || empty($last_name) || empty($message)) {
    $error_message = 'اطلاعات کامل نیست. لطفاً همه فیلدهای ضروری را پر کنید.';
  } else {
    $success_message = 'پیام شما با موفقیت ارسال شد ✅';
  }
}

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

<div class="animate-slideDown max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-8 bg-white rounded-lg shadow-md" dir="rtl">

  <!-- فرم تماس -->
  <div class="bg-gray-50 p-6 rounded-lg border">
    <h2 class="text-xl font-bold text-gray-800 mb-6 text-right">فرم ارتباط با ما</h2>

    <div id="formAlert" class="hidden bg-red-100 text-red-800 p-4 rounded mb-4 text-right font-medium">
      اطلاعات کامل نیست. لطفاً همه فیلدهای ضروری را پر کنید.
    </div>

    <div id="formSuccess" class="hidden bg-green-100 text-green-800 p-4 rounded mb-4 text-right font-medium">
      پیام شما با موفقیت ارسال شد ✅
    </div>
<?php if (!empty($error_message)): ?>
  <div class="bg-red-100 text-red-800 p-4 rounded mb-4 text-right font-medium">
    <?= esc_html($error_message); ?>
  </div>
<?php endif; ?>

<?php if (!empty($success_message)): ?>
  <div class="bg-green-100 text-green-800 p-4 rounded mb-4 text-right font-medium">
    <?= esc_html($success_message); ?>
  </div>
<?php endif; ?>
    <form method="post" id="contactForm" novalidate>
      <input type="hidden" name="contact_form_submitted" value="1">

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <input type="text" name="first_name" placeholder="نام" class="w-full p-3 rounded border border-gray-300 text-right required-field">
        <input type="text" name="last_name" placeholder="نام خانوادگی" class="w-full p-3 rounded border border-gray-300 text-right required-field">
      </div>
      <br/>
      <input type="email" name="email" placeholder="ایمیل (اختیاری)" class="w-full p-3 rounded border border-gray-300 text-right">
      <br/><br/>
      <textarea name="message" rows="5" placeholder="توضیحات" class="w-full p-3 rounded border border-gray-300 text-right required-field"></textarea>
      <br/><br/>
      <button type="submit" class="w-full bg-green-500 text-white py-3 rounded hover:bg-green-700 transition">ارسال پیام ←</button>
    </form>
  </div>

  <!-- اطلاعات تماس -->
  <div class="flex flex-col justify-center p-6 text-right">
    <h2 class="text-xl font-bold text-gray-800 mb-4">ارتباط با ما</h2>
    <p class="mb-2 text-gray-700">📞 شماره تماس: <span class="font-semibold">09039036722</span></p>
    <p class="mb-6 text-gray-700">📧 ایمیل: <a href="mailto:khamirtabzi.narmak.organ@gmail.com" class="text-blue-600 hover:underline">hanifaraz82@gmail.com</a></p>

    <div class="flex justify-end space-x-4 rtl:space-x-reverse">
      <a href="#" class="text-blue-500 text-xl"><i class="fab fa-telegram"></i></a>
      <a href="#" class="text-green-500 text-xl"><i class="fab fa-whatsapp"></i></a>
      <a href="#" class="text-pink-500 text-xl"><i class="fab fa-instagram"></i></a>
    </div>
  </div>
</div>



<?php get_footer(); ?>
