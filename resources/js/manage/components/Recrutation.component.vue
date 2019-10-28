<template>
    <table-recrutation :id="id">

    </table-recrutation>
    
</template>

<script>
    import TableRecrutation from "./TableRecrutation";
    export default {
        name: "recrutation-component",
        components: {TableRecrutation},
        props: {
            id: {
                default:null
            },
        },

    }
</script>

<style scoped>

</style>