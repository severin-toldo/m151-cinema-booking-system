import '../../../css/pages/lists/abstract_list_view.page.css';

document.addEventListener('DOMContentLoaded', () => {
    const listItems = document.getElementsByClassName('list-group-item');

    for (let i = 0; i < listItems.length; i++) {
        const listItem = listItems.item(i);
        const itemId = listItem.dataset.itemId;
        const fromRoute = listItem.dataset.fromRoute;
        const onClickRoute = listItem.dataset.onClickRoute;

        listItem.addEventListener("click", () => {
            const currentUrl = window.location.href;
            const newUrl = currentUrl.split("/", 3).join("/");
            window.location.href = newUrl + '/' + onClickRoute + '?from=' + fromRoute + '&dataId=' + itemId;
        });
    }
});