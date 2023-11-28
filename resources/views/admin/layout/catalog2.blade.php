@extends('admin.main')

@section('content')
    {{-- <div id="card" class="container card shadow p-4 ms-2 me-2 mt-3 position-fixed"> --}}
    <!-- Button trigger modal -->
    <button onclick="ShowModal3()" type="button" class="btn btn-primary mt-4 " data-bs-toggle="modal"
        data-bs-target="#exampleModalinternational">
        Add Catalog Data zz
    </button>
    {{-- <select id="cbCity" class="js-example-basic-single" name="state">
            <option value="">Choose...</option>
        </select> --}}
    {{-- <a href="/admin-catalog/create" class="btn btn-primary mt-4 ms-4 me-4">
            Add Catalog Data
        </a> --}}



    {{-- tabel --}}
    <div class="mt-2 table-responsive">
        <table class="display" id="data-tables">
            <thead>
                <tr>
                    <th>Pictures</th>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Categories</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($catalogs as $catalog)
                    <tr>
                        <td></td>
                        <td>{{ $catalog->title }}</td>
                        <td>{{ $catalog->location }}</td>
                        <td>{{ $catalog->price }}</td>
                        <td>{{ $catalog->description }}</td>
                        <td>{{ $catalog->categories }}</td>
                        <td>
                            <a id="edit" onclick="ShowModal2('{{ $catalog->id }}')" type="button"
                                class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $catalog->id }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <input type="hidden" id="Modal2" name="id_catalog" value="exampleModal1{{ $catalog->id }}">
                            <form action="/deletecataloginternational" class="d-inline" method="POST">
                                @method('delete')
                                @csrf
                                <input type="hidden" id="" name="id_catalog" value="{{ $catalog->id }}">
                                <button class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete data?')">
                                    <i class="fa-solid fa-trash "></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- end tabel --}}

    {{-- </div> --}}

    <!-- Modal -->

    <div class="modal fade" id="exampleModalinternational" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Input Catalog Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" ari a-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/uploadcataloginternational" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Title</span>
                            <input type="text"
                                class="form-control @error('title')
                            is-invalid
                        @enderror"
                                placeholder="Title (Max 225 word)" aria-label="Title" aria-describedby="basic-addon1"
                                name="title" required>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="">
                            {{-- <span class="input-group-text" id="basic-addon1">Location</span>
                            <input type="text"
                                class="form-control @error('location')
                            is-invalid
                        @enderror"
                                placeholder="Location" aria-label="Location" aria-describedby="basic-addon1"
                                name="location">
                            @error('location')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label class="input-group-text" for="inputGroupSelect01">Location</label> --}}
                            <div style="width: 100%; height: 40px;" class="">
                                <select style="width: 100%;" id="cbCityInput"
                                    class="js-example-basic-single select1international col-9 @error('location') is-invalid @enderror"
                                    name="location">
                                    <option value="">Choose...</option>
                                    <option value="National">National</option>
                                    <option value="International">International</option>
                                </select>
                                @error('location')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
                            <select class="form-select" id="inputGroupSelect01" name="jk">
                                <option selected>Choose...</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div> --}}
                        <div class="input-group mb-3">
                            <span
                                class="input-group-text @error('location')
                                mt-3
                            @enderror"
                                id="basic-addon1">Starting price</span>
                            <input id="price" type="text"
                                class="form-control @error('price')
                            is-invalid
                        @enderror @error('location')
                        mt-3
                    @enderror"
                                placeholder=" Starting price..." aria-label="Price" aria-describedby="basic-addon1"
                                name="price" required>
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Description</span>
                            <input type="text"
                                class="form-control @error('description')
                                is-invalid
                                @enderror"
                                placeholder="Description" aria-label="Description" aria-describedby="basic-addon1"
                                name="description" required>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Categories</span> --}}
                        {{-- <input type="text"
                                    class="form-control @error('categories')
                            is-invalid
                        @enderror"
                                    placeholder="Categories" aria-label="Categories" aria-describedby="basic-addon1"
                                    name="include"> --}}
                        {{-- <select
                                class="form-select @error('categories')
                                is-invalid
                            @enderror"
                                id="inputGroupSelect01" name="categories">
                                <option value="National">National</option>
                                <option value="International">International</option>
                            </select>
                            @error('categories')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        {{-- <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Pictures</span>
                            <input type="file" class="form-control" placeholder="Pictures" aria-label="Pictures"
                                aria-describedby="basic-addon1" name="pictures">
                        </div> --}}
                        {{-- <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Price</span>
                            <input type="text" class="form-control" placeholder="Nama" aria-label="Username"
                                aria-describedby="basic-addon1" name="nama">
                        </div> --}}
                        {{-- <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
                            <select class="form-select" id="inputGroupSelect01" name="jk">
                                <option selected>Choose...</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
                {{-- <button onclick="zzz()" type="button" class="btn btn-primary mt-4 ms-4 me-4" id="myButton">
                    zzzz
                </button> --}}
            </div>
        </div>
    </div>
    {{-- end modal --}}

    <!-- Edit Modal -->
    @foreach ($catalogs as $catalog)
        <div class="modal fade Modal2" id="editModal{{ $catalog->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" id="modal1">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Catalog Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" ari a-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/updatecataloginternational" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" class="ppp" name="id_catalog" value="{{ $catalog->id }}">

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Title</span>
                                <input value="{{ old('title', $catalog->title) }}" type="text"
                                    class="form-control @error('title')
                            is-invalid
                        @enderror"
                                    placeholder="Title (Max 225 word)" aria-label="Title" aria-describedby="basic-addon1"
                                    name="title" required>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                {{-- <span class="input-group-text" id="basic-addon1">Location</span>
                                <input type="text"
                                    class="form-control @error('location')
                            is-invalid
                        @enderror"
                                    placeholder="Location" aria-label="Location" aria-describedby="basic-addon1"
                                    name="location">
                                @error('location')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror --}}
                                {{-- <label class="input-group-text" for="inputGroupSelect01">Location</label> --}}
                                {{-- <div style="width: 100%; height: 40px;" class=""> --}}
                                {{-- <select style="width: 100%;" id="cbCityEdit{{ $catalog->id }}"
                                            class="js-example-basic-single col-9 @error('location') is-invalid @enderror"
                                            name="location">
                                            <option value="">Choose...</option>
                                        </select> --}}
                                <span class="input-group-text" id="basic-addon1">Location</span>
                                <input value="{{ old('locationold', $catalog->location) }}" type="text"
                                    class="form-control @error('locationold')
                            is-invalid
                        @enderror"
                                    placeholder="" aria-label="locationold" aria-describedby="basic-addon1"
                                    name="locationold" readonly>
                                @error('locationold')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                {{-- </div> --}}
                            </div>
                            <div class="">
                                {{-- <span class="input-group-text" id="basic-addon1">Location</span>
                                    <input type="text"
                                        class="form-control @error('location')
                                is-invalid
                            @enderror"
                                        placeholder="Location" aria-label="Location" aria-describedby="basic-addon1"
                                        name="location">
                                    @error('location')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror --}}
                                {{-- <label class="input-group-text" for="inputGroupSelect01">Location</label> --}}
                                <div style="width: 100%; height: 40px;" class="">
                                    <input type="hidden" class="pp" value="cbCityEdit{{ $catalog->id }}">
                                    <select style="width: 100%;" id="cbCityEdit"
                                        class="js-example-basic-single select2{{ $catalog->id }} col-9 @error('location') is-invalid @enderror"
                                        name="location">
                                        <option value="">Choose...</option>
                                        <option value="National">National</option>
                                        <option value="International">International</option>
                                    </select>
                                    @error('location')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <span
                                    class="input-group-text @error('location')
                                mt-3
                            @enderror"
                                    id="basic-addon1">Starting price</span>
                                <input value="{{ old('price', $catalog->price) }}" id="price2" type="text"
                                    class="form-control @error('price')
                            is-invalid
                        @enderror @error('location')
                        mt-3
                    @enderror"
                                    placeholder=" Starting price..." aria-label="Price" aria-describedby="basic-addon1"
                                    name="price" required>
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Description</span>
                                <input value="{{ old('description', $catalog->description) }}" type="text"
                                    class="form-control @error('description')
                                is-invalid
                                @enderror"
                                    placeholder="Description" aria-label="Description" aria-describedby="basic-addon1"
                                    name="description" required>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Categories</span> --}}
                            {{-- <input type="text"
                                    class="form-control @error('categories')
                            is-invalid
                        @enderror"
                                    placeholder="Categories" aria-label="Categories" aria-describedby="basic-addon1"
                                    name="include"> --}}
                            {{-- <select
                                    class="form-select @error('categories')
                                is-invalid
                            @enderror"
                                    id="inputGroupSelect01" name="categories">
                                    @if ($catalog->categories == 'National')
                                        <option value="National">National</option>
                                        <option value="International">International</option>
                                    @elseif ($catalog->categories == 'International')
                                        <option value="International">International</option>
                                        <option value="National">National</option>
                                    @endif

                                </select>
                                @error('categories')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            {{-- <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Pictures</span>
                            <input type="file" class="form-control" placeholder="Pictures" aria-label="Pictures"
                                aria-describedby="basic-addon1" name="pictures">
                        </div> --}}
                            {{-- <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Price</span>
                            <input type="text" class="form-control" placeholder="Nama" aria-label="Username"
                                aria-describedby="basic-addon1" name="nama">
                        </div> --}}
                            {{-- <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
                            <select class="form-select" id="inputGroupSelect01" name="jk">
                                <option selected>Choose...</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                    {{-- <button onclick="getModal2Value()" type="button" class="btn btn-primary mt-4 ms-4 me-4"
                        id="myButton">
                        zzzz
                    </button> --}}
                </div>
            </div>
        </div>
        {{-- end modal --}}
    @endforeach


    <script>
        // var currentModalId = null; // Variabel global untuk menyimpan modalId saat ini

        // // Fungsi untuk menangani saat modal ditampilkan
        // function handleModalShown(modalId) {
        //     // Dapatkan nilai dari input id_catalog dalam modal yang ditampilkan
        //     var idCatalogValue = document.getElementById(modalId).querySelector('[name="id_catalog"]').value;
        //     console.log(idCatalogValue);

        //     // Dapatkan nilai dari input id_catalog dalam 
        //     var exampleModalId = modalId.replace("editModal", "exampleModal1");
        //     var exampleModalIdCatalogValue = document.getElementById(exampleModalId).value;
        //     console.log(exampleModalIdCatalogValue);

        //     // Simpan modalId saat ini ke dalam variabel global
        //     currentModalId = modalId;
        // }

        // // Event listener untuk modal yang ditampilkan
        // $('.Modal2').on('shown.bs.modal', function(e) {
        //     var modalId = e.target.id;
        //     handleModalShown(modalId);
        // });

        // function getModal2Value() {
        //     // Mendapatkan modal yang sedang ditampilkan
        //     var activeModal = document.querySelector('.modal.show');
        //     var value;

        //     if (activeModal) {
        //         // Mencari input dengan id "Modal2" di dalam modal yang sedang ditampilkan
        //         var modal2Input = activeModal.querySelector('#Modal2');

        //         if (modal2Input) {
        //             var value = modal2Input.value;
        //             // return value;
        //             // return value;
        //         }
        //     }
        //     console.log(value); // Anda dapat menggunakan value ini sesuai kebutuhan
        //     // return;
        //     return value;
        // }
        // var select_box = document.querySelector('#inputGroupSelect01');

        // dselect(select_box, {
        //     search: true
        // });

        // $(document).ready(function() {
        //     $('.js-example-basic-single').select2();
        // });

        // var elements = document.getElementsByClassName("modal2");
        // var Modal2 = elements[0].value;







        // $(document).ready(function() {
        //     $('#cbCityInput').select2();
        // });

        // $(document).ready(function() {
        //     $('#cbCityEdit').select2();
        // });


        // $('.modal2').ready(function() {
        //     // Dapatkan nilai dari elemen input
        //     var idCatalog = document.getElementById("id_catalog").value;

        //     // Buat ID untuk elemen #exampleModal
        //     var modalId = '#exampleModal' + idCatalog;

        //     // Mendapatkan elemen tombol berdasarkan ID
        //     var button = document.getElementById("myButton");

        //     // Menambahkan event listener untuk tombol
        //     button.addEventListener("click", function() {
        //         console.log(idCatalog);
        //     });
        // });

        // console.log(modalId);
        // $('.select2').each(function() {
        //     var catalogId = $(this).data('catalog-id');
        //     $(this).select2({
        //         placeholder: 'Select an location...',
        //         dropdownParent: '#exampleModal' + catalogId
        //     });
        // });


        // $('.select2').select2({
        //     placeholder: 'Select an location...',
        //     dropdownParent: $('.modal2')
        // });


        $(document).ready(function() {
            $('#data-tables').DataTable();
        });

        $(document).ready(function() {
            $("#price").keyup(function() {
                $(this).maskNumber({
                    integer: true,
                    thousands: "."
                })
            })
        });

        $(document).ready(function() {
            $("#price2").keyup(function() {
                $(this).maskNumber({
                    integer: true,
                    thousands: "."
                })
            })
        });

        // // Dapatkan elemen <select> berdasarkan ID
        // const selectElement = document.getElementById('cbCity');

        // // Loop melalui data provinsi dan kota untuk membuat opsi
        // data.forEach((provinsi) => {
        //     provinsi.kota.forEach((kota) => {
        //         // Ubah nama kota menjadi format yang diinginkan (tanpa spasi, titik, huruf kecil semua)
        //         const formattedKota = kota.replace(/ /g, '').replace('.', '').toLowerCase();

        //         // Buat elemen <option>
        //         const option = document.createElement('option');
        //         option.value = formattedKota;
        //         option.textContent = kota;

        //         // Tambahkan elemen <option> ke dalam elemen <select>
        //         selectElement.appendChild(option);
        //     });
        // });

        // // Fungsi untuk mengisi ulang elemen <select> dengan opsi berdasarkan data
        // function populateSelect(selectId) {
        //     // Dapatkan elemen <select> berdasarkan ID
        //     const selectElement = document.getElementById(selectId);

        //     // // Hapus opsi yang ada (selain opsi default pertama)
        //     while (selectElement.options.length > 1) {
        //         selectElement.remove(1);
        //     }

        //     // Loop melalui data provinsi dan kota untuk membuat opsi
        //     data.forEach((provinsi) => {
        //         provinsi.kota.forEach((kota) => {
        //             // Ubah nama kota menjadi format yang diinginkan (tanpa spasi, titik, huruf kecil semua)
        //             const formattedKota = kota.replace(/ /g, '').replace('.', '').toLowerCase();

        //             // Buat elemen <option>
        //             const option = document.createElement('option');
        //             option.value = kota;
        //             option.textContent = kota;

        //             // Tambahkan elemen <option> ke dalam elemen <select>
        //             selectElement.appendChild(option);
        //         });
        //     });
        // }
        // var catalogData = @json($catalogs2);

        // // Panggil fungsi ini saat modal edit pertama kali ditampilkan
        // $('#exampleModal').on('show.bs.modal', function() {
        //     populateSelect('cbCityInput');

        // });

        // coba select2

        // // Dapatkan elemen select pertama dan kedua
        // const select1 = document.getElementById("cbCityInput");
        // const select2 = document.getElementById("cbCityEdit");

        // // Dapatkan data kota dari variabel data

        // Fungsi untuk mengisi elemen select dengan data kota
        // function isiSelect(select, data) {
        //     // Kosongkan elemen select
        //     select.innerHTML = "";

        //     // Buat opsi "Choose..." pertama
        //     const chooseOption = document.createElement("option");
        //     chooseOption.value = "";
        //     chooseOption.textContent = "Choose...";
        //     select.appendChild(chooseOption);

        //     // Tambahkan opsi kota ke elemen select
        //     data.forEach(kota => {
        //         const option = document.createElement("option");
        //         option.value = kota;
        //         option.textContent = kota;
        //         select.appendChild(option);
        //     });
        // }



        // $(modalId).ready(function() {
        //     $('.select2').select2({
        //         placeholder: 'Select an location...',
        //         dropdownParent: modalId
        //     });
        // });

        // $('#editModal8').ready(function() {
        //     isiSelect(select2, kotaData);
        // });





        // Isi kedua elemen select dengan data kota

        function ShowModal3() {
            // const kotaData = data.map(provinsi => provinsi.kota).flat();
            // isiSelect(select1, kotaData);
            // var Modal2 = document.getElementById("Modal2").value;
            $('#exampleModalinternational').ready(function() {
                $('.select1international').select2({
                    placeholder: 'Select an location...',
                    dropdownParent: '#exampleModalinternational'
                });
            });
            // $('.select1').select2({
            //     placeholder: 'Select an location...',
            //     dropdownParent: '#exampleModal'
            // });

            // $('.select2').select2({
            //     placeholder: 'Select an location...',
            //     dropdownParent: '#exampleModal16'
            // });
            // var catalogData = @json($catalogs2);
            // var baseId = '#exampleModal1';
            // catalogData.forEach(function(item, index) {
            //     var elementId = baseId + index; // Membuat ID unik untuk setiap elemen
            //     $(elementId + ' .select2').select2({
            //         placeholder: 'Select an location...',
            //         dropdownParent: elementId
            //     });
            // });
            // console.log(Modal2);
        }

        function ShowModal2(catalogId) {

            // Temukan elemen input dengan id "Modal2"
            var modalInput = "#editModal" + catalogId;
            var select = ".select2" + catalogId;
            console.log(modalInput);

            // $(modalInput).ready(function() {

            // });

            $(modalInput).ready(function() {
                $(select).select2({
                    placeholder: 'Select an new location...',
                    dropdownParent: modalInput
                });
            });


            // var modalInput = document.getElementById("Modal2");

            // Ubah nilai input "Modal2" sesuai dengan catalogId yang diterima sebagai parameter
            // modalInput.value = "exampleModal1" + catalogId;

            // Sekarang Anda dapat menggunakan nilai ini di dalam modal
            // Contoh: console.log(modalInput.value);


            // console.log(currentModalId);
            // $('.Modal2').ready(function() {
            //     var activeModal = document.querySelector('.modal.show');
            //     var value;

            //     if (activeModal) {
            //         // Mencari input dengan id "Modal2" di dalam modal yang sedang ditampilkan
            //         var modal2Input = activeModal.querySelector('#Modal2');

            //         if (modal2Input) {
            //             var value = modal2Input.value;
            //             // return value;
            //             return value;
            //         }
            //     }
            // });

            // const kotaData = data.map(provinsi => provinsi.kota).flat();
            // isiSelect(select2, kotaData);
            // var Modal2 = document.getElementById("Modal2").value;
            // var Modal2 = document.getElementById("Modal2");
            // var modalId = document.querySelector(".Modal2");
            // var idValue = modalId.getAttribute("id");
            // $('.select2').select2({
            //     placeholder: 'Select an location...',
            //     dropdownParent: '#'
            // });

            // $('.Modal2').ready(function() {
            // });
            // $('.Modal2').ready(function() {
            // var modalId = document.querySelector(".ppp").value;
            // var isi = getModal2Value();
            // console.log(value);
            // $('#editModal3').ready(function() {
            //     // var idValue = modalId.getAtribute("id");
            //     // if (condition) {

            //     // }
            //     $('.select23').ready(function() {
            //         $('.select23').select2({
            //             placeholder: 'Select an location...',
            //             dropdownParent: '#editModal3'
            //         });
            //     });
            // });
            // $('.select28').select2({
            //     placeholder: 'Select an location...',
            //     dropdownParent: '#editModal8'
            // });
            // $('.select29').select2({
            //     placeholder: 'Select an location...',
            //     dropdownParent: '#editModal9'
            // });


            // $(document).ready(function() {
            //     $('.select2').select2();
            // });
            // var catalogData = @json($catalogs2);
            // var baseId = '#exampleModal1';
            // catalogData.forEach(function(item, index) {
            //     var elementId = baseId + index; // Membuat ID unik untuk setiap elemen
            //     $(elementId + ' .select2').select2({
            //         placeholder: 'Select an location...',
            //         dropdownParent: elementId
            //     });
            // });
        }

        // coba select2



        // catalogData.forEach(function(catalog) {

        // });




        const data = [{
                "provinsi": "Aceh",
                "kota": [
                    "Kota Banda Aceh",
                    "Kota Sabang",
                    "Kota Lhokseumawe",
                    "Kota Langsa",
                    "Kota Subulussalam",
                    "Kab. Aceh Selatan",
                    "Kab. Aceh Tenggara",
                    "Kab. Aceh Timur",
                    "Kab. Aceh Tengah",
                    "Kab. Aceh Barat",
                    "Kab. Aceh Besar",
                    "Kab. Pidie",
                    "Kab. Aceh Utara",
                    "Kab. Simeulue",
                    "Kab. Aceh Singkil",
                    "Kab. Bireun",
                    "Kab. Aceh Barat Daya",
                    "Kab. Gayo Lues",
                    "Kab. Aceh Jaya",
                    "Kab. Nagan Raya",
                    "Kab. Aceh Tamiang",
                    "Kab. Bener Meriah",
                    "Kab. Pidie Jaya"
                ]
            },

            {
                "provinsi": "Sumatera Utara",
                "kota": [
                    "Kota Medan",
                    "Kota Pematang Siantar",
                    "Kota Sibolga",
                    "Kota Tanjung Balai",
                    "Kota Binjai",
                    "Kota Tebing Tinggi",
                    "Kota Padang Sidempuan",
                    "Kota Gunung Sitoli",
                    "Kab. Serdang Bedagai",
                    "Kab. Samosir ",
                    "Kab. Humbang Hasundutan",
                    "Kab. Pakpak Bharat",
                    "Kab. Nias Selatan",
                    "Kab. Mandailing Natal",
                    "Kab. Toba Samosir",
                    "Kab. Dairi",
                    "Kab. Labuhan Batu",
                    "Kab. Asahan",
                    "Kab. Simalungun",
                    "Kab. Deli Serdang",
                    "Kab. Karo",
                    "Kab. Langkat",
                    "Kab. Nias",
                    "Kab. Tapanuli Selatan",
                    "Kab. Tapanuli Utara",
                    "Kab. Tapanuli Tengah",
                    "Kab. Batu Bara",
                    "Kab. Padang Lawas Utara",
                    "Kab. Padang Lawas",
                    "Kab. Labuhanbatu Selatan",
                    "Kab. Labuhanbatu Utara",
                    "Kab. Nias Utara",
                    "Kab. Nias Barat"
                ]
            },

            {
                "provinsi": "Sumatera Barat",
                "kota": [
                    "Kota Padang",
                    "Kota Solok",
                    "Kota Sawhlunto",
                    "Kota Padang Panjang",
                    "Kota Bukittinggi",
                    "Kota Payakumbuh",
                    "Kota Pariaman",
                    "Kab. Pasaman Barat",
                    "Kab. Solok Selatan",
                    "Kab. Dharmasraya",
                    "Kab. Kepulauan Mentawai",
                    "Kab. Pasaman",
                    "Kab. Lima Puluh Kota",
                    "Kab. Agam",
                    "Kab. Padang Pariaman",
                    "Kab. Tanah Datar",
                    "Kab. Sijunjung",
                    "Kab. Solok",
                    "Kab. Pesisir Selatan"
                ]
            },

            {
                "provinsi": "Riau",
                "kota": [
                    "Kota Pekan Baru",
                    "Kota Dumai",
                    "Kab. Kepulauan Meranti",
                    "Kab. Kuantan Singingi",
                    "Kab. Siak",
                    "Kab. Rokan Hilir",
                    "Kab. Rokan Hulu",
                    "Kab. Pelalawan",
                    "Kab. Indragiri Hilir",
                    "Kab. Bengkalis",
                    "Kab. Indragiri Hulu",
                    "Kab. Kampar"
                ]
            },

            {
                "provinsi": "Jambi",
                "kota": [
                    "Kota Jambi",
                    "Kota Sungai Penuh",
                    "Kab. Tebo",
                    "Kab. Bungo",
                    "Kab. Tanjung Jabung Timur",
                    "Kab. Tanjung Jabung Barat",
                    "Kab. Muaro Jambi",
                    "Kab. Batanghari",
                    "Kab. Sarolangun",
                    "Kab. Merangin",
                    "Kab. Kerinci"
                ]
            },

            {
                "provinsi": "Sumatera Selatan",
                "kota": [
                    "Kota Palembang",
                    "Kota Pagar Alam",
                    "Kota Lubuk Linggau",
                    "Kota Prabumulih",
                    "Kab. Musi Rawas Utara",
                    "Kab. Penukal Abab Lematang Ilir",
                    "Kab. Empat Lawang",
                    "Kab. Ogan Ilir ",
                    "Kab. Ogan Komering Ulu Selatan ",
                    "Kab. Ogan Komering Ulu Timur ",
                    "Kab. Banyuasin",
                    "Kab. Musi Banyuasin",
                    "Kab. Musi Rawas",
                    "Kab. Lahat",
                    "Kab. Muara Enim",
                    "Kab. Ogan Komering Ilir",
                    "Kab. Ogan Komering Ulu"
                ]
            },

            {
                "provinsi": "Bengkulu",
                "kota": [
                    "Kota Bengkulu",
                    "Kab. Bengkulu Tengah",
                    "Kab. Kepahiang ",
                    "Kab. Lebong",
                    "Kab. Muko Muko",
                    "Kab. Seluma",
                    "Kab. Kaur",
                    "Kab. Bengkulu Utara",
                    "Kab. Rejang Lebong",
                    "Kab. Bengkulu Selatan"
                ]
            },

            {
                "provinsi": "Lampung",
                "kota": [
                    "Kota Bandar Lampung",
                    "Kota Metro",
                    "Kab. Pesisir Barat",
                    "Kab. Tulangbawang Barat",
                    "Kab. Mesuji",
                    "Kab. Pringsewu",
                    "Kab. Pesawaran",
                    "Kab. Way Kanan",
                    "Kab. Lampung Timur",
                    "Kab. Tanggamus",
                    "Kab. Tulang Bawang",
                    "Kab. Lampung Barat",
                    "Kab. Lampung Utara",
                    "Kab. Lampung Tengah",
                    "Kab. Lampung Selatan"
                ]
            },

            {
                "provinsi": "Kepulauan Bangka Belitung",
                "kota": [
                    "Kota Pangkal Pinang",
                    "Kab. Belitung Timur",
                    "Kab. Bangka Barat",
                    "Kab. Bangka Tengah",
                    "Kab. Bangka Selatan",
                    "Kab. Belitung",
                    "Kab. Bangka"
                ]
            },

            {
                "provinsi": "Kepulauan Riau",
                "kota": [
                    "Kota Batam",
                    "Kota Tanjung Pinang",
                    "Kab. Kepulauan Anambas",
                    "Kab. Lingga ",
                    "Kab. Natuna",
                    "Kab. Karimun",
                    "Kab. Bintan"
                ]
            },

            {
                "provinsi": "DKI Jakarta",
                "kota": [
                    "Kota Jakarta Timur",
                    "Kota Jakarta Selatan",
                    "Kota Jakarta Barat",
                    "Kota Jakarta Utara",
                    "Kota Jakarta Pusat",
                    "Kab. Kepulauan Seribu"
                ]
            },

            {
                "provinsi": "Jawa Barat",
                "kota": [
                    "Kota Bandung",
                    "Kota Banjar",
                    "Kota Tasikmalaya",
                    "Kota Cimahi",
                    "Kota Depok",
                    "Kota Bekasi",
                    "Kota Cirebon",
                    "Kota Sukabumi",
                    "Kota Bogor",
                    "Kab. Pangandaran",
                    "Kab. Bandung Barat",
                    "Kab. Bekasi",
                    "Kab. Karawang",
                    "Kab. Purwakarta",
                    "Kab. Subang",
                    "Kab. Indramayu",
                    "Kab. Sumedang",
                    "Kab. Majalengka",
                    "Kab. Cirebon",
                    "Kab. Kuningan",
                    "Kab. Ciamis",
                    "Kab. Tasikmalaya",
                    "Kab. Garut",
                    "Kab. Bandung",
                    "Kab. Cianjur",
                    "Kab. Sukabumi",
                    "Kab. Bogor"
                ]
            },

            {
                "provinsi": "Jawa Tengah",
                "kota": [
                    "Kota Semarang",
                    "Kota Tegal",
                    "Kota Pekalongan",
                    "Kota Salatiga",
                    "Kota Surakarta",
                    "Kota Magelang",
                    "Kab. Brebes",
                    "Kab. Tegal",
                    "Kab. Pemalang",
                    "Kab. Pekalongan",
                    "Kab. Batang",
                    "Kab. Kendal",
                    "Kab. Temanggung",
                    "Kab. Semarang",
                    "Kab. Demak",
                    "Kab. Jepara",
                    "Kab. Kudus",
                    "Kab. Pati",
                    "Kab. Rembang",
                    "Kab. Blora",
                    "Kab. Grobogan",
                    "Kab. Sragen",
                    "Kab. Karanganyar",
                    "Kab. Wonogiri",
                    "Kab. Sukoharjo",
                    "Kab. Klaten",
                    "Kab. Boyolali",
                    "Kab. Magelang",
                    "Kab. Wonosobo",
                    "Kab. Purworejo",
                    "Kab. Kebumen",
                    "Kab. Banjarnegara",
                    "Kab. Purbalingga",
                    "Kab. Banyumas",
                    "Kab. Cilacap"
                ]
            },

            {
                "provinsi": "DI Yogyakarta",
                "kota": [
                    "Kota Yogyakarta",
                    "Kab. Sleman",
                    "Kab. Gunung Kidul",
                    "Kab. Bantul",
                    "Kab. Kulon Progo"
                ]
            },

            {
                "provinsi": "Jawa Timur",
                "kota": [
                    "Kota Surabaya",
                    "Kota Batu",
                    "Kota Madiun",
                    "Kota Mojokerto",
                    "Kota Pasuruan",
                    "Kota Probolinggo",
                    "Kota Malang",
                    "Kota Blitar",
                    "Kota Kediri",
                    "Kab. Sumenep",
                    "Kab. Pamekasan",
                    "Kab. Sampang",
                    "Kab. Bangkalan",
                    "Kab. Gresik",
                    "Kab. Lamongan",
                    "Kab. Tuban",
                    "Kab. Bojonegoro",
                    "Kab. Ngawi",
                    "Kab. Magetan",
                    "Kab. Madiun",
                    "Kab. Nganjuk",
                    "Kab. Jombang",
                    "Kab. Mojokerto",
                    "Kab. Sidoarjo",
                    "Kab. Pasuruan",
                    "Kab. Probolinggo",
                    "Kab. Situbondo",
                    "Kab. Bondowoso",
                    "Kab. Banyuwangi",
                    "Kab. Jember",
                    "Kab. Lumajang",
                    "Kab. Malang",
                    "Kab. Kediri",
                    "Kab. Blitar",
                    "Kab. Tulungagung",
                    "Kab. Trenggalek",
                    "Kab. Ponorogo",
                    "Kab. Pacitan"
                ]
            },

            {
                "provinsi": "Banten",
                "kota": [
                    "Kota Serang",
                    "Kota Cilegon",
                    "Kota Tangerang",
                    "Kota Tangerang Selatan",
                    "Kab. Serang",
                    "Kab. Tangerang",
                    "Kab. Lebak",
                    "Kab. Pandeglang"
                ]
            },

            {
                "provinsi": "Bali",
                "kota": [
                    "Kota Denpasar",
                    "Kab. Buleleng",
                    "Kab. Karangasem",
                    "Kab. Bangli",
                    "Kab. Klungkung",
                    "Kab. Gianyar",
                    "Kab. Badung",
                    "Kab. Tabanan",
                    "Kab. Jembrana"
                ]
            },

            {
                "provinsi": "Nusa Tenggara Barat",
                "kota": [
                    "Kota Mataram",
                    "Kota Bima",
                    "Kab. Lombok Utara",
                    "Kab. Sumbawa Barat",
                    "Kab. Bima",
                    "Kab. Dompu",
                    "Kab. Sumbawa ",
                    "Kab. Lombok Timur",
                    "Kab. Lombok Tengah",
                    "Kab. Lombok Barat"
                ]
            },

            {
                "provinsi": "Nusa Tenggara Timur",
                "kota": [
                    "Kota Kupang",
                    "Kab. Malaka",
                    "Kab. Sabu Raijua",
                    "Kab. Manggarai Timur",
                    "Kab. Sumba Barat Daya",
                    "Kab. Sumba Tengah",
                    "Kab. Nagekeo",
                    "Kab. Manggarai Barat",
                    "Kab. Rote Ndao",
                    "Kab. Lembata",
                    "Kab. Sumba Barat",
                    "Kab. Sumba Timur",
                    "Kab. Manggarai",
                    "Kab. Ngada",
                    "Kab. Ende",
                    "Kab. Sikka",
                    "Kab. Flores Timur",
                    "Kab. Alor",
                    "Kab. Belu",
                    "Kab. Timor Tengah Utara",
                    "Kab. Timor Tengah Selatan",
                    "Kab. Kupang"
                ]
            },
            {
                "provinsi": "Kalimantan Barat",
                "kota": [
                    "Kota Pontianak",
                    "Kota Singkawang",
                    "Kab. Kubu Raya",
                    "Kab. Kayong Utara",
                    "Kab. Sekadau",
                    "Kab. Melawi",
                    "Kab. Landak",
                    "Kab. Bengkayang",
                    "Kab. Kapuas Hulu",
                    "Kab. Sintang ",
                    "Kab. Ketapang",
                    "Kab. Sanggau ",
                    "Kab. Mempawah",
                    "Kab. Sambas"
                ]
            },

            {
                "provinsi": "Kalimantan Tengah",
                "kota": [
                    "Kota Palangkaraya",
                    "Kab. Barito Timur",
                    "Kab. Murung Raya",
                    "Kab. Pulang Pisau",
                    "Kab. Gunung Mas",
                    "Kab. Lamandau",
                    "Kab. Sukamara",
                    "Kab. Seruyan",
                    "Kab. Katingan",
                    "Kab. Barito Utara",
                    "Kab. Barito Selatan",
                    "Kab. Kapuas",
                    "Kab. Kotawaringin Timur",
                    "Kab. Kotawaringin Barat"
                ]
            },

            {
                "provinsi": "Kalimantan Selatan",
                "kota": [
                    "Kota Banjarmasin",
                    "Kota Banjarbaru",
                    "Kab. Balangan",
                    "Kab. Tanah Bambu",
                    "Kab. Tabalong",
                    "Kab. Hulu Sungai Utara",
                    "Kab. Hulu Sungai Tengah",
                    "Kab. Hulu Sungai Selatan",
                    "Kab. Tapin",
                    "Kab. Barito Kuala",
                    "Kab. Banjar",
                    "Kab. Kotabaru",
                    "Kab. Tanah Laut"
                ]
            },

            {
                "provinsi": "Kalimantan Timur",
                "kota": [
                    "Kota Samarinda",
                    "Kota Bontang",
                    "Kota Balikpapan",
                    "Kab. Mahakam Ulu",
                    "Kab. Penajam Paser Utara",
                    "Kab. Kutai Timur",
                    "Kab. Kutai Barat",
                    "Kab. Berau",
                    "Kab. Kutai Kertanegara",
                    "Kab. Paser"
                ]
            },

            {
                "provinsi": "Kalimantan Utara",
                "kota": [
                    "Kota Tarakan",
                    "Kab. Tana Tidung",
                    "Kab. Nunukan",
                    "Kab. Malinau",
                    "Kab. Bulungan"
                ]
            },

            {
                "provinsi": "Sulawesi Utara",
                "kota": [
                    "Kota Manado",
                    "Kota Tomohon",
                    "Kota Bitung",
                    "Kota Kotamobagu",
                    "Kab. Bolaang Mangondow Selatan",
                    "Kab. Bolaang Mangondow Timur",
                    "Kab. Kepulauan Siau Tagulandang Biaro",
                    "Kab. Bolaang Mangondow Utara",
                    "Kab. Minahasa Tenggara",
                    "Kab. Minahasa Utara",
                    "Kab. Minahasa Selatan",
                    "Kab. Kepulauan Talaud",
                    "Kab. Kepulauan Sangihe",
                    "Kab. Minahasa",
                    "Kab. Bolaang Mangondow"
                ]
            },

            {
                "provinsi": "Sulawesi Tengah",
                "kota": [
                    "Kota Palu",
                    "Kab. Morowali Utara",
                    "Kab. Banggai Laut",
                    "Kab. Sigi",
                    "Kab. Tojo Una-Una",
                    "Kab. Parigi Moutong",
                    "Kab. Banggai Kepulauan",
                    "Kab. Morowali",
                    "Kab. Buol",
                    "Kab. Toli-Toli",
                    "Kab. Donggala",
                    "Kab. Poso",
                    "Kab. Banggai"
                ]
            },

            {
                "provinsi": "Sulawesi Selatan",
                "kota": [
                    "Kota Makasar",
                    "Kota Palopo",
                    "Kota Pare Pare",
                    "Kab. Toraja Utara",
                    "Kab. Luwu Timur",
                    "Kab. Luwu Utara",
                    "Kab. Tana Toraja",
                    "Kab. Luwu",
                    "Kab. Enrekang",
                    "Kab. Pinrang",
                    "Kab. Sidenreng Rappang",
                    "Kab. Wajo",
                    "Kab. Soppeng",
                    "Kab. Barru",
                    "Kab. Pangkajene Kepulauan",
                    "Kab. Maros",
                    "Kab. Bone",
                    "Kab. Sinjai",
                    "Kab. Gowa",
                    "Kab. Takalar",
                    "Kab. Jeneponto",
                    "Kab. Bantaeng",
                    "Kab. Bulukumba",
                    "Kab. Kepulauan Selayar"
                ]
            },

            {
                "provinsi": "Sulawesi Tenggara",
                "kota": [
                    "Kota Kendari",
                    "Kota Bau Bau",
                    "Kab. Buton Selatan",
                    "Kab. Buton Tengah",
                    "Kab. Muna Barat",
                    "Kab. Konawe Kepulauan",
                    "Kab. Kolaka Timur",
                    "Kab. Buton Utara",
                    "Kab. Konawe Utara",
                    "Kab. Kolaka Utara",
                    "Kab. Wakatobi",
                    "Kab. Bombana",
                    "Kab. Konawe Selatan",
                    "Kab. Buton",
                    "Kab. Muna",
                    "Kab. Konawe",
                    "Kab. Kolaka"
                ]
            },

            {
                "provinsi": "Gorontalo",
                "kota": [
                    "Kota Gorontalo",
                    "Kab. Pohuwato",
                    "Kab. Bone Bolango",
                    "Kab. Boalemo",
                    "Kab. Gorontalo",
                    "Kab. Gorontalo Utara"
                ]
            },

            {
                "provinsi": "Sulawesi Barat",
                "kota": [
                    "Kab. Majene",
                    "Kab. Polowali Mandar",
                    "Kab. Mamasa",
                    "Kab. Mamuju",
                    "Kab. Mamuju Utara",
                    "Kab. Mamuju Tengah"
                ]
            },

            {
                "provinsi": "Maluku",
                "kota": [
                    "Kota Ambon",
                    "Kota Tual",
                    "Kab. Buru Selatan",
                    "Kab. Maluku Barat Daya",
                    "Kab. Kepulauan Aru",
                    "Kab. Seram Bagian Barat ",
                    "Kab. Seram Bagian Timur",
                    "Kab. Buru",
                    "Kab. Maluku Tenggara Barat",
                    "Kab. Maluku Tenggara",
                    "Kab. Maluku Tengah"
                ]
            },

            {
                "provinsi": "Maluku Utara",
                "kota": [
                    "Kota Ternate",
                    "Kota Tidore Kepulauan",
                    "Kab. Pulau Taliabu",
                    "Kab. Pulau Morotai",
                    "Kab. Halmahera Timur",
                    "Kab. Kepulauan Sula",
                    "Kab. Halmahera Selatan",
                    "Kab. Halmahera Utara",
                    "Kab. Halmahera Tengah",
                    "Kab. Halmahera Barat"
                ]
            },

            {
                "provinsi": "Papua",
                "kota": [
                    "Kota Jayapura",
                    "Kab. Deiyai",
                    "Kab. Intan Jaya",
                    "Kab. Dogiyai",
                    "Kab. Puncak",
                    "Kab. Nduga",
                    "Kab. Lanny Jaya",
                    "Kab. Yalimo",
                    "Kab. Mamberamo Tengah",
                    "Kab. Mamberamo Raya",
                    "Kab. Supiori",
                    "Kab. Asmat",
                    "Kab. Mappi",
                    "Kab. Boven Digoel",
                    "Kab. Waropen",
                    "Kab. Tolikara",
                    "Kab. Yahukimo",
                    "Kab. Pegunungan Bintang",
                    "Kab. Keerom",
                    "Kab. Sarmi",
                    "Kab. Mimika",
                    "Kab. Paniai",
                    "Kab. Puncak Jaya",
                    "Kab. Biak Numfor",
                    "Kab. Kepulauan Yapen",
                    "Kab. Nabire",
                    "Kab. Jayapura",
                    "Kab. Jayawijaya",
                    "Kab. Merauke"
                ]
            },

            {
                "provinsi": "Papua Barat",
                "kota": [
                    "Kota Sorong",
                    "Kab. Pegunungan Arfak",
                    "Kab. Manokwari Selatan",
                    "Kab. Maybrat",
                    "Kab. Tambrauw",
                    "Kab. Kaimana",
                    "Kab. Teluk Wondama",
                    "Kab. Teluk Bintuni",
                    "Kab. Raja Ampat",
                    "Kab. Sorong Selatan",
                    "Kab. Fak Fak",
                    "Kab. Manokwari",
                    "Kab. Sorong"
                ]
            }
        ];
    </script>
    {{-- @foreach ($catalogs as $catalog)
        <script>
            $('.select2').select2({
                placeholder: 'Select an location...',
                dropdownParent: '#exampleModal1{{ $catalog->id }}'
            });
        </script>
    @endforeach --}}
    {{-- <script>
        var catalogData = @json($catalogs2);
        var baseId = '#exampleModal1';
        catalogData.forEach(function(item, index) {
            var elementId = baseId + index; // Membuat ID unik untuk setiap elemen
            $(elementId + ' .select2').select2({
                placeholder: 'Select an location...',
                dropdownParent: elementId
            });
        });
        console.log(elementId);
    </script> --}}
@endsection
