@extends("llms.master")

@section("title")
    Users | Students
@endsection

@section("page-title")
    Update Student Form
@endsection

@section("menues")
    Users / Students /
@endsection

@section("sub-menu")
    Update Student
@endsection

@section('main-content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title mb-3 text-success font-bold text-capitalize">{{ Session::get('stdMessage') }}</div>
                <form action="{{ route("update.students", ['id' => $student->id]) }}" method="post" class="outer-repeater" enctype="multipart/form-data">
                    @csrf

                            <div class="row mb-3" style="background: whitesmoke">
                                <div class="col md-12 mx-auto">
                                    <div class="container-img">
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg"  name="image"/>
                                                <label for="imageUpload">
                                                    <i class="dripicons-camera position-absolute" style="top: 10px; left: 10px;"></i>
                                                </label>
                                            </div>
                                            <div class="avatar-preview">
                                                <div id="imagePreview" style="background-image: url({{ $student->image !== null ? asset( $student->image ) : 'https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png' }});">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $student->name }}"/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="roll" class="col-md-3">Roll</label>
                                <div class="col-md-9">
                                    <input id="roll" type="number" class="form-control" name="roll" value="{{ $student->roll }}"/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="department" class="col-md-3">Department</label>
                                <div class="col-md-9">
                                    <select name="department" id="department" class="form-select">
                                        <option disabled> -- Select -- </option>
                                        <option value="cse" {{ $student->department == 'cse' ? 'selected': '' }}>CSE</option>
                                        <option value="bba" {{ $student->department == 'bba' ? 'selected': '' }}>BBA</option>
                                        <option value="mba" {{ $student->department == 'mba' ? 'selected': '' }}>MBA</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="type" class="col-md-3">Type</label>
                                <div class="col-md-9">
                                    <select class="form-select" name="type">
                                        <option disabled> -- Select -- </option>
                                        <option value="1" {{ $student->type == 1 ? 'selected': '' }}>Regular</option>
                                        <option value="0" {{ $student->type == 0 ? 'selected': '' }}>Irregular</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="staus" class="col-md-3">Status</label>
                                <div class="col-md-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="active" value="1" {{ $student->status == 1 ? 'checked': '' }}/>
                                        <label class="form-check-label" for="active">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="deactive" value="0" {{ $student->status == 0 ? 'checked': '' }}/>
                                        <label class="form-check-label" for="deactive">Deactive</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-md-3">Phone</label>
                                <div class="col-md-9">

                                    <div  class="outer">
                                        <div  class="outer">

                                            <div class="inner-repeater mb-4">
                                                <div  class="inner mb-3" id="custom-repeater">

                                                    @if( count($student->student_numbers) > 0 )
                                                        @foreach ($student->student_numbers as $phones)
                                                        <div  class="inner mb-3 row one" >

                                                            <div class="col-md-10 col-8">
                                                                <input type="text" class="inner form-control" name="phone[]" placeholder="Enter your phone no..." value="{{ $phones->phone }}"/>
                                                            </div>
                                                            <div class="col-md-2 col-4">
                                                                <div class="d-grid">
                                                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                                        <a href="{{ route("delete.student-phone-number", ['id' => $phones->id]) }}" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        @endforeach
                                                    @else
                                                        <div  class="inner mb-3 row two">

                                                            <div class="col-md-10 col-8">
                                                                <input type="text" class="inner form-control" name="phone[]" placeholder="Enter your phone no..."/>
                                                            </div>
{{--                                                            <div class="col-md-2 col-4">--}}
{{--                                                                <div class="d-grid">--}}
{{--                                                                    <div  data-bs-toggle="tooltip" data-bs-placement="top" title="Cencel">--}}
{{--                                                                        <div class="btn btn-sm btn-soft-secondary inner" id="cancelBtn"><i class="dripicons-cross"></i></div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}

                                                        </div>
                                                    @endif

                                                </div>
                                                <input id="data-repeater-add"  type="button" class="btn btn-primary inner" value="Add Number"/>
                                            </div>

                                        </div>
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
