<template>
  <div id="app">
    <h1>Vue-Avatar-Editor Example</h1>
    <h2> With basic component : Vue-Avatar </h2>
    <basic-vue-avatar ref="basic"></basic-vue-avatar>
    HTML code
    <pre class="prettyprint">{{basic.html}}</pre>
    JS code
    <pre class="prettyprint">{{basic.js}}</pre>


    <h2> With integrated component : Vue-Avatar-Editor </h2>
    <vue-avatar-editor
      ref="editor"
      @select-file="onSelectFile($event, this.eventFile)"
      >
    </vue-avatar-editor>
    HTML code
    <pre class="prettyprint">{{editor.html}}</pre>
    JS code
    <pre class="prettyprint">{{editor.js}}</pre>
    File attached
    <pre class="prettyprint"> {{ eventFile }}</pre>
  </div>
</template>

<script>
import BasicVueAvatar from './examples/BasicVueAvatar.vue';
import VueAvatarEditor from './examples/VueAvatarEditor.vue';

export default {
    name: 'app',
    components: {
        BasicVueAvatar,
        VueAvatarEditor
    },
    data () {
        return {
            eventFile: {},
            basic: {
                html: '',
                js: ''
            },
            editor: {
                html: '',
                js: ''
            }
        };
    },
    mounted () {
        this.basic.html = this.$refs.basic.getRawHTML();
        this.basic.js = this.$refs.basic.getRawJS();
        this.editor.html = this.$refs.editor.getRawHTML();
        this.editor.js = this.$refs.editor.getRawJS();
    },
    methods: {
        saveClickedFromEditor (img) {
            this.$refs.imageFromEditor.src = img.toDataURL();
        }
    }
};
</script>

<style>
  #app {
      font-family: 'Avenir', Helvetica, Arial, sans-serif;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      text-align: center;
      color: #2c3e50;
      margin-top: 60px;
  }
  pre {
    text-align: left;
    margin: 0 auto;
    max-width: 800px;
  }
  </style>
