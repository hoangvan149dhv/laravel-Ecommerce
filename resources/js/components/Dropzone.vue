<template>
  <div class="row justify-content-end dropzone-construct">
    <div class="col">
      <div class="text-center flex-wrap">
        <div id="dropzone-construct" class="needsclick dropzone ml-0">
          <div class="dz-message" data-dz-message>
            <div>Chọn hình tại đây</div>
            <div><small class="text-danger">Vui lòng sử dụng định dạng file pdf/png/jpeg/jpg</small></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    img: {
      type: Object,
      default: () => ({})
    }
  },
  mounted() {
    this.dropzone()
  },
  methods: {
    dropzone() {
      let self = this;
      Dropzone.options.dropzoneConstruct = {
        url: route('media.store'),
        maxFilesize: 20,
        maxFiles: 1,
        acceptedFiles: ".png, .jpeg, .jpg",
        headers: {
          'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
        },
        init: function () {
          if (self.img.url) {
            let mockFile = {name: self.img.file_name, size: self.img.size, type: self.img.mime_type};
            this.options.addedfile.call(this, mockFile);
            this.options.thumbnail.call(this, mockFile, self.img.url);
            mockFile.previewElement.classList.add('dz-success');
            mockFile.previewElement.classList.add('dz-complete');
          }
        },
        accept: function (file, done) {
          if (file.size === 0) {
            done()
          } else {
            done()
          }
        },
        success: function (file, response) {
          self.$parent.imageName = response.name
        },
        removedfile: function (file) {
        },
      }
    }
  },
}
</script>