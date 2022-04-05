<template>
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>{{ view == 'edit' ? 'Sửa' : 'Thêm' }} Sản phẩm </h2>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="product-name">Tên Sản phẩm</label>
                            <input type="text" class="form-control" v-model="name" name="name" id="product-name">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="product-desc">Mô tả</label>
                            <textarea class="form-control" v-model="desc" name="desc" id="product-desc" rows="3"></textarea>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="selete-category">Danh mục sản phẩm</label>
                            <select id="selete-category" class="form-control" v-model="category_id">
                                <option v-for="category in categories" :key="category.id" :value="category.id">
                                    {{ category.name }}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="product-name">Giá</label>
                            <input type="number" v-model="price" class="form-control" name="price" id="product-price">
                        </div>
                    </div>
                    <button class="btn btn-primary float-right" @click="handleSave" type="submit" >Lưu</button>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <dropzone :img="image"/>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        view: {
            type: String,
            default: ''
        },
        categories: {
            type: Array,
            default: []
        },
        product: {
            type: Object,
            default: () => {}
        }
    },
    data() {
        const product = this.product;
        return {
            name: product?.name,
            category_id: product?.category_id ,
            desc: product?.desc,
            price: product?.price,
            status: 1,
            imageName: product?.image?.file_name,
            image: product?.image,
        }
    },
    mounted() {
    },
    methods: {
        handleSave() {
            if (this.view == 'create') {
                axios.post(route('admin.product.store'), this.$data).then(res => {
                    if(res.status === 200) {
                        window.location.replace(route('admin.product.show', { product: res.data.id }))
                    }
                });
            } else {
                axios.put(route('admin.product.update', { product : this.product }), this.$data).then(res => {
                    if(res.status === 200) {
                        toastr.success('Sửa thành công');
                        window.location.replace(route('admin.product.show', { product: this.product.id }))
                    }
                });
            }
        }
    },
};
</script>
