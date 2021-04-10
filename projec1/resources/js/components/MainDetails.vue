<template>
    <main>
        <div class="details_card">
            <div class="photo">
                <img :src="'http://project1/storage/'+desc.img" class="car_photo">
            </div>
            <div class="description">
                <div class="caption">{{ desc.brand }} {{ desc.model }} {{ desc.issue_year }}</div>
                <div class="price">{{desc.price}}$</div>
                <div class="short_description">
                    <div class="description_col_1">
                        <div class="options">
                            <img src="../../img/destination.png" class="icon">
                            <span>{{ desc.city }}</span>
                        </div>
                        <div class="options">
                            <img src="../../img/brand.png" class="icon">
                            <span>{{ desc.brand }}</span>
                        </div>
                        <div class="options">
                            <img src="../../img/model.png" class="icon">
                            <span>{{ desc.model }}</span>
                        </div>
                        <div class="options">
                            <img src="../../img/color.png" class="icon">
                            <span>{{ desc.color }}</span>
                        </div>
                    </div>
                    <div class="description_col_2">
                        <div class="options">
                            <img src="../../img/issue_year.png" class="icon">
                            <span>{{ desc.issue_year }}</span>
                        </div>
                        <div class="options">
                            <img src="../../img/fluel.png" class="icon">
                            <span>{{ desc.fuel_name }}</span>
                        </div>
                        <div class="options">
                            <img src="../../img/mileage.png" class="icon">
                            <span>{{ desc.mileage }}</span>
                        </div>
                        <div class="options">
                            <img src="../../img/transmission.png" class="icon">
                            <span>{{ desc.transmission_name }}</span>
                        </div>
                    </div>
                </div>
                <div class="auto_description">{{ desc.description }}</div>
                <div class="seller">
                    <span  class="touch">Для связи с продавцом:</span>
                    <span class="touch">{{ desc.seller_phone }}</span>
                    <span class="touch"> {{ desc.seller_name }}</span>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
    export default {
        props: ['desc','img','city','price','brand','model','color','issue_year','fuel_name','mileage','transmission_name','seller_name','seller_phone','description']
    }
</script>
