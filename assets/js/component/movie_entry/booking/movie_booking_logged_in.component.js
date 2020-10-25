function setSelectedSeats() {
    const movieListEntries = document.getElementsByClassName('seat-btn');
    const selectedSeatIds = [];

    for (let i = 0; i < movieListEntries.length; i++) {
        const e = movieListEntries.item(i);

        if (e.checked && !e.disabled) {
            selectedSeatIds.push(e.dataset.seatId);
        }
    }

    // save selected seats into cookies. Will be retrieved later by controller and validated again
    document.cookie = "selectedSeats=" + JSON.stringify(selectedSeatIds) + "; path=/";
}

document.addEventListener('DOMContentLoaded', () => {
    const btns = document.getElementsByClassName('book-btn');

    for (let i = 0; i < btns.length; i++) {
        const btn = btns.item(i);
        btn.addEventListener('click', () => setSelectedSeats());
    }
})