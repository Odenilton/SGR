<script>
export default {
  props: ["auth"],
  name: "vue-body-login",
  created() {
    this.auth === false
      ? (document.body.className = "")
      : (document.body.className =
          "skin-blue sidebar-mini wysihtml5-supported fixed");
  },
  watch: {
    auth() {
      this.auth === false
        ? (document.body.className = "")
        : (document.body.className =
            "skin-blue sidebar-mini wysihtml5-supported fixed");
    }
  },
  render() {
    this.auth === false
      ? (document.body.className = "")
      : (document.body.className =
          "skin-blue sidebar-mini wysihtml5-supported fixed");
  }
};
</script>