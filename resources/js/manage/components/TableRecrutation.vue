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
                    <b-button class="button-add-new" @click="saveRecrutation(null, 'add')" variant="success">Submit new recrutation</b-button>
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
                    <span v-else-if="data.item.status==2" class="badge badge-pill badge-light">INACTIVE</span>
                </template>

                <template slot="table-caption">List of all recrutations</template>
                <template slot="actions" slot-scope="row">
                    <div class="action-wrapper d-flex">
                        <b-button size="sm" variant="outline-primary" @click="viewRecrutation(row.item)" class="btn btn-action">
                            <i class="fa fa-list-alt"></i>
                        </b-button>
                        <b-button size="sm" @click="saveRecrutation(row.item, 'edit')" class="btn btn-action btn-success">
                            <i class="fa fa-edit"></i>
                        </b-button>
                        <b-button size="sm" @click="setStatus(row, row.item.id)" class="btn btn-action btn-action-status btn-outline-dark bg-white">
                            <i class="fa fa-eye"></i>
                            <!--<i class="fa fa-eye-slash"></i>-->
                        </b-button>
                        <b-button size="sm" @click="remove(row.index, row.item.id)" class="btn btn-action btn-danger">
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

        <modal-recrutation v-show="recrutationModalEdit" :modal="modal" v-model="recrutationModalEdit">
        </modal-recrutation>


        <modal-view-recrutation v-model="recrutationModalView">
        </modal-view-recrutation>

    </b-container >
</template>


<script>
import ModalRecrutation from './modal-recrutation.component';
import ModalViewRecrutation from './modal-view-recrutation.component';
export default {
  name:'TableRecrutation',
  props: {
    id: {
      default:null
    },
  },
  components: {ModalRecrutation, ModalViewRecrutation},
  computed: {
    //
  },
  data() {
    return {
      test:'test',
      modal:null,
      options:{},
      recrutationModalView:null,
      recrutationModalEdit:null,
      recrutationModalAdd:false,
      transProps: {
        // Transition name
        name: 'flip-list'
      },
      recruitments:null,
      fields: [
        {key:'index', label: '#'},
        {key:'status', label: 'Status'},
        {key:'name', label: 'Name'},
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
    saveRecrutation(data, modal){
      this.modal= modal;
      switch(modal) {
      case 'add':
        this.addRecrutation();
        break;
      case 'edit':
        this.editRecrutation(data);
        break;
      default:
        this.$toasted.error('Can\'t save');
      }
    },

    remove(event, eventId){
      this.$recruitService.remove(eventId)
        .then((response) => {
          this.$toasted.success('Recrutation successfully removed', response);
          this.recruitments.splice(event, 1);
        })
        .catch(error => {
          this.$toasted.error('Something went wrong!');
          if(error.response.data.error){
            this.$toasted.error(error.response.data.error);
          }
        });
    },
    setStatus(event){
      // this.recruitments[0]={
      //     ...this.recruitments[0],
      //     tdClass: 'danger',
      // }

      this.$recruitService.setStatus(event.item.id)
        .then((response) => {
          (this.recruitments[event.index].status==0 || this.recruitments[event.index].status==0 || this.recruitments[event.index].status==null)
            ?this.$set(this.recruitments[event.index], 'status', 2 )
            :this.$set(this.recruitments[event.index], 'status', 0 );
          //   this.recruitments[eventId].status=1;
          //   this.getRecrutationById();
          this.$toasted.success('Status successfully updated', response);
        })
        .catch(error => {
          this.$toasted.error('Something went wrong!', error);
          // if(error.response.data.error){
          //   this.$toasted.error(error.response.data.error);
          // }
        });
    },

    editRecrutation(event){
      this.$bvModal.show('modal-recrutation');
      this.recrutationModalEdit = Object.assign({},event);
    },
    addRecrutation(){
      this.$bvModal.show('modal-recrutation');
      this.recrutationModalEdit = Object.assign({'user_id':this.id});
    },
    viewRecrutation(event){
      this.$bvModal.show('modal-info');
      this.recrutationModalView= Object.assign(event);
    },
    getRecrutationById() {
      this.$recruitService.get(this.id)
        .then((response) => {
          this.recruitments=response.data.recruitments;
        })
        .catch((error) => {
          this.$toasted.error('Unable to get recrutation', error);
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
      this.getRecrutationById();
    }else{
      this.getRecrutation();
    }
  },
  watch:{
    //   recruitments(){
    //       this.recruitments[0]={
    //           ...this.recruitments[0],
    //           tdClass: 'inactv',
    //       }
    // }
    // recrutationModalEdit(){
    //     console.log('recrutationModalEdit', this.recrutationModalEdit);
    // }
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
    .action-wrapper .btn-action-status:hover{
        /*opacity:.7;*/
        color:darkgray!important
    }
</style>
