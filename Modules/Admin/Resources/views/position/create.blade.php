@extends('admin::layouts.master')
@section('content')
    <h1 class="flex-sm-fill h3 my-2">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Chức vụ nhân viên
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="">Home</a>
                            </li>
                            <li class="breadcrumb-item">Chức vụ</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{ route('admin.get.list.position') }}">List</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </h1>
    <div class="content">
        <!-- Validation Wizards -->
        <h2 class="content-heading">Validation Wizards</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="js-wizard-validation block block">
                    <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#wizard-validation-step1" data-toggle="tab">Vị Trí Nhân viên</a>
                        </li>
                    </ul>
                    <!-- Form -->
                    <form class="js-wizard-validation-form" action="" method="POST" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                            <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                                <div class="form-group">
                                    <label for="val-currency"> Tên Vị Trí <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="name" value="{{ old('name') }}" placeholder="Tên vị trí"  required="">
                                    @if($errors->first('name'))
                                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="val-username">Phòng Ban <span class="text-danger">*</span></label>
{{--                                    <input type="text" class="form-control"  name="department_id" value="{{ old('department_id') }}" placeholder="Tên phòng"  required="">--}}
                                    <select name="department_id" class="form-control ">
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
                                    <label for="val-currency">Title  <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="title" value="{{ old('title') }}" placeholder="Title" required="">
                                    @if($errors->first('title'))
                                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('title') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="val-suggestions">Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control"  name="description" value="{{ old('description') }}" rows="5"  placeholder="What would you like to see?"></textarea>
                                    @if($errors->first('description'))
                                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('description') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- END Steps Content -->
                        <!-- Steps Navigation -->
                        <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                            <div class="row">
                                <div class="row items-push">
                                    <div class="col-lg-7 offset-lg-4">
                                        <button type="submit" class="btn btn-alt-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Steps Navigation -->
                    </form>
                    <!-- END Form -->
                </div>
                <!-- END Validation Wizard Classic -->
            </div>
        </div>
        <!-- END Validation Wizards -->
    </div>

@endsection

