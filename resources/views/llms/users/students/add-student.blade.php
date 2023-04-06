@extends("llms.master")

@section("title")
    Users | Students
@endsection

{{--@section("page-title")--}}
{{--    Add Student Form--}}
{{--@endsection--}}

{{--@section("menues")--}}
{{--    Users / Students /--}}
{{--@endsection--}}

{{--@section("sub-menu")--}}
{{--    Add Student--}}
{{--@endsection--}}

@section('main-content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-body border-bottom">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 card-title flex-grow-1">New Student Information</h5>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route("add.students") }}" method="post" class="outer-repeater" enctype="multipart/form-data">
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
                                                    <div id="imagePreview" style="background-image: url({{'https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png'}});">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 card-footer text-center text-uppercase fw-bold">
                                        <label for="imageUpload" class="d-block">Student Image</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                {{--                            <div class="card-title py-3 text-capitalize fw-bold">New Student Information</div>--}}

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
                                                    <div  data-bs-toggle="tooltip" data-bs-placement="left" title="Add More Number">
                                                        <div data-repeater-create class="btn btn-sm btn-soft-primary inner"><i class="bx bx-plus"></i></div>
                                                    </div>
                                                    {{--                                                    <input  data-repeater-create type="button" class="btn btn-success bg-soft inner" value="Add Number"/>--}}
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="submit" class="col-md-3"></label>
                                    <div class="d-grid d-md-flex justify-content-md-start">
                                        <input id="submit" type="submit" class="btn btn-primary btn-xl w-30 waves-effect waves-light" value="SAVE INFORMATION"/>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
