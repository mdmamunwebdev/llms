@extends("llms.master")

@section("title")
    Users | Students
@endsection

{{--@section("page-title")--}}
{{--    Manage Students--}}
{{--@endsection--}}

{{--@section("menues")--}}
{{--    Users / Students /--}}
{{--@endsection--}}

{{--@section("sub-menu")--}}
{{--    Manage Students--}}
{{--@endsection--}}

@section("main-content")

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 card-title flex-grow-1">Students List</h5>
                        <div class="flex-shrink-0">
                            <a href="{{ route('add.students') }}" class="btn btn-primary">Add New Student</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    {{--App Alert--}}
                    <div id="liveAlertPlaceholder"></div>

                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Roll</th>
                            <th>Dept</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>


                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div>
                                        @if($student->image)
                                            <img class="rounded-circle avatar-xs" src="{{ asset( $student->image ) }}" alt=""/>
                                        @else
                                            <img class="rounded-circle avatar-xs" src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt=""/>
                                        @endif
                                    </div>
                                </td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->roll }}</td>
                                <td>{{ $student->department }}</td>
                                <td><span class="badge  {{ $student->type == 1 ? 'badge-soft-success':'badge-soft-danger' }}">{{ $student->type == 1 ? 'Regular' : 'Irregular' }}</span></td>
                                <td><span class="badge  {{ $student->status == 1 ? 'bg-success':'bg-danger' }}">{{ $student->status == 1 ? 'Active':'Deactive' }}</span></td>
                                <td>
                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <button class="btn btn-sm btn-soft-primary" data-bs-toggle="modal" data-bs-target=".student-detailModal-{{ $student->id }}"><i class="mdi mdi-eye-outline"></i></button>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Status">
                                            <a href="{{ route("status.students", $student->id) }}" class="btn btn-sm btn-soft-secondary"><i class="dripicons-arrow-thin-up"></i></a>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <a href="{{ route("update.students", $student->id) }}" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                                        </li>
                                    </ul>

                                    <!-- Student Details Modal -->
                                    <div class="modal fade student-detailModal-{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="student-detailModalLabel-{{ $student->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document" style="max-width: 900px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="student-detailModalLabel-{{ $student->id }}">Student Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="card">
                                                                <div class="row g-2">
                                                                    <div class="col-md-4">

                                                                        <div class="card bg-light">
                                                                            @if($student->image)
                                                                                <img src="{{ asset( $student->image ) }}" alt="" class="card-img-top p-3  border-2 border-black "/>
                                                                            @else
                                                                                <img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt="" class="img-fluid rounded-start"/>
                                                                            @endif
                                                                            <div class="card-header text-center text-capitalize">{{ $student->name }}</div>
                                                                            <div class="card-body">
                                                                                <table class="table table-bordered table-hover dt-responsive nowrap w-100">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <th>Student Roll</th>
                                                                                        <th> : </th>
                                                                                        <td>{{ $student->roll }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Department</th>
                                                                                        <th> : </th>
                                                                                        <td>{{ $student->department }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Status</th>
                                                                                        <th> : </th>
                                                                                        <td><span class="badge  {{ $student->status == 1 ? 'bg-success':'bg-danger' }}">{{ $student->status == 1 ? 'Active':'Deactive' }}</span></td>
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
                                                                                        <th>Member Joined</th>
                                                                                        <th> : </th>
                                                                                        <td>{{ str_replace(' ', ' / ', $student->created_at) }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Student Type</th>
                                                                                        <th> : </th>
                                                                                        <td><span class="badge  {{ $student->type == 1 ? 'badge-soft-success':'badge-soft-danger' }}">{{ $student->type == 1 ? 'Regular' : 'Irregular' }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Phone Number</th>
                                                                                        <th> : </th>
                                                                                        <td>
                                                                                            <table class="table table-hover table-bordered">
                                                                                                <tbody>
                                                                                                @foreach( $student->student_numbers as $phoneNumber )
                                                                                                    <tr>
                                                                                                        <th>+88 {{ $phoneNumber->phone }}</th>
                                                                                                    </tr>
                                                                                                @endforeach
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>

                                                                            <div class="card card-body bg-light">
                                                                                <div class="card-title py-2"><i class="bx bx-window"></i> Book History</div>
                                                                                <nav>
                                                                                    <div class="nav nav-tabs" id="nav-tab-{{ $student->id }}" role="tablist">
                                                                                        <button class="nav-link active" id="nav-issue-tab-{{ $student->id }}" data-bs-toggle="tab" data-bs-target="#nav-issue-{{ $student->id }}" type="button" role="tab" aria-controls="nav-issue-{{ $student->id }}" aria-selected="true">Book Issued</button>
                                                                                        <button class="nav-link" id="nav-return-tab-{{ $student->id }}" data-bs-toggle="tab" data-bs-target="#nav-return-{{ $student->id }}" type="button" role="tab" aria-controls="nav-return-{{ $student->id }}" aria-selected="false">Book Returned</button>
                                                                                        <button class="nav-link" id="nav-lost-tab-{{ $student->id }}" data-bs-toggle="tab" data-bs-target="#nav-lost-{{ $student->id }}" type="button" role="tab" aria-controls="nav-lost-{{ $student->id }}" aria-selected="false">Book Losted</button>
                                                                                        <button class="nav-link" id="nav-booking-tab-{{ $student->id }}" data-bs-toggle="tab" data-bs-target="#nav-booking-{{ $student->id }}" type="button" role="tab" aria-controls="nav-booking-{{ $student->id }}" aria-selected="false">Booking</button>
                                                                                    </div>
                                                                                </nav>
                                                                                <div class="tab-content" id="nav-tabContent">
                                                                                    <div class="tab-pane fade show active" id="nav-issue-{{ $student->id }}" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-12">
                                                                                                <div class="card">
                                                                                                    <div class="card-body">
                                                                                                        @if(count($student->issue) > 0)
                                                                                                            <div class="table-responsive">
                                                                                                                <table class="table align-middle table-nowrap mb-0">
                                                                                                                    <thead class="table-light">
                                                                                                                    <tr>

                                                                                                                        <th class="align-middle">Book Code</th>
                                                                                                                        <th class="align-middle">Book Name</th>
                                                                                                                        <th class="align-middle">Issue Date</th>

                                                                                                                    </tr>
                                                                                                                    </thead>
                                                                                                                    <tbody>
                                                                                                                    @foreach($student->issue as $issued)
                                                                                                                        <tr>

                                                                                                                            <td> <a href="javascript: void(0);" class="text-body fw-bold">#{{ $issued->book->book_code }}</a> </td>
                                                                                                                            <td>{{ $issued->book->name }}</td>
                                                                                                                            <td>
                                                                                                                                {{ $issued->created_at }}
                                                                                                                            </td>

                                                                                                                        </tr>
                                                                                                                    @endforeach
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </div>
                                                                                                            <!-- end table-responsive -->
                                                                                                        @else
                                                                                                            <div class="card-title">No Data Found</div>
                                                                                                        @endif
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- end row -->
                                                                                    </div>
                                                                                    <div class="tab-pane fade" id="nav-return-{{ $student->id }}" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-12">
                                                                                                <div class="card">
                                                                                                    <div class="card-body">
                                                                                                        @if(count($student->return) > 0)
                                                                                                            <div class="table-responsive">
                                                                                                                <table class="table align-middle table-nowrap mb-0">
                                                                                                                    <thead class="table-light">
                                                                                                                    <tr>

                                                                                                                        <th class="align-middle">Book Code</th>
                                                                                                                        <th class="align-middle">Book Name</th>
                                                                                                                        <th class="align-middle">Return Date</th>

                                                                                                                    </tr>
                                                                                                                    </thead>
                                                                                                                    <tbody>
                                                                                                                    @foreach($student->return as $returned)
                                                                                                                        <tr>

                                                                                                                            <td> <a href="javascript: void(0);" class="text-body fw-bold">#{{ $returned->book->book_code }}</a> </td>
                                                                                                                            <td>{{ $returned->book->name }}</td>
                                                                                                                            <td>
                                                                                                                                {{ $returned->created_at }}
                                                                                                                            </td>

                                                                                                                        </tr>
                                                                                                                    @endforeach
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </div>
                                                                                                            <!-- end table-responsive -->
                                                                                                        @else
                                                                                                            <div class="card-title">No Data Found</div>
                                                                                                        @endif
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- end row -->
                                                                                    </div>
                                                                                    <div class="tab-pane fade" id="nav-lost-{{ $student->id }}" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-12">
                                                                                                <div class="card">
                                                                                                    <div class="card-body">
                                                                                                        @if(count($student->lost) > 0)
                                                                                                            <div class="table-responsive">
                                                                                                                <table class="table align-middle table-nowrap mb-0">
                                                                                                                    <thead class="table-light">
                                                                                                                    <tr>

                                                                                                                        <th class="align-middle">Book Code</th>
                                                                                                                        <th class="align-middle">Book Name</th>
                                                                                                                        <th class="align-middle">Lost Date</th>

                                                                                                                    </tr>
                                                                                                                    </thead>
                                                                                                                    <tbody>
                                                                                                                    @foreach($student->lost as $losted)
                                                                                                                        <tr>

                                                                                                                            <td> <a href="javascript: void(0);" class="text-body fw-bold">#{{ $losted->book->book_code }}</a> </td>
                                                                                                                            <td>{{ $losted->book->name }}</td>
                                                                                                                            <td>
                                                                                                                                {{ $losted->created_at }}
                                                                                                                            </td>

                                                                                                                        </tr>
                                                                                                                    @endforeach
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </div>
                                                                                                            <!-- end table-responsive -->
                                                                                                        @else
                                                                                                            <div class="card-title">No Data Found</div>
                                                                                                        @endif
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- end row -->
                                                                                    </div>
                                                                                    <div class="tab-pane fade" id="nav-booking-{{ $student->id }}" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-12">
                                                                                                <div class="card">
                                                                                                    <div class="card-body">
                                                                                                        @if( count($student->booking) > 0 )
                                                                                                            <div class="table-responsive">
                                                                                                                <table class="table align-middle table-nowrap mb-0">
                                                                                                                    <thead class="table-light">
                                                                                                                    <tr>

                                                                                                                        <th class="align-middle">Book Code</th>
                                                                                                                        <th class="align-middle">Book Name</th>
                                                                                                                        <th class="align-middle">Return Date</th>

                                                                                                                    </tr>
                                                                                                                    </thead>
                                                                                                                    <tbody>
                                                                                                                    @foreach($student->booking as $booking)
                                                                                                                        <tr>

                                                                                                                            <td> <a href="javascript: void(0);" class="text-body fw-bold">#{{ $booking->book->book_code }}</a> </td>
                                                                                                                            <td>{{ $booking->book->name }}</td>
                                                                                                                            <td>
                                                                                                                                {{ $booking->return_date }}
                                                                                                                            </td>

                                                                                                                        </tr>
                                                                                                                    @endforeach
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </div>
                                                                                                            <!-- end table-responsive -->
                                                                                                        @else
                                                                                                            <div class="card-title">No Data Found</div>
                                                                                                        @endif
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- end row -->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
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
