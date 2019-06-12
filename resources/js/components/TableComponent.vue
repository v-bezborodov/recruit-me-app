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
    <!--        hjhhj-->
    <!--        <div v-for="item in items">-->
    <!--            @{{item.id}}<br>-->
    <!--        </div>-->
            <b-table
                    id="table-transition-example"
                    :items="items"
                    :fields="fields"
                    :filter="filter"
                    :foot-clone="footClone"
                    :hover="hover"
                    :borderless="borderless"
                    striped
                    primary-key="id"
                    :tbody-transition-props="transProps"
                    caption-top
            >
                <template slot="table-caption">List of all recrutations</template>
                <template slot="actions" slot-scope="row">
                    <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="btn btn-action btn-success">
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
<!--            <pre>{{ infoModal.content }}</pre>-->
            <p>Name:<strong>{{ infoModal.content.name }}</strong></p>
            <p>Company:<strong>{{ infoModal.content.company }}</strong></p>
            <p>Country:<strong>{{ infoModal.content.country}}</strong></p>
            <p>Email:<strong>{{ infoModal.content.email }}</strong></p>
            <p>Phone:<strong>{{ infoModal.content.phone }}</strong></p>
            <p>Created: <strong>{{ infoModal.content.created_at }}</strong></p>
            <p>Last updated: <strong>{{ infoModal.content.updated_at }}</strong></p>
        </b-modal>

    </b-container >
</template>




<script>
    export default {
        // components: "table-component",
        // name: "table-component",
        props: ['data'],
        computed: {
            items: function () {
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
                    {key: 'name', sortable: true},
                    {key: 'company', sortable: true},
                    {key: 'country', sortable: true},
                    // {key: 'email', sortable: true},
                    {key: 'phone', sortable: true},
                    // {key: 'created_at', sortable: true},
                    {key: 'updated_at', sortable: true},
                    {key: 'actions', label: 'Actions'},

                ],
                filter: null,
                footClone: true,
                hover: true,
                borderless: true,
                infoModal: {
                    id: 'info-modal',
                    title: '',
                    content: ''
                }
            }
        },
        methods: {
            info(item, index, button) {
                this.infoModal.title = `Profile: ${index}`
                this.infoModal.content = item
                this.$root.$emit('bv::show::modal', this.infoModal.id, button)
            }
        }
    }
</script>

<style>
    table#table-transition-example .flip-list-move {
        transition: transform 1s;
    }
</style>