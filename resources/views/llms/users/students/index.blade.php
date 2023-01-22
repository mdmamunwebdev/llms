@extends("llms.master")

@section("title")
    Users | Students
@endsection

@section("page-title")
    Manage Students
@endsection

@section("menues")
    Users / Students /
@endsection

@section("sub-menu")
    Manage Students
@endsection

@section("main-content")

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 card-title flex-grow-1">Students Lists</h5>
                        <div class="flex-shrink-0">
                            <a href="#!" class="btn btn-primary">Add New Student</a>
                            <a href="#!" class="btn btn-light"><i class="mdi mdi-refresh"></i></a>
                            <div class="dropdown d-inline-block">

                                <button type="menu" class="btn btn-success" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body border-bottom">
                    <div class="row g-3">
                        <div class="col-xxl-4 col-lg-6">
                            <input type="search" class="form-control" id="searchInput" placeholder="Search for ...">
                        </div>
                        <div class="col-xxl-2 col-lg-6">
                            <select class="form-control select2">
                                <option>Status</option>
                                <option value="Active">Active</option>
                                <option value="New">New</option>
                                <option value="Close">Close</option>
                            </select>
                        </div>
                        <div class="col-xxl-2 col-lg-4">
                            <select class="form-control select2">
                                <option>Select Type</option>
                                <option value="1">Full Time</option>
                                <option value="2">Part Time</option>
                            </select>
                        </div>
                        <div class="col-xxl-2 col-lg-4">
                            <div id="datepicker1">
                                <input type="text" class="form-control" placeholder="Select date" data-date-format="dd M, yyyy" data-date-autoclose="true" data-date-container='#datepicker1' data-provide="datepicker">
                            </div><!-- input-group -->
                        </div>
                        <div class="col-xxl-2 col-lg-4">
                            <button type="button" class="btn btn-soft-secondary w-100"><i class="mdi mdi-filter-outline align-middle"></i> Filter</button>
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
                            <th>Roll</th>
                            <th>Dept</th>
                            {{-- <th>Phone</th> --}}
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
                                {{-- <td>
                                    <table>
                                        @foreach( $student->student_numbers as $phone )
                                            <td>{{ $phone->phone }}</td>
                                        @endforeach
                                    </table>
                                </td> --}}
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
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <a href="#" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger" onclick="event.preventDefault(); document.getElementById('stdDelete').submit()"><i class="mdi mdi-delete-outline"></i></a>
                                            <form action="{{ route("delete.students", $student->id) }}" method="post" id="stdDelete">
                                                @csrf
                                            </form>
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
                                                                                <img src="{{ asset( $student->image ) }}" alt="" class="card-img-top p-3  border-2 border-black rounded-circle"/>
                                                                            @else
                                                                                <img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt="" class="img-fluid rounded-start"/>
                                                                            @endif
                                                                            <div class="card-header text-center text-capitalize">{{ $student->name }}</div>
                                                                            <div class="card-body">
                                                                                <table class="table table-bordered table-hover dt-responsive nowrap w-100">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <th>Id :</th>
                                                                                        <td>{{ $student->roll }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Id :</th>
                                                                                        <td>{{ $student->roll }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Id :</th>
                                                                                        <td>{{ $student->roll }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Id :</th>
                                                                                        <td>{{ $student->roll }}</td>
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
                                                                                        <th>Name</th>
                                                                                        <th> : </th>
                                                                                        <td>{{ $student->name }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Name</th>
                                                                                        <th> : </th>
                                                                                        <td>{{ $student->name }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Name</th>
                                                                                        <th> : </th>
                                                                                        <td>{{ $student->name }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Name</th>
                                                                                        <th> : </th>
                                                                                        <td>{{ $student->name }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Phone Number</th>
                                                                                        <th> : </th>
                                                                                        <td>
                                                                                            <table class="table table-responsive-md">
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
                                                                                <div class="card-title py-2"><i class="bx bx-window"></i> Other Information</div>
                                                                                <div class="container-fluid" style="overflow: auto">
                                                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab animi harum laborum laudantium sequi. Dolore ducimus ex nesciunt obcaecati temporibus.
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
