<template>
    <div class="row">
        <div class="col-lg-6 col-lx-4">
            <div class="single_confirmation_details">
                <h4>Thông tin đơn hàng</h4>
                <ul>
                    <li>
                        <p>Mã đơn hàng</p><span>: {{ data.id }}</span>
                    </li>
                    <li>
                        <p>Tổng</p><span>: {{ data.customer.price.total }}</span>
                    </li>
                    <li>
                        <p>Trạng thái</p><span>: {{ paymentStatus }}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 col-lx-4">
            <div class="single_confirmation_details">
                <h4>Thông tin khách hàng</h4>
                <ul>
                    <li>
                        <p>Đia chỉ</p><span>: {{ data.customer.address }}</span>
                    </li>
                    <li>
                        <p>Họ tên</p><span>: {{ data.customer.name }}</span>
                    </li>
                    <li>
                        <p>Số điện thoại</p><span>: {{ data.customer.phone }}</span>
                    </li>
                    <li>
                        <p>Phương thức thanh toán</p><span>: {{ data.customer.payment_method == 'cod' ? 'COD' : 'Online' }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        data: {
            type: [Object, Array],
            default: {}
        },
        paymentStatus : {
            type: String
        }
    },
}
</script>
