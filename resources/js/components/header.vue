<template>
    <header class="py-8 my-6">
        <h1 class="text-6xl text-transparent bg-clip-text font-bold text-center font-poppins mb-3">
            Financial Tracker
        </h1>
        <p class="text-center text-white text-lg">Take Charge of Your Finances, Simplify Your Money Management</p>
    </header>
</template>

<style>
header {
    position: relative;
    z-index: 0;
}
header:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    width: 100%;
    height: 100%;
    background: linear-gradient(to right, #1ef7d6, #35ff57);
    filter: blur(300px);
}
header h1 {
    background-image: linear-gradient(to right, #ffff00 0%, #41ff00 100%);
}
</style>
