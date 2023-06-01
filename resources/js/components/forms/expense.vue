<template>
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4">💸 Expense</h2>
        <div class="mb-4">
            <label for="expense-category" class="text-gray-700">Category</label>
            <select id="expense-category" class="w-full border-2 border-gray-400 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Select a category</option>
                <option value="food">Food</option>
                <option value="utilities">Utilities</option>
                <option value="entertainment">Entertainment</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="expense-amount" class="text-gray-700">Amount</label>
            <input id="expense-amount" type="text" class="w-full border-2 border-gray-400 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <button class="bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 rounded-md shadow-md px-4 py-2 text-white font-semibold">Add Expense</button>
    </div>
</template>
