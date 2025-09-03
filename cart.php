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
<br/>
<br/>
<br/>
  <div class="rounded-md shadow-xl max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-8 animate-slideDown">

  <!-- جدول -->
    <div class="lg:col-span-2">
      <h2 class="text-2xl font-bold text-gray-800 mb-6 text-right">سبد خرید</h2>

      <table class="w-full text-right border rounded overflow-hidden">
        <thead class="bg-gray-100 text-gray-700 ">
          <tr>
            <th class="p-3">محصول</th>
         <th class="p-3">تعداد</th>
            <th class="p-3">قیمت</th>
                <th class="p-3"></th>

          </tr>
        </thead>
        <tbody>
          <tr class="border-b">
            <td class="p-3 flex items-center gap-3">
              <img src="" alt="محصول" class="w-16 h-16 rounded">
              <span>اسم محصول</span>
            </td>
            <td class="p-3">
              <input type="number" value="1" min="1" class="w-16 text-center border rounded">
            </td>
            <td class="p-3 font-semibold"><span></span>
        </td>
        <td>
            <button class="bg-purple-500 text-white font-bold text-center cursor-pointer px-2.5 py-1 rounded hover:bg-purple-700 hover:حذف transition" alt="حذف">x</button>
        </td>    
          </tr>
        </tbody>
      </table>

      <div class="flex justify-between mt-6">
        <button class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-700 transition">بروزرسانی سبد خرید</button>
      </div>
    </div>

   <!-- فاکتور -->
    <div class="bg-white border rounded-lg p-6 shadow text-right">
      <h3 class="text-xl font-bold text-gray-800 mb-4">مجموع سبد خرید</h3>
      <div class="space-y-2 text-gray-700">
        <div class="flex justify-between">
          <span>قیمت کالا:</span>
          <span></span>
        </div>
        <div class="flex justify-between">
          <span>هزینه ارسال:</span>
          <span></span>
        </div>
        <hr class="my-2">
        <div class="flex justify-between font-bold text-lg">
          <span>مجموع کل:</span>
          <span></span>
        </div>
      </div>
      <button class="block w-full mt-6 bg-purple-500 text-white py-3 rounded hover:bg-purple-700 transition">ادامه جهت تسویه حساب</button>
    </div>

  </div>

</body>
</html>
