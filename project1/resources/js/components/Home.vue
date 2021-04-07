<template>
    <body class="body">
    <div class="wrapper">
        <Header/>
        <MainHome/>
        <Footer/>
    </div>
    </body>
</template>
<script>
import Header from './Header.vue'
import Footer from './Footer.vue'
import MainHome from './MainHome.vue'
import NavBar from './NavBar.vue'
export default {
    props: ['app'],
    data()
    {
        return{
            user_id: this.$userId
        }
    },
    components: {
        Header,
        Footer,
        NavBar,
        MainHome
    },
    mounted() {
        console.log(this.$userId)
    }
}
</script>
<style>

</style>
