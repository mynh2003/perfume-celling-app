$(document).ready(function() {
    // Cập nhật số lượng sản phẩm
    $('.btn-increase, .btn-decrease').click(function() {
        var productId = $(this).data('id');
        var quantityInput = $('.quantity-input[data-id="' + productId + '"]');
        var quantity = parseInt(quantityInput.val());
        var price = parseFloat($(this).closest('tr').find('td:nth-child(2)').text().replace('đ', '').replace(/\./g, '').trim());
        var maxQuantity = parseInt(quantityInput.data('max-quantity')); // Lấy số lượng tồn kho từ thuộc tính data-max-quantity
        
        // Kiểm tra tăng/giảm số lượng và giới hạn tồn kho
        if ($(this).hasClass('btn-increase')) {
            if (quantity < maxQuantity) {
                quantity++;
            } else {
                alert('Số lượng vượt quá mức tồn kho.');
                return;
            }
        } else if (quantity > 1) {
            quantity--;
        }

        // Cập nhật giá trị ô input và tính lại tổng tiền sản phẩm
        quantityInput.val(quantity);
        var itemTotal = price * quantity;
        $(this).closest('tr').find('.item-total[data-id="' + productId + '"]').text(itemTotal.toLocaleString('vi-VN') + 'đ');

        // Cập nhật tổng tiền giỏ hàng
        var totalCart = 0;
        $('.item-total').each(function() {
            totalCart += parseFloat($(this).text().replace('đ', '').replace(/\./g, '').trim());
        });
        $('#total-cart').text(totalCart.toLocaleString('vi-VN') + 'đ');
        
        // Gửi yêu cầu cập nhật lên server
        fetch(`/cart/update/${productId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ quantity: quantity })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Cập nhật thành công:', data);
                // Cập nhật lại tổng tiền nếu cần thiết
            } else {
                console.error('Cập nhật thất bại:', data);
                alert('Có lỗi xảy ra khi cập nhật số lượng.');
            }
        })
        .catch(error => {
            console.error('Lỗi:', error);
            alert('Có lỗi xảy ra khi cập nhật số lượng.');
        });
    });
});
