<template>
    <div class="form-group w-32">
        <VueMultiselect
            placeholder="Currency"
            :close-on-select="true"
            :clear-on-select="false"
            :model-value="selectedCurrency"
            :options="currencies"
            :searchable="true"
            track-by="code"
            label="code"
            selectLabel=""
            deselectLabel=""
            selectedLabel=""
            @update:model-value="updateCurrency">
        </VueMultiselect>
    </div>
</template>

<script>
import {mapState, mapActions} from 'vuex';
import VueMultiselect from 'vue-multiselect'

export default {
    name: 'SelectCurrency',
    components: {
        VueMultiselect,
    },
    computed: mapState('currency', [
        'currencies',
        'selectedCurrency',
    ]),
    methods: mapActions('currency', [
        'getCurrencies',
        'updateCurrency',
    ]),
    mounted() {
        this.getCurrencies();
    },
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
