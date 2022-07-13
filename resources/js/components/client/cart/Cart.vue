<template>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Giá</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Tổng</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(item, index) in data" :key="index">
            <td>
                <div class="media">
                    <div class="d-flex" v-if="viewCart">
                        <img style="max-height:75px;object-fit:cover":src="item.options.image" :alt="item.name"/>
                    </div>
                    <div class="media-body">
                        <p>{{ item.name }}</p>
                    </div>
                </div>
            </td>
            <td>
                <h5>{{ formatCurrency(item.price) }}</h5>
            </td>
            <template v-if="viewCart">
                <td>
                    <div class="product_count">
                        <input class="input-number" type="text" v-model="item.qty" min="1" max="10">
                    </div>
                </td>

            </template>
            <td v-else>
                <h5> x {{ item.qty }}</h5>
            </td>
            <td>
                <h5>{{ formatCurrency(item.subtotal) }}</h5>
            </td>
        </tr>
        <template v-if="viewCart">
            <tr class="bottom_button">
                <td>
                    <a class="btn_1" @click="updateCart">Cập nhật giỏ hàng</a>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <h5>Tổng</h5>
                </td>
                <td>
                    <h5>{{ formatCurrency(subtotal) }}</h5>
                </td>
            </tr>
        </template>
        </tbody>
    </table>
</template>

<script>
import { formatCurrency } from '../../../libraries/currency'
export default {
    props: {
        items: {
            type: [Object, Array],
            default: {}
        },
        total: {
            type: [String, Number],
            default: 0
        },
        view: {
            type: String,
            default: null
        }
    },
    data() {
        return {
            data: Object.assign({}, this.items),
            subtotal: this.total,
        }
    },
    computed: {
        isNotEmptyData() {
            return Object.keys(this.data).length
        },
        viewCart() {
            return this.view == 'cart'
        }
    },
    mounted() {
    },
    methods: {
        formatCurrency(price) {
            return formatCurrency(price);
        },
        updateCart() {
            axios.post(route('client.cart.update'), this.data).then(res => {
                if (res.status === 200) {
                    this.data = res.data.data;
                    this.subtotal = res.data.subtotal;
                    jQuery('.main_menu .cart i span').text(res.data.qty);
                }
            })
        }
    },
}
</script>
