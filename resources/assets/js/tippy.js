import tippy from "tippy.js";
import "tippy.js/dist/tippy.css";
import "tippy.js/animations/shift-away-subtle.css";
import "tippy.js/themes/light-border.css";

const initHover = () => {
    const config = {
        allowHTML: true,
        maxWidth: 350,
        interactive: true,
        animation: "shift-away-subtle",
        theme: "light-border",
        delay: [200, 50],
        classList: "popover",
        content: `<div class="p-3"><div class="spinner-border spinner-border-sm bt-spinner text-dark"></div></div>`,
    };

    // User Popover
    tippy(".user-popover", {
        ...config,
        onShow(instance) {
            const id = instance.reference.getAttribute("data-id");
            window
            .fetch(`/plugins/popover/user/${id}`)
            .then((response) => response.text())
            .then((blob) => {
                instance.setContent(blob);
            })
            .catch(() => {
                instance.setContent(`<div class="p-3">Something went wrong!</div>`);
            });
        },
        onHidden(instance) {
            instance.setContent(config.content);
            instance._src = null;
            instance._error = null;
        },
    });

    tippy(".verified", {
        placement: "right",
        animation: "shift-away-subtle",
        content: "Verified",
    });

    tippy(".private", {
        placement: "right",
        animation: "shift-away-subtle",
        content: "Private Profile",
    });
};

const init = () => {
    if (
        // document.getElementsByClassName("user-popover").length > 0 ||
        document.getElementsByClassName("user-popover").length > 0
    ) {
        initHover();
    } else {
        setTimeout(() => {
            init();
        }, 300);
    }
};

init();
