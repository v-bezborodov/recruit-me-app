<template>
    <b-modal id="modal-recrutation" title="Add recrutation">
        <b-form>
            <div class="form-item">
                <label for="FormCardPosition" class="grey-text font-weight-light">Position:</label>
                <b-form-input type="text"
                              id="FormCardPosition"
                              class="form-control"
                              v-if="recrutation"
                              v-model="recrutation.offered_position"
                              placeholder="Position title"
                              required
                ></b-form-input>
            </div>
                <br>
            <div class="form-item">
                <ckeditor :editor="editor"
                          :config="editorConfig"
                          v-if="recrutation"
                          v-model="recrutation.description">
                </ckeditor>
            </div>
                <br>
            <div class="form-item" v-if="recrutation">
                status {{recrutation.status}}
                status {{recrutationStatus}}
                <label for="FormCardStatus" class="grey-text font-weight-light">Status:</label>
                <multiselect
                    id="FormCardStatus"
                     v-model="recrutationStatus"
                     :options="options.status"
                    track-by="id"
                    label="name"
                     :searchable="true"
                     :close-on-select="true"
                     placeholder="Pick a status">
                </multiselect>
            </div>
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
      options:{
        status:[]
      },
      recrutation:{},
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
      // this.$emit('save', {
      //     this.recrutation}
      //   });
      this.$emit('save', {
        offered_position:this.recrutation.offered_position,
        description:this.recrutation.description,
      });
    },
  },

  mounted() {
    this.sync();
    this.options={
      status:this.$statusService.getStatusOptions()
    };
  },
  watch:{
    value(){
      this.sync();
    },
  },
  computed: {
    recrutationStatus:{
      get() {
        if(this.recrutation.status==null){
          return null;
        }else{
          return {
            id: this.recrutation.status,
            name: this.$statusService.getStatusOptions()[this.recrutation.status].name,
          };
        }
      },
      set(newValue) {
        this.recrutation = {
          ...this.recrutation,
          status: newValue.id
        };
      }
    }

  }
};
</script>

<style scoped>
    .form-item label{
        float:left;
    }
</style>
