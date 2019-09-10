<template>
    <!-- Info modal -->
    <b-modal  id="modal-info" title="View recrutation" ok-only @hide="">
        <div v-if=" recrutation && recrutation.user">


            <div class="avatar-wrapper">
                <img class="avatar d-block mx-auto" :src="'/img/profiles/'+recrutation.user.id+'/'+recrutation.user.avatar||'/img/no-avatar.png'" :alt="recrutation.user.first_name">
            </div>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td class="item-name"><b>Name:</b></td>
                        <td class="item-value">{{recrutation.user.first_name + ' ' + recrutation.user.last_name }}</td>
                    </tr>
                    <tr>
                        <td class="item-name"><b>Offered position:</b></td>
                        <td class="item-value">{{recrutation.offered_position }}</td>
                    </tr>
                    <tr>
                        <td class="item-name"><b>Description:</b></td>
                        <td class="item-value">{{ recrutation.description }}</td>
                    </tr>
                    <tr>
                        <td class="item-name"><b>Company:</b></td>
                        <td class="item-value">{{ recrutation.user.company }}</td>
                    </tr>
                    <tr>
                        <td class="item-name"><b>Email:</b></td>
                        <td class="item-value">{{ recrutation.user.email }}</td>
                    </tr>
                    <tr>
                        <td class="item-name"><b>Phone:</b></td>
                        <td class="item-value">{{ recrutation.user.phone }}</td>
                    </tr>
                    <tr>
                        <td class="item-name"><b>Created:</b></td>
                        <td class="item-value">{{ recrutation.created_at }}</td>
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
    .avatar-wrapper{
        max-width:150px;
        max-height:150px;
        width:150px;
        height:150px;
        overflow:hidden;
        position:relative;
        margin: 0 auto;
    }
    .avatar-wrapper .avatar{
        position:absolute;
        width:120%;
        left: 50%;
        transform: translateX(-50%);
    }
    .item-name{
        text-align: end;
    }
    .item-value{
        text-align:start;
    }
</style>
