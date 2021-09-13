<template>
  <div class="task" :class="{ completed: task.status, hidden: hidden }">
    <input
      type="checkbox"
      v-model="task.status"
      @change="changeTask(task.id)"
    />
    <div class="data">
      <input
        type="text"
        v-model="task.title"
        :disabled="task.status === 1 || task.status === true"
        @change="changeTask(task.id)"
      />
      <input
        type="date"
        v-model="task.conclusion"
        :disabled="task.status === 1 || task.status === true"
        @change="changeTask(task.id)"
      />
    </div>
    <button class="delete" @click="deleteTask(task.id)">delete</button>
  </div>
</template>

<script>
import { api } from "@/services";
export default {
  name: "TaskItem",
  data() {
    return {
      hidden: false,
    };
  },
  props: ["task"],
  methods: {
    async deleteTask(id) {
      this.hidden = true;
      api.delete(`/tasks/${id}`).then(() => {
        this.$store.dispatch("getUserTasks");
      });
    },
    async changeTask(id) {
      await api.put(`/tasks/${id}`, this.task).then(() => {
        this.$store.dispatch("getUserTasks");
      });
    },
  },
};
</script>

<style lang="scss">
.task {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  justify-content: space-between;
  max-width: 100%;
  margin: 10px 0 20px;
  padding: 15px;
  box-shadow: 0 2px 6px rgba(#92374d, 0.4);
  border-radius: 4px;
  background: #fff;
  position: relative;
  transition: all 0.2s ease-in;
  input {
    border: none;
    margin: 0 5px;
    font-weight: 700;

    &[type="date"],
    &[type="text"] {
      display: inline-block;
      width: 200px;
      margin-right: 20px;
      &:focus {
        box-shadow: 0 2px 6px rgba(#92374d, 0.8);
        outline: none;
      }
    }
    &[type="date"] {
      background: #fff;
      margin-right: 40px;
    }
    &[type="checkbox"] {
      cursor: pointer;
      padding: 0;
      background: #ccc;
      margin: 0;
      appearance: none;
      -webkit-appearance: none;
      &:focus {
        box-shadow: transparent;
        transform: scale(1);
        outline: none;
      }

      &,
      &:checked::before {
        height: 20px;
        width: 20px;
        border-radius: 4px;
      }

      &:checked::before {
        content: "\2713";
        text-align: center;
        vertical-align: middle;
        color: #fff;
        display: inline-block;
        background: #777;
      }
    }
  }
  &.completed {
    opacity: 0.5;
    background: #555;
    input {
      text-decoration: line-through;
      font-weight: 300;
      border: none;
      color: #999;
      background: #555;
      overflow: none;
      border: none;
    }
  }
  .delete {
    text-indent: 0px;
    background: #92374d;
    color: #fff;
    line-height: 1.5;
    padding: 0;
    font-size: 0.8rem;
    width: 20px !important;
    height: 20px !important;
    min-height: 20px;
    border-radius: 10px;
    overflow: hidden;
    position: absolute;
    right: 10px;
    &::before {
      content: "\1F5D9";
      color: #fff;
      display: inline-block;
    }
  }
  &.hidden {
    display: none;
  }
}
</style>
