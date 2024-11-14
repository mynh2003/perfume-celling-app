<!DOCTYPE html>
<html>
<head>
    <title>Đặt lại mật khẩu</title>
    <style>
        /* Đặt kiểu cho toàn bộ email */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        table {
            width: 100%;
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        td {
            padding: 20px;
        }

        img {
            display: block;
            margin: 0 auto 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            margin: 15px 0;
        }

        a {
            border-radius: 4px;
            color: #fff !important;
            display: inline-block;
            overflow: hidden;
            text-decoration: none;
            background-color: #2d3748;
            border-bottom: 8px solid #2d3748;
            border-left: 18px solid #2d3748;
            border-right: 18px solid #2d3748;
            border-top: 8px solid #2d3748;
        }

        .footer {
            font-size: 12px;
            text-align: center;
            color: #777;
            margin-top: 20px;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td>
                <p>Xin chào!</p>
                <p>Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p>
                <p>Để đặt lại mật khẩu, vui lòng nhấn vào liên kết dưới đây:</p>
                <p><a href="<?php echo e($actionUrl); ?>">Đặt lại mật khẩu</a></p>
                <p>Liên kết này sẽ hết hạn sau 60 phút.</p>
                <p>Nếu bạn không yêu cầu thay đổi mật khẩu, vui lòng bỏ qua email này.</p>
                <p>Trân trọng,</p>
                <p>Vperfume - Scent Bliss</p>
            </td>
        </tr>
    </table>

    <div class="footer">
        <p>© 2024 Vperfume - Scent Bliss</p>
        <p>Địa chỉ: 118 Lĩnh Nam, Hoàng Mai, Hà Nội</p>
    </div>
</body>
</html>
<?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/emails/password_reset.blade.php ENDPATH**/ ?>