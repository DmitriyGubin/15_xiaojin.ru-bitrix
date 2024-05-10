let CDevBxSearchTitle = {

    init: function(params)
    {
        this.params = params;

        this.container = document.getElementById(this.params.CONTAINER_ID);
        this.prevSearch = '';
        this.entity = {
            searchInput: false,
            searchResult: false,
        };
        this.timer = false;

        devbx.utils.bindObjEvents(this.container, this, '', ['change','input']);
        devbx.utils.getNodeEntities(this.container, this.entity);

        return this;
    },

    searchInputInput: function(e, target)
    {
        this.searchInputChange(e, target);
    },

    searchInputChange: function(e, target)
    {
        if (this.timer)
            clearTimeout(this.timer);

        let value = this.entity.searchInput.value.trim();
        if (value.length<this.params.MIN_QUERY_LEN)
            return;

        this.timer = setTimeout(BX.proxy(this.ajaxSearch, this), 300);
    },

    ajaxSearch: function() {

        this.timer = false;

        let value = this.entity.searchInput.value.trim();
        if (value.length<this.params.MIN_QUERY_LEN)
            return;

        if (value == this.prevSearch)
            return;

        this.prevSearch = value;

        BX.ajax({
            url: this.params.AJAX_PAGE,
            method: 'POST',
            data: {
                ajax_call: 'y',
                INPUT_ID: this.params.INPUT_ID,
                q: value,
                l: this.params.MIN_QUERY_LEN,
            },
            onsuccess: BX.proxy(this.ajaxResult, this)
        });
    },

    ajaxResult: function(result)
    {
        this.entity.searchResult.innerHTML = result;
    },

};