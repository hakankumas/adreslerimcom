<?php
include("header.php");
include("connect.php");
include("query_userinfo.php");

?>

<!-- DATATABLE -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

        <main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto mt-16 ml-4">
            <!-- With avatar -->
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">KULLANICI BİLGİLERİ</h4>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto table-responsive">
                <table class="table table-striped table-bordered display nowrap" id="myTable">
                  <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                      <th hidden>KULLANICI ID</th>
                      <th class="px-4 py-3">KULLANICI ADI</th>
                      <th class="px-4 py-3">AD</th>
                      <th class="px-4 py-3">SOYAD</th>
                      <th class="px-4 py-3">CİNSİYET</th>
                      <th class="px-4 py-3">DOĞUM TARİHİ</th>
                      <th class="px-4 py-3">TELEFON</th>
                      <th class="px-4 py-3">MAİL</th>
                      <th class="px-4 py-3">BİYOGRAFİ</th>
                      <th class="px-4 py-3">SİL</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  <?php foreach ($user_list as $list){?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3" hidden>
                        <div class="flex items-center text-sm">
                          <div hidden>
                            <p class="font-semibold"><?= $list->user_id ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold"><?= $list->user_username ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold"><?= $list->user_name ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold"><?= $list->user_surname ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold"><?= $list->gender_name ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold"><?= $list->user_birthday ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold"><?= $list->user_tel ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold"><?= $list->user_mail ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold"><?= $list->user_about ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm"><a href="delete.php?userlistid=<?= $list->user_id ?>" class="btn btn-danger">Sil</a></td>
                    </tr>
                  </tbody>
                  <?php } ?>
                </table>
              </div>
            </div>
          </div>
        </main>
      </div>
  </body>
</html>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>