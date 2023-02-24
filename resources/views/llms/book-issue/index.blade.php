@extends("llms.master")

@section("title")
    Book | Issue
@endsection

@section("page-title")
     Book Issue Form
@endsection

@section("menues")
    Books / Return
@endsection

@section("sub-menu")
    Issue Book
@endsection

@section("main-content")
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-end">
                            <div class="input-group input-group-sm">
                                <select class="form-select form-select-sm">
                                    <option value="JA" selected>CSE</option>
                                    <option value="DE">BBA</option>
                                    <option value="NO">MBA</option>
                                </select>
                                <label class="input-group-text">Department</label>
                            </div>
                        </div>
                        <h4 class="card-title mb-4">Book Statistics</h4>
                    </div>

                    <div class="text-muted text-center">
                        <p class="mb-2">All Book</p>
                        <h4>6385</h4>
                    </div>

                    <div class="table-responsive mt-4">
                        <table class="table align-middle mb-0">
                            <tbody>
                            <tr>
                                <td>
                                    <h5 class="font-size-14 mb-1">Available</h5>
                                    <p class="text-muted mb-0">Neque quis est</p>
                                </td>

                                <td>
                                    <div id="radialchart-1" data-colors='["--bs-primary"]' class="apex-charts"></div>
                                </td>
                                <td>
                                    <p class="text-muted mb-1">Books</p>
                                    <h5 class="mb-0">20 %</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="font-size-14 mb-1">Issued</h5>
                                    <p class="text-muted mb-0">Neque quis est</p>
                                </td>

                                <td>
                                    <div id="radialchart-1" data-colors='["--bs-primary"]' class="apex-charts"></div>
                                </td>
                                <td>
                                    <p class="text-muted mb-1">Books</p>
                                    <h5 class="mb-0">37 %</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="font-size-14 mb-1">Delayed</h5>
                                    <p class="text-muted mb-0">Neque quis est</p>
                                </td>

                                <td>
                                    <div id="radialchart-1" data-colors='["--bs-primary"]' class="apex-charts"></div>
                                </td>
                                <td>
                                    <p class="text-muted mb-1">Books</p>
                                    <h5 class="mb-0">10 %</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="font-size-14 mb-1">Returned</h5>
                                    <p class="text-muted mb-0">Quis autem iure</p>
                                </td>

                                <td>
                                    <div id="radialchart-2" data-colors='["--bs-success"]' class="apex-charts"></div>
                                </td>
                                <td>
                                    <p class="text-muted mb-1">Books</p>
                                    <h5 class="mb-0">72 %</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="font-size-14 mb-1">Losted</h5>
                                    <p class="text-muted mb-0">Sed aliquam mauris.</p>
                                </td>

                                <td>
                                    <div id="radialchart-3" data-colors='["--bs-danger"]' class="apex-charts"></div>
                                </td>
                                <td>
                                    <p class="text-muted mb-1">Books</p>
                                    <h5 class="mb-0">54 %</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="font-size-14 mb-1">Collected fine of Book</h5>
                                    <p class="text-muted mb-0">Neque quis est</p>
                                </td>

                                <td>
                                    <div id="radialchart-1" data-colors='["--bs-primary"]' class="apex-charts"></div>
                                </td>
                                <td>
                                    <p class="text-muted mb-1">Books</p>
                                    <h5 class="mb-0">50 %</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="font-size-14 mb-1">Collected fine</h5>
                                    <p class="text-muted mb-0">Neque quis est</p>
                                </td>

                                <td>
                                    <div id="radialchart-1" data-colors='["--bs-primary"]' class="apex-charts"></div>
                                </td>
                                <td>
                                    <p class="text-muted mb-1">TK:</p>
                                    <h5 class="mb-0">37 %</h5>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card overflow-hidden">
                <div class="bg-success bg-soft">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-success p-3">
                                <h5 class="text-success">Search Your Book</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <form action="{{ route("book.search") }}" method="get">
                        <div class="hstack gap-3">
                            <input type="text" class="form-control me-auto" placeholder="Enter Your Book Code.." name="book_code"/>
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
               @if( isset($bookResult) )
                   @if( isset($studentResult) )
                       @if( count($studentResult) > 0 )
                            <form action="{{ route('book.issue-confirm') }}" method="get">
                                <div class="row">
                                    <div class="col-md-6">
                                        @foreach($studentResult as $result)
                                            <div class="card-body">
                                                <h4 class="card-title mb-4 bg-success bg-soft py-2 px-5 text-center text-capitalize fw-bold">{{ $result->name }}</h4>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p class="text-muted">{{ $result->roll }}</p>
                                                        <h6 class="text-muted">{{ $result->department }}</h6>
                                                        <label for="return-date" class="mt-3">Return Date</label>
                                                        <input type="date" name="return_date" id="return-date" class="form-control"/>
                                                        <input type="hidden" name="student_id"  value="{{ $result->id }}"/>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mt-4 mt-sm-0">
                                                            <img src="{{ asset( $result->image ) }}" alt="" class="img-thumbnail h-50 w-50"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-6">
                                        @foreach( $bookResult as $result )
                                            <div class="card-body">
                                                <h4 class="card-title mb-4 bg-success bg-soft py-2 px-5 text-center text-capitalize fw-bold">{{ $result->name }}</h4>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p class="text-muted">Abdullah Al Mamun</p>
                                                        <p class="text-muted">{{ $result->book_code }}</p>
                                                        <h6 class="text-muted">{{ $result->department }}</h6>
                                                        <input type="hidden" name="book_id" value="{{ $result->id }}"/>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mt-4 mt-sm-0">
                                                            <img src="{{ asset( $result->image ) }}" alt="" class="img-thumbnail h-50 w-50"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row">
                                   <div class="col-md-12">
                                       <div class="mt-4 card-body text-center">
                                           <button type="button" class="btn btn-primary waves-effect waves-light btn-sm" data-bs-toggle="modal" data-bs-target=".book-issue-confirm-model">Confirm <i class="mdi mdi-progress-check ms-1"></i></button>
                                       </div>
                                   </div>
                                </div>

                                <!--  Large modal example -->
                                <div class="modal fade book-issue-confirm-model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm">
                                        <div class="modal-content bg-dark bg-soft">
                                            <div class="modal-header">
                                                {{-- <h5 class="modal-title" id="myLargeModalLabel">Issue Booked</h5> --}}
                                                <button type="button" class="btn-close text-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card overflow-hidden">

                                                    <div class="card-body">
                                                        <div class="text-success">
                                                            <h5 class="text-secondary">Are you Sure to do Issue this book ??</h5>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer border border-0">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                                        <button type="submit" class="btn btn-success">Yes</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                           </form>
                       @else
                            @foreach( $bookResult as $result )
                                <div class="card-body">
                                    <h4 class="card-title mb-4 bg-success bg-soft py-2 px-5 text-center text-capitalize fw-bold">{{ $result->name }}</h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="text-muted">Abdullah Al Mamun</p>
                                            <h6 class="text-muted">{{ $result->department }}</h6>
                                            <div class="mt-4">
                                                <a href="" class="btn btn-success waves-effect waves-light btn-sm" data-bs-toggle="modal" data-bs-target=".member-code-search-model">Available <i class="mdi mdi-progress-check ms-1"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-4 mt-sm-0">
                                                <img src="{{ asset( $result->image ) }}" alt="" class="img-thumbnail h-50 w-50"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="card-body m-auto">
                                <div class="card-title text-danger">
                                    No Member Founded of this code, please input valid code.
                                </div>
                            </div>
                       @endif
                   @else
                        @if( count($bookResult) > 0 )
                            @foreach( $bookResult as $result )
                                <div class="card-body">
                                    <h4 class="card-title mb-4 bg-success bg-soft py-2 px-5 text-center text-capitalize fw-bold">{{ $result->name }}</h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="text-muted">Abdullah Al Mamun</p>
                                            <h6 class="text-muted">{{ $result->department }}</h6>

                                            @if( isset( $issueBook ) )
                                                @if( isset( $bookLostResult ) )
                                                    @foreach( $issueBook as $issueBookResult)
                                                        <h6 class="text-muted">This book is Lost  by :  {{ $issueBookResult->student->name }}</h6>
                                                        <div class="row">
                                                           <div class="col-md-12">
                                                               <h1>Not Available</h1>
                                                           </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    @foreach( $issueBook as $issueBookResult)
                                                        <h6 class="text-muted">This book is already have been bocked by :  {{ $issueBookResult->student->name }}</h6>
                                                        <div class="row">
                                                            <div class="col-md-4 mt-4">
                                                                <button  class="btn btn-danger waves-effect waves-light btn-sm" data-bs-toggle="modal" data-bs-target=".book-return-confirm-model">Return <i class="mdi mdi-progress-check ms-1"></i></button>
                                                            </div>
                                                            <div class="col-md-6 mt-4">
                                                                <button  class="btn btn-secondary waves-effect waves-light btn-sm" data-bs-toggle="modal" data-bs-target=".book-lost-confirm-model">Lost <i class="mdi mdi-progress-check ms-1"></i></button>
                                                            </div>
                                                        </div>

                                                        <!--  book return confirm model -->
                                                        <div class="modal fade book-lost-confirm-model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                                                <div class="modal-content bg-dark bg-soft">
                                                                    <div class="modal-header">
                                                                        {{-- <h5 class="modal-title" id="myLargeModalLabel">Issue Booked</h5> --}}
                                                                        <button type="button" class="btn-close text-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="card overflow-hidden">

                                                                            <div class="card-body">
                                                                                <div class="text-success text-capitalize">
                                                                                    <h5 class="text-secondary">Hey, {{ $issueBookResult->student->name }}!! <br/>Are you Sure, You lost this book ??</h5>
                                                                                    <h6>Id: {{ $issueBookResult->student->roll }}</h6>
                                                                                    <h1>Your Fine: 300Tk </h1>
                                                                                    <img src="{{ asset($issueBookResult->student->image) }}" alt="" class="img-thumbnail h-50 w-50"/>
                                                                                </div>
                                                                            </div>

                                                                            <div class="modal-footer border border-0">
                                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                                                                <a href="{{ route("book.lost") }}?student_id={{ $issueBookResult->student_id }}&book_id={{ $issueBookResult->book_id }}"  class="btn btn-success">Yes</a>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->
                                                        <!--  book return confirm model -->
                                                        <div class="modal fade book-return-confirm-model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                                                <div class="modal-content bg-dark bg-soft">
                                                                    <div class="modal-header">
                                                                        {{-- <h5 class="modal-title" id="myLargeModalLabel">Issue Booked</h5> --}}
                                                                        <button type="button" class="btn-close text-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="card overflow-hidden">

                                                                            <div class="card-body">
                                                                                <div class="text-success text-capitalize">
                                                                                    <h5 class="text-secondary">Hey, {{ $issueBookResult->student->name }}!! <br/>Are you Sure to return this book ??</h5>
                                                                                    <h6>Id: {{ $issueBookResult->student->roll }}</h6>
                                                                                    <img src="{{ asset($issueBookResult->student->image) }}" alt="" class="img-thumbnail h-50 w-50"/>
                                                                                </div>
                                                                            </div>

                                                                            <div class="modal-footer border border-0">
                                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                                                                <a href="{{ route("book.return") }}?book_issue_id={{ $issueBookResult->id }}&student_id={{ $issueBookResult->student_id }}&book_id={{ $issueBookResult->book_id }}"  class="btn btn-success">Yes</a>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->
                                                    @endforeach
                                                @endif
                                            @else
                                                <div class="mt-4">
                                                    <a href="" class="btn btn-success waves-effect waves-light btn-sm" data-bs-toggle="modal" data-bs-target=".member-code-search-model">Available <i class="mdi mdi-progress-check ms-1"></i></a>
                                                </div>
                                            @endif

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mt-4 mt-sm-0">
                                                <img src="{{ asset( $result->image ) }}" alt="" class="img-thumbnail h-50 w-50"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="card-body m-auto">
                                <div class="card-title text-danger">
                                    No Book Avilable With This Code, Please Retry By Another Code.
                                </div>
                            </div>
                        @endif
                   @endif
               @else
                    <div class="card-body m-auto">
                        <div class="card-title text-danger">
                            No Book Avilable Here, Please Search By Book Code.
                        </div>
                    </div>
               @endif
            </div>
        </div>
    </div>

    <div class="row">
       <div class="col-xl-6">
           <div class="card">
               <div class="card-body">
                   <h4 class="card-title mb-4">Latest Issue History</h4>
                   <div class="table-responsive">
                       <table class="table align-middle table-nowrap mb-0">
                           <thead class="table-light">
                           <tr>
                               <th class="align-middle">SL NO</th>
                               <th class="align-middle">Book Code</th>
                               <th class="align-middle">Book Name</th>
                               <th class="align-middle">Member Name</th>
                               <th class="align-middle">Department</th>
                               <th class="align-middle">Return Date</th>
                               <th class="align-middle">View Details</th>
                           </tr>
                           </thead>
                           <tbody>
                               @foreach( $latestIssue as $latestIssueResult )
                                   <tr>
                                       <td>
                                            {{ $loop->iteration }}
                                       </td>
                                       <td>
                                           <a href="javascript: void(0);" class="text-body fw-bold">#{{ $latestIssueResult->book->book_code }}</a>
                                       </td>
                                       <td>
                                           {{ $latestIssueResult->book->name }}
                                       </td>
                                       <td>
                                           {{ $latestIssueResult->student->name }}
                                       </td>
                                       <td>
                                           {{ $latestIssueResult->student->department }}
                                       </td>
                                       <td>
                                           <span class="badge badge-pill badge-soft-success font-size-11">{{ $latestIssueResult->return_date }}</span>
                                       </td>
                                       <td>
                                           <!-- Button trigger modal -->
                                           <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                               View Details
                                           </button>
                                       </td>
                                   </tr>
                               @endforeach
                           </tbody>
                       </table>
                   </div>
                   <!-- end table-responsive -->
               </div>
           </div>
       </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Latest Return History</h4>
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                            <tr>
                                <th class="align-middle">SL NO</th>
                                <th class="align-middle">Book Code</th>
                                <th class="align-middle">Book Name</th>
                                <th class="align-middle">Member Name</th>
                                <th class="align-middle">Department</th>
                                <th class="align-middle">Issue Id</th>
                                <th class="align-middle">View Details</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach( $latestReturn as $latestReturnResult )
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        <a href="javascript: void(0);" class="text-body fw-bold">#{{ $latestReturnResult->book->book_code }}</a>
                                    </td>
                                    <td>
                                        {{ $latestReturnResult->book->name }}
                                    </td>
                                    <td>
                                        {{ $latestReturnResult->student->name }}
                                    </td>
                                    <td>
                                        {{ $latestReturnResult->student->department }}
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-soft-success font-size-11">{{ $latestReturnResult->book_issue_id }}</span>
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
    </div>

    <!--  member code search model -->
    <div class="modal fade member-code-search-model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Search Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card overflow-hidden">
                        <div class="bg-success bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-success p-3">
                                        <h5 class="text-success">Search Library Member By Member Code</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <form action="{{ route("member.search") }}" method="get">
                                <div class="hstack gap-3">
                                    @if( isset($bookResult) )
                                        @foreach( $bookResult as $result )
                                            <input type="hidden"  name="book_code" value="{{ $result->book_code }}"/>
                                        @endforeach
                                    @endif
                                    <input type="text" class="form-control me-auto" placeholder="Enter Your Member Code.." name="member_code" required/>
                                    <button type="submit" class="btn btn-success">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection
