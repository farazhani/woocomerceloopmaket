
<style>
@keyframes slideDown {
  0% { transform: translateY(-50px); opacity: 0; }
  100% { transform: translateY(0); opacity: 1; }
}
.animate-slideDown {
  animation: slideDown 0.8s ease-out forwards;
}
</style>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ارتباط با ما</title>

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
<div class="animate-slideDown max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-8 bg-white rounded-lg shadow-md">

  <!-- فرم تماس -->
  <div class="bg-gray-50 p-6 rounded-lg border">
    <h2 class="text-xl font-bold text-gray-800 mb-6 text-right">فرم ارتباط با ما</h2>
   
      <input type="hidden" name="action" value="submit_contact_form">

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <input type="text" name="first_name" placeholder="نام" required class="w-full p-3 rounded border border-gray-300 text-right">
        <input type="text" name="last_name" placeholder="نام خانوادگی" required class="w-full p-3 rounded border border-gray-300 text-right">
      </div>
 <br/>
      <input type="email" name="email" placeholder="ایمیل" required class="w-full p-3 rounded border border-gray-300 text-right">
       <br/>
        <br/>
      <textarea name="message" rows="5" placeholder="توضیحات" required class="w-full p-3 rounded border border-gray-300 text-right"></textarea>
      <br/>
      <br/>
      <button type="submit" class="w-full bg-green-500 text-white py-3 rounded hover:bg-green-700 transition">ارسال پیام ←</button>
  
  </div>

  <!-- اطلاعات تماس -->
  <div class="flex flex-col justify-center p-6 text-right">
    <h2 class="text-xl font-bold text-gray-800 mb-4">ارتباط با ما</h2>
    <p class="mb-2 text-gray-700">📞 شماره تماس: <span class="font-semibold">09198741984</span></p>
    <p class="mb-6 text-gray-700">📧 ایمیل: <a href="hanifaraz82@gmail.com" class="text-blue-600 hover:underline">khamirtabzi.narmak.organ@gmail.com</a></p>

    <div class="flex justify-end space-x-4 rtl:space-x-reverse">
      <a href="#" class="text-blue-500 text-xl"><i class="fab fa-telegram"></i></a>
      <a href="#" class="text-green-500 text-xl"><i class="fab fa-whatsapp"></i></a>
      <a href="#" class="text-pink-500 text-xl"><i class="fab fa-instagram"></i></a>
    </div>
  </div>

</div>


