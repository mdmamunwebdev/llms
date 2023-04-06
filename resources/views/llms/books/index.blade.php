@extends("llms.master")

@section("title")
    Users | Books
@endsection

{{--@section("page-title")--}}
{{--    Manage Books--}}
{{--@endsection--}}

{{--@section("menues")--}}
{{--    Users / Books /--}}
{{--@endsection--}}

{{--@section("sub-menu")--}}
{{--    Manage Books--}}
{{--@endsection--}}

@section("main-content")

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 card-title flex-grow-1">Books Lists</h5>
                        <div class="flex-shrink-0">
                            <a href="{{ route('add.books') }}" class="btn btn-primary">Add New Book</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <h4 class="card-title text-success text-capitalize font-bold">{{ Session::get("stdMessage") }}</h4>

                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Dept</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div>
                                        @if($book->image)
                                            <img class="rounded-circle avatar-xs" src="{{ asset( $book->image ) }}" alt=""/>
                                        @else
                                            <img class="rounded-circle avatar-xs" src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt=""/>
                                        @endif
                                    </div>
                                </td>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->book_code }}</td>
                                <td>{{ $book->department }}</td>
                                <td><span class="badge  {{ $book->status == 1 ? 'bg-success':'bg-danger' }}">{{ $book->status == 1 ? 'Active':'Deactive' }}</span></td>
                                <td>
                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <button class="btn btn-sm btn-soft-primary" data-bs-toggle="modal" data-bs-target=".student-detailModal-{{ $book->id }}"><i class="mdi mdi-eye-outline"></i></button>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Status">
                                            <a href="{{ route("status.books", $book->id) }}" class="btn btn-sm btn-soft-secondary"><i class="dripicons-arrow-thin-up"></i></a>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <a href="{{ route("update.books", $book->id) }}" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                                        </li>
{{--                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">--}}
{{--                                            <a href="#" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger" onclick="event.preventDefault(); document.getElementById('bookDelete').submit()"><i class="mdi mdi-delete-outline"></i></a>--}}
{{--                                            <form action="{{ route("delete.books", $book->id) }}" method="post" id="bookDelete">--}}
{{--                                                @csrf--}}
{{--                                            </form>--}}
{{--                                        </li>--}}
                                    </ul>

                                    <!-- Student Details Modal -->
                                    <div class="modal fade student-detailModal-{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="student-detailModalLabel-{{ $book->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document" style="max-width: 900px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="student-detailModalLabel-{{ $book->id }}">Student Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="card">
                                                                <div class="row g-2">
                                                                    <div class="col-md-4">

                                                                        <div class="card bg-light">
                                                                            @if($book->image)
                                                                                <img src="{{ asset( $book->image ) }}" alt="" class="card-img-top"/>
                                                                            @else
                                                                                <img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt="" class="card-img-top"/>
                                                                            @endif
                                                                            <div class="card-header text-center text-capitalize">{{ $book->name }}</div>
                                                                            <div class="card-body">
                                                                                <table class="table table-bordered table-hover dt-responsive nowrap w-100">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <th>Book Code</th>
                                                                                        <th> : </th>
                                                                                        <td>{{ $book->book_code }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Department</th>
                                                                                        <th> : </th>
                                                                                        <td>{{ $book->department }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Status</th>
                                                                                        <th> : </th>
                                                                                        <td>
                                                                                            <span class="badge  {{ $book->status == 1 ? 'bg-success':'bg-danger' }}">{{ $book->status == 1 ? 'Active':'Deactive' }}</span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="card-body pt-0">
                                                                            <div class="card card-body mb-4 bg-light">
                                                                                <div class="card-title py-2 "><i class="bx bx-windows"></i>  General Information</div>
                                                                                <table  class="table table-bordered table-hover dt-responsive nowrap w-100">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <th>Authors</th>
                                                                                        <th> : </th>
                                                                                        <td>
                                                                                            <table class="table table-hover table-bordered">
                                                                                                <tbody>
                                                                                                @foreach( $book->authors as $author)
                                                                                                    <tr>
                                                                                                        <td class="text-capitalize">{{ $author->name }}</td>
                                                                                                    </tr>
                                                                                                @endforeach
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Book Location</th>
                                                                                        <th> : </th>
                                                                                        <td>{{ $book->location }}</td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>

                                                                            <div class="card card-body mb-4 bg-light">
                                                                                <div class="card-title py-2 "><i class="bx bx-windows"></i>  Book History</div>
                                                                                <table  class="table table-bordered table-hover dt-responsive nowrap w-100">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <th>Booking Status :</th>
                                                                                        <td>
                                                                                            @if( $book->booking )
                                                                                                <table class="table table-bordered table-hover">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td class="text-capitalize bg-primary bg-soft">This book is Booked by : {{ $book->booking->student->name }}</td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td class="text-capitalize bg-primary bg-soft">This book Return Date : {{ $book->booking->return_date }}</td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            @else
                                                                                                @if( $book->lost )
                                                                                                    <div class="py-3 px-2 fw-bold text-capitalize bg-danger bg-soft">This book is Losted by : {{ $book->lost->student->name }}</div>
                                                                                                @else
                                                                                                    <div class="py-3 px-2 fw-bold text-capitalize bg-success bg-soft">This book is Available !</div>
                                                                                                @endif
                                                                                            @endif
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Issue Number :</th>
                                                                                        <td>{{ count($book->issues) }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Return number :</th>
                                                                                        <td>{{ count($book->return) }}</td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>

{{--                                                                            <div class="card card-body bg-light">--}}
{{--                                                                                <div class="card-title py-2"><i class="bx bx-window"></i> Other Information</div>--}}
{{--                                                                                <div class="container-fluid" style="overflow: auto">--}}
{{--                                                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab animi harum laborum laudantium sequi. Dolore ducimus ex nesciunt obcaecati temporibus.--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal -->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection
