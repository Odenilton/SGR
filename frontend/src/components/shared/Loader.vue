<template>
	<div class="modal fade in" id="modal-default" :style="{display: loading ? 'block' : 'none'}">
          <div class="modal-dialog" style="margin: 15% 40%">
            <div class="modal-content" style="width:50%;">
              <div class="modal-body" style="width: 100%; padding: 50px; margin: 0 auto;">
                <clip-loader style="text-align: center;" :loading="loading" :color="'#3c8dbc'" :size="'35pt'"></clip-loader>
                <br />
                <h3 style="margin: 0 auto; text-align: center;">&nbsp;Aguarde...</h3>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
</template>

<script>
import ClipLoader from "vue-spinner/src/ClipLoader.vue";

import { mapGetters } from "vuex";

export default {
  components: {
      clipLoader: ClipLoader
  },
  computed: {
    ...mapGetters({
      loading: "loading"
    })
  }
};
</script>
