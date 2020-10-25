// remove flashes after 3 seconds script
document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        const flashes = document.getElementsByClassName('flash');

        for (let i = 0; i < flashes.length; i++) {
            const flash = flashes.item(i);
            flash.remove();
        }
    }, 3000);
})