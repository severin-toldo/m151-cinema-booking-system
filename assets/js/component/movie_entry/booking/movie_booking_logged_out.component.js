document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('loggedoutUserBookBtn');
    btn.addEventListener('click', () => {
        const currentUrl = window.location.href;
        window.location.href = currentUrl.split("/", 3).join("/") + "/login";
    });
})