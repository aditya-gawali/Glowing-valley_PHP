<div class="flex h-screen overflow-hidden">

    <?php include './components/sidebar.html' ?>

    <!-- ===== Content Area Start ===== -->
    <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">

        <?php include './components/header.html' ?>
        <!-- ===== Main Content Start ===== -->
        <main>
            <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                <!-- Breadcrumb Start -->
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-title-md2 font-bold text-black dark:text-white">
                        Contact Request
                    </h2>

                    <nav>
                        <ol class="flex items-center gap-2">
                            <li>
                                <a class="font-medium" href="index.php">Dashboard /</a>
                            </li>
                            <li class="font-medium text-primary">Contact Request</li>
                        </ol>
                    </nav>
                </div>

                <!-- Breadcrumb End -->
                <?php
                // include './components/cards.php'
                ?>

                <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">



                    <!-- ====== Table One Start -->
                    <div class="col-span-12 xl:col-span-12">
                        <!-- ====== Table Three Start -->
                        <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1 overflow-x-auto">
                            <div class="max-w-full overflow-x-auto">
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-2 text-left dark:bg-meta-4">
                                            <th class="min-w-[120px] px-4 py-4 font-medium text-black dark:text-white">
                                                Srno
                                            </th>
                                            <th class="min-w-[150px] px-4 py-4 font-medium text-black dark:text-white">
                                                First Name
                                            </th>
                                            <th class="min-w-[150px] px-4 py-4 font-medium text-black dark:text-white">
                                                Last Name
                                            </th>
                                            <th class="px-4 py-4 font-medium text-black dark:text-white">
                                                Email
                                            </th>
                                            <th class="px-4 py-4 font-medium text-black dark:text-white">
                                                Mobile
                                            </th>
                                            
                                            <th class="px-4 py-4 font-medium text-black dark:text-white">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = $conn->query("SELECT * FROM contact");

                                        $query->execute();

                                        $data = $query->fetchAll(PDO::FETCH_OBJ);
                                        $id = 0;

                                        foreach ($data as $row) :
                                            $id++;
                                        ?>
                                            <tr>

                                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                                    <p class="text-black dark:text-white"><?php echo $id; ?></p>
                                                </td>
                                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                                    <p class="text-black dark:text-white"><?php echo $row->fn; ?></p>
                                                </td>
                                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                                    <p class="text-black dark:text-white"><?php echo $row->ln; ?></p>
                                                </td>
                                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                                    <p class="text-black dark:text-white"><?php echo $row->email; ?></p>
                                                </td>
                                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                                    <p class="text-black dark:text-white"><?php echo $row->mob; ?></p>
                                                </td>

                                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                                    <div class="flex items-center space-x-3.5">


                                                        <a onclick="deleteConfirm(<?php echo $row->id; ?>)">
                                                            <button class="hover:text-danger">
                                                                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96565V4.8094C2.72852 5.42815 3.09414 5.9344 3.62852 6.1594L4.07852 15.4688C4.13477 16.6219 5.09102 17.5219 6.24414 17.5219H11.7004C12.8535 17.5219 13.8098 16.6219 13.866 15.4688L14.3441 6.13127C14.8785 5.90627 15.2441 5.3719 15.2441 4.78127V3.93752C15.2441 3.15002 14.5691 2.47502 13.7535 2.47502ZM7.67852 1.9969C7.67852 1.85627 7.79102 1.74377 7.93164 1.74377H10.0973C10.2379 1.74377 10.3504 1.85627 10.3504 1.9969V2.47502H7.70664V1.9969H7.67852ZM4.02227 3.96565C4.02227 3.85315 4.10664 3.74065 4.24727 3.74065H13.7535C13.866 3.74065 13.9785 3.82502 13.9785 3.96565V4.8094C13.9785 4.9219 13.8941 5.0344 13.7535 5.0344H4.24727C4.13477 5.0344 4.02227 4.95002 4.02227 4.8094V3.96565ZM11.7285 16.2563H6.27227C5.79414 16.2563 5.40039 15.8906 5.37227 15.3844L4.95039 6.2719H13.0785L12.6566 15.3844C12.6004 15.8625 12.2066 16.2563 11.7285 16.2563Z" fill="" />
                                                                    <path d="M9.00039 9.11255C8.66289 9.11255 8.35352 9.3938 8.35352 9.75942V13.3313C8.35352 13.6688 8.63477 13.9782 9.00039 13.9782C9.33789 13.9782 9.64727 13.6969 9.64727 13.3313V9.75942C9.64727 9.3938 9.33789 9.11255 9.00039 9.11255Z" fill="" />
                                                                    <path d="M11.2502 9.67504C10.8846 9.64692 10.6033 9.90004 10.5752 10.2657L10.4064 12.7407C10.3783 13.0782 10.6314 13.3875 10.9971 13.4157C11.0252 13.4157 11.0252 13.4157 11.0533 13.4157C11.3908 13.4157 11.6721 13.1625 11.6721 12.825L11.8408 10.35C11.8408 9.98442 11.5877 9.70317 11.2502 9.67504Z" fill="" />
                                                                    <path d="M6.72245 9.67504C6.38495 9.70317 6.1037 10.0125 6.13182 10.35L6.3287 12.825C6.35683 13.1625 6.63808 13.4157 6.94745 13.4157C6.97558 13.4157 6.97558 13.4157 7.0037 13.4157C7.3412 13.3875 7.62245 13.0782 7.59433 12.7407L7.39745 10.2657C7.39745 9.90004 7.08808 9.64692 6.72245 9.67504Z" fill="" />
                                                                </svg>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </td>

                                                <script>
                                                    const deleteConfirm = (id) => {
                                                        if (confirm("Are you sure you want to delete this item?")) {
                                                            window.location.href = `./db/cdelete.php?id=${id}`;
                                                        }
                                                    }
                                                </script>


                                            </tr>

                                        <?php
                                        endforeach;
                                        ?>
                                        <!-- <tr>No data found</tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- ====== Table Three End -->
                    </div>
                    <!-- ====== Table One End -->

                </div>
            </div>
        </main>
        <!-- ===== Main Content End ===== -->
    </div>
    <!-- ===== Content Area End ===== -->
</div>