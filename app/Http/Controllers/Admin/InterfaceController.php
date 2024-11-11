<?php

namespace App\Http\Controllers\Admin;

use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Footer;
use App\Models\Header;
use App\Models\Slide;
use Illuminate\Support\Facades\Log;

class InterfaceController extends Controller
{
    public function updateLogo(Request $request)
    {
        $request->validate([
            'clLogo' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048', // Kiểm tra file hình ảnh
        ]);

        $logo = Logo::first(); // Giả sử bạn chỉ có một logo

        // Kiểm tra và xóa logo cũ nếu có
        if ($logo && $logo->image) {  // Sử dụng đúng thuộc tính image
            $pathToDelete = 'manual/logo/' . $logo->image; // Đường dẫn đầy đủ tới file cũ

            // Kiểm tra và xóa file cũ nếu tồn tại
            if (Storage::disk('public')->exists($pathToDelete)) {
                Storage::disk('public')->delete($pathToDelete); // Xóa file cũ
            }
        }

        // Kiểm tra nếu có file mới trong yêu cầu và lưu lại
        if ($request->hasFile('clLogo')) {
            $extension = $request->file('clLogo')->getClientOriginalExtension();
            $newFileName = 'logo.' . $extension; // Tên file mới mặc định là logo kèm theo đuôi

            // Lưu logo mới vào thư mục public/manual/logo
            $path = $request->file('clLogo')->storeAs('manual/logo', $newFileName, 'public'); // Lưu vào disk 'public'

            if ($path) {
                $logo->image = $newFileName; // Cập nhật tên file trong cơ sở dữ liệu
                $logo->save();
            } 
        }
        return redirect()->back()->with('success', 'Logo đã được cập nhật!');
    }

    public function updateSlides(Request $request)
    {
        $imageFields = [
            1 => 'slide_1',
            2 => 'slide_2',
            3 => 'slide_3',
            4 => 'slide_4',
            5 => 'slide_5',
            6 => 'slide_6',
        ];

        $updatedSlides = [];

        foreach ($imageFields as $id => $fieldName) {

            if ($request->hasFile($fieldName)) {

                $slide = Slide::find($id);

                if ($slide) {;

                    // Đường dẫn file cũ
                    if ($slide->img) {
                        $pathToDelete = 'manual/slide/' . $slide->img;  // Không cần 'public/' vì đã chỉ định disk 'public'

                        // Kiểm tra và xóa file cũ nếu tồn tại
                        if (Storage::disk('public')->exists($pathToDelete)) {
                            Storage::disk('public')->delete($pathToDelete);
                        }
                    }

                    $extension = $request->file($fieldName)->getClientOriginalExtension();
                    $newFileName = 'slide' . $id . '.' . $extension;

                    // Lưu ảnh mới
                    $path = $request->file($fieldName)->storeAs('manual/slide', $newFileName, 'public');

                    if ($path) {
                        $slide->img = $newFileName;
                        $slide->save();
                        $updatedSlides[] = $newFileName;
                    } 
                } 
            } 
        }

        if (!empty($updatedSlides)) {
            return redirect()->back()->with('success', 'Các ảnh đã được cập nhật: ' . implode(', ', $updatedSlides));
        } else {
            return redirect()->back()->with('warning', 'Không có ảnh nào được cập nhật.');
        }
    }





    public function updateHeader(Request $request)
    {
        // Validate input
        $request->validate([
            'txtText' => 'required|string|max:255', // Kiểm tra xem trường text không được để trống và có độ dài tối đa là 255 ký tự
        ]);

        // Lấy bản ghi đầu tiên từ bảng header
        $header = Header::first();

        // Kiểm tra nếu bản ghi tồn tại
        if ($header) {
            // Cập nhật trường header với giá trị mới từ form
            $header->text = $request->input('txtText');
            $header->save(); // Lưu thay đổi
        } else {
            // Nếu chưa có bản ghi nào, có thể tạo mới (tùy theo yêu cầu của bạn)
            $header = new Header();
            $header->header = $request->input('txtText');
            $header->save();
        }

        // Trả về trang trước với thông báo thành công
        return redirect()->back()->with('success', 'Header đã được cập nhật!');
    }
    public function updateFooter(Request $request)
    {
        // Validate input
        $request->validate([
            'txtCopyright' => 'required|string|max:255',
            'txtMember' => 'required|string|max:255',
            'txtClass' => 'required|string|max:255',
            'txtAddress' => 'required|string|max:255',
        ]);

        // Lấy bản ghi đầu tiên từ bảng footer
        $footer = Footer::first();

        // Kiểm tra nếu bản ghi tồn tại
        if ($footer) {
            // Cập nhật các trường với giá trị mới từ form
            $footer->copyright = $request->input('txtCopyright');
            $footer->member = $request->input('txtMember');
            $footer->class = $request->input('txtClass');
            $footer->address = $request->input('txtAddress');
            $footer->save(); // Lưu thay đổi
        } else {
            // Nếu chưa có bản ghi nào, tạo mới (tùy theo yêu cầu của bạn)
            $footer = new Footer();
            $footer->copyright = $request->input('txtCopyright');
            $footer->member = $request->input('txtMember');
            $footer->class = $request->input('txtClass');
            $footer->address = $request->input('txtAddress');
            $footer->save();
        }

        // Trả về trang trước với thông báo thành công
        return redirect()->back()->with('success', 'Footer đã được cập nhật!');
    }
}
