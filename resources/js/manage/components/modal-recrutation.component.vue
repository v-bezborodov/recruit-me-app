<template>
    <b-modal hide-footer id="modal-recrutation" title="Add recrutation">
        <b-form>
            <div class="form-item">
                <label for="FormCardPosition" class="form-item-label grey-text font-weight-light">Position:</label>
                <b-form-input required type="text"
                              id="FormCardPosition"
                              class="form-control"
                              v-if="recrutation"
                              v-model="recrutation.offered_position"
                              placeholder="Position title"

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
                <p class="form-item-label grey-text font-weight-light">Status:</p>
                <multiselect
                    id="FormCardStatus"
                     v-model="recrutationStatus"
                     :options="options.status"
                    track-by="id"
                    label="name"
                     :searchable="false"
                     :close-on-select="true"
                     placeholder="Pick a status">
                </multiselect>
            </div>

            <div class="w-100 modal-footer">
                <b-button size="sm" class="float-right" type="submit" @click="save()" variant="success">Submit</b-button>
                <b-button size="sm" @click="$bvModal.hide('modal-recrutation')">Close</b-button>
            </div>
        </b-form>
    </b-modal>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default {
  name: 'modal-recrutation-component',
  props:{
    value: {default:null},
    modal: {default:null},

  },
  data(){
    return {
      options:{
        status:[]
      },
      recrutation:{
          status:0,
      },
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
      this.recrutation = Object.assign({},this.value);
    },
    save(){
      event.preventDefault();
      var ok=true;
      if(!this.recrutation.offered_position){
        this.$toasted.error('Can\'t save, position is empty');
        ok=false;
      }
      if(!this.recrutation.description){
        this.$toasted.error('Can\'t save, description is empty');
        ok=false;
      }
      if(this.recrutation.status!==null && !this.recrutation.status){
        this.$toasted.error('Can\'t save, status is empty');
        ok=false;
      }

      if(ok){
        switch(this.modal) {
        case 'add':
          this.add();
          break;
        case 'edit':
          this.edit();
          break;
        default:
          this.$toasted.error('Can\'t save');
        }
        // this.$emit('save', {
        //   offered_position:this.recrutation.offered_position,
        //   description:this.recrutation.description,
        //   status:this.recrutation.status,
        //   modal:this.recrutation.modal
        // });
        // this.$emit('save',
        //     this.recrutation
        //   );
      }
    },

    edit(){
      this.$recruitService.put(this.recrutation.id, this.recrutation)
        .then((response) => {
          // this.recruitments=response.data.recruitments;
          this.$toasted.success('Recrutation updated', response);
          // this.$emit('save',
          //     this.recrutation
          //   );
          this.$bvModal.hide('modal-recrutation');
          setTimeout(location.href = '/manage/profile', 1500);
        })
        .catch(error => {
          this.$toasted.error('Something went wrong!');
          if(error.response.data.error){
            this.$toasted.error(error.response.data.error);
          }

        });
    },
    add(){
      this.$recruitService.store(this.recrutation)
        .then((response) => {
          // this.recruitments=response.data.recruitments;
          this.$toasted.success('Recrutation added', response);
          this.$bvModal.hide('modal-recrutation');
          setTimeout(location.href = '/manage/profile', 1500);
        })
        .catch(error => {
          this.$toasted.error('Something went wrong!');
          if(error.response.data.error){
            this.$toasted.error(error.response.data.error);
          }

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
      // this.$emit('input',
      //   this.recrutation
      // );
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
    .form-item .form-item-label{
        text-align:left;
        margin:0;
    }
</style>
