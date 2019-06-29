<template>
    <b-container fluid>
        <div>
            <b-row>
                <b-col md="6" class="my-1">
                    <b-form-group label-cols-sm="3" label="Filter" class="mb-0">
                        <b-input-group>
                            <b-form-input v-model="filter" placeholder="Type to Search"></b-form-input>
                            <b-input-group-append>
                                <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form-group>
                </b-col>
            </b-row>

            <b-table
                    id="table-transition-example"
                    :items="items"
                    :fields="fields"
                    :filter="filter"
                    :hover="hover"
                    :borderless="borderless"
                    striped
                    primary-key="id"
                    :tbody-transition-props="transProps"
                    caption-top
            >
                <template slot="table-caption">List of all recrutations</template>
                <template slot="actions" slot-scope="row">
                    <b-button size="sm" @click="info(row.item, $event.target)" class="btn btn-action btn-success">
                        Show
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
        <b-modal :id="infoModal.id" :title="infoModal.title" ok-only @hide="resetInfoModal">
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

    </b-container >
</template>




<script>
    export default {
        // components: "table-component",
        // name: "table-component",
        props: {
            data: {
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
                transProps: {
                    // Transition name
                    name: 'flip-list'
                },
                fields: [
                    {key: 'id', sortable: true},
                    {key: 'user.last_name', sortable: true, label: 'Last Name'},
                    {key: 'user.first_name', sortable: true, label: 'First name'},
                    {key: 'user.company', sortable: true, label: 'Company name'},
                    {key: 'user.country.long_name', sortable: true, label: 'Country'},
                    // {key: 'email', sortable: true},
                    {key: 'user.phone', sortable: true, label: 'Phone'},
                    // {key: 'created_at', sortable: true},
                    {key: 'updated_at', sortable: true},
                    {key: 'actions', label: 'Actions'},

                ],
                filter: null,
                hover: true,
                borderless: true,
                infoModal: {
                    id: 'info-modal',
                    title: '',
                    content: '',
                    user: '',
                    country: ''
                }
            }
        },
        methods: {
            info(item, button) {
                this.infoModal.title = `Profile: ${item.user.first_name+' '+item.user.last_name}`
                this.infoModal.content = item
                this.infoModal.user = item.user
                this.infoModal.country = item.user.country
                this.$root.$emit('bv::show::modal', this.infoModal.id, button)
            },
            resetInfoModal() {
                this.infoModal.title = ''
                this.infoModal.content = ''
            },
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
</style>