<template>
    <b-container fluid>
        <div>
            <b-row>
                <b-col md="6" class="my-1">
                    <b-form-group label-cols-sm="3" label="Filter" class="mb-0">
                        <b-input-group>
                            <b-form-input v-model="filter" placeholder="Type to Search"></b-form-input>
                            <b-input-group-append>
                                <b-button  @click="filter = ''">Clear</b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form-group>
                </b-col>
                <b-col md="6" class="my-1">
                    <b-button class="button-add-new" @click="addRecrutation(event=null)" variant="success">Submit new recrutation</b-button>
                </b-col>
            </b-row>

            <b-table
                id="table-transition-example"
                :items="recruitments"
                :fields="fields"
                :filter="filter"
                :hover="hover"
                :borderless="borderless"
                striped
                primary-key="index"
                :tbody-transition-props="transProps"
                caption-top
            >

                <!-- A custom formatted column -->
                <template slot="index" slot-scope="data">
                    {{ data.index + 1 }}
                </template>

                <template slot="name" slot-scope="data">
                    {{data.item.user.first_name}} {{data.item.user.last_name}}
                </template>
                <template slot="status" slot-scope="data">

                    <span v-if="data.item.status==1" class="badge badge-pill badge-success">ACTIVE</span>
                    <span v-else-if="data.item.status==0" class="badge badge-pill badge-danger">SUSPENDED</span>
                    <span v-else class="badge badge-pill badge-light">INACTIVE</span>
                </template>

                <template slot="table-caption">List of all recrutations</template>
                <template slot="actions" slot-scope="row">
                    <div class="action-wrapper d-flex">
                        <b-button size="sm" variant="outline-primary" @click="viewRecrutation(row.item)" class="btn btn-action">
                            <i class="fa fa-list-alt"></i>
                        </b-button>
                        <b-button size="sm" @click="editRecrutation(row.item)" class="btn btn-action btn-success">
                            <i class="fa fa-edit"></i>
                        </b-button>
                        <b-button size="sm" @click="" class="btn btn-action btn-outline-dark bg-white">
                            <i class="fa fa-eye"></i>
                            <!--<i class="fa fa-eye-slash"></i>-->
                        </b-button>
                        <b-button size="sm" @click="" class="btn btn-action btn-danger">
                            <i class="fa fa-trash"></i>
                        </b-button>
                    </div>
                </template>
                <template slot="empty" slot-scope="scope">
                    <h4>{{ scope.emptyText }}</h4>
                </template>
                <template slot="emptyfiltered" slot-scope="scope">
                    <h4>{{ scope.emptyFilteredText }}</h4>
                </template>
            </b-table>
        </div>

        <modal-add-recrutation v-show="recrutationModalEditChecker" @save="saveRecrutation" v-model="recrutationModalEdit">
        </modal-add-recrutation>


        <modal-view-recrutation v-model="recrutationModalView">
        </modal-view-recrutation>

    </b-container >
</template>


<script>
import ModalAddRecrutation from './modal-add-recrutation.component';
import ModalViewRecrutation from './modal-view-recrutation.component';
// import axios from 'axios';
export default {
  props: {
    id: {
      default:null
    },
  },
  components: {ModalAddRecrutation, ModalViewRecrutation},
  computed: {
    //
  },
  data() {
    return {
      options:{},
      recrutationModalView:null,
      recrutationModalEdit:null,
      recrutationModalAdd:false,
      recrutationModalEditChecker:false,
      transProps: {
        // Transition name
        name: 'flip-list'
      },
      recruitments:null,
      fields: [
        {key:'index', label: '#'},
        {key:'status', label: 'Status'},
        {key:'name', label: 'Name',  _rowVariant: 'danger'},
        {key: 'offered_position', sortable: true, label: 'Position'},
        {key: 'user.company', sortable: true, label: 'Company name'},
        {key: 'user.country.long_name', sortable: true, label: 'Country'},
        // {key: 'email', sortable: true},
        {key: 'user.phone', sortable: true, label: 'Phone'},
        {key: 'created_at', sortable: true},
        {key: 'actions', label: 'Actions'},

      ],
      filter: null,
      hover: true,
      borderless: true,
    };
  },
  methods: {
    addRow(){

    },
    saveRecrutation(data){
        console.log('data', data)
    switch(data.modal) {
        case 'add':
            this.add(data);
            break;
        case 'edit':
            this.edit(data);
            break;
        default:
            this.$toasted.error("Can't save");
    }


      console.log(this.options)

    },

      edit(data){
          this.options = {
              ...data,
          };
          this.$recruitService.put(this.id, data)
              .then((response) => {
                  console.log(response)
                  // this.recruitments=response.data.recruitments;
                  this.$toasted.success('Recrutation updated', response);
                  this.$bvModal.hide('modal-recrutation')
              })
              .catch(error => {
                  this.$toasted.error('Something went wrong!');
                  if(error.response.data.error){
                      this.$toasted.error(error.response.data.error);
                  }

              });
      },
      add(data){
          this.options = {
              ...data,
              user_id:this.id,
          };
          this.$recruitService.store(data)
              .then((response) => {
                  console.log(response)
                  // this.recruitments=response.data.recruitments;
                  this.$toasted.success('Recrutation added', response);
                  this.$bvModal.hide('modal-recrutation')
              })
              .catch(error => {
                  this.$toasted.error('Something went wrong!');
                  if(error.response.data.error){
                      this.$toasted.error(error.response.data.error);
                  }

              });
      },
    editRecrutation(event){
      this.$bvModal.show('modal-recrutation');
      if(event) {
          event={
              ...event,
              modal:'edit'
          }
        this.recrutationModalEdit = Object.assign(event);
      }else{
        this.recrutationModalEdit=event;
        this.recrutationModalEditChecker=true;
      }
    },
    addRecrutation(event){
        this.$bvModal.show('modal-recrutation');
        event={
            ...event,
            modal:'add'
        };
        this.recrutationModalEdit = Object.assign(event);
    },
    viewRecrutation(event){
        console.log('')
      this.$bvModal.show('modal-info');
      this.recrutationModalView= Object.assign(event);
    },
    getRecrutationById() {
      this.$recruitService.get(this.id)
        .then((response) => {
          this.recruitments=response.data.recruitments;
        })
        .catch((error) => {
          this.$toasted.error('Unable to get recrutation');
        });
    },
    getRecrutation() {
      this.$recruitService.getAll()
        .then((response) => {
          this.recruitments=response.data.recruitments;
        })
        .catch((error) => {
          this.$toasted.error('Unable to get list of recrutation');
        });
    }
  },
  mounted(){
    if(this.id){
      console.log('that1');
      this.getRecrutationById();
    }else{
      console.log('that2');
      this.getRecrutation();
    }
  }
};
</script>

<style>
    table#table-transition-example .flip-list-move {
        transition: transform 1s;
    }
    .button-add-new{
        float: right;
    }
    .action-wrapper{
        display: flex;
    }
    .action-wrapper button {
        margin: 0 3px 0 3px;
    }
</style>
