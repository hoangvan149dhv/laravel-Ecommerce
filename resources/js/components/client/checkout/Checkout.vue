<template>
    <div class="billing_details">
        <div class="cart_inner">
            <div class="table-responsive order_box">
                <cart
                    :items='items'
                    :view="view"
                />
            </div>
        </div>
        <template>
            <billing
                :customer="customer"
                :total="total"
                ref="billing"
            />
        </template>
        <div class="payment_item">
            <div class="radion_btn">
                <input v-model="customer.payment_method" value="cod" type="radio" id="f-option5" name="selector">
                <label for="f-option5">COD</label>
                <div class="check"></div>
            </div>
        </div>
        <div class="payment_item active">
            <div class="radion_btn">
                <input v-model="customer.payment_method" value="online" type="radio" id="f-option6" name="selector">
                <label for="f-option6">Thanh toán online</label>
                <img src="image/client/product/single-product/card.jpg" alt="">
                <div class="check"></div>
            </div>
        </div>
        <div class="btn_3" @click="handleCheckout">Thanh toán</div>
    </div>
</template>
<script>
export default {
    props: {
        items: {
            type: [Object, Array],
            default: {}
        },
        total: {
            type: [String, Number],
            default: null
        },
        view: {
            type: String,
            default: null
        }
    },
    data() {
        return {
            customer: {
                payment_method: null,
                location: {
                    city: null,
                    province: null,
                    ward: null,
                },
                email: null,
                phone: null,
                name: null,
                address: null,
                note: null,
                price: {
                    shipping_fee: '0 VND',
                    total: this.total
                }
            },
            products: this.items
        }
    },
    methods: {
        handleCheckout() {
            axios.post('checkout', {
                customer: this.customer,
                products: this.products
            }).then(res => {
                if (res.status === 200) {
                    window.location.href = route('client.order.show', {order: res.data});
                }
            });
        }
    },
}
</script>
