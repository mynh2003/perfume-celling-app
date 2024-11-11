$(document).ready(function() {
    // Cập nhật số lượng sản phẩm
    $('.btn-increase, .btn-decrease').click(function() {
        var productId = $(this).data('id');
        var quantityInput = $('.quantity-input[data-id="' + productId + '"]');
        var quantity = parseInt(quantityInput.val());
        var price = parseFloat($(this).closest('tr').find('td:nth-child(2)').text().replace('đ', '').replace(/\./g, '').trim());
    
        if ($(this).hasClass('btn-increase')) {
            quantity++;
        } else if (quantity > 1) {
            quantity--;
        }
    
        quantityInput.val(quantity);
        var itemTotal = price * quantity; // Tính tổng tiền sản phẩm
        $(this).closest('tr').find('.item-total[data-id="' + productId + '"]').text(itemTotal.toLocaleString('vi-VN') + 'đ');
    
        // Cập nhật tổng giỏ hàng
        var totalCart = 0;
        $('.item-total').each(function() {
            totalCart += parseFloat($(this).text().replace('đ', '').replace(/\./g, '').trim());
        });
        $('#total-cart').text(totalCart.toLocaleString('vi-VN') + 'đ');
        
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
            } else {
                console.error('Cập nhật thất bại:', data);
            }
        })
        .catch(error => console.error('Lỗi:', error));
    });
});