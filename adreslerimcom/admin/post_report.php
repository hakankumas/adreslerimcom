<?php
include("header.php");
include("connect.php");
include("query_reports.php");


?>

        <main class="h-full overflow-y-auto mt-16 ml-4">
          <div class="container px-6 mx-auto grid gap-6 mb-8 ml-4 md:grid-cols-2 xl:grid-cols-3">
            <form action="process.php" method="post">
                <h1 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">DUYURU YAYINLA</h1>
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                  <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Duyuru Metni Giriniz...</span>
                    <textarea name="report_text" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3"></textarea>
                  </label>
                  <button type="submit" name="post_report" class="px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">YAYINLA</button>
                </div>
            </form>
          </div>
        <!-- </main>
      </div>
    </div> -->

<!-- DATATABLE -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

        <!-- <main class="h-full pb-16 overflow-y-auto"> -->
          <div class="container grid px-6 mx-auto mt-16 ml-4">
            <!-- With avatar -->
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">YAYINLANMIŞ DUYURULAR</h4>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto table-responsive">
                <table class="table table-striped table-bordered display nowrap" id="myTable">
                  <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                      <th hidden>DUYURU ID</th>
                      <th class="px-4 py-3">DUYURU METNİ</th>
                      <th class="px-4 py-3">YAYINLANMA TARİHİ</th>
                      <th class="px-4 py-3">SİL</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  <?php foreach ($reports_list as $list){?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3" hidden>
                        <div class="flex items-center text-sm">
                          <div hidden>
                            <p class="font-semibold"><?= $list->admin_report_id ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold"><?= $list->report_text ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold"><?= $list->report_date ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm"><a href="delete.php?reportlistid=<?= $list->admin_report_id ?>" class="btn btn-danger">Sil</a></td>
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