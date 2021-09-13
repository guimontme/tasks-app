<template>
  <section class="home_page">
    <h1>Tasks</h1>
    <div class="logo_wrapper">
      <img src="@/assets/Logo-tasks.png" class="logo" alt="Tasks" />
    </div>
  </section>
</template>

<script>
// @ is an alias to /src

export default {
  name: "Home",
  components: {},
};
</script>

<style lang="scss">
.home_page {
  display: block;
  text-align: center;
  .logo_wrapper {
    padding: 20px;
    max-width: 450px;
    margin: 20px auto;
    .logo {
      max-width: 100%;
    }
  }
}
</style>
