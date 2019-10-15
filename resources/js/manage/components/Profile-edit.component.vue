<template>
    <div class="d-block text-left">

        <b-form v-if="data">
            <!--                @csrf-->
            <!-- Default input first name -->
            <label for="FormCardFirstName" class="grey-text font-weight-light">First name</label>
            <b-form-input type="text"
                          id="FormCardFirstName"
                          class="form-control"
                          v-model="data.first_name"
                          placeholder="Enter your First Name"
                          required
            ></b-form-input>
            <br>
            <!-- Default input last name -->
            <label for="FormCardLastName" class="grey-text font-weight-light">Last name</label>
            <b-form-input type="text"  class="form-control"
                          id="FormCardLastName"
                          v-model="data.last_name"
                          placeholder="Enter your Last Name"
                          required
            ></b-form-input>
            <br>
            <!-- input email -->
            <label for="FormCardEmail" class="grey-text font-weight-light">Your email</label>
            <b-form-input type="email"
                          id="FormCardEmail"
                          v-model="data.email"
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
                          v-model="data.position"
                          class="form-control"
                          placeholder="Enter your position"
            ></b-form-input>
            <br>
            <!-- Company -->
            <label for="FormCardCompany" class="grey-text font-weight-light">Company name</label>
            <b-form-input
                    type="text"
                    id="FormCardCompany"
                    v-model="data.company"
                    class="form-control"
                    placeholder="Enter your Company Name"
                    required
            ></b-form-input>
            <br>
<!--            <b-form-select-->
<!--                    class="mb-2 mr-sm-2 mb-sm-0"-->
<!--                    v-model="selected"-->
<!--                    placeholder="Chose Country"-->
<!--            >-->
<!--                <option v-for="item in options" :value="item.id" :key="`state-${item.id}`">-->
<!--                    {{item.long_name}}-->
<!--                </option>-->
<!--                &lt;!&ndash;<option slot="first" :value="null">Choose country</option>&ndash;&gt;-->
<!--            </b-form-select>-->
            <br>
            <div class="text-center py-4 mt-3">
                <b-button @click="formSubmit" variant="primary">Submit</b-button>
                <b-button @click="$bvModal.hide('bv-modal-example')">Close</b-button>
            </div>
        </b-form>
    </div>
</template>

<script>
    export default {
        name: "Profile-edit-component",
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
    }
</script>

<style scoped>

</style>
