@extends('admin.layouts.app')

@section('admin-content')

<div class="container-fluid px-4">
    <div class="container form-text">
        <div class="row">
            <div class="col-sm-12">
                <h3 style="margin: auto; margin-top: 20px; text-align: center;">Thêm Tài Khoản</h3>
            </div>
            <div class="col-sm-12" style="display: flex; justify-content: center; align-items: center;">
                <!-- Static Form without data processing -->
                <form style="width: 500px;">
                    <div class="form-group">
                        <label for="txtadname">Tên tài khoản</label>
                        <input class="form-control" id="txtadname" type="text" name="txtadname" required placeholder="enter your username" oninvalid="this.setCustomValidity('Vui lòng nhập tên đăng nhập')" oninput="setCustomValidity('')" maxlength="20" pattern="[a-zA-Z0-9]+">
                    </div>
                    <div class="form-group">
                        <label for="txtname">Họ và tên</label>
                        <input class="form-control" id="txtname" type="text" name="txtname" required placeholder="enter your full name" oninvalid="this.setCustomValidity('Vui lòng nhập họ tên')" oninput="setCustomValidity('')" maxlength="50" pattern="[a-zA-Z0-9\sàáạãèéẹẽìíịĩòóọõùúụũưừứựửừứựữêếềệểôồốộỗăằắặẳẵâầấậẩẫđÑñ]+">
                    </div>
                    <div class="form-group">
                        <label for="pass">Mật khẩu</label>
                        <input class="form-control" id="pass" type="password" name="pass" required placeholder="enter your password" oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu')" oninput="setCustomValidity('')" maxlength="20" oninput="this.value = this.value.replace(/\s/g, '')">
                    </div>
                    <div class="form-group">
                        <label for="cpass">Nhập lại mật khẩu</label>
                        <input class="form-control" id="cpass" type="password" name="cpass" required placeholder="confirm your password" oninvalid="this.setCustomValidity('Vui lòng nhập lại mật khẩu')" oninput="setCustomValidity('')" maxlength="20" oninput="this.value = this.value.replace(/\s/g, '')">
                    </div>
                    <button type="button" class="btn btn-primary">Thêm tài khoản</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection