import '../../../css/pages/lists/abstract_list_view.page.css';

document.addEventListener('DOMContentLoaded', () => {
    const listItems = document.getElementsByClassName('my-list-group-item');

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

    let currentOrderDirection = 'asc';
    const header = document.getElementById('header');

    header.addEventListener('click', () => {
        const list = document.getElementById('list');
        const newList = list.cloneNode(false);
        const items = [];

        if (currentOrderDirection === 'asc') {
            setCurrentOrderDirection('desc');
        } else {
            setCurrentOrderDirection('asc');
        }

        for (let i = list.childNodes.length; i--;) {
            const item = list.childNodes[i];

            if (item.nodeName === 'LI') {
                items.push(item);
            }
        }

        items.sort((a, b) => {
            const aContent = a.childNodes[0].data;
            const bContent = b.childNodes[0].data;

            if (currentOrderDirection === 'asc') {
                return aContent.localeCompare(bContent);
            } else {
                return bContent.localeCompare(aContent);
            }
        });

        items.forEach(item => newList.appendChild(item));
        list.parentNode.replaceChild(newList, list);
    });

    function setCurrentOrderDirection(orderDirection) {
        const oldText = header.innerText;
        let newText = oldText.substring(0, oldText.length - 1);

        if (orderDirection === 'desc') {
            newText = newText + '↓';
        } else {
            newText = newText + '↑';
        }

        currentOrderDirection = orderDirection;
        header.innerHTML = '<b>' + newText + '</b>';
    }
});