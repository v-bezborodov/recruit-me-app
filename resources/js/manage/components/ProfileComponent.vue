<template>
<!--    <b-button id="show-btn" @click="$bvModal.show('bv-modal-example')">Edit Profile</b-button>-->

    <!--<b-modal id="bv-modal-example" hide-footer>-->
        <!--<template slot="modal-title">-->
            <!--Edit profile-->
        <!--</template>-->
    <div>
        <div class="custom-control custom-switch custom-switch-info">
            <input type="checkbox" @click="switcherModeInfo" class="custom-control-input" id="switch-info">
            <label class="custom-control-label" for="switch-info">Edit information</label>

            <profile-view v-if="user && !modeInfo" v-model="user">

            </profile-view>

            <profile-edit v-if="user && modeInfo" v-model="user">

            </profile-edit>

        </div>

        <div class="custom-control custom-switch custom-switch-links">
            <input type="checkbox" @click="switcherModeLinks" class="custom-control-input" id="switch-links">
            <label class="custom-control-label" for="switch-links">Edit link section</label>

            <profile-view-links v-if="user && !modeLinks" v-model="user">

            </profile-view-links>

            <profile-edit-links v-if="user && modeLinks" v-model="user">

            </profile-edit-links>


        </div>


    </div>



<!--        <div class="d-block text-left">-->

<!--            <b-form>-->
<!--&lt;!&ndash;                @csrf&ndash;&gt;-->
<!--                &lt;!&ndash; Default input first name &ndash;&gt;-->
<!--                <label for="FormCardFirstName" class="grey-text font-weight-light">First name</label>-->
<!--                <b-form-input type="text"-->
<!--                              id="FormCardFirstName"-->
<!--                              class="form-control"-->
<!--                              v-model="first_name"-->
<!--                              placeholder="Enter your First Name"-->
<!--                              required-->
<!--                ></b-form-input>-->
<!--                <br>-->
<!--                &lt;!&ndash; Default input last name &ndash;&gt;-->
<!--                <label for="FormCardLastName" class="grey-text font-weight-light">Last name</label>-->
<!--                <b-form-input type="text"  class="form-control"-->
<!--                              id="FormCardLastName"-->
<!--                              v-model="last_name"-->
<!--                              placeholder="Enter your Last Name"-->
<!--                              required-->
<!--                ></b-form-input>-->
<!--                <br>-->
<!--                &lt;!&ndash; input email &ndash;&gt;-->
<!--                <label for="FormCardEmail" class="grey-text font-weight-light">Your email</label>-->
<!--                <b-form-input type="email"-->
<!--                              id="FormCardEmail"-->
<!--                              v-model="email"-->
<!--                              class="form-control"-->
<!--                              placeholder="Enter your email"-->
<!--                              required-->
<!--                              >-->
<!--                </b-form-input>-->
<!--                <br>-->
<!--                &lt;!&ndash; Position &ndash;&gt;-->
<!--                <label for="FormCardProfession" class="grey-text font-weight-light">Profession</label>-->
<!--                <b-form-input type="text"-->
<!--                              id="FormCardProfession"-->
<!--                              v-model="position"-->
<!--                              class="form-control"-->
<!--                              placeholder="Enter your position"-->
<!--                ></b-form-input>-->
<!--                <br>-->
<!--                &lt;!&ndash; Company &ndash;&gt;-->
<!--                <label for="FormCardCompany" class="grey-text font-weight-light">Company name</label>-->
<!--                <b-form-input-->
<!--                        type="text"-->
<!--                        id="FormCardCompany"-->
<!--                        v-model="company"-->
<!--                        class="form-control"-->
<!--                        placeholder="Enter your Company Name"-->
<!--                        required-->
<!--                ></b-form-input>-->
<!--                <br>-->
<!--                <b-form-select-->
<!--                        class="mb-2 mr-sm-2 mb-sm-0"-->
<!--                        v-model="selected"-->
<!--                        placeholder="Chose Country"-->
<!--                >-->
<!--                    <option v-for="item in options" :value="item.id" :key="`state-${item.id}`">-->
<!--                        {{item.long_name}}-->
<!--                    </option>-->
<!--                    &lt;!&ndash;<option slot="first" :value="null">Choose country</option>&ndash;&gt;-->
<!--                </b-form-select>-->
<!--                <br>-->
<!--                <div class="text-center py-4 mt-3">-->
<!--                    <b-button @click="formSubmit" variant="primary">Submit</b-button>-->
<!--                    <b-button @click="$bvModal.hide('bv-modal-example')">Close</b-button>-->
<!--                </div>-->
<!--            </b-form>-->
<!--        </div>-->
    <!--</b-modal>-->
</template>

<script>
// import axios from 'axios';
import ProfileEdit from './Profile-edit.component';
import ProfileView from './Profile-view.component';
import ProfileEditLinks from './Profile-edit-links.component';
import ProfileViewLinks from './Profile-view-links.component';
export default {
  name: 'profile-component',
  components:{ProfileEdit, ProfileView, ProfileEditLinks, ProfileViewLinks},
  props: {
    id:{
      require:true
    },
    countries:{
      require:true
    },

  },

  data() {
    return {
      modeInfo:false,
        modeLinks:false,
      // data:null,
      user:null,
      // first_name:this.data.first_name,
      // last_name:this.data.last_name,
      // email:this.data.email,
      // position:this.data.position_name,
      // company:this.data.company,
      // country:this.data.country,


      // selected: this.data.id,

    };
  },
  methods: {
    switcherModeInfo(){

      this.modeInfo==false?this.modeInfo=true:this.modeInfo=false;
      console.log(this.modeInfo)
    },
  switcherModeLinks(){
      this.modeLinks==false?this.modeLinks=true:this.modeLinks=false;
  },
    get(){
      this.$userService.get(this.id)
        .then((response) => {
          this.user=response.data.user;
          this.$toasted.success('Profile was uploaded', response);
        })
        .catch(error => {
          this.$toasted.error('Something went wrong!');
        });

    },
    // formSubmit(e) {
    //   e.preventDefault();
    //   axios.post('./formsubmit', {
    //     id: this.data.id,
    //     first_name:this.first_name,
    //     last_name:this.last_name,
    //     email:this.email,
    //     position:this.position_name,
    //     company:this.company,
    //     country:this.country,
    //     updated_at:this.time,
    //
    //   })
    //     .then(function (response) {
    //       Vue.toasted.success('Succesfully saved!', {
    //         icon : 'check',
    //         theme: 'bubble',
    //         position: 'bottom-right',
    //         duration : 5000,
    //         action : {
    //           text : 'OK',
    //           onClick : (e, toastObject) => {
    //             toastObject.goAway(0);
    //           }
    //         }
    //       });
    //
    //
    //       // setTimeout("location.href = '/profile';", 1500);
    //
    //     })
    //     .catch(function (error) {
    //       Vue.toasted.error('Something went wrong',{
    //         action : {
    //           text : 'OK',
    //           onClick : (e, toastObject) => {
    //             toastObject.goAway(0);
    //           }
    //         }
    //       });
    //     });
    // },
  },
  computed: {
    // options: function () {
    //   return this.countries;
    // },
    // time:function(){
    //
    //   var date = new Date();
    //   var OffsetInMinutes = date.getTimezoneOffset();
    //
    //
    //   return OffsetInMinutes;
    // }
  },

  created() {
    // this.fetchUser();
  },
  mounted (){
    console.log(this.id);
    this.get();
    return {
      // first_name:'test2',
      // last_name:this.data.id,
      // user: {}
    };

  }
};
</script>

<style scoped>

</style>
