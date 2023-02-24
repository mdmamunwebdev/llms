@extends("llms.master")

@section("title")
    Book | Update Book Form
@endsection

@section("page-title")
    Update Book Form
@endsection

@section("menues")
    Books / Manage Books /
@endsection

@section("sub-menu")
    Update Book
@endsection

@section('main-content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("edit.books", ['id' => $book->id]) }}" method="post" class="outer-repeater" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-3">Name</label>
                        <div class="col-md-9">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $book->name }}"/>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="code" class="col-md-3">Book Code</label>
                        <div class="col-md-9">
                            <input id="code" type="number" class="form-control" name="book_code" value="{{ $book->book_code }}"/>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="department" class="col-md-3">Department</label>
                        <div class="col-md-9">
                            <select name="department" id="department" class="form-select">
                                <option disabled> -- Select -- </option>
                                <option value="cse" {{ $book->department == 'cse' ? 'selected' : '' }}>CSE</option>
                                <option value="bba" {{ $book->department == 'bba' ? 'selected' : '' }}>BBA</option>
                                <option value="mba" {{ $book->department == 'mba' ? 'selected' : '' }}>MBA</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="phone" class="col-md-3">Author</label>
                        <div class="col-md-9">

                            <div data-repeater-list="outer_group" class="outer">
                                <div data-repeater-item class="outer">

                                    <div class="inner-repeater mb-4">
                                        <div data-repeater-list="inner_group" class="inner mb-3">

                                            @if( count( $book->atuthors ) > 0 )
                                                {{ 'Have a no author' }}
                                            @else
                                                <div data-repeater-item class="inner mb-3 row">

                                                    <div class="col-md-10 col-8">
                                                        <input type="text" class="inner form-control" name="author" placeholder="Enter book author name..."/>
                                                    </div>
                                                    <div class="col-md-2 col-4">
                                                        <div class="d-grid">
                                                            <div  data-bs-toggle="tooltip" data-bs-placement="top" title="Cencel">
                                                                <div data-repeater-delete  class="btn btn-sm btn-soft-secondary inner"><i class="dripicons-cross"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endif

                                        </div>
                                        <input  data-repeater-create type="button" class="btn btn-success inner" value="Add Author"/>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-md-3">Image</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input type="file" class="form-control" id="image" name="image"/>
                                <label class="input-group-text" for="image">Upload</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="" class="col-md-3 bg-black"></label>
                        <div class="col-md-9">
                            <img src="{{ asset( $book->image ) }}" alt="" class="h-50 w-50 "/>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="submit" class="col-md-3"></label>
                        <div class="col-md-9">
                            <input id="submit" type="submit" class="btn btn-primary w-100" value="Edit Book"/>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
