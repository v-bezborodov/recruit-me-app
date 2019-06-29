<template>
    <b-container fluid>
        <div>
            <!--<b-row>-->
                <!--<b-col md="6" class="my-1">-->
                    <!--<b-form-group label-cols-sm="3" label="Filter" class="mb-0">-->
                        <!--<b-input-group>-->
                            <!--<b-form-input v-model="filter" placeholder="Type to Search"></b-form-input>-->
                            <!--<b-input-group-append>-->
                                <!--<b-button :disabled="!filter" @click="filter = ''">Clear</b-button>-->
                            <!--</b-input-group-append>-->
                        <!--</b-input-group>-->
                    <!--</b-form-group>-->
                <!--</b-col>-->
            <!--</b-row>-->

            <b-table
                    id="table-transition-example"
                    :items="items"
                    :fields="fields"
                    :hover="hover"
                    :borderless="borderless"
                    striped
            >

            </b-table>
        </div>


    </b-container >
</template>




<script>
    export default {
        // components: "table-component",
        // name: "table-component",
        props: {
            data:{
                // type: Array
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
                    {key: 'id'},
                    // {key: 'user.last_name', sortable: true, label: 'Last Name'},
                    // {key: 'this.data.offered_position', label: ''},
                    {key: 'user.company',label: ''},
                    // // {key: 'user.country.long_name', label: ''},
                    // // {key: 'email', sortable: true},
                    // // {key: 'user.phone', label: ''},
                    {key: 'created_at', sortable: true},
                    // {key: 'updated_at', label: ''},
                    // {key: 'actions', label: ''},


                ],

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
        mounted(){
            console.log('123', this.data);
        },
        methods: {
        }
    }
</script>

