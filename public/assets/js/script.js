document.addEventListener("DOMContentLoaded", () => {
    const addTaskModal = document.getElementById("addTaskModal");
    addTaskModal.addEventListener("show.bs.modal", (e) => {
        const btn = e.relatedTarget;
        const taskId = btn.getAttribute("data-list");
        document.getElementById("taskListId").value = taskId;
    });
});
