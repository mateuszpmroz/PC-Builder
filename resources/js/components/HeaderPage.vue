<template>
    <b-container>
        <div class="header">
            <h1 class="hero">Welcome to PC BUILDER</h1>
            <h3 class="hero">Best page to performance your computer</h3>
            <loginmodal></loginmodal>
        </div>
    </b-container>
</template>

<script>

    import loginmodal from './LoginModal'

    export default {
        name: "headerpage",
        components: {
            loginmodal
        }
    }
</script>

<style scoped>

</style>
