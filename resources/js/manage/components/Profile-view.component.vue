<template>
    <div class="d-block text-left">
        <table v-if="data" class="table table-striped">
            <tbody>
            <tr>
                <th scope="row">First Name</th>
                <td v-model="data.first_name">{{data.first_name}}</td>
            </tr>
            <tr>
                <th scope="row">Last Name</th>
                <td v-model="data.last_name">{{data.last_name}}</td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td v-model="data.email">{{data.email}}</td>
            </tr>
            <tr>
                <th scope="row">Your position</th>
                <td v-model="data.position">{{data.position}}</td>
            </tr>
            <tr>
                <th scope="row">Company</th>
                <td v-model="data.company">{{data.company}}</td>
            </tr>
            <tr>
                <th scope="row">Your website</th>
                <td v-model="data.website">{{data.website}}</td>
            </tr>
<!--            <tr>-->
<!--                <th scope="row">Country</th>-->
<!--                <td v-model="company">{{company}}</td>-->
<!--            </tr>-->
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
  name: 'Profile-view-component',
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
};
</script>

<style scoped>

</style>
