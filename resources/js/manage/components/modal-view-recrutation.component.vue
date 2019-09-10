<template>
    <!-- Info modal -->
    <b-modal  id="modal-info" title="View recrutation" ok-only @hide="">
        <div v-if=" recrutation && recrutation.user">


        <div><img class="avatar d-block mx-auto" :src="recrutation.user.avatar||'/img/no-avatar.png'" :alt="recrutation.user.first_name">
        </div>
        {{recrutation}}

            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td><b>Name:</b></td>
                        <td>{{recrutation.user.first_name + ' ' + recrutation.user.last_name }}</td>
                    </tr>
                    <tr>
                        <td><b>Offered position:</b></td>
                        <td>{{recrutation.offered_position }}</td>
                    </tr>
                    <tr>
                        <td><b>Description:</b></td>
                        <td>{{ recrutation.description }}</td>
                    </tr>
                    <tr>
                        <td><b>Company:</b></td>
                        <td>{{ recrutation.user.company }}</td>
                    </tr>
                    <tr>
                        <td><b>Email:</b></td>
                        <td>{{ recrutation.user.email }}</td>
                    </tr>
                    <tr>
                        <td><b>Phone:</b></td>
                        <td>{{ recrutation.user.phone }}</td>
                    </tr>
                    <tr>
                        <td><b>Created:</b></td>
                        <td>{{ recrutation.created_at }}</td>
                    </tr>
                </tbody>
            </table>



        </div>
    </b-modal>
</template>

<script>
    export default {
        name: "modal-view-recrutation.component",
        props:{
            value: {}
        },
        data(){
            return{
                recrutation:[],
            }
        },
        methods:{
            humanDiffTime(){
                var moment = require('moment');
                moment().format();
            }

        },
        mounted() {
            //
        },
        watch:{
            value(){
                this.recrutation=this.value;
                this.recrutation.user=this.value.user;
                console.log(this.recrutation)
            },
        }
    }
</script>

<style scoped>

</style>
