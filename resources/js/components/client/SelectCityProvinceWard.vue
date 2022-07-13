<template>
    <div class="col-12">
        <div class="col-md-12 form-group">
            <Select2 placeholder="Chọn tỉnh thành phố" v-model="location.city" :options="city"
                     @change="handleChange('city', $event)"/>
        </div>
        <div class="col-md-12 form-group">
            <Select2 placeholder="Chọn Quận huyện" v-model="location.province" :options="province"
                     @change="handleChange('province', $event)"/>
        </div>
        <div class="col-md-12 form-group">
            <Select2 placeholder="Chọn phường xã" v-model="location.ward" :options="ward"
                     @change="handleChange('ward', $event)"/>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        location: {
            type: [Array, Object],
            default: {
                city: null,
                province: null,
                ward: null,
            }
        },
    },
    data() {
        return {
            city: [],
            province: [],
            ward: [],

        }
    },
    created() {
        this.callDataLocate('city');
    },
    methods: {
        handleChange(type, id) {
            let SelectDropdown = null;
            // this.$emit('changeLocation', { type, id});
            switch (type) {
                case 'city':
                    SelectDropdown = 'province';
                    break;
                case 'province':
                    SelectDropdown = 'ward';
                    break;
            }
            if (SelectDropdown !== null) {
                this.callDataLocate(type, id).then((result) => {
                    this[SelectDropdown] = result;
                });
            }
        },
        callDataLocate(type = 'city', id = null) {
            return axios.post('get-location', {type: type, id: id}).then(res => {
                if (id == null) {
                    this.city = res.data;
                }
                return res.data;
            });
        },
    },
}
</script>
