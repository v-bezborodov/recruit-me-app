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
                <label for="FormCardStatus" class="grey-text font-weight-light">Status:</label>
                <multiselect
                    id="FormCardStatus"
                    v-if="recrutation"
                     v-model="recrutation.status"
                     :options="options.status"
                    track-by="id"
                    label="name"
                     :searchable="true"
                     :close-on-select="true"
                     :show-labels="false"
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

    // console.log(this.$statusService.getStatusOptions()[this.recrutation.status].name);
  },
  watch:{
    value(){
      this.sync();
    },
    // 'recrutation.status'(){
    //     console.log(this.recrutation.status);
    //   // this.recrutation.status={
    //   //     id:1
    //   // }
    //
    // }
  },
  computed: {
    'recrutation.status':{
      get() {
        console.log('status is null');
        this.recrutation.status={
          id: 1,
          name: 'TEST',
        };
        // if(!this.recrutation.status) {
        //     console.log('status is null')
        //   return null;
        // }else{
        //     console.log('status is  not null')
        //   return {
        //     id: this.recrutation.status,
        //     name: this.$statusService.getStatusOptions()[this.recrutation.status].name,
        //   };
        // }
      },
      set(value) {
        console.log('status is null');
        // this.entity = {
        //   ...this.entity,
        //   status: value.id
        // };
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
