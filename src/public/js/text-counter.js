document.addEventListener("DOMContentLoaded", () => {
    const textarea = document.getElementById("auto-resize-textarea");
    const counter = document.getElementById("text-counter");
    const maxChars = 140;

    textarea.addEventListener("input", () => {
        const currentLength = textarea.value.length;

        if (currentLength > 0) {
            counter.classList.remove("hidden");
        } else {
            counter.classList.add("hidden");
        }

        counter.textContent = `${currentLength}/${maxChars}`;
        if (currentLength > maxChars) {
            counter.classList.add("text-rose-600");
        } else {
            counter.classList.remove("text-rose-600");
        }
    });
});
