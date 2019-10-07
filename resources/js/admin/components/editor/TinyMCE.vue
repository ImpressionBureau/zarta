<template>
    <div>
        <editor api-key="1xsyih2o8cngj6zqgzcady1utjw4u3fezk14xjr0hnd6iqgh" :init="options" v-model="output"></editor>
        <input type="hidden" :name="name" :value="output">
    </div>
</template>

<script>
  import Editor from '@tinymce/tinymce-vue';

  export default {
    props: {
      name: String,
      content: String
    },
    components: {
      Editor
    },
    data() {
      return {
        output: this.content || '',
        options: {
          language: 'ru',
          language_url: '/js/langs/ru.js',
          plugins: "textpattern visualblocks table image imagetools media lists link anchor",
          toolbar: "formatselect | alignleft aligncenter alignright | bold italic | link unlink | numlist bullist | forecolor backcolor | image media | anchor | table",
          automatic_uploads: true,
          images_upload_handler: function (blobInfo, success, failure) {
            let formData = new FormData();
            formData.append('img', blobInfo.blob(), blobInfo.filename());

            axios.post('/admin/media/upload', formData)
              .then(({data}) => {
                success(data.image.src);
              })
          }
        }
      }
    }
  }
</script>

<style>
    .tox.tox-tinymce {
        height: 450px !important;
    }
</style>