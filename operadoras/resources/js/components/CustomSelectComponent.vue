<template>
  <div class="select-wrapper mr-3 mb-0">
    <label class="label-select">{{ labelTagText }}</label>
    <div class="select" @click="showOptions(selectTagId)">
      <span>{{ filter.nome }}</span>
      <div :id="selectTagId" class="options">
        <p @click="filter = { value: 'all', nome: filterNameAll }" value="all">{{
          filterNameAll
        }}</p>
        <p
          @click="setFilter(filter)"
          v-for="filter of filterList"
          :key="filter.id"
          :value="filter.id"
          >{{ filter.nome }}</p
        >
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    filter: Object,
    filterList: Array,
    filterNameAll: String,
    selectTagId: String,
    labelTagText: String,
  },

  methods: {
    showOptions(id) {
      const options = document.getElementById(id)
      options.classList.toggle('show')
    },
    setFilter(filter) {
      this.filter = filter
      this.$emit('updatedFilter', this.filter)
      this.$emit('updatedFilterList', this.filterList)
    },
  },
}
</script>
