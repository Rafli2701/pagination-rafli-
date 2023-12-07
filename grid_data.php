<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIDINO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <nav class="flex justify-between flex items-center h-20 bg-[#219C90]">
        <a href="grid_data.php" class="text-[32px] text-white font-bold ml-10">SIDINO</a>
        <button class="bg-[#E9B824] font-medium text-[15px] text-white px-4 py-2 rounded-full transition duration-200 
            ease-in-out hover:bg-[#D83F31] focus:outline-none mr-7"><a href="logout.php" class="">Log Out</a></button>
    </nav>
    <div class="h-28 flex items-center justify-between w-full grid-cols-1 text-left">
        <div>
            <h1 class="text-lg font-medium tracking-tighter text-gray-950 lg:text-3xl ml-12">Your recent files</h1>
        </div>
        <!-- button -->
        <div class="self-end mb-4">
            <div class="flex space-x-2">
                <button onclick="showDialog()" class="inline-flex items-center px-2 py-2 bg-green-400 transition ease-in-out delay-75 hover:bg-green-500 text-white text-sm font-medium rounded-md hover:translate-y-1 hover:scale-110" type="submit">
                    <svg class="svg w-8 text-white" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <line x1="11" x2="11" y1="4" y2="18"></line>
                        <line x1="4" x2="18" y1="11" y2="11"></line>
                    </svg>

                    Add Folder
                </button>
                <button id="btn-download" class="inline-flex items-center px-2 py-2 bg-blue-500 transition ease-in-out delay-75 hover:bg-blue-600 text-white text-sm font-medium rounded-md hover:translate-y-1 hover:scale-110" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="19px" width="24px">
                        <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                        <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g id="Interface / Download">
                                <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#f1f1f1" d="M6 21H18M12 3V17M12 17L17 12M12 17L7 12" id="Vector"></path>
                            </g>
                        </g>
                    </svg>

                    Download
                </button>
                <div>
                    <button id="btn-delete" class="inline-flex items-center px-2 py-2 bg-red-600 transition ease-in-out 
                                   delay-75 hover:bg-red-700 text-white text-sm font-medium rounded-md hover:translate-y-1 
                                   hover:scale-110 mr-11">
                        <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                        </svg>

                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel -->
    <div class="max-w-7xl mx-auto">
        <div class="relative overflow-x-hidden shadow-md sm:rounded-lg">
            <div class="p-3 bg-[#219C90] flex justify-between items-center w-full">
                <label for="table-search" class="sr-only">Search</label>
                <form class="relative mt-1" action="grid_data.php" method="GET">
                    <button type="submit" class="absolute inset-y-0 right-0 px-4 py-2 font-medium text-white bg-blue-500 rounded-r-lg hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <input type="text" name="search" id="table-search" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5 " placeholder="Search for items">
                </form>
                <!-- bar show -->
                <div class="relative inline-flex">
                    <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232">
                        <path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero" />
                    </svg>
                    <!-- <h5>Show</h5> -->
                    <select name="" id="itemperpage" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                        <option value="GET" selected>Show Per Page</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="08">08</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>
                    <!-- <h5>Per Page</h5> -->
                </div>
                <div class="flex items-center space-x-4">
                    <div class="bg-gray-200 text-sm text-gray-500 leading-none border-2 border-gray-200 rounded-full inline-flex">
                        <a href="grid_data.php" class="inline-flex items-center transition-colors duration-300 ease-in focus:outline-none hover:text-blue-400 focus:text-blue-400 rounded-l-full px-4 py-2 active" id="grid">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="fill-current w-4 h-4 mr-2">
                                <rect x="3" y="3" width="7" height="7"></rect>
                                <rect x="14" y="3" width="7" height="7"></rect>
                                <rect x="14" y="14" width="7" height="7"></rect>
                                <rect x="3" y="14" width="7" height="7"></rect>
                            </svg>
                            <span>Grid</span>
                        </a>
                        <a href="tabel_data.php" class="inline-flex items-center transition-colors duration-300 ease-in focus:outline-none hover:text-blue-400 focus:text-blue-400 rounded-r-full px-4 py-2" id="list">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="fill-current w-4 h-4 mr-2">
                                <line x1="8" y1="6" x2="21" y2="6"></line>
                                <line x1="8" y1="12" x2="21" y2="12"></line>
                                <line x1="8" y1="18" x2="21" y2="18"></line>
                                <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                <line x1="3" y1="18" x2="3.01" y2="18"></line>
                            </svg>
                            <span>List</span>
                        </a>
                    </div>

                    <form action="upload.php" method="POST" enctype="multipart/form-data" class="flex items-center">
                        <div>
                            <input class="block w-60 pr-15 p-3 mr-1 overflow:hidden flex-auto rounded bg-gray-50 border border-gray-300 
                            text-gray-900 text-sm bg-clip-padding py-[0.32rem] text-base transition duration-300 ease-in-out 
                            file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid 
                            file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition 
                            file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] 
                            hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none 
                            focus:border-primary" type="file" name="file[]" id="formFileMultiple" multiple required>
                            <input type="hidden" name="tipe" value="grid_data">
                            <input type="hidden" name="current_folder">
                        </div>
                        <div class="mr-4">
                            <button class="cursor-pointer transition-all bg-blue-500 text-white px-4 py-[0.32rem] rounded-lg
                                        border-blue-600
                                         hover:brightness-110 
                                         active:brightness-90" type="submit" name="upload" value="upload">Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <input class="w-full ml-3 italic text-slate-500" type="text" id="field" />
            </div>
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 w-full">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center flex space-x-4">
                                <input id="checkAll" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                <label for="checkbox-all-search" class="">check all</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <!-- component -->
            <div id="content" class="w-full flex items-center grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5
             xl:grid-cols-5 gap-2 gap-y-2 bg-gradient-to-bl from-red-50 to-violet-50 pr-10">

            </div>
        </div>
        <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    </div>
    <!-- 123 -->
    <div class="bottom-field">
        <ul class="rounded-md text-center shrink-0 ml-10 p-2 list-none" id="pagination">
            <li href="#" id="prev" class=""><a class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-teal-400 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-white hover:bg-teal-400 focus:z-10 focus:outline-none focus:border-teal-300 focus:shadow-outline-teal active:bg-teal-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="Previous" v-on:click.prevent="changePage(pagination.current_page - 1)" href="#" id="prev"><svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg></a></li>
            <!-- page number here -->
            <li class="text-red-400" id=active></li>
            <li href="#" id="next" class=""><a class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-teal-400 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-white hover:bg-teal-400 focus:z-10 focus:outline-none focus:border-teal-300 focus:shadow-outline-teal active:bg-teal-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="Previous" v-on:click.prevent="changePage(pagination.current_page - 1)" href="#" id="next"><svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg></a></li>
        </ul>
    </div>
    <!-- footer -->
    <footer class="bg-white rounded-lg shadow m-4">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 sm:text-center ">© 2023 SkipperWebs. All Rights Reserved.
            </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 sm:mt-0">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">About</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
    </footer>

    <!-- modal -->
    <div onclick="hideDialog()" id="dialog" class="fixed z-10 opacity-0 hidden transition-opacity duration-500 inset-0 bg-black bg-opacity-50 w-screen overflow-y-auto flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div onclick="event.stopPropagation()" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-300 sm:mx-0 sm:h-10 sm:w-10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                            <Address></Address> Add Folder
                        </h3>
                        <div class="mt-2">
                            <input id="newFolderName" type="text" class="border p-2 w-full" placeholder="Enter folder name">
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button id="addFolderModalBtn" onclick="addFolder()" type="button" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Add</button>
                <button onclick="hideDialog()" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {

            // Dapatkan nilai parameter URL (jika ada)
            const urlParams = new URLSearchParams(window.location.search);
            const pathParam = urlParams.get('path');

            // Tentukan path berdasarkan parameter URL atau gunakan nilai default
            const defaultPath = pathParam || "uploads";

            $('input[name="current_folder"]').val(defaultPath);
            $('#field').val(defaultPath);

            // Panggil getAll dengan path yang ditentukan
            getAll(defaultPath, "");
            // Call getAll without a search term to display all data by default
            // getAll("uploads", "");

            // Add an event listener for the search input
            $('#table-search').on('input', function() {
                let searchInput = $(this).val();
                let currentPath = $('input[name="current_folder"]').val();
                getAll(currentPath, searchInput);
            });;
        });

        // modal
        function showDialog() {
            let dialog = document.getElementById('dialog');
            dialog.classList.remove('hidden');
            setTimeout(() => {
                    dialog.classList.remove('opacity-0');
                },
                300)
        }

        function hideDialog() {
            let dialog = document.getElementById('dialog');
            dialog.classList.add('hidden');
            setTimeout(() => {
                    dialog.classList.add('opacity-0');
                },
                500)
        }
        // create folder

        //get all
        let currentPath = "uploads";

        const getAll = (path, search) => {
            $.get("get.php?path=" + path, function(data, status) {
                data = JSON.parse(data);
                let dir = data.dir;
                let file = data.file;
                let html = "";
                let searchTerm = search.toLowerCase(); // Convert search term to lowercase for case-insensitive search

                for (var i = 0; i < dir.length; i++) {
                    let dir_path = path + "/" + dir[i];
                    let dir_name = dir[i];

                    if (dir_name.toLowerCase().includes(searchTerm) || dir_path.toLowerCase().includes(searchTerm)) {
                        html += `<div id="grid2" class="">
                    <div class="container p-5">
                        <div class="grid place-content-center grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-5 gap-4 gap-y-7 mx-10 cursor-pointer" data-type="dir" data-url="${dir_path}">
                                <div class="bg-white rounded-lg p-5 w-40">
                                    <div onclick="event.stopPropagation()" class="flex items-center">
                                        <input type="checkbox" value="${dir_path}" class="cb-file w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                    <img src="folder.png" alt="Default Icon" class="w-full h-max  rounded-md object-cover">
                                    <div class="px- py-1">
                                        <p class="text-gray-700 text-base truncate">
                                            ${dir_name}
                                        </p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>`
                    }
                }
                for (var i = 0; i < file.length; i++) {
                    let file_path = path + "/" + file[i];
                    let file_name = file[i];

                    if (file_name.toLowerCase().includes(searchTerm) || file_path.toLowerCase().includes(searchTerm)) {
                        html += `<div id="grid2" class="">
                    <div class="container p-5">
                        <div class="grid place-content-center grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-5 gap-4 gap-y-7 mx-10 cursor-pointer" data-type="file" data-url="${file_path}">
                                <div class="bg-white rounded-lg p-5 w-40">
                                    <div onclick="event.stopPropagation()" class="flex items-center">
                                        <input type="checkbox" value="${file_path}" class="cb-file w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                    ${['jpg', 'jpeg', 'png'].includes(file_name.toLowerCase().split(".").pop()) ? `<img src="${file_path}" alt="File Image" class="w-full my-2.5 h-28 max-w-full max-h-fit rounded-md object-cover">` : `<img src="default-icon.png" alt="Default Icon" class="w-full h-max  rounded-md object-cover">`}
                                    <div class="px- py-1">
                                        <p class="text-gray-700 text-base truncate">
                                            ${file_name}
                                        </p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>`
                    }
                }

                currentPath = path;

                $('#content').html(html);

                // Add click event listener to each row
                $('#content .grid').on('click', function() {
                    let url = $(this).data('url');
                    $('input[name="current_folder"]').val(url);
                    $('#field').val(url);
                    let type = $(this).data('type');

                    // Ganti nilai pathParam dengan url dari elemen yang diklik
                    const urlParams = new URLSearchParams(window.location.search);
                    urlParams.set('path', url);

                    // Ubah URL di browser tanpa refresh
                    window.history.replaceState({}, '', `${window.location.pathname}?${urlParams}`);

                    if (type === 'dir') {
                        getAll(url, ""); // Jika yang diklik adalah direktori, panggil getAll untuk direktori tersebut
                    }
                });
                paginationPage()
            });

        }

        $('#field').on('keypress', function(e) {
            if (e.which == 13) {
                window.location.replace(
                    "grid_data.php?path=" + $('#field').val()
                );
            }
        });
        //add folder
        function addFolder() {
            let folderName = $('#newFolderName').val();
            let currentPath = "uploads";

            // Validasi folderName
            if (!folderName) {
                alert("Folder name cannot be empty");
                return;
            }

            // Kirim permintaan AJAX ke server untuk menambahkan folder
            $.ajax({
                type: "POST",
                url: "addFolder.php",
                data: {
                    folderName: folderName,
                    path: currentPath
                },
                success: function(data) {
                    // Proses respons dari server
                    data = JSON.parse(data);
                    console.log(data);
                    if (data.success) {
                        // Jika penambahan berhasil, refresh konten dengan memanggil getAll
                        getAll(currentPath, "");
                        hideDialog();
                    } else {
                        alert("Failed to add folder: " + data.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX Error:", textStatus, errorThrown);
                    alert("Error adding folder. Please try again.");
                },
            });

        }


        // checkbox
        $('#checkAll').click(function() {
            $(':checkbox.cb-file').prop('checked', this.checked);
        });
        // button
        $('#btn-download').on('click', () => {
            $('.cb-file:checked').each(function() {
                var link = document.createElement('a');
                document.body.appendChild(link);
                link.setAttribute('download', '');
                link.href = this.value;
                link.click();
                link.remove();

            });
        })
        $('#btn-delete').on('click', () => {
            const selectedFiles = [];
            $('.cb-file:checked').each(function() {
                selectedFiles.push(this.value);
            });

            if (selectedFiles.length > 0) {
                // Kirim permintaan AJAX ke server untuk menghapus file atau folder
                $.ajax({
                    url: 'delete.php',
                    data: {
                        files: selectedFiles
                    },
                    type: 'post',
                    success: function(data) {
                        // Proses respons dari server
                        data = JSON.parse(data);
                        if (data.success) {
                            // Jika penghapusan berhasil, refresh konten dengan memanggil getAll
                            getAll(currentPath, "");
                        } else {
                            alert("Failed to delete: " + data.message);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX Error:", textStatus, errorThrown);
                        alert("Error deleting files. Please try again.");
                    },
                });
            } else {
                alert("No files or folders selected for deletion.");
            }
        });

        // pagination

        const paginationPage = () => {
            var tbody = document.querySelector("#content");
            var pageUl = document.querySelector("#pagination");
            var itemShow = document.querySelector("#itemperpage");
            var tr = tbody.querySelectorAll("#grid2");
            console.log(tr)
            var emptyBox = [];
            var index = 1;
            var itemPerPage = 8;

            for (let i = 0; i < tr.length; i++) {
                emptyBox.push(tr[i]);
            }

            itemShow.onchange = giveTrPerPage;

            function giveTrPerPage() {
                itemPerPage = Number(this.value);
                console.log(itemPerPage);
                displayPage(itemPerPage);
                pageGenerator(itemPerPage);
                getpagElement(itemPerPage);
            }

            function displayPage(limit) {
                tbody.innerHTML = '';
                for (let i = 0; i < limit; i++) {
                    tbody.appendChild(emptyBox[i]);
                }
                const pageNum = pageUl.querySelectorAll('.list');
                pageNum.forEach(n => n.remove());
            }
            displayPage(itemPerPage);

            function pageGenerator(getem) {
                const num_of_tr = emptyBox.length;
                if (num_of_tr <= getem) {
                    pageUl.style.display = 'none';
                } else {
                    pageUl.style.display = 'flex';
                    const num_Of_Page = Math.ceil(num_of_tr / getem);
                    for (i = 1; i <= num_Of_Page; i++) {
                        const li = document.createElement('button');
                        li.className = 'list';
                        const a = document.createElement('a');
                        a.href = '#';
                        a.innerText = i;
                        a.setAttribute('data-page', i);
                        li.appendChild(a);
                        pageUl.insertBefore(li, pageUl.querySelector('#next'));
                    }
                }
            }

            function pageGenerator(getem) {
                const num_of_tr = emptyBox.length;
                if (num_of_tr <= getem) {
                    pageUl.style.display = 'none';
                } else {
                    pageUl.style.display = 'flex';
                    const num_Of_Page = Math.ceil(num_of_tr / getem);
                    for (i = 1; i <= num_Of_Page; i++) {
                        const li = document.createElement('button');
                        li.className = 'list';
                        const a = document.createElement('a');
                        a.href = '#';
                        a.innerText = i;
                        a.setAttribute('data-page', i);
                        li.appendChild(a);
                        pageUl.insertBefore(li, pageUl.querySelector('#next'));
                    }
                }
            }
            pageGenerator(itemPerPage);
            let pageLink = pageUl.querySelectorAll("a");
            let lastPage = pageLink.length - 2;

            function pageRunner(page, items, lastPage, active) {
                let index = 1; // Menetapkan indeks awal ke 1
                let isPrevOperation = false; // Menandai apakah operasi sebelumnya adalah "prev"

                for (button of page) {
                    button.onclick = e => {
                        e.preventDefault();
                        const page_num = e.target.getAttribute('data-page');
                        const page_mover = e.target.getAttribute('id');

                        if (page_num != null) {
                            index = page_num;
                            isPrevOperation = false; // Reset flag jika menggunakan tombol langsung ke halaman tertentu
                        } else {
                            if (page_mover === "next") {
                                if (index < lastPage) {
                                    index++; // Jika tidak berada di halaman terakhir, naik ke halaman berikutnya
                                }
                            } else {
                                if (index > 1) {
                                    index--; // Jika tidak berada di halaman pertama, turun ke halaman sebelumnya
                                }
                                isPrevOperation = true; // Menandai bahwa operasi sebelumnya adalah "prev"
                            }
                        }
                        pageMaker(index, items, active);
                    }
                }
            }

            var pageLi = pageUl.querySelectorAll('.list', 'bg-red');
            pageLi[0].classList.add("active", "-ml-px", "relative", "inline-flex", "items-center", "px-4", "py-2", "border", "border-teal-300", "bg-teal-300", "text-sm", "leading-5", "font-medium", "text-white", "focus:z-10", "focus:outline-none", "focus:border-teal-300", "focus:shadow-outline-teal", "active:bg-tertiary", "active:text-white", "transition", "ease-in-out", "duration-150", "hover:bg-teal-200", "hover:border-teal-200");
            pageRunner(pageLink, itemPerPage, lastPage, pageLi);

            function getpagElement(val) {
                let pagelink = pageUl.querySelectorAll("a");
                let lastpage = pagelink.length - 2;
                let pageli = pageUl.querySelectorAll('.list', 'bg-red');
                pageli[0].classList.add("active", "-ml-px", "relative", "inline-flex", "items-center", "px-4", "py-2", "border", "border-teal-300", "bg-teal-300", "text-sm", "leading-5", "font-medium", "text-white", "focus:z-10", "focus:outline-none", "focus:border-teal-300", "focus:shadow-outline-teal", "active:bg-tertiary", "active:text-white", "transition", "ease-in-out", "duration-150", "hover:bg-teal-200", "hover:border-teal-200");
                pageRunner(pagelink, val, lastpage, pageli);

            }

            function pageMaker(index, item_per_page, activePage) {
                const start = item_per_page * index;
                const end = start + item_per_page;
                const current_page = emptyBox.slice((start - item_per_page), (end - item_per_page));
                tbody.innerHTML = "";
                for (let j = 0; j < current_page.length; j++) {
                    let item = current_page[j];
                    tbody.appendChild(item);
                }
                Array.from(activePage).forEach((e) => {
                    e.classList.remove("active", "-ml-px", "relative", "inline-flex", "items-center", "px-4", "py-2", "border", "border-teal-300", "bg-teal-300", "text-sm", "leading-5", "font-medium", "text-white", "focus:z-10", "focus:outline-none", "focus:border-teal-300", "focus:shadow-outline-teal", "active:bg-tertiary", "active:text-white", "transition", "ease-in-out", "duration-150", "hover:bg-teal-200", "hover:border-teal-200");
                });
                activePage[index - 1].classList.add("active", "-ml-px", "relative", "inline-flex", "items-center", "px-4", "py-2", "border", "border-teal-300", "bg-teal-300", "text-sm", "leading-5", "font-medium", "text-white", "focus:z-10", "focus:outline-none", "focus:border-teal-300", "focus:shadow-outline-teal", "active:bg-tertiary", "active:text-white", "transition", "ease-in-out", "duration-150", "hover:bg-teal-200", "hover:border-teal-200");
            }

        }
    </script>

</body>

</html>