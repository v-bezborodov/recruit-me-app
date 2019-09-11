<template>
    <div>
        <vue-avatar
                :width="400"
                :height="400"
                :rotation="rotation"
                :borderRadius="borderRadius"
                :scale="scale"
                ref="vueavatar"
                @vue-avatar-editor:image-ready="onImageReady"
        >
        </vue-avatar>
        <br>
        <label>
            Zoom : {{scale}}x
            <br>
            <input
                    type="range"
                    min=1
                    max=3
                    step=0.02
                    v-model='scale'
            />
        </label>
        <br>
        <label>
            Rotation : {{rotation}}°
            <br>
            <input
                    type="range"
                    min=0
                    max=360
                    step=1
                    v-model='rotation'
            />
        </label>
        <br>
        <label>
            Radius : {{borderRadius}}px
            <br>
            <input
                    type="range"
                    min=0
                    max=200
                    step=1
                    v-model='borderRadius'
            />
        </label>
        <br>
        <button v-on:click="saveClicked">Get image</button>
        <br>
        <img ref="image">
    </div>
</template>

<script>
import {VueAvatar} from '../../vendored_components/vue-avatar-editor-improved';
import axios from 'axios';
export default {
  name: 'avatar-component-profile',
  components: {
    VueAvatar: VueAvatar
  },
  props: {
    routes:{
      require:true
    },
    id:{
      require:true
    }
  },
  data: function data() {
    return {
      rotation: 0,
      scale: 1,
      borderRadius: 0
    };
  },

  methods: {
    saveClicked: function saveClicked() {
      var img = this.$refs.vueavatar.getImageScaled();

      // this.$refs.image.src = img.toDataURL();
      var image = img.toDataURL();
      console.log(this.$refs);


      axios.put(this.routes.user+'/'+this.id, {
        image:image

      })
        .then(function (response) {


          Vue.toasted.success('Succesfully saved!', {
            icon : 'check',
            theme: 'bubble',
            position: 'bottom-right',
            duration : 5000,
            action : {
              text : 'OK',
              onClick : (e, toastObject) => {
                toastObject.goAway(0);
              }
            }
          });


          // setTimeout("location.href = '/profile';", 1500);

        })
        .catch(function (error) {
          console.log('testerror', error);
          Vue.toasted.error('Something went wrong',{
            action : {
              text : 'OK',
              onClick : (e, toastObject) => {
                toastObject.goAway(0);
              }
            }
          });
        });


    },
    onImageReady: function onImageReady() {
      this.scale = 1;
      this.rotation = 0;
    }
  }
};
</script>

<style>
    .modal-body {
        text-align: center;
    }
</style>
