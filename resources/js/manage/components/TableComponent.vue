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
                    <b-button class="button-add-new" @click="addNewRecrutation()" variant="success">Submit new recrutation</b-button>
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

                <template slot="table-caption">List of all recrutations</template>
                <template slot="actions" slot-scope="row">
                    <b-button size="sm" variant="outline-primary" @click="ViewRecrutation(row.item)" class="btn btn-action">
                        Show
                    </b-button>
                    <b-button size="sm" @click="" class="btn btn-action btn-success">
                        Edit
                    </b-button>
                </template>
                <template slot="empty" slot-scope="scope">
                    <h4>{{ scope.emptyText }}</h4>
                </template>
                <template slot="emptyfiltered" slot-scope="scope">
                    <h4>{{ scope.emptyFilteredText }}</h4>
                </template>
            </b-table>
        </div>

        <modal-add-recrutation v-show="recrutationModal">
        </modal-add-recrutation>

        <modal-view-recrutation v-model="recrutationViewModal">
        </modal-view-recrutation>

    </b-container >
</template>


<script>
    //info(row.item, $event.target)
    import ModalAddRecrutation from './modal-add-recrutation.component';
    import ModalViewRecrutation from './modal-view-recrutation.component';

    export default {
        props: {
            id: {
                require:true
            },
        },
        components: {ModalAddRecrutation, ModalViewRecrutation},
        computed: {
            //
        },
        data() {
            return {
                recrutationViewModal:null,
                recrutationModal:false,
                transProps: {
                    // Transition name
                    name: 'flip-list'
                },
                recruitments:null,
                fields: [
                    {key:'index', label: '#'},
                    {key:'name', label: 'Name'},
                    // {key:'user.last_name', sortable: true, label: 'Name'},
                    // {key: 'user.first_name', sortable: true, label: 'First name'},
                    {key: 'offered_position', sortable: true, label: 'Position'},
                    {key: 'user.company', sortable: true, label: 'Company name'},
                    {key: 'user.country.long_name', sortable: true, label: 'Country'},
                    // {key: 'email', sortable: true},
                    {key: 'user.phone', sortable: true, label: 'Phone'},
                    // {key: 'created_at', sortable: true},
                    {key: 'created_at', sortable: true},
                    {key: 'actions', label: 'Actions'},

                ],
                filter: null,
                hover: true,
                borderless: true,
            }
        },
        methods: {
            addNewRecrutation(){
                this.$bvModal.show('modal-recrutation');
                this.recrutationModal=true;
            },
            ViewRecrutation(event){
                this.$bvModal.show('modal-info');
                this.recrutationViewModal=event;
            },
            getRecrutationById() {
                axios.get('/manage/recrutation/'+this.id)
                    .then((response) => {
                        this.recruitments=response.data.recruitments;
                    })
                    .catch((error) => {
                        console.log('Error', error);
                        this.$toasted.error('Unable to get recrutation');
                    });
            },
            getRecrutation() {
                axios.get('/manage/recrutation')
                    .then((response) => {
                        this.recruitments=response.data.recruitments;
                    })
                    .catch((error) => {
                        console.log('Error', error);
                        this.$toasted.error('Unable to get recrutation');
                    });
            }
        },
        mounted(){
            if(this.id){
                this.getRecrutationById();
            }else{
                this.getRecrutation();
            }
        }
    }
</script>

<style>
    table#table-transition-example .flip-list-move {
        transition: transform 1s;
    }
    .avatar{
        width:50%;
    }
    .button-add-new{
        float: right;
    }
</style>
