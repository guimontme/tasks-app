<template>
  <div class="FormTask">
    <label>Add a task</label>
    <input type="text" placeholder="Title" v-model="title" required />
    <input
      type="date"
      placeholder="Date of conclusion"
      v-model="conclusion"
      required
    />
    <button @click="addTask">Add</button>
  </div>
</template>

<script>
import { mapActions, mapState } from "vuex";
export default {
  name: "FormTask",
  data() {
    return {
      title: "",
      conclusion: "",
    };
  },
  computed: {
    ...mapState(["user"]),
  },
  methods: {
    ...mapActions(["addUserTasks"]),
    addTask() {
      if (this.title !== "" && this.conclusion !== "") {
        this.addUserTasks({
          title: this.title,
          status: 0,
          conclusion: this.conclusion,
          user_id: this.user.id,
        });
      }
    },
  },
};
</script>

<style lang="scss">
.FormTask {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-bottom: 20px;
  border-bottom: 1px solid rgba(#92374d, 0.4);
  > * {
    margin: 0 4px;
  }
  label {
    display: block;
  }
  input {
    display: block;
    width: 180px;
    background: #fff;
    box-shadow: 0 2px 6px rgba(#92374d, 0.4);
    border: none;
    transition: all 0.3s ease;
    &:focus {
      box-shadow: 0 2px 6px rgba(#92374d, 0.8);
      outline: none;
      transform: scale(1.1);
    }
  }

  button {
    display: inline-block;
    border: none;
    cursor: pointer;
    color: #fff;
    border-radius: 4px;
    background: #14248a;
  }
}
</style>
