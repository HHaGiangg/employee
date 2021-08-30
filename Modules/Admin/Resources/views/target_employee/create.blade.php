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
                                <a class="link-fx" href="{{ route('admin.get.list.target_employee') }}">List</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </h1>
    <div class="content">
        <!-- Validation Wizards -->
        <h2 class="content-heading">Chỉ tiêu nhân viên</h2>
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
                                    <label for="val-suggestions">Nhân viên <span class="text-danger">*</span></label>
                                    <select name="employee_id" class="form-control " id="sel_employee">
                                        <option value="0">_Click_</option>
                                        @foreach($empData['data'] as $values)
                                            <option value="{{ $values->id }}" {{in_array($values->id, $employeeOld) ? "selected='selected'" : ''}}>{{ $values->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->first('employee_id'))
                                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('employee_id') }}</small>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="val-suggestions">Vị trí nhân viên <span class="text-danger">*</span></label>
                                    <select name="position_id" class="form-control " id="sel_position">
                                        <option value='0'>_Click_</option>
{{--                                        @foreach($position as $key)--}}
{{--                                            <option value="{{ $key->id }}" {{in_array($key->id, $positionOld) ? "selected='selected'" : ''}}>{{ $key->title }}</option>--}}
{{--                                        @endforeach--}}
                                    </select>
                                    @if($errors->first('position_id'))
                                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('position_id') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="js-wizard-validation block block">
                    <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#wizard-validation-step1" data-toggle="tab">Chỉ tiêu</a>
                        </li>
                    </ul>
                    <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                        <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                            <div class="form-group">
                                <label for="val-suggestions">Chỉ tiêu phòng <span class="text-danger">*</span></label>
                                <select name="target_department_id" class="form-control ">
                                    <option value="">_Click_</option>
                                    @foreach($target_departments as $target_department)
                                        <option value="{{ $target_department->id }}" {{in_array($target_department->id, $target_departmentOld) ? "selected='selected'" : ''}}>{{ $target_department->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->first('target_department_id'))
                                    <small id="emailHelp" class="form-text text-danger">{{ $errors->first('target_department_id') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="val-currency">Tên chỉ tiêu <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"  name="name" value="{{ old('name') }}" placeholder="Tên chỉ tiêu" required="">
                                @if($errors->first('name'))
                                    <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                <div class="row">
                    <div class="row items-push">
                        <div class="col-lg-7 offset-lg-4">
                            <button type="submit" class="btn btn-alt-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        //Employee
        $('#sel_employee').change(function () {
            var id = $(this).val();

            $('#sel_position').find('option').not(':first').remove();

            //Ajax request
            $.ajax({
                url: 'getPosition/'+id,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    var len = 0;
                    if(response['data'] != null){
                        len = response['data'].length;
                    }
                    //show vi tri
                    if (len >0){
                        for (var i=0; i<len; i++){
                            var id= response['data'][i].id;
                            var name= response['data'][i].name;

                            var option = "<option value='"+id+"'>"+name+"</option>";

                            $('#sel_position').append(option);

                        }
                    }
                }

            });
        })
    })
</script>



