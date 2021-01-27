<template>
  <div class="container">
    <div class="title-wrapper mb-5 pb-3">
      <h1 class="title">MANTER OPERADORA</h1>
    </div>
    <div class="card card-table">
      <div class="card-table-row">
        <!-- SELECTS -->
        <select-component
          :filter="operadora"
          :filterList="operadoras"
          selectTagId="optionsOperadoras"
          labelTagText="LISTAR OPERADORAS"
          filterNameAll="Todas"
          @updatedFilter="operadora = $event"
          @updatedFilterList="operadoras = $event"
        ></select-component>

        <select-component
          select-component
          :filter="status"
          :filterList="statuses"
          selectTagId="optionsStatuses"
          labelTagText="STATUS"
          filterNameAll="Todos"
          @updatedFilter="status = $event"
        ></select-component>
      </div>

      <div class="card-table-row">
        <button class="btn btn-new mt-5 mb-4">+ novo</button>
      </div>

      <div class="cart-table-row d-flex align-items-center mb-3">
        <div class="form-check mr-3">
          <label class="form-check-label">
            <input
              type="checkbox"
              class="form-check-input"
              name="checkAll"
              id="checkAll"
              :value="allChecked"
            />
            Marcar todos
          </label>
        </div>
        <div class="mr-3">
          <modal-confirmacao-component
            title="TEM CERTEZA QUE DESEJA EXCLUIR ESTE ITEM?"
            message="Ao excluir este item você só poderá consulta-lo, mas não poderá mais reativar-lo."
            action="delete"
            btnLabel="EXCLUIR"
            btnIcon="trash"
            id="asd"
          ></modal-confirmacao-component>
        </div>
        <div class="mr-3">
          <modal-confirmacao-component
            title="TEM CERTEZA QUE DESEJA DESATIVAr ESTE ITEM?"
            message="Ao desativar este item você só poderá consulta-lo, mas não poderá mais reativar-lo."
            action="changeStatus"
            btnLabel="HABILITAR E DESABILITAR"
            btnIcon="config"
            id="qwe"
          ></modal-confirmacao-component>
        </div>
      </div>

      <!-- FORM -->
      <!-- <form
        @submit.prevent="cadastrarOperadora"
        class="d-flex justify-content-center align-items-center d-none"
      >
        <table>
          <tbody>
            <tr>
              <td class="table-actions">
                <button type="submit" class="btn btn-actions-form ok">ok</button>
                <button class="btn btn-actions-form cancel" @click.prevent="resetForm">
                </button>
              </td>
              <td>
                <div class="form-group">
                  <label for="nome_operadora">Nome</label>
                  <input
                    :v-model="form.nome"
                    type="text"
                    class="form-control"
                    name="nome_operadora"
                    id="nome_operadora"
                    aria-describedby="nome_operadora_helper"
                    placeholder="Operadora XPTO"
                  />
                  <small id="nome_operadora_helper" class="form-text text-muted">
                    Insira aqui o nome da Operadora
                    {{ form.nome }}
                  </small>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <label for="descricao_operadoa">Descrição</label>
                  <input
                    :v-model="form.descricao"
                    type="text"
                    class="form-control"
                    name="descricao_operadoa"
                    id="descricao_operadoa"
                    aria-describedby="descricao_operadoa_id"
                    placeholder="Detalhes da Operadora"
                  />
                  <small id="descricao_operadoa_id" class="form-text text-muted">
                    Insira aqui a descrição da Operadora
                    {{ form.descricao }}
                  </small>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </form> -->
      <table class="table">
        <thead>
          <tr>
            <th></th>
            <th>Operadora</th>
            <th>Descrição</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="operadora in operadoras" :key="operadora.id">
            <td scope="row"></td>
            <td>{{ operadora.nome }}</td>
            <td>{{ operadora.descricao }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import SelectComponent from './SelectComponent.vue'
import ModalConfirmacaoComponent from './ModalConfirmacaoComponent.vue'

export default {
  components: { SelectComponent, ModalConfirmacaoComponent },
  data() {
    return {
      operadoras: [],
      statuses: [],
      form: {
        nome: '',
        descricao: '',
        status_id: 1,
      },
      operadora: {
        nome: 'Todas',
        value: 'all',
      },
      status: {
        nome: 'Todos',
        value: 'all',
      },
      allChecked: false,
    }
  },

  methods: {
    cadastrarOperadora() {
      console.log('form', this.form)
    },
    resetForm() {},
    showOptions(id) {
      const options = document.getElementById(id)
      options.classList.toggle('show')
    },
    // setOperadora(operadora) {
    //   this.operadora = operadora
    // },
    // setStatus(status) {
    //   this.status = status
    // },
  },

  mounted() {
    // Trazendo informações de todas as operadoras
    axios
      .get('/api/operadoras')
      .then((res) => {
        this.operadoras = res.data
        console.log('this.operadoras', this.operadoras)
      })
      .catch((error) => {
        console.log(error)
      })

    // Trazendo informações de todos os status
    axios
      .get('/api/status')
      .then((res) => {
        this.statuses = res.data
      })
      .catch((error) => {
        console.log(error)
      })
  },
}
</script>
