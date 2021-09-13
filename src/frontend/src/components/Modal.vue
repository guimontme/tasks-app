<template>
  <section class="Modal">
    <div class="modal_container">
      <header class="header">
        <slot name="header"></slot>
      </header>
      <div class="modal_body">
        <slot></slot>
      </div>
      <footer class="footer">
        <slot name="footer"></slot>
      </footer>
    </div>
  </section>
</template>

<script>
export default {
  name: "Modal",
};
</script>

<style lang="scss" scoped>
.Modal {
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  width: 100vw;
  height: 100vh;
  background: rgba(#000000, 0.5);
  align-items: center;
  justify-content: center;
  z-index: 10;
  padding: 10px;
  .modal_container {
    display: block;
    padding: 20px;
    background: #fff;
    color: black;
    max-width: 400px;
    max-height: 500px;
    border-radius: 4px;
    .header {
      margin-bottom: 20px;
      padding-bottom: 20px;
      border-bottom: 1px solid #666;
    }

    .modal_body {
      padding: 20px;
    }

    .footer {
      margin-top: 20px;
      padding-top: 10px;
      border-top: 1px solid #666;
    }
  }
}
</style>