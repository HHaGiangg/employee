@extends('admin::layouts.master')
@section('content')
    <h1 class="flex-sm-fill h3 my-2">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Tại mới chỉ tiêu
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="">Home</a>
                            </li>
                            <li class="breadcrumb-item">Chỉ tiêu phòng ban</li>
                            <li class="breadcrumb-item">Tạo</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{ route('admin.get.list.target_department') }}">List</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </h1>
    <div class="content">
        <!-- Form create department -->
        <div class="row items-push">
            <div class="col-lg-4">
                <p class="font-size-sm text-muted">
                    Tạo mới chỉ tiêu
                </p>
            </div>
            <div class="col-lg-8 col-xl-5">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="val-username">Phòng ban <span class="text-danger">*</span></label>
                        <select name="department_id" class="form-control " required="">
                            <option value="">_Click_</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{in_array($department->id, $departmentOld) ? "selected='selected'" : ''}}>{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->first('department_id'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('department_id') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency"> Tên Chỉ Tiêu <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="name" value="{{ old('name') }}" placeholder="Name"  required="">
                        @if($errors->first('name'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-suggestions">Mô Tả <span class="text-danger">*</span></label>
                        <textarea class="form-control"  name="description" value="{{ old('description') }}" rows="5"  placeholder="What would you like to see?"></textarea>
                        @if($errors->first('description'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('description') }}</small>
                        @endif
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label for="val-currency">Điểm <span class="text-danger">*</span></label>--}}
{{--                        <input type="text" class="form-control"  name="title" value="{{ old('point') }}" placeholder="Title" required="">--}}
{{--                        @if($errors->first('point'))--}}
{{--                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('point') }}</small>--}}
{{--                        @endif--}}
{{--                    </div>--}}
                    <div class="row items-push">
                        <div class="col-lg-7 offset-lg-4">
                            <button type="submit" class="btn btn-alt-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!-- END Form create department -->
    </div>
@endsection

