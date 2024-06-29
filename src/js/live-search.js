document.addEventListener('DOMContentLoaded', function () {
    var searchInput = document.getElementById('live-search-input');
    var resultsDiv = document.getElementById('search-results');
    var searchForm = document.getElementById('live-search-form');

    searchInput.addEventListener('keyup', function () {
        var query = searchInput.value.trim();

        if (query.length >= 2) {
            searchForm.classList.add('rounded-b-none');
            resultsDiv.style.display = "block";
            var xhr = new XMLHttpRequest();
            xhr.open('GET', live_search_params.ajax_url + '?action=live_search&query=' + encodeURIComponent(query), true);

            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 400) {
                    resultsDiv.innerHTML = xhr.responseText;
                }
            };

            xhr.onerror = function () {
                console.error('Error during AJAX request');
            };

            xhr.send();
        } else {
            resultsDiv.innerHTML = '';
            resultsDiv.style.display = "none";
            searchForm.classList.remove('rounded-b-none');
        }
    });
});