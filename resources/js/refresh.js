(() => {
    const entries = performance.getEntriesByType("navigation");

    if (entries[0].type === "back_forward") {
        location.reload(true);
    }
})();