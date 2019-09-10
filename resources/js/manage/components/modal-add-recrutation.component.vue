<template>
    <b-modal id="modal-recrutation" title="Add recrutation">
        <b-form>
            <label for="FormCardPosition" class="grey-text font-weight-light">Position:</label>
            <b-form-input type="text"
                          id="FormCardPosition"
                          class="form-control"
                          v-model="first_name"
                          placeholder="Position Title"
                          required
            ></b-form-input>
            <br>

            <label for="FormCardDescription" class="grey-text font-weight-light">Description:</label>
            <b-form-input type="text"
                          id="FormCardDescription"
                          class="form-control"
                          v-model="first_name"
                          placeholder="Position Title"
                          required
            ></b-form-input>
            <br>
            <tinymce-editor></tinymce-editor>

                <b-button @click="formSubmit" variant="primary">Submit</b-button>
                <b-button @click="$bvModal.hide('bv-modal-example')">Close</b-button>
        </b-form>
    </b-modal>
</template>

<script>
    export default {
        name: "modal-add-recrutation.component",
        props:{
            value: {}
        },
        mounted() {
            console.log('add modal component', this.value)
        }
    }
</script>

<style scoped>

</style>
