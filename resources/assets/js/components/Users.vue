<template>
    <div class="row">

        <div class="ais-search-box">
            <input autocapitalize="off" name="search-box" id="search-box" autocomplete="off" autocorrect="off" placeholder="Search for users" role="textbox" spellcheck="false" type="text" value="" class="ais-search-box--input search-box form-control">
              <span>
                <div class="ais-search-box--powered-by">
                    Search by
                    <a class="ais-search-box--powered-by-link" href="https://www.algolia.com/?utm_source=instantsearch.js&amp;utm_medium=website&amp;utm_content=community.algolia.com&amp;utm_campaign=poweredby" target="_blank">
                        Algolia
                    </a>
                </div>
              </span>
        </div>

        <hr/>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Filter by Country</div>
                <div class="panel-body">
                    <div id="country-container"></div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div id="hits-container"></div>
        </div>

        <div class="col-md-12">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <div id="pagination-container"></div>
                </ul>
            </nav>
        </div>

    </div>
</template>

<script>
    export default {
        ready() {
            this.initSearch();
        },

        methods: {

            initSearch() {
                var search = instantsearch({
                    appId: '9JUTOYSC0P',
                    apiKey: '1a8a0bdc9bf17ec7fea1046d16055136',
                    indexName: 'users',
                    urlSync: true
                });

                search.addWidget(
                        instantsearch.widgets.searchBox({
                            container: '#search-box',
                            placeholder: 'Search for users...'
                        })
                );

                var itemTemplate = '<div class="col-md-4">'+
                        '<div class="panel panel-default user-panel">'+
                        '<a href="/@{{ username }}">'+
                        '<div class="media">'+
                        '<div class="media-left">'+
                        '<img style="max-height: 68px;" class="media-object" src="{{ avatar }}" alt="{{ username }}">'+
                        '</div>'+
                        '<div class="media-body">'+
                        '<h5 class="media-heading">{{ username }}</h4>'+
                        '<i class="fa fa-map-marker" aria-hidden="true"></i> {{ country }}'+
                        '</div>'+
                        '</div>'+
                        '</a>'+
                        '</div>'+
                        '</div>';

                search.addWidget(
                        instantsearch.widgets.hits({
                            container: '#hits-container',
                            templates: {
                                empty: '<div class="panel panel-default text-center">'+
                                '<div class="panel-body">'+
                                '<h4>No results</h4>'+
                                '</div>'+
                                '</div>',
                                item: itemTemplate
                            },
                            hitsPerPage: 50
                        })
                );

                search.addWidget(
                        instantsearch.widgets.pagination({
                            container: '#pagination-container',
                            maxPages: 1000,
                            scrollTo: true
                        })
                );

                search.addWidget(
                        instantsearch.widgets.refinementList({
                            container: '#country-container',
                            attributeName: 'country',
                            operator: 'or',
                            limit: 25,
                            templates: {
//                                header: 'Filter by Country'
                            }
                        })
                );

                search.start();
            }
        }
    }
</script>

<style>
    .search-box {
        width: 100%;
    }
</style>
