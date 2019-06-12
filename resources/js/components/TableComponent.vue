<template>
    <b-container fluid>
        <div>
    <!--        hjhhj-->
    <!--        <div v-for="item in items">-->
    <!--            @{{item.id}}<br>-->
    <!--        </div>-->
            <b-table
                    id="table-transition-example"
                    :items="items"
                    :fields="fields"
                    striped
                    primary-key="id"
                    :tbody-transition-props="transProps"
            >
                <template slot="actions" slot-scope="row">
                    <b-button size="sm" @click="htinfo(row.item, row.index, $event.target)" class="mr-1">
                        Show
                    </b-button>
                </template>
            </b-table>
        </div>

        <!-- Info modal -->
        <b-modal :id="infoModal.id" :title="infoModal.title" ok-only @hide="resetInfoModal">
            <pre>{{ infoModal.content }}</pre>
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
                    {key: 'email', sortable: true},
                    {key: 'phone', sortable: true},
                    {key: 'created_at', sortable: true},
                    {key: 'updated_at', sortable: true},
                    {key: 'actions', label: 'Actions'},

                ],
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