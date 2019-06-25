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
                <label for="FormCardFirstName" class="grey-text font-weight-light">First name</label>
                <b-form-input type="text"
                              id="FormCardFirstName"
                              class="form-control"
                              v-model="first_name"
                              placeholder="Enter your First Name"
                              required
                ></b-form-input>
                <br>
                <!-- Default input last name -->
                <label for="FormCardLastName" class="grey-text font-weight-light">Last name</label>
                <b-form-input type="text"  class="form-control"
                              id="FormCardLastName"
                              v-model="last_name"
                              placeholder="Enter your Last Name"
                              required
                ></b-form-input>
                <br>
                <!-- input email -->
                <label for="FormCardEmail" class="grey-text font-weight-light">Your email</label>
                <b-form-input type="email"
                              id="FormCardEmail"
                              v-model="email"
                              class="form-control"
                              placeholder="Enter your email"
                              required
                              >
                </b-form-input>
                <br>
                <!-- Position -->
                <label for="FormCardProfession" class="grey-text font-weight-light">Profession</label>
                <b-form-input type="text"
                              id="FormCardProfession"
                              v-model="position"
                              class="form-control"
                              placeholder="Enter your position"
                ></b-form-input>
                <br>
                <!-- Company -->
                <label for="FormCardCompany" class="grey-text font-weight-light">Company name</label>
                <b-form-input
                        type="text"
                        id="FormCardCompany"
                        v-model="company"
                        class="form-control"
                        placeholder="Enter your Company Name"
                        required
                ></b-form-input>
                <br>
                <b-form-select
                        class="mb-2 mr-sm-2 mb-sm-0"
                        v-model="selected"
                        placeholder="Chose Country"
                >
                    <option v-for="item in options" :value="item.id" :key="`state-${item.id}`">
                        {{item.long_name}}
                    </option>
                    <!--<option slot="first" :value="null">Choose country</option>-->
                </b-form-select>
                <br>


                <div class="text-center py-4 mt-3">
                    <b-button @click="formSubmit" variant="primary">Submit</b-button>
                    <b-button @click="$bvModal.hide('bv-modal-example')">Close</b-button>
                </div>
            </b-form>



        </div>

    </b-modal>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "modalComponent",
        props: ['data','countries'],
        methods: {
            formSubmit(e) {
                console.log('formsubmit')
                e.preventDefault();
                axios.post('./formsubmit', {
                    id: this.data.id,
                    first_name:this.first_name,
                    last_name:this.last_name,
                    email:this.email,
                    position:this.position_name,
                    company:this.company,
                    country:this.country,
                    updated_at:this.time,

                })
                    .then(function (response) {
                        console.log(response.data);

                        // this.$toasted.show('hello billo')

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
            fetchUser () {
                // console.log('fetchUser', this.data)
                // console.log('fetchUser', this.countries)

                // axios.get('/api/user')...
            }
        },
        data() {
            return {
                first_name:this.data.first_name,
                last_name:this.data.last_name,
                email:this.data.email,
                position:this.data.position_name,
                company:this.data.company,
                country:this.data.country,


                selected: this.data.id,

            }
        },
        computed: {
            options: function () {
                // console.log(this.countries)
                return this.countries
            },
            time:function(){

                var date = new Date();
                var day = date.getDate();
                var month = date.getMonth();
                var year = date.getFullYear();
                var hours = date.getHours();
                var minutes = date.getMinutes();
                var seconds = date.getSeconds();

                // console.log(year+'-'+month+'-'+day+' '+minutes);
                return year+'-'+month+'-'+day+' '+hours+':'+minutes+':'+seconds;
    }
        },

        created() {
            this.fetchUser()
        },
        mounted (){
            return {
                // first_name:'test2',
                // last_name:this.data.id,
                // user: {}
            }

        }
    }
</script>

<style scoped>

</style>