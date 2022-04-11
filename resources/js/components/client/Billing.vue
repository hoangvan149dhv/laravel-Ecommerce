<template>
    <div class="row">
        <div class="col-lg-6">
            <h3>Thông tin khách hàng</h3>
            <div class="row contact_form">
                <div class="col-md-12 form-group">
                    <input v-model="customer.name" type="text" class="form-control" id="name" name="name"
                           placeholder="Họ và tên">
                </div>
                <div class="col-md-6 form-group p_star">
                    <input v-model="customer.phone" type="text" class="form-control" id="phone" name="phone"
                           placeholder="Số điện thoại">
                </div>
                <div class="col-md-6 form-group p_star">
                    <input v-model="customer.email" type="email" placeholder="Địa chỉ Email"
                           class="form-control" id="email" name="email">
                </div>
                <select-city-province-ward
                    :location="customer.location"
                />
                <div class="col-md-12 form-group p_star">
                    <input v-model="customer.address" type="text" placeholder="Địa chỉ" class="form-control"
                           id="address" name="address">
                </div>
                <div class="col-md-12 form-group">
                    <textarea v-model="customer.note" class="form-control" name="message" id="message" rows="1"
                              placeholder="Order Notes"></textarea>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="order_box">
                <ul class="list list_2">
                    <li>
                        <div>Tổng giá tiền sản phẩm
                            <span>{{ total }}</span>
                        </div>
                    </li>
                    <li>
                        <div>Phí giao hàng
                            <span>{{ customer.price.shipping_fee }}</span>
                        </div>
                    </li>
                    <li>
                        <div>Tổng
                            <span>{{ total }}</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    props: {
        customer: {
            type: [Object, Array],
            default: {
                email: null,
                phone: null,
                name: null,
                address: null,
                note: null,
                location: {
                    city: null,
                    province: null,
                    ward: null,
                },
            }
        },
        total: {
            type: [String, Number],
            default: null
        },
    },
    data() {
        return {

        }
    },
}
</script>
