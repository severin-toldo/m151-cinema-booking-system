import '../../../css/component/movie_entry/movie_entry.component.css';

document.addEventListener('DOMContentLoaded', () => {
    const movieListEntries = document.getElementsByClassName('movie-entry');

    for (let i = 0; i < movieListEntries.length; i++) {
        const e = movieListEntries.item(i);
        const movieId = e.dataset.movieId;

        e.addEventListener("click", () => {
            const currentUrl = window.location.href;
            window.location.href = currentUrl.replace('movies', 'movie') + '/' + movieId;
        });
    }
});
