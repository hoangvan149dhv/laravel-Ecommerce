<template>
  <div>
    <b-input-group size="sm">
      <b-form-input
          id="filter-input"
          v-model="search"
          type="search"
          placeholder="Tìm kiếm"
      ></b-form-input>
    </b-input-group>
    <div class="overflow-auto">
      <!--  Main table  -->
      <b-table id="table-content"
               hover
               head-variant="dark"
               :busy="loading"
               fixed
               :fields="fields" :items="data.data"
               :sort-by.sync="sortBy"
               :sort-desc.sync="sortDesc"
               sort-icon-left
               :filter="search"
               :filterIncludedFields="['name','desc']"
      >
        <template #table-busy>
          <div class="text-center text-black-50 my-2">
            <b-spinner class="align-middle"></b-spinner>
          </div>
        </template>
        <template #cell(actions)="data">
          <div class="dropdown show d-inline-block widget-dropdown">
            <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
              <li class="dropdown-item">
                <a :href="data.item.link">Chi tiết</a>
              </li>
              <li class="dropdown-item">
                <a @click="handleDelete(data.item.link)">Xóa</a>
              </li>
            </ul>
          </div>

        </template>
      </b-table>
      <!--  End Main table  -->
    </div>
    <div class="overflow-auto">
    <b-pagination
          @change="changePage"
          v-model="data.current_page"
          :total-rows="data.total"
          :per-page="data.per_page"
          aria-controls="my-table"
          class="mt-4"
      ></b-pagination>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    items: {
      type: Object,
      default: {}
    }
  },
  data() {
    return {
      loading: false,
      data: this.items,
      sortBy: '',
      category_ids: [],
      sortDesc: false,
      search: null,
      fields: [
        {
          key: 'id',
          label: 'ID',
          sortable: true
        },
        {
          key: 'name',
          label: 'Tên',
          sortable: true
        },
        {
          label: 'Mô tả',
          key: 'desc',
          sortable: false
        },
        {
          label: '',
          key: 'actions'
        }
      ]
    }
  },
  methods: {
    changePage(pageNum) {
      this.createRequestURL(pageNum);
    },
    createRequestURL(pageNum) {
      let route = `${window.location.pathname}?${queryString.stringify({ page: pageNum })}`;
      this.loading = true;
      axios.get(`${route}&get_jsons=1`).then(res => {
        if (res.status === 200) {
          this.data = res.data;
          window.history.pushState("", "", route);
          this.loading = false;
        }
      });
    },
    handleDelete(url) {
      axios.delete(url).then(res => {
        if (res.status === 200) {
          toastr.success(res.data)
          this.createRequestURL(this.data.current_page);
        } else {
          toastr.fail('Xóa thất bại')
        }
      });
    }
  },
}
</script>
<style>
table#table-content .flip-list-move {
  transition: transform 0.5s;
}
</style>