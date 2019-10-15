<template>
    <div>
        <div class="d-block text-left">
            <b-form>
                <table v-if="data" class="table table-striped">
                    <tbody v-if="data">
                            <tr>
                                <th scope="row">First Name</th>
                                <td>
                                    <b-form-input type="text"
                                      id="FormCardFirstName"
                                      class="form-control"
                                      v-model="data.first_name"
                                      placeholder="Enter your First Name"
                                      required
                                    ></b-form-input>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Last Name</th>
                                <td>
                                    <b-form-input type="text"
                                      class="form-control"
                                      id="FormCardLastName"
                                      v-model="data.last_name"
                                      placeholder="Enter your Last Name"
                                      required
                                    ></b-form-input>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>
                                    <b-form-input type="email"
                                       id="FormCardEmail"
                                       v-model="data.email"
                                       class="form-control"
                                       placeholder="Enter your email"
                                       required>
                                    </b-form-input>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Your position</th>
                                <td>
                                    <b-form-input type="text"
                                                  id="FormCardProfession"
                                                  v-model="data.position_name"
                                                  class="form-control"
                                                  placeholder="Enter your position"
                                    ></b-form-input>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Company</th>
                                <td>
                                    <b-form-input
                                        type="text"
                                        id="FormCardCompany"
                                        v-model="data.company"
                                        class="form-control"
                                        placeholder="Enter your Company Name"
                                        required
                                    ></b-form-input>
                                </td>
                            </tr>
    <!--                        <div class="text-center py-4 mt-3">-->
    <!--                            <b-button @click="formSubmit" variant="primary">Submit</b-button>-->
    <!--                            <b-button @click="">Close</b-button>-->
    <!--                        </div>-->
                    </tbody>
                </table>
                <div class="text-center py-4 mt-3">
                    <b-button @click="formSubmit" variant="primary">Submit</b-button>
                    <b-button @click="">Close</b-button>
                </div>
            </b-form>
        </div>
    </div>
</template>

<script>
export default {
  name: 'Profile-edit-component',
  props: {
    value:{
      require:true
    },
  },
  data() {
    return {
      data:null,
    };
  },
  methods: {
    sync(){
      this.data=this.value;
    },
    formSubmit(){

    }
  },
  mounted(){
    this.sync();
  },
  watch:{
    value(){
      this.sync();
    }
  }
};
</script>

<style scoped>

</style>
