import VueAvatarEditor from '@/components/VueAvatarEditor';

export default {
    components: {
        VueAvatarEditor
    },
    methods: {
        onSelectFile (files) {
            console.log('here is your file', files[0]);
        },
        saveClicked (img) {
            this.$refs.image.src = img.toDataURL();
        }
    }
};
