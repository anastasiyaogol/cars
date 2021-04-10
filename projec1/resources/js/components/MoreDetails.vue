<template>
    <body class="details_body">
    <div class="details_wrapper">
        <Header/>
        <MainDetails :desc="desc"/>
        <Footer/>
    </div>
    </body>
</template>
<script>
import Header from './Header.vue'
import Footer from './Footer.vue'
import MainDetails from './MainDetails.vue'
export default {
    props: ['img','city','price','brand','model','color','issue_year','fuel_name','mileage','transmission_name','seller_name','seller_phone','description'],
    components: {
        Header,
        Footer,
        MainDetails
    },
    data() {
        return {
            desc: {
                img: this.img,
                city: this.city,
                price: this.price,
                brand: this.brand,
                model: this.model,
                color: this.color,
                issue_year: this.issue_year,
                fuel_name: this.fuel_name,
                mileage: this.mileage,
                transmission_name: this.transmission_name,
                seller_name: this.seller_name,
                seller_phone: this.seller_phone,
                description: this.description
            }
        }
    }
}
</script>
