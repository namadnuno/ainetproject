<template>
    <div class="control">
        <a class="nav-item is-tab" @click.preventDefault="open">
            <figure class="image is-16x16" style="margin-right: 8px;">
                <img :src="thumb">
            </figure>
            {{ user.name }}
        </a>
        <div class="box dropdown" :class="{ 'is-open' : openDropdown }">
            <slot></slot>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['thumb', 'user'],
        data() {
            return {
                openDropdown: false
            }
        },
        methods: {
            open () {
                this.openDropdown = !this.openDropdown;
            }
        }
    }
</script>
<style>
    .dropdown {
        box-shadow: 0 0 8px #777;
        display: none;
        left: 25px;
        position: absolute;
        top: 100%;
        z-index: 1000;
    }

    .dropdown.is-open {
        display: block;
    }
</style>