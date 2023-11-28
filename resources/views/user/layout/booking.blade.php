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
            <p style="font-size: 12px">Tour Dates : {{ $transaction[0]->date1 }} until {{ $transaction[0]->date2 }}</p>
            <p style="font-size: 12px">Status : {{ $transaction[0]->status }}</p>
            <p style="font-size: 12px">Name Client : {{ $transaction[0]->name }}</p>
            <p style="font-size: 12px">Adult Qty : {{ $transaction[0]->adult_qty }} Pax</p>
            <p style="font-size: 12px">Child Qty : {{ $transaction[0]->child_qty }} Pax</p>
            <p style="font-size: 12px">Transportation : {{ $transaction[0]->transportation }}</p>

            <!-- Modal for booking -->

            <div class="modal fade modal-custom" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-full">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Booking</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" ari a-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="/updatebooking" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{ $transaction[0]->no_trans }}" name="no_trans">
                                <input type="hidden" value="{{ $transaction[0]->id }}" name="id_booking">
                                {{-- <input type="hidden" value="{{ auth()->user()->id }}" name="id_user"> --}}
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Name Client</span>
                                    <input type="text"
                                        class="form-control @error('name')
                    is-invalid
                @enderror"
                                        placeholder="Name Client..." aria-label="Name" aria-describedby="basic-addon1"
                                        name="name" value="{{ old('name', $transaction[0]->name) }}" required>
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
                                        name="date" value="{{ old('date1', $transaction[0]->date1) }}" required>
                                    @error('date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <p class="mb-3">Until</p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Date</span>
                                    <input type="date"
                                        class="form-control @error('date2')
                    is-invalid
                @enderror"
                                        placeholder="Date2..." aria-label="Date2" aria-describedby="basic-addon1"
                                        name="date2" value="{{ old('date2', $transaction[0]->date2) }}" required>
                                    @error('date2')
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
                                    <span
                                        class="input-group-text @error('adult_qty')
                        mt-3
                    @enderror"
                                        id="basic-addon1">Adult Qty</span>
                                    <input id="qty" type="text"
                                        class="form-control @error('qty')
                    is-invalid
                @enderror @error('qty')
                mt-3
            @enderror"
                                        placeholder="Adult..." aria-label="Qty" aria-describedby="basic-addon1"
                                        name="adult_qty" value="{{ old('qty', $transaction[0]->adult_qty) }}" required>
                                    <span
                                        class="input-group-text @error('adult_qty')
                        mt-3
                    @enderror"
                                        id="basic-addon1">Child Qty</span>
                                    <input id="qty2" type="text"
                                        class="form-control @error('qty2')
                    is-invalid
                @enderror @error('qty2')
                mt-3
            @enderror"
                                        placeholder="Child..." aria-label="Qty2" aria-describedby="basic-addon1"
                                        name="child_qty" value="{{ old('qty2', $transaction[0]->child_qty) }}" required>
                                    @error('qty2')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Transportation</span>
                                    <select class="form-select" id="inputGroupSelect01"
                                        class="form-control @error('transportation')
                                is-invalid
                            @enderror"
                                        name="transportation_id" required>
                                        @foreach ($transportations as $transportation2)
                                            @if (old('transportation', $transaction[0]->transportation) == $transportation2->name)
                                                <option value="{{ $transportation2->id }}" selected>
                                                    {{ $transportation2->name }}
                                                </option>
                                            @else
                                                <option value="{{ $transportation2->id }}">{{ $transportation2->name }}
                                                </option>
                                            @endif
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal --}}
        </div>
        @if ($transaction[0]->status_head == 'Offer')
            <button onclick="ShowModal1()" type="button" class="btn btn-primary mt-4 " data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Update Booking
            </button>
            <button type="button" class="btn btn-primary mt-4 " data-bs-toggle="modal" data-bs-target="#addoffer">
                Add Offer
            </button>
            <div>
                {{-- tabel --}}
                <div class="ms-4 mt-4 me-4 table-responsive">
                    <table class="table table-striped" style="width:100%" id="data-tables">
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
                            // $id = auth()->user()->id;
                            // dd($transaction[0]->id_head);
                            $offerDatas = DB::table('offers')
                                ->select('*')
                                ->join('users', 'offers.user_id', '=', 'users.id')
                                ->where('offers.transaction_id', '=', $transaction[0]->id_head)
                                ->where('users.role', '=', 'officer')
                                ->get();
                            // $offerDatas = DB::table('offers')
                            //     ->select('*')
                            //     // ->where('user_id', '=', $id)
                            //     ->where('transaction_id', '=', $transaction[0]->id_head)
                            //     ->get();
                            // dd($transaction[0]->id_head);
                        @endphp
                        {{-- @foreach ($citys as $city) --}}
                        @foreach ($offerDatas as $offerData)
                            <tr>
                                <td scope="row">{{ $no++ }}</td>
                                <td scope="row"><a href="{{ asset('storage/' . $offerData->file) }}"
                                        target="_blank">{{ basename($offerData->file) }}</a></td>
                                <td scope="row">2023-11-17</td>
                                <td scope="row">{{ $offerData->description }}</td>
                                {{-- <td>{{ $city->id }}</td> --}}
                                {{-- <td>{{ $city->name }}</td>
                        <td>{{ $city->province }}</td> --}}
                                <td>
                                    <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#acceptoffer{{ $offerData->id }}">
                                        {{-- <i class="fa-solid fa-pen-to-square"></i> --}}
                                        <i class="fa-solid fa-check text-white"></i>
                                    </a>
                                    {{-- <form action="/deletecity" class="d-inline" method="POST">
                                        @method('delete')
                                        @csrf
                                        <input type="hidden" id="" name="id_city" value="">
                                        <button class="btn btn-primary"
                                            onclick="return confirm('Are you sure you want to delete data?')">
                                            <i class="fa-solid fa-check text-white" style="font-size: 30px"></i>
                                            <span class="text-white fw-bold">Accept Offer</span>
                                        </button>
                                    </form> --}}
                                    {{-- <a href="../action/aksi_hapus_petugas.php?id_petugas={{ $users->id }}"
                        onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger"><i
                        class="fa-solid fa-trash"></i></a> --}}
                                </td>
                            </tr>
                        @endforeach
                        {{-- @endforeach --}}
                    </table>
                </div>
                {{-- end tabel --}}
            </div>
        @elseif($transaction[0]->status_head == 'On Process')

        @elseif($transaction[0]->status_head == 'Waiting Payments')
            <button type="button" class="btn btn-primary mt-4 " data-bs-toggle="modal" data-bs-target="#payment">
                Add Proof Of Payment
            </button>

            <div class="modal fade" id="payment" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Proof Of Payment</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/addproof" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{ $transaction[0]->id_head }}" name="id_transaction">
                                <div class="input-group mb-3">
                                    {{-- <span class="input-group-text" id="basic-addon1">Name</span> --}}
                                    <input type="file"
                                        class="form-control @error('proof')
                                    is-invalid
                                @enderror"
                                        placeholder="Proof" aria-label="Proof" aria-describedby="basic-addon1"
                                        name="proof" required>
                                    @error('proof')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @elseif($transaction[0]->status_head == 'Deals')
            <a class="btn btn-primary" href="/print-proof/{{ $transaction[0]->no_trans }}">Print Proof</a>
        @endif


        @php
            $no = 1;
            // $id = auth()->user()->id;
            // dd($transaction[0]->id_head);
            // $offerDatas2 = DB::table('offers')
            //     ->select('*')
            //     // ->where('user_id', '=', $id)
            //     ->where('transaction_id', '=', $transaction[0]->id_head)
            //     ->get();
            $offerDatas2 = DB::table('offers')
                ->select('*')
                ->join('users', 'offers.user_id', '=', 'users.id')
                ->where('offers.transaction_id', '=', $transaction[0]->id_head)
                ->where('users.role', '=', 'officer')
                ->get();
        @endphp
        @foreach ($offerDatas2 as $offerData2)
            <div class="modal fade" id="acceptoffer{{ $offerData2->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Chose Payments</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/addpaymentuser" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                {{-- <input type="hidden" id="" name="id_provinces" value="{{ $offerData->id }}"> --}}
                                {{-- <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Description</span>
                                <input type="text" class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Description" aria-label="Description" aria-describedby="basic-addon1"
                                    description="description">
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                                <input type="hidden" name="transaction_id" value="{{ $transaction[0]->id_head }}">
                                <input type="hidden" name="offer_id" value="{{ $offerData2->id }}">
                                <input type="hidden" name="oldFile" value="{{ $offerData2->file }}">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="no_trans" value="{{ $transaction[0]->no_trans_head }}">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    <select
                                        class="form-select @error('provinces_id')
                                    is-invalid
                                @enderror"
                                        id="inputGroupSelect01" name="payment_id">
                                        <option selected>Choose...</option>
                                        @foreach ($payments as $payment)
                                            <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                        @endforeach
                                        {{-- <option value="2">Two</option>
                                        <option value="3">Three</option> --}}
                                    </select>
                                    @error('provinces_id')
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
        @endforeach

        <div class="modal fade" id="addoffer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Offer</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/addofferuser" method="POST">
                            @csrf
                            {{-- <input type="hidden" id="" name="id_provinces" value="{{ $offerData->id }}"> --}}
                            {{-- <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Description</span>
                                    <input type="text" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Description" aria-label="Description" aria-describedby="basic-addon1"
                                        description="description">
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}
                            <input type="hidden" name="transaction_id" value="{{ $transaction[0]->id_head }}">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="no_trans" value="{{ $transaction[0]->no_trans_head }}">
                            <div class="form-floating mb-3">
                                <textarea
                                    class="form-control @error('description')
                                    is-invalid
                                    @enderror"
                                    placeholder="Leave a comment here" id="floatingTextarea2" name="description" style="height: 100px" required></textarea>
                                <label for="floatingTextarea2">Description</label>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Offer</button>
                        </form>
                    </div>
                </div>
            </div>
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
