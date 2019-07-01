<template>
    <b-container fluid>
        <div>

            <b-table
                    id="table-transition-example"
                    :items="items"
                    :fields="fields"
                    :hover="hover"
                    :borderless="borderless"
                    striped
            >
                <template slot="actions" slot-scope="row">
                    <b-button size="sm" @click="info(row.item, $event.target)" class="btn btn-action btn-info">
                        More
                    </b-button>
                    <b-button size="sm" @click="edit(row.item, $event.target)" class="btn btn-action btn-warning">
                        {{row}}
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

        <!-- Info modal -->
        <b-modal id="showModal" :title="infoModal.title" ok-only @hide="resetInfoModal">
            <!--            <pre>{{ infoModal.content}}</pre>-->
            <!--            <pre>{{ infoModal.user.id}}</pre>-->
            <div><img class="avatar d-block mx-auto" :src="infoModal.user.avatar" :alt="infoModal.user.first_name">
            </div>
            <p>Offered position: <strong>{{ infoModal.content.position }}</strong></p>
            <p>Name: <strong>{{infoModal.user.first_name + ' ' + infoModal.user.last_name }}</strong></p>
            <p>Email: <strong>{{ infoModal.user.position_name }}</strong></p>
            <p>Company: <strong>{{ infoModal.user.company }}</strong></p>
            <p>Email: <strong>{{ infoModal.user.email }}</strong></p>
            <p>Phone: <strong>{{ infoModal.user.phone }}</strong></p>
            <p>Country: <strong>{{infoModal.country.long_name}}</strong></p>
            <p>Created: <strong>{{ infoModal.content.created_at }}</strong></p>
            <p>Last updated: <strong>{{ infoModal.content.updated_at }}</strong></p>
        </b-modal>




        <!-- Edit modal -->
        <b-modal id="editModal"
                 @hide="resetEditModal"
        >
            <b-form>
                <!-- Default input position name -->
                <label for="FormCardFirstName" class="grey-text font-weight-light">Position recruiting for</label>
                <b-form-input type="text"
                              id="FormCardFirstName"
                              class="form-control"
                              v-model="editModal.content.position"
                              placeholder="Position"
                              required
                ></b-form-input>
                {{ editModal.content.position}}
                <br>

                <br>


                <div class="text-center py-4 mt-3">
                    <b-button @click="formSubmit" variant="primary">Submit</b-button>
                    <b-button @click="$bvModal.hide('bv-modal-example')">Close</b-button>
                </div>
            </b-form>


        </b-modal>

    </b-container >
</template>




<script>
    export default {
        props: {
            data:{
                require:true
            },
            dataModal:{
                require:true
            }
        },
        computed: {
            items: function () {
                // console.log(this.data)
                return JSON.parse(this.data)
            }
        },
        data() {
            return {
                fields: [
                    {key: 'position',label: ''},
                    {key: 'created_at', label: ''},
                    {key: 'actions', label: ''},

                ],

                hover: true,
                borderless: true,
                infoModal: {
                    id: 'showModal',
                    title: '',
                    content: '',
                    user: '',
                    country: ''
                },
                editModal: {
                    id: 'editModal',
                    content: '',
                },
                // position_name:this.data.editModal,


            }
        },
        mounted(){
            console.log('123', this.data);
        },
        methods: {
            info(item, button) {
                this.infoModal.title = `Profile: ${item.user.first_name+' '+item.user.last_name}`
                this.infoModal.content = item
                this.infoModal.user = item.user
                this.infoModal.country = item.user.country
                this.$root.$emit('bv::show::modal', 'showModal', button)
            },
            resetInfoModal() {
                this.infoModal.title = ''
                this.infoModal.content = ''
            },
            edit(item, button) {
                this.editModal.content = item
                this.$root.$emit('bv::show::modal', 'editModal', button)
            },
            resetEditModal() {
                this.editModal.title = ''
                this.editModal.content = ''
            },
            formSubmit(e) {
                e.preventDefault();
                axios.post('./formsubmit', {
                    // id: this.data.id,
                    position:this.first_name,
                })
                    .then(function (response) {
                        Vue.toasted.success('Succesfully saved!', {
                            icon : 'check',
                            theme: "bubble",
                            position: "bottom-right",
                            duration : 5000,
                            action : {
                                text : 'OK',
                                onClick : (e, toastObject) => {
                                    toastObject.goAway(0);
                                }
                            }
                        });


                        // setTimeout("location.href = '/profile';", 1500);

                    })
                    .catch(function (error) {
                        console.log('testerror', error);
                        Vue.toasted.error('Something went wrong',{
                            action : {
                                text : 'OK',
                                onClick : (e, toastObject) => {
                                    toastObject.goAway(0);
                                }
                            }
                        });
                    });
            },
        }
    }
</script>

