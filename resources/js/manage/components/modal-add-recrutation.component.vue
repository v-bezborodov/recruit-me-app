<template>
    <b-modal id="modal-recrutation" title="Add recrutation">
        <b-form>
            <label for="FormCardPosition" class="grey-text font-weight-light">Position:</label>
            <b-form-input type="text"
                          id="FormCardPosition"
                          class="form-control"
                          v-if="recrutation"
                          v-model="recrutation.offered_position"
                          placeholder="Position title"
                          required
            ></b-form-input>
            <br>
            <ckeditor :editor="editor"
                      :config="editorConfig"
                      v-if="recrutation"
                      v-model="recrutation.description">
            </ckeditor>
        </b-form>

        <template v-slot:modal-footer>
            <div class="w-100">
                <b-button size="sm" class="float-right" @click="save()" variant="success">Submit</b-button>
                <b-button size="sm" @click="$bvModal.hide('modal-recrutation')">Close</b-button>
            </div>
        </template>
    </b-modal>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default {
  name: 'modal-add-recrutation.component',
  props:{
    value: {default:null}
  },
  data(){
    return {
      recrutation:null,
      editor: ClassicEditor,
      editorConfig: {
        sourcedialog:true,
        showToolbar:true,
        placeholder: 'Description',
      },
    };
  },
  methods:{
    sync(){
      if(this.value!==null) {
        this.recrutation = Object.assign(this.value);
      }else{
        this.recrutation=[];
      }
    },
    save(){
        console.log('this.recrutation', this.recrutation)
      this.$emit('save', this.recrutation);
    },
  },

  mounted() {
    this.sync();
  },
  watch:{
    value(){
      this.sync();
    }
  }
};
</script>

<style scoped>

</style>
