<template>
    <div class="d-block text-left">
        <p>Links section</p>
        <b-form v-if="data">
            <table v-if="data" class="table table-striped">
                <tbody>
                <tr>
                    <th scope="row">First Name</th>
                    <td>
                        <b-form-input type="text"
                                      id="FormCardWebsite"
                                      class="form-control"
                                      v-model="data.website"
                                      placeholder="Enter your website"
                                      required
                        ></b-form-input>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Last Name</th>
                    <td>
                        <b-form-input type="text"  class="form-control"
                                      id="FormCardFacebook"
                                      v-model="data.facebook"
                                      placeholder="Enter your facebook"
                                      required
                        ></b-form-input>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>
                        <b-form-input type="email"
                                      id="FormCardLinkedin"
                                      v-model="data.linkedin"
                                      class="form-control"
                                      placeholder="Enter your linkedin"
                                      required
                        ></b-form-input>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="text-center py-4 mt-3">
                <b-button @click="formSubmit" variant="primary">Submit</b-button>
                <b-button @click="">Close</b-button>
            </div>
        </b-form>
    </div>
</template>

<script>
export default {
  name: 'Profile-edit-links',
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
    .table th,
    .table td {
        height: 4em;
        vertical-align: middle;
    }
</style>
