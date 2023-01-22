@extends("llms.master")

@section("title")
    Users | Students
@endsection

@section("page-title")
    Add Student Form
@endsection

@section("menues")
    Users / Students /
@endsection

@section("sub-menu")
    Add Student
@endsection

@section('main-content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("add.students") }}" method="post" class="outer-repeater" enctype="multipart/form-data">
                    @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input id="name" type="text" class="form-control" name="name"/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="roll" class="col-md-3">Roll</label>
                                <div class="col-md-9">
                                    <input id="roll" type="number" class="form-control" name="roll"/>
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
                                <label for="type" class="col-md-3">Type</label>
                                <div class="col-md-9">
                                    <select class="form-select" name="type">
                                        <option disabled> -- Select -- </option>
                                        <option value="1">Regular</option>
                                        <option value="0">Irregular</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="staus" class="col-md-3">Status</label>
                                <div class="col-md-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="active" value="1" checked/>
                                        <label class="form-check-label" for="active">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="deactive" value="0"/>
                                        <label class="form-check-label" for="deactive">Deactive</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-md-3">Phone</label>
                                <div class="col-md-9">

                                    <div data-repeater-list="outer_group" class="outer">
                                        <div data-repeater-item class="outer">

                                            <div class="inner-repeater mb-4">
                                                <div data-repeater-list="inner_group" class="inner mb-3">

                                                    <div data-repeater-item class="inner mb-3 row">

                                                        <div class="col-md-10 col-8">
                                                            <input type="text" class="inner form-control" name="phone" placeholder="Enter your phone no..."/>
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
                                                <input  data-repeater-create type="button" class="btn btn-success inner" value="Add Number"/>
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
                                    <input id="submit" type="submit" class="btn btn-primary w-100" value="New Student"/>
                                </div>
                            </div>

                </form>
            </div>
        </div>
    </div>

@endsection
