@extends('admin::layouts.master')
@section('content')
    <h1 class="flex-sm-fill h3 my-2">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Quản lý phòng ban
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="">Home</a>
                            </li>
                            <li class="breadcrumb-item">Phòng ban</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{ route('admin.get.list.department') }}">List</a>
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
                <!-- Validation Wizard -->
                <div class="js-wizard-validation block block">
                    <!-- Step Tabs -->
                    <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#wizard-validation-step1" data-toggle="tab">Phòng Ban</a>
                        </li>
                    </ul>
                    <!-- END Step Tabs -->

                    <!-- Form -->
                    <form class="js-wizard-validation-form" action="" method="POST" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                            <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                                <div class="form-group">
                                    <label for="val-currency">Tên Phòng <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="name" value="{{ old('name') }}" placeholder="Name Department" required="">
                                    @if($errors->first('name'))
                                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label for="val-currency">Trưởng Phòng <span class="text-danger">*</span></label>--}}
{{--                                    <input type="text" class="form-control"  name="position_id" value="{{ old('position_id') }}" placeholder="Name Department" required="">--}}
{{--                                    @if($errors->first('position_id'))--}}
{{--                                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('position_id') }}</small>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label for="val-suggestions">Mô tả <span class="text-danger">*</span></label>
                                    <textarea class="form-control"  name="description" value="{{ old('description') }}" rows="5"  placeholder="What would you like to see?"></textarea>
                                    @if($errors->first('description'))
                                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('description') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="val-suggestions">Action <span class="text-danger">*</span></label>
                                    <select name="action" class="form-control ">
                                        <option value="0">_Click_</option>
                                        <option value="0" {{ ($department -> action ?? '') == 0 ? "selected='selected'": "" }}>Cancel</option>
                                        <option value="1" {{ ($department -> action ?? '') == 1 ? "selected='selected'": "" }}>Active</option>
                                    </select>
                                    @if($errors->first('action'))
                                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('action') }}</small>
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

