<?php
include("header.php");

?>

        <main class="h-full overflow-y-auto mt-16">
          <div class="container px-6 mx-auto grid gap-6 mb-8 ml-4 md:grid-cols-2 xl:grid-cols-3">
            <form action="process.php" method="post">
                <h1 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">YÖNETİCİ EKLE</h1>
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <br>  
                  <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Kullanıcı Adı</span>
                    <input type="text" name="admin_username"  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                  </label>
                  <br>
                  <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Şifre</span>
                    <input type="text" name="admin_password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                  </label>
                  <button type="submit" name="admin_add" class="px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">EKLE</button>
                </div>
            </form>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
