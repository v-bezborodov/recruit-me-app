<template>
    <div>
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
                        <td v-model="data.position_name">{{data.position_name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Company</th>
                        <td v-model="data.company">{{data.company}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
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
    .table th,
    .table td {
        height: 4em;
        vertical-align: middle;
    }
</style>
