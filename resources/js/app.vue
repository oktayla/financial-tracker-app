<template>
    <div class="container mx-auto py-8 blurry-bg">
        <Header />

        <main>
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
import Header from './components/header.vue';

export default {
    components: {
        Header,
    }
}
</script>
