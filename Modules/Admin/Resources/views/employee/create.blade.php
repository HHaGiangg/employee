@extends('admin::layouts.master')
@section('content')
    <h1 class="flex-sm-fill h3 my-2">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Tạo mới nhân viên
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="">Home</a>
                            </li>
                            <li class="breadcrumb-item">Nhân viên</li>
                            <li class="breadcrumb-item">Tạo</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{ route('admin.get.list.employee') }}">Danh sách</a>
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
                    Thêm nhân viên
                </p>
            </div>
{{--            <div class="col-lg-8 col-xl-5">--}}
            <div class="col-lg-8 col-xl-5">
                <form action="{{route('admin.post.create.employee')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="val-currency">Tên nhân viên <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="name" value="{{ old('name') }}" placeholder="Name Employee" required="">
                        @if($errors->first('name'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-suggestions">Giới Tính <span class="text-danger">*</span></label>
                        <select name="sex" class="form-control" >
                            <option value="">_Click_</option>
                            <option value="1" {{ ($employee -> sex ?? '') == 1 ? "selected='selected'": "" }}>Nam</option>
                            <option value="2" {{ ($employee -> sex ?? '') == 2 ? "selected='selected'": "" }}>Nữ</option>
                        </select>
                        @if($errors->first('sex'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('sex') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency">Ngày Sinh<span class="text-danger">*</span></label>
                        <input  type="date" class="form-control"  name="dob" value="{{ old('dob') }}" placeholder="YYYY/MM/DD"  required="">
                        @if($errors->first('dob'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('dob') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="val-currency">CMND<span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="identity_card" value="{{ old('identity_card') }}" placeholder="Identity card"  required="">
                        @if($errors->first('identity_card'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('identity_card') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency">Địa Chỉ<span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="address" value="{{ old('address') }}" placeholder="Address"  required="">
                        @if($errors->first('address'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('address') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency">Email<span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="email" value="{{ old('email') }}" placeholder="Email"  required="">
                        @if($errors->first('email'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency">Số Điện Thoại<span class="text-danger">*</span></label>
                        <input type="number" class="form-control"  name="phone" value="{{ old('phone') }}" placeholder="Phone" required="">
                        @if($errors->first('phone'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('phone') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-username">Phòng Ban <span class="text-danger">*</span></label>
                        @foreach($departments as $key => $items)
                            <div class="form-group ">
                                {{--                                    @foreach($items as $item)--}}
                                <div class="checkbox"><label>
                                        <input type="checkbox" name="" {{in_array($items['id'], $positionOld) ? "checked" : ''}}
                                        value="{{ $items['id'] }}">{{ $items['name'] }}</label>
                                    {{--                                            <input type="checkbox" name="">{{ $items['name'] }}</label>--}}
                                </div>
                                {{--                                    @endforeach--}}
                            </div>
                        @endforeach
                        @if($errors->first('department_id'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('department_id') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-username">Vị trí <span class="text-danger">*</span></label>
                            @foreach($position as $key => $items)
                                <div class="form-group ">
{{--                                    @foreach($items as $item)--}}
                                        <div class="checkbox"><label>
                                            <input type="checkbox" name="" {{in_array($items['id'], $positionOld) ? "checked" : ''}}
                                                value="{{ $items['id'] }}">{{ $items['name'] }}</label>
{{--                                            <input type="checkbox" name="">{{ $items['name'] }}</label>--}}
                                        </div>
{{--                                    @endforeach--}}
                                </div>
                            @endforeach
                        @if($errors->first('position_id'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('position_id') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency">Ngày vào<span class="text-danger">*</span></label>
                        <input type="date" class="form-control"  name="date_join" value="{{ old('date_join') }}" placeholder="YYYY/MM/DD" required="">
                        @if($errors->first('date_join'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('date_join') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency">Ngày Chính Thức<span class="text-danger">*</span></label>
                        <input type="date" class="form-control"  name="date_entry" value="{{ old('date_entry') }}" placeholder="YYYY/MM/DD" required="">
                        @if($errors->first('date_join'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('date_join') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency">Ngày Nghỉ<span class="text-danger">*</span></label>
                        <input type="date" class="form-control"  name="date_end" value="{{ old('date_end') }}" placeholder="YYYY/MM/DD" required="">
                        @if($errors->first('date_end'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('date_end') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency">Date Kết Thúc<span class="text-danger">*</span></label>
                        <input type="date" class="form-control"  name="date_out" value="{{ old('date_out') }}" placeholder="YYYY/MM/DD" required="">
                        @if($errors->first('date_out'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('date_out') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="val-currency">Exp Year<span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="exp_year" value="{{ old('exp_year') }}" placeholder="Exp Year" required="">
                        @if($errors->first('exp_year'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('exp_year') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="d-block" for="example-file-input">File Input</label>
                        <input type="file" id="example-file-input" name="upload" onchange="preview()" required="" value="{{old('avatar')}}">
                        <img id="frame" src="" alt="" style="width:100px; height:100px">
                        <script>
                            function preview() {
                                frame.src=URL.createObjectURL(event.target.files[0]);
                            }
                        </script>
                    </div>
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

