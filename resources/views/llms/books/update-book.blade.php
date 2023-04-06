@extends("llms.master")

@section("title")
    Book | Update Book Form
@endsection

{{--@section("page-title")--}}
{{--    Update Book Form--}}
{{--@endsection--}}

{{--@section("menues")--}}
{{--    Books / Manage Books /--}}
{{--@endsection--}}

{{--@section("sub-menu")--}}
{{--    Update Book--}}
{{--@endsection--}}

@section('main-content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-body border-bottom">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 card-title flex-grow-1">Student Information</h5>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route("edit.books", ['id' => $book->id]) }}" method="post" class="outer-repeater" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-2">
                        <div class="col-md-4">
                            <div class="card-body">
                                <div class="row mb-3 dark" style="/*background: whitesmoke*/">
                                    <div class="col-md-12 mx-auto">
                                        <div class="container-img p-0">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg"  name="image"/>
                                                    <label for="imageUpload">
                                                        <i class="dripicons-camera position-absolute" style="top: 10px; left: 10px;"></i>
                                                    </label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview" style="background-image: url({{ $book->image !== null ? asset( $book->image ) : 'https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png' }});">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 card-footer text-center text-uppercase fw-bold">
                                        <label for="imageUpload" class="d-block">Book Cover</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
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
                                <label for="author" class="col-md-3">Author</label>
                                <div class="col-md-9">

                                    <div  class="outer">
                                        <div  class="outer">

                                            <div class="inner-repeater mb-4">
                                                <div  class="inner mb-3" id="custom-repeater">

                                                    @if( count($book->authors) > 0 )
                                                        @foreach ($book->authors as $authors)
                                                            <div  class="inner mb-3 row one" >

                                                                <div class="col-md-10 col-8">
                                                                    <input type="text" id="author" class="inner form-control" name="author[]" placeholder="Author Name" value="{{ $authors->name }}"/>
                                                                </div>
                                                                <div class="col-md-2 col-4">
                                                                    <div class="d-grid">
                                                                        <div>
                                                                            <a href="{{ route("delete.books.author", ['author_id' => $authors->id]) }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Delete" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div  class="inner mb-3 row two">

                                                            <div class="col-md-10 col-8">
                                                                <input type="text" class="inner form-control text-capitalize" name="author[]" placeholder="Author Name"/>
                                                            </div>

                                                        </div>
                                                    @endif

                                                </div>
                                                <div>
                                                    <div data-bs-toggle="tooltip" data-bs-placement="left" title="Add More Author" id="data-repeater-add" class="btn btn-sm btn-soft-primary inner"><i class="bx bx-plus"></i></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <lavel class="col-md-3" for="location">Location</lavel>
                                <div class="col-md-9">
                                    <textarea name="location" class="form-control" id="location" cols="30" rows="5">{{ $book->location }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="submit" class="col-md-3"></label>
                                <div class="d-grid d-md-flex justify-content-md-start">
                                    <input id="submit" type="submit" class="btn btn-primary btn-xl w-30 waves-effect waves-light" value="UPDATE INFORMATION"/>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
