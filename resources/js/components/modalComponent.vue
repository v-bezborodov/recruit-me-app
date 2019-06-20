<template>
<!--    <b-button id="show-btn" @click="$bvModal.show('bv-modal-example')">Edit Profile</b-button>-->

    <b-modal id="bv-modal-example" hide-footer>
        <template slot="modal-title">
            Edit profile
        </template>

        <div class="d-block text-left">

            <b-form>
<!--                @csrf-->
                <!-- Default input first name -->
                <label for="defaultFormCardNameEx" class="grey-text font-weight-light">First name</label>
                <b-form-input type="text"  class="form-control"
                              :v-model="first_name"
                              placeholder="Enter your First Name"
                ></b-form-input>
                <br>
                <!-- Default input last name -->
                <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Last name</label>
                <b-form-input type="text"  class="form-control"
                              placeholder="Enter your First Name"
                ></b-form-input>
                <br>
                <!-- input email -->
                <label for="defaultFormCardEmailEx" class="grey-text font-weight-light">Your email</label>
                <b-form-input type="email"
                              class="form-control"
                </b-form-input>
                <br>
                <!-- Position -->
                <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Profession</label>
                <b-form-input type="text"
                              class="form-control"
                              placeholder="Enter your First Name"
                ></b-form-input>
                <br>
                <!-- Company -->
                <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Company name</label>
                <b-form-input
                        type="text"
                        class="form-control"
                        placeholder="Enter your First Name"
                ></b-form-input>
                <br>
                <b-form-select
                        class="mb-2 mr-sm-2 mb-sm-0"
                        :value="2"
                        :options="{ '1': 'Russia', '2': 'Poland', '3': 'Germany' }"
                        id="inline-form-custom-select-pref"
                >
                    <option slot="first" :value="null">Choose country</option>
                </b-form-select>
                <br>


                <div class="text-center py-4 mt-3">
                    <b-button @click="formSubmit" variant="primary">Submit</b-button>
                </div>
            </b-form>



        </div>
        <b-button class="mt-3" block @click="$bvModal.hide('bv-modal-example')">Close</b-button>
    </b-modal>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "modalComponent",
        props: ['data'],
        data() {
            return {
                first_name:'',
                user: {}
            }
        },
        // components:{
        //     'b-modal': bModal,
        // },
        // directives: {
        //     'b-modal': bModalDirective
        // },
        methods: {
            formSubmit() {
                console.log('formSubmit')
                // e.preventDefault();
                // axios.post('/formSubmit', {
                //     name: this.first_name
                // })
                //     .then(function (response) {
                //         console.log(response.data);
                //     })
                //     .catch(function (error) {
                //         console.log(error);
                //     });
            },
            fetchUser () {
                console.log('fetchUser')
                // axios.get('/api/user')...
            }
        },
        created() {
            this.fetchUser()
        }
    }
</script>

<style scoped>

</style>