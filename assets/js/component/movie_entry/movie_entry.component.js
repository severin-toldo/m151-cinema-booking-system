import '../../../css/component/movie_entry/movie_entry.component.css';

document.addEventListener('DOMContentLoaded', () => {
    const presentationRadios = document.getElementsByClassName('presentationRadio');

    for (let i = 0; i < presentationRadios.length; i++) {
        const e = presentationRadios.item(i);
        const selectedPresentationId = e.dataset.presentationId;

        e.addEventListener("click", () => {
            const currentUrl = window.location.href;
            let newUrl = currentUrl.substring(0, currentUrl.indexOf('?'));
            window.location.href = newUrl + '?presId=' + selectedPresentationId + '#movie-booking';
        });
    }
});