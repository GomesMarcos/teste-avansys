<template>
  <div>
    <!-- Button trigger modal -->
    <button
      type="button"
      :class="'btn btn-actions ' + btnIcon"
      data-toggle="modal"
      :data-target="`#${id}`"
    >
      <i :class="'icon ' + btnIcon"></i>
      {{ btnLabel }}
    </button>

    <!-- Modal -->
    <div
      class="modal fade"
      :id="id"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modelTitleId"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">{{ title }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid"> {{ message }} </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-actions-modal" data-dismiss="modal">não</button>
            <button type="button" class="btn btn-actions-modal confirm">sim</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    id: String,
    title: String,
    message: String,
    action: String,
    btnLabel: String,
    btnIcon: String,
  },
}
</script>
