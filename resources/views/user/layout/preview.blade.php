@extends('user.main')

@section('content')
    <section class="preview" id="home">
        @if (session()->has('success'))
            <div class="alert alert-success mt-1 mb-1 col-2 position-absolute top-3 end-0 me-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="content d-flex">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    @php
                        // $image = \App\Models\ImageCatalog::select('*')->where('catalog_id', '=', '$catalog');
                        $images = DB::table('image_catalogs')
                            ->select('*')
                            ->where('catalogs_id', '=', $catalog->id)
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
                            <img src="{{ asset('storage/' . $catalog->main_image) }}" class="d-blockimg-fluid "
                                alt="...">
                        </div>
                    </div>
                    @php
                        // $image = \App\Models\ImageCatalog::select('*')->where('catalog_id', '=', '$catalog');
                        $images = DB::table('image_catalogs')
                            ->select('*')
                            ->where('catalogs_id', '=', $catalog->id)
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
                <h1>{{ $catalog->title }}</h1>
                <h2>Start From : Rp. {{ number_format($catalog->price, 0, ',', '.') }}/pax</h2>
                <p class="fs-4">Location : {{ $catalog->location }}</p>
                <p class="fs-4">Categories : {{ $catalog->categories }}</p>
                <p class="fs-4">Description : {{ $catalog->description }}
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
                <button onclick="ShowModal1()" type="button" class="btn btn-primary mt-4 fs-5" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Create Booking
                </button>

                <!-- Modal for booking -->

                <div class="modal modal-lg fade modal-custom" id="exampleModal" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-full">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-4" id="exampleModalLabel">Create Booking</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" ari
                                    a-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="/createbooking/check" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $catalog->id }}" name="id_catalog">
                                    <input type="hidden" value="{{ $catalog->slug }}" name="slug">
                                    <input type="hidden" value="{{ auth()->user()->id }}" name="id_user">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text fs-5" id="basic-addon1">Name Client</span>
                                        <input type="text"
                                            class="form-control fs-5 @error('name')
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
                                        <span class="input-group-text fs-5" id="basic-addon1">Date</span>
                                        <input type="date"
                                            class="form-control fs-5 @error('date')
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
                                    <p class="mb-3 fs-5">Until</p>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text fs-5" id="basic-addon1">Date</span>
                                        <input type="date"
                                            class="form-control fs-5 @error('date2')
                            is-invalid
                        @enderror"
                                            placeholder="Date2..." aria-label="Date2" aria-describedby="basic-addon1"
                                            name="date2" required>
                                        @error('date2')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <span
                                            class="input-group-text fs-5 @error('qty')
                                mt-3
                            @enderror"
                                            id="basic-addon1">Qty</span>
                                        <input id="qty" type="text"
                                            class="form-control fs-5 @error('qty')
                            is-invalid
                        @enderror @error('qty')
                        mt-3
                    @enderror"
                                            placeholder="Adult..." aria-label="Qty" aria-describedby="basic-addon1"
                                            name="qty" required>
                                        <input id="qty2" type="text"
                                            class="form-control fs-5 @error('qty2')
                            is-invalid
                        @enderror @error('qty2')
                        mt-3
                    @enderror"
                                            placeholder="Child..." aria-label="Qty2" aria-describedby="basic-addon1"
                                            name="qty2" required>
                                        @error('qty2')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text fs-5" id="basic-addon1">Transportation</span>
                                        <select class="form-select fs-5" id="inputGroupSelect01"
                                            class="form-control @error('transportation')
                                        is-invalid
                                    @enderror"
                                            name="transportation" required>
                                            <option selected>Choose...</option>
                                            @foreach ($transportations as $transportation)
                                                <option value="{{ $transportation->id }}">{{ $transportation->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('transportation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary fs-5"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary fs-5">Create Booking</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal --}}
            </div>
        </div>
    </section>




    <script>
        $(document).ready(function() {
            $("#qty").keyup(function() {
                $(this).maskNumber({
                    integer: true,
                    thousands: "."
                })
            })
        });

        $(document).ready(function() {
            $("#qty2").keyup(function() {
                $(this).maskNumber({
                    integer: true,
                    thousands: "."
                })
            })
        });
        // $(document).ready(function() {
        //     // Handle respons dari server setelah mencoba membuat pemesanan
        //     $.ajax({
        //         url: 'url/ke/createbooking', // Ganti dengan URL sesuai kebutuhan
        //         type: 'POST',
        //         data: formData, // Ganti dengan data yang sesuai
        //         dataType: 'json',
        //         success: function(response) {
        //             // Pemesanan berhasil, lanjutkan dengan logika Anda
        //         },
        //         error: function(xhr, status, error) {
        //             // Tangkap pesan peringatan dan tampilkan sebagai alert
        //             var responseJson = JSON.parse(xhr.responseText);
        //             alert(responseJson.message);
        //         }
        //     });
        // });
    </script>
@endsection
