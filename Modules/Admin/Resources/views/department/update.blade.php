@extends('admin::layouts.master')
@section('content')
    <h1 class="flex-sm-fill h3 my-2">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Cập nhật phòng ban
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="">Home</a>
                            </li>
                            <li class="breadcrumb-item">Department</li>
                            <li class="breadcrumb-item">Update</li>
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
        <div class="content">
            <!-- Validation Wizards -->
            <h2 class="content-heading">Cập nhật </h2>
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
                                    <input type="text" class="form-control"  name="name" value="{{ $department->name }}" placeholder="Name Department">
                                    @if($errors->first('name'))
                                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                                {{--                    <div class="form-group">--}}
                                {{--                        <label for="val-suggestions">Leader <span class="text-danger">*</span></label>--}}
                                {{--                        <select name="position_id" class="form-control ">--}}
                                {{--                            <option value="">_Click_</option>--}}
                                {{--                            @foreach($positions as $position)--}}
                                {{--                                <option value="{{ $position->id }}" {{ old('position_id',$department->position_id ?? 0) == $position->id ? "selected" : "" }}>{{ $position->name }}</option>--}}
                                {{--                            @endforeach--}}
                                {{--                        </select>--}}
                                {{--                        @if($errors->first('position_id'))--}}
                                {{--                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('position_id') }}</small>--}}
                                {{--                        @endif--}}
                                {{--                    </div>--}}
                                <div class="form-group">
                                    <label for="val-suggestions">Mô tả <span class="text-danger">*</span></label>
                                    <textarea class="form-control"  name="description"  rows="5"  placeholder="What would you like to see?">{{ $department->description }}</textarea>
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
                <div class="col-md-6">
                    <!-- Contextual Table -->
                    <div class="block block-rounded">
                        <div class="block-header">
                            <h3 class="block-title">Nhân viên của phòng</h3>
                        </div>
                        <div class="block-content">
                            <table class="table table-borderless table-vcenter table-hover">
                                <thead>
                                <tr>
{{--                                    <th class="text-center" style="width: 50px;">#</th>--}}
                                    <th>Tên</th>
                                    <th>Chức vụ</th>
                                    <th class="text-center" style="width: 100px;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($view ))
                                <tr class="table-active">
{{--                                    <th class="text-center" scope="row">{{}}</th>--}}
                                    <td class="font-w600 font-size-sm">{{ $view->name }}</td>
{{--                                    <td class="font-w600 font-size-sm">{{ $view->employee()->pluck('name')->implode(' ') }}</td>--}}
                                    <td class="font-w600 font-size-sm">{{ $view->position->title }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-light js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit Client">
                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Remove Client">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Contextual Table -->
                </div>
            </div>
            <!-- END Validation Wizards -->
        </div>
    </div>
@endsection

