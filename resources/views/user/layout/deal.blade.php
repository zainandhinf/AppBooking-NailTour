@extends('user.main')

@section('content')
    <section class="preview" id="home">
        <div class="content d-flex">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <h1>Ini Deal</h1>
                    @php
                        // dd($transaction);
                        // $image = \App\Models\ImageCatalog::select('*')->where('catalog_id', '=', '$catalog');
                        $images = DB::table('image_catalogs')
                            ->select('*')
                            ->where('catalogs_id', '=', $transaction[0]->id_catalog_detail)
                            ->get();
                        // ddd($images);
                        $no = 2;
                        $no1 = 1;
                    @endphp
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    @foreach ($images as $imagecatalog)
                        {{-- <h1>{{ $no++ }}</h1> --}}
                        <button type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="{{ $no1++ }}" class="active"
                            aria-label="Slide {{ $no++ }}"></button>
                    @endforeach

                    {{-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button> --}}
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="imagecatalog">
                            <img src="{{ asset('storage/' . $transaction[0]->main_image) }}" class="d-blockimg-fluid "
                                alt="...">
                        </div>
                    </div>
                    @php
                        // $image = \App\Models\ImageCatalog::select('*')->where('catalog_id', '=', '$catalog');
                        $images = DB::table('image_catalogs')
                            ->select('*')
                            ->where('catalogs_id', '=', $transaction[0]->id_catalog_detail)
                            ->get();
                        // ddd($images);
                    @endphp
                    @foreach ($images as $imagecatalog)
                        <div class="carousel-item">
                            <div class="imagecatalog">
                                <img src="../imagecatalog/{{ $imagecatalog->imagefile }}" class="d-blockimg-fluid "
                                    alt="...">
                            </div>
                        </div>
                    @endforeach

                    {{-- <img src="imagecatalog/{{ $imagecatalog->imagefile }}" alt="" class="mt-2 mb-2"
                        style="width: 470px;"> --}}
                    {{-- <div class="carousel-item">
                        <div class="imagecatalog">
                            <img src="imagecatalog/catalog.png" class="d-blockimg-fluid " alt="...">
                        </div>
                    </div> --}}
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="main ms-5">
                {{-- @php
                    $result = DB::table('head_transactions')
                        ->groupBy('created_at')
                        ->orderBy('created_at', 'desc')
                        ->limit(1)
                        ->get();
                    dd($result);
                @endphp --}}
                <h1>{{ $transaction[0]->title }}</h1>
                <h2>Start From: Rp. {{ $transaction[0]->price }}/pax</h2>
                <p>Location: {{ $transaction[0]->location }}</p>
                <p>Categories: {{ $transaction[0]->categories }}</p>
                <p>Description: {{ $transaction[0]->description }}
                </p>
                {{-- <p>Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia dicta a tenetur magnam
                    repudiandae fugiat optio consequatur molestias, id assumenda incidunt officiis excepturi sunt! Modi
                    numquam mollitia, excepturi totam voluptatibus commodi eaque est aliquid, deserunt laudantium architecto
                    ad. Et ea possimus laboriosam rem itaque voluptatibus minus laborum aperiam excepturi maxime, nulla aut
                    veniam vel omnis quos rerum ipsa, incidunt ex illum quisquam quibusdam cum facilis quae vero? Dolorum
                    aperiam eligendi, est odio necessitatibus quidem quibusdam qui corporis. Nobis, perspiciatis aut sint
                    consequuntur temporibus ullam repellat. Dolores quidem ea sunt ratione totam, expedita corporis hic
                    cupiditate distinctio facere optio dolorem illo, ipsam neque deleniti. Ab explicabo excepturi non eius
                    doloremque saepe dolor laborum perspiciatis porro quaerat molestiae amet odio ratione dolores blanditiis
                    id vitae modi est exercitationem dolorum fugit sed quod, aut sequi! Velit omnis iusto exercitationem
                    molestias unde praesentium vero esse, voluptatum dolorem voluptatibus, incidunt saepe fugiat enim quas
                    excepturi expedita corporis similique libero corrupti blanditiis laboriosam. Ab adipisci vero quaerat
                    aliquam. Iusto eum earum praesentium vel, dolor libero officiis perferendis deserunt, accusantium
                    aperiam eligendi nisi mollitia? Perferendis omnis rerum odio soluta repudiandae deleniti unde ducimus
                    asperiores, quae non error, reprehenderit suscipit provident architecto natus est ea sit nulla? Ipsum?
                </p> --}}
                {{-- <button onclick="ShowModal1()" type="button" class="btn btn-primary mt-4 " data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Create Booking
                </button> --}}

                {{-- <!-- Modal for booking -->

                <div class="modal fade modal-custom" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-full">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Booking</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" ari
                                    a-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="/createbooking" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $catalog->id }}" name="id_catalog">
                                    <input type="hidden" value="{{ $catalog->slug }}" name="slug">
                                    <input type="hidden" value="{{ auth()->user()->id }}" name="id_user">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Name Client</span>
                                        <input type="text"
                                            class="form-control @error('name')
                            is-invalid
                        @enderror"
                                            placeholder="Name Client..." aria-label="Name" aria-describedby="basic-addon1"
                                            name="name" required>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Date</span>
                                        <input type="date"
                                            class="form-control @error('date')
                            is-invalid
                        @enderror"
                                            placeholder="Date..." aria-label="Date" aria-describedby="basic-addon1"
                                            name="date" required>
                                        @error('date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <span
                                            class="input-group-text @error('qty')
                                mt-3
                            @enderror"
                                            id="basic-addon1">Qty</span>
                                        <input id="qty" type="text"
                                            class="form-control @error('qty')
                            is-invalid
                        @enderror @error('qty')
                        mt-3
                    @enderror"
                                            placeholder="Qty..." aria-label="Qty" aria-describedby="basic-addon1"
                                            name="qty" required>
                                        @error('qty')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                end modal --}}
            </div>

        </div>
        <div class="mt-4 mb-4">
            <h1>Detail Booking</h1>
            <p style="font-size: 12px">No Transaction : {{ $transaction[0]->no_trans }}</p>
            <p style="font-size: 12px">Tour Dates : {{ $transaction[0]->date }}</p>
            <p style="font-size: 12px">Status : {{ $transaction[0]->status }}</p>
            <p style="font-size: 12px">Name Client : {{ $transaction[0]->name }}</p>
            <p style="font-size: 12px">Qty : {{ $transaction[0]->qty }} Pax</p>
        </div>
        <div>
            {{-- tabel --}}
            <div class="ms-4 mt-2 me-4 table-responsive">
                <table class="display" id="data-tables">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>File</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @php
                        $no = 1;
                    @endphp
                    {{-- @foreach ($citys as $city) --}}
                    <tr>
                        <td scope="row">{{ $no++ }}</td>
                        <td scope="row">Penawaran1.pdf</td>
                        <td scope="row">2023-11-17</td>
                        <td scope="row">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni quasi nostrum
                            laborum repudiandae aut tempore necessitatibus. Officia reprehenderit vero fugit aut. Aperiam
                            quo sunt dolores consequatur, nisi dicta debitis dignissimos?</td>
                        {{-- <td>{{ $city->id }}</td> --}}
                        {{-- <td>{{ $city->name }}</td>
                        <td>{{ $city->province }}</td> --}}
                        <td>
                            {{-- <a onclick="ShowModal2('{{ $city->id }}')" type="button" class="btn btn-primary"
                                data-bs-toggle="modal" data-bs-target="#editModal{{ $city->id }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a> --}}
                            <form action="/deletecity" class="d-inline" method="POST">
                                @method('delete')
                                @csrf
                                <input type="hidden" id="" name="id_city" value="">
                                <button class="btn btn-primary"
                                    onclick="return confirm('Are you sure you want to delete data?')">
                                    <i class="fa-solid fa-check text-white" style="font-size: 30px"></i>
                                    <span class="text-white fw-bold">Accept Offer</span>
                                </button>
                            </form>
                            {{-- <a href="../action/aksi_hapus_petugas.php?id_petugas={{ $users->id }}"
                        onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger"><i
                            class="fa-solid fa-trash"></i></a> --}}
                        </td>
                    </tr>
                    {{-- @endforeach --}}
                </table>
            </div>
            {{-- end tabel --}}
        </div>
    </section>




    <script>
        $(document).ready(function() {
            $("#price").keyup(function() {
                $(this).maskNumber({
                    integer: true,
                    thousands: "."
                })
            })
        });

        $(document).ready(function() {
            $('#data-tables').DataTable(
                //     {
                //     // "lengthMenu": [
                //     //     [4, 10, 25, 50, -1],
                //     //     [4, 10, 25, 50, "All"]
                //     // ],
                //     "pageLength": 4,
                //     "lengthChange": false
                // }
            );
        });
    </script>
@endsection
