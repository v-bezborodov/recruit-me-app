<template>
    <vue-avatar
            :width=400
            :height=400
            :rotation="rotation"
            :scale="scale"
            ref="vueavatar"
            @vue-avatar-editor:image-ready="onImageReady"
    >
    </vue-avatar>
    <br>
    <input
            type="range"
            min=1
            max=3
            step=0.02
            :value='scale'
    />
    <input
            type="range"
            min=1
            max=3
            step=0.02
            :value='rotation'
    />
    <br>
    <button v-on:click="saveClicked">Click</button>
    <br>
    <img ref="image">
</template>

<script>
    // import VueAvatar from "vue-avatar-editor-improved";
    import {VueAvatar} from 'vue-avatar-editor-improved'

    export default {
        name: "avatar-component-profile",
        components: {
            VueAvatar: VueAvatar
        },
        data () {
            return {
                rotation: 0,
                scale: 1
            };
        },
        methods: {
            saveClicked () {
                var img = this.$refs.vueavatar.getImageScaled()
                this.$refs.image.src = img.toDataURL()
            },
            onImageReady () {
                this.scale = 1
                this.rotation = 0
            }
        }
    }
</script>

<style scoped>

</style>