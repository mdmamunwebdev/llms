@extends("llms.master")

@section("title")
    Books | Add Book
@endsection

@section("page-title")
    Add Book Form
@endsection

@section("menues")
    Books / Add Book
@endsection

@section("sub-menu")
    Add Book
@endsection

@section('main-content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("add.books") }}" method="post" class="outer-repeater" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-3">Name</label>
                        <div class="col-md-9">
                            <input id="name" type="text" class="form-control" name="name"/>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="code" class="col-md-3">Book Code</label>
                        <div class="col-md-9">
                            <input id="code" type="number" class="form-control" name="book_code"/>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="department" class="col-md-3">Department</label>
                        <div class="col-md-9">
                            <select name="department" id="department" class="form-select">
                                <option disabled> -- Select -- </option>
                                <option value="cse">CSE</option>
                                <option value="bba">BBA</option>
                                <option value="mba">MBA</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="staus" class="col-md-3">Status</label>
                        <div class="col-md-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="active" value="1" checked/>
                                <label class="form-check-label" for="active">Stored</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="deactive" value="0"/>
                                <label class="form-check-label" for="deactive">Lost</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="phone" class="col-md-3">Author</label>
                        <div class="col-md-9">

                            <div data-repeater-list="outer_group" class="outer">
                                <div data-repeater-item class="outer">

                                    <div class="inner-repeater mb-4">
                                        <div data-repeater-list="inner_group" class="inner mb-3">

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
                        <label for="submit" class="col-md-3"></label>
                        <div class="col-md-9">
                            <input id="submit" type="submit" class="btn btn-primary w-100" value="New Book"/>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
