// Load shortcuts
const shortcutsModal = document.getElementById("shortcutsModal");
shortcutsModal.addEventListener("shown.bs.modal", async () => {
    const shortcutsModalBody = document.getElementById("shortcutsModalBody");
    const res = await window.fetch("/plugins/shortcuts");
    shortcutsModalBody.innerHTML = await res.text();
});