<template>
  <div>
    <form
      @submit.prevent="cadastrarOperadora"
      class="d-flex justify-content-center align-items-center"
    >
      <button type="submit" class="btn btn-actions ok">ok</button>
      <button class="btn btn-actions cancel" @click.prevent="resetForm">
        <img src="Icons.cancel" />
      </button>
      <div class="form-group">
        <label for="nome_operadora">Nome</label>
        <input
          type="text"
          class="form-control"
          name="nome_operadora"
          id="nome_operadora"
          aria-describedby="nome_operadora_helper"
          placeholder="Operadora XPTO"
        />
        <small id="nome_operadora_helper" class="form-text text-muted"
          >Insira aqui o nome da Operadora</small
        >
      </div>
      <div class="form-group">
        <label for="descricao_operadoa">Descrição</label>
        <input
          type="text"
          class="form-control"
          name="descricao_operadoa"
          id="descricao_operadoa"
          aria-describedby="descricao_operadoa_id"
          placeholder="Detalhes da Operadora"
        />
        <small id="descricao_operadoa_id" class="form-text text-muted"
          >Insira aqui a descrição da Operadora</small
        >
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      operadoras: [],
      status: [],
    }
  },

  methods: {
    cadastrarOperadora() {},
    resetForm() {},
  },

  mounted() {
    axios
      .get('/api/operadoras')
      .then((res) => {
        this.operadoras = res.data
      })
      .catch((error) => {
        console.log(error)
      })

    axios
      .get('/api/status')
      .then((res) => {
        this.status = res.data
      })
      .catch((error) => {
        console.log(error)
      })
  },
}
</script>
