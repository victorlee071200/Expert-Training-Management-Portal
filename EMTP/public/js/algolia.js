(function() {
    var client = algoliasearch(
        "F7BPU0S282",
        "5e8ac6638a7294844897f87189ad806d"
    );
    var index = client.initIndex("programs");
    var enterPressed = false;
    //initialize autocomplete on search input (ID selector must match)
    autocomplete(
            "#aa-search-input", { hint: false }, {
                source: autocomplete.sources.hits(index, { hitsPerPage: 10 }),
                //value to be displayed in input control after user's suggestion selection
                displayKey: "name",
                //hash of templates used when rendering dataset
                templates: {
                    //'suggestion' templating function used to render a single suggestion
                    suggestion: function(suggestion) {
                        const markup = `
                        <div class="algolia-result">
                            <span>
                                <img src="${window.location.origin}/storage/program_thumbnails/${suggestion.thumbnail_path}" alt="img" class="algolia-thumb">
                                ${suggestion._highlightResult.name.value}
                            </span>
                            <span>${suggestion.type}</span>
                            <span>MYR${suggestion.price}</span>
                        </div>
                    `;

                        return markup;
                    },
                    empty: function(result) {
                        return (
                            'Sorry, we did not find any results for "' +
                            result.query +
                            '"'
                        );
                    },
                },
            }
        )
        .on("autocomplete:selected", function(event, suggestion, dataset) {
            window.location.href =
                window.location.origin + "/client/program/" + suggestion.id;
            enterPressed = true;
        })
        .on("keyup", function(event) {
            if (event.keyCode == 13 && !enterPressed) {
                window.location.href =
                    window.location.origin +
                    "/search-algolia?q=" +
                    document.getElementById("aa-search-input").value;
            }
        });
})();
