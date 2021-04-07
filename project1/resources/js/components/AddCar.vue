<template>
    <body class="add_body">
    <div class="add_wrapper">
        <Header/>
        <MainAdd/>
        <Footer/>
    </div>
    </body>
</template>
<script>
import Header from './Header.vue'
import Footer from './Footer.vue'
import MainAdd from './MainAdd.vue'
export default {
    components: {
        Header,
        MainAdd,
        Footer
    }
}
</script>
