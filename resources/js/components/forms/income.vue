<template>
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4">💰 Income</h2>
        <div class="mb-4">
            <label for="income-source" class="text-gray-700">Source</label>
            <input id="income-source" type="text" class="w-full border-2 border-gray-400 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <label for="income-amount" class="text-gray-700">Amount</label>
            <input id="income-amount" type="text" class="w-full border-2 border-gray-400 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <button class="bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 rounded-md shadow-md px-4 py-2 text-white font-semibold">Add Income</button>
    </div>
</template>
