import hotkeys from "hotkeys-js";

// Shortcut Modal
hotkeys("shift+/", async () => {
    new bootstrap.Modal(document.getElementById("shortcutsModal")).show();
});

// Dark Mode
hotkeys("shift+m", async () => {
    const res = await window.fetch("/darkmode");
    if (res.status === 200) {
        location.reload();
    }
});

// Go to home
hotkeys("shift+h", () => {
    window.location.href = "/";
});

// Go to user profile
hotkeys("shift+u", () => {
    const username = document.getElementById("bt-username").innerHTML.trim();
    window.location.href = "/@" + username;
});

// Go to notifications
hotkeys("shift+n", () => {
    window.location.href = "/notifications";
});

// Go to settings
hotkeys("shift+s", () => {
    window.location.href = "/settings";
});