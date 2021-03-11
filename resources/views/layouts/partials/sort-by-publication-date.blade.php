<form id="sort-by-form">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="sort_by" id="sort_by"
               value="{{ $sortByPublicationDate ? '' : 'publication_date' }}"
               {{ $sortByPublicationDate ? ' checked' : '' }} onchange="document.getElementById('sort-by-form').submit()">

        <label class="form-check-label" for="sort_by">
            Sort By Publication date
        </label>
    </div>
</form>
