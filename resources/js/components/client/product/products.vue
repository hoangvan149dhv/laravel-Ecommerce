<template>
    <div class="product_list_slider">
        <div class="single_product_list_slider">
            <div class="row align-items-center justify-content-between">
                <div v-for="item in items" class="col-lg-3 col-sm-6">
                    <div :class="`single_product_item single_product_item_${item.id}`">
                        <img :src="item.image" :alt="item.name"/>
                        <div class="single_product_text">
                            <h4>{{ item.name }}</h4>
                            <h3>{{ item.price }}</h3>
                            <a role="button" @click="addCart(item.id)" class="add_cart">+ Thêm giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { flyCart } from '../../../libraries/cart';

export default {
    props: {
        items: {
            type: Array,
            default: []
        },
    },
    mounted() {
    },
    methods: {
        addCart(productId) {
            axios.post(route('client.cart.add_to_cart'), { id : productId }).then(res => {
                if (res.status == 200) {
                    flyCart(productId);
                }
                //Update qty
                jQuery('.main_menu .cart i span').text(res.data.items);
            });
        }
    },
}
</script>
