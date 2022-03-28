<template>
  <div class="row">
    <div class="col-lg-8">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom">
          <h2>{{ view == 'edit' ? 'Sửa' : 'Thêm' }} danh mục </h2>
        </div>
        <div class="card-body">
          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="category-name">Tên danh mục</label>
              <input type="text" class="form-control" name="name" id="category-name" data-vv-as="Tên danh mục"
                     v-validate="'required'" v-model="name"
                     required>
              <span
                  v-show="errors.has('name')"
                  class="text-danger"
              >
              <strong>Vui lòng nhập tên danh mục</strong></span>
            </div>
            <div class="col-md-12 mb-3">
              <label for="category-desc">Mô tả</label>
              <textarea class="form-control" name="desc" v-validate="'required'" data-vv-as="Mô tả"
                        id="category-desc" v-model="desc" rows="3"></textarea>
              <span
                  v-show="errors.has('desc')"
                  class="text-danger"
              ><strong>Vui lòng nhập mô tả</strong></span>
            </div>
          </div>
          <button class="btn btn-primary" type="submit" @click="handleClick">Submit form</button>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <dropzone :img="category.image"/>
    </div>
  </div>
</template>

<script>
import Dropzone from "../Dropzone";

export default {
  props: {
    category: {
      type: Object,
      default: () => ({})
    },
    view: {
      type: String,
      default: null
    }
  },
  data() {
    return {
      desc: this.category.desc ?? null,
      name: this.category.name ?? null,
      imageName: this.category?.image?.file_name ?? null,
    }
  },
  methods: {
    handleClick(e) {
      return this.$validator.validateAll(['name', 'desc']).then(result => {
        if (result) {
          let method = 'post', routeName = route('admin.categories.index');
          if (this.view === 'edit') {
            method = 'put', routeName = route('admin.categories.update', { category: this.category });
          }

          axios[method](routeName, this.$data).then(res => {
            if (res.status === 200) {
              toastr.success(res.data.smg);
              window.location.replace(route('admin.categories.show', { category : res.data.id }));
            } else {
              toastr.error(res.data.smg);
            }
          });
        }
      });
    },
  },
}
</script>