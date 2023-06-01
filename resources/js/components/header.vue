<template>
    <header class="py-8 my-6">
        <h1 class="text-gray-900 text-6xl font-bold text-center mb-8 font-poppins mb-3">
            Financial Tracker
        </h1>
        <p class="text-center text-2xl">Take Charge of Your Finances, Simplify Your Money Management</p>
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
    background: linear-gradient(to right, #f7971e, #ffd200);
    filter: blur(99px);
}
</style>
