<table class="table table-bordered table-striped table-vcenter">
    <thead>
    <tr>
        <th>Giới Tính</th>
        <th>Chứng Minh ND</th>
        <th>Địa Chỉ</th>
        <th>Điện Thoại</th>
        <th>Ngày Vào</th>
        <th>Ngày Chính Thức</th>
        <th>Ngày Nghỉ</th>
        <th>Ngày Kết Thúc</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($view))
            <tr>
                <td>{{$view->sex}}</td>
                <td>{{$view->identity_card}}</td>
                <td>{{$view->address}}</td>
                <td>{{$view->phone}}</td>
                <td>{{$view->date_join}}</td>
                <td>{{$view->date_entry}}</td>
                <td>{{$view->date_end}}</td>
                <td>{{$view->date_out}}</td>
            </tr>
    @endif
    </tbody>
</table>


