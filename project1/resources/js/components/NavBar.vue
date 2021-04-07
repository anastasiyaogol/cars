<template>
    <aside>
        <form class="choice_form">
            <div class="choice_block">
                <span class="choice_text">Марка</span>
                <input type="text" class="choice">
            </div>
            <div class="choice_block">
                <span class="choice_text">Год от</span>
                <input type="number" class="choice">
                <span class="choice_text">до</span>
                <input type="number" class="choice">
            </div>
            <div class="choice_block">
                <span class="choice_text">Пробег от</span>
                <input type="number" class="choice">
                <span class="choice_text">до</span>
                <input type="number" class="choice">
                <span class="choice_text">тыс.км</span>
            </div>
            <div class="choice_block">
                <span class="choice_text">Цена от</span>
                <input type="number" class="choice">
                <span class="choice_text">до</span>
                <input type="number" class="choice">
                <span class="choice_text">$</span>
            </div>
            <div class="btn_block">
                <input type="submit" value="Найти" class="choice_btn">
            </div>
        </form>
    </aside>
</template>
