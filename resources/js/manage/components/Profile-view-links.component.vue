<template>
    <div class="d-block text-left">
        <p>Links section</p>
        <table v-if="data" class="table table-striped">
            <tbody>
            <tr>
                <th scope="row">First Name</th>
                <td v-model="data.website"><a :href="data.website">{{data.website}}</a></td>
            </tr>
            <tr>
                <th scope="row">Last Name</th>
                <td v-model="data.linkedin"><a :href="data.linkedin">{{data.linkedin}}</a></td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td v-model="data.facebook"><a :href="data.facebook">{{data.facebook}}</a></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
  name: 'Profile-view-links',
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
