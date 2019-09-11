<template>
    <b-modal id="modal-recrutation" title="Add recrutation">
        <b-form>
            <label for="FormCardPosition" class="grey-text font-weight-light">Position:</label>
            <b-form-input type="text"
                          id="FormCardPosition"
                          class="form-control"
                          v-if="recrutation"
                          v-model="recrutation.offered_position"
                          placeholder="Position Title"
                          required
            ></b-form-input>
            <br>
            <ckeditor :editor="editor"
                      :config="editorConfig"
                      v-if="recrutation"
                      v-model="recrutation.description">
            </ckeditor>

                <b-button @click="" variant="primary">Submit</b-button>
                <b-button @click="$bvModal.hide('bv-modal-example')">Close</b-button>
        </b-form>
    </b-modal>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    export default {
        name: "modal-add-recrutation.component",
        props:{
            value: {default:null}
        },
        data(){
            return {
                recrutation:null,
                editor: ClassicEditor,
                editorConfig: {
                    sourcedialog:true,
                    showToolbar:true
                },
            }
        },
        methods:{
            sync(){
                if(this.value!==null) {
                    this.recrutation = Object.assign(this.value);
                }else{
                    this.recrutation=[];
                }
            },
        },

        mounted() {
            console.log('this.value', this.value);
            this.sync();
        },
        watch:{
            value(){
                this.sync();
            }
        }
    }
</script>

<style scoped>

</style>
