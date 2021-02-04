import Vue from "vue";

import Wysiwyg from './components/editor/TinyMCE';
import ImageUploader from './components/editor/SingleUploader';
import MultiUploader from "./components/editor/MultiUploader";
import BlockEditor from "./components/editor/BlockEditor";
import Options from "./components/editor/Options";

new Vue({
  el: '#app',
  components: {
    Wysiwyg,
    ImageUploader,
    MultiUploader,
    BlockEditor,
    Options
  },
  mounted() {
    require('./modules/notifications');
    require('./modules/phone-mask');
  }
});

require('./bootstrap');
