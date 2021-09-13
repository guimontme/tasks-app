<template>
  <section class="Tasks">
    <h1>Tasks</h1>
    <FormTask />
    <div class="TaskList" v-if="user_tasks.length > 0">
      <TaskItem
        v-for="task in user_tasks"
        :key="task.id"
        :task="task"
      ></TaskItem>
    </div>
  </section>
</template>

<script>
import TaskItem from "@/components/TaskItem.vue";
import FormTask from "../components/FormTask.vue";
import { mapState, mapActions } from "vuex";

export default {
  computed: {
    ...mapState(["user_tasks", "user"]),
  },
  components: {
    TaskItem,
    FormTask,
  },
  methods: {
    ...mapActions(["getUserTasks"]),
  },
  created() {
    this.getUserTasks();
  },
  watch: {},
};
</script>

<style lang="scss">
.Tasks {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  h1 {
    text-align: center;
    font-size: 3rem;
    margin-bottom: 2rem;
  }
  .TaskList {
    margin-top: 20px;
  }
}
</style>
