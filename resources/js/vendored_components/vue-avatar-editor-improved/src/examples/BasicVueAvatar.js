import VueAvatar from '@/components/VueAvatar';

export default {
    components: {
        VueAvatar
    },
    data () {
        return {
            rotation: 0,
            scale: 1,
            borderRadius: 0
        };
    },
    methods: {
        saveClicked () {
            var img = this.$refs.vueavatar.getImageScaled();
            this.$refs.image.src = img.toDataURL();
        },
        onImageReady () {
            this.scale = 1;
            this.rotation = 0;
        }
    }
};
