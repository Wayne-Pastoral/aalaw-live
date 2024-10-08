$(function() {
    const itemsToShow = 6;
    const $singlePanels = $(".single-panel.article__item");
    
    // Initially show only the first 6 items
    $singlePanels.slice(0, itemsToShow).addClass('display-article');
    
    // Click event for the "Load More" button
    $("#loadMore").on('click', function(e) {
        e.preventDefault();
        
        // Show all remaining hidden items
        $singlePanels.addClass('display-article');
        
        // Remove the "Load More" button
        $("#loadMore").remove();
    });
    
    // If there are fewer or equal to itemsToShow, remove the "Load More" button
    if ($singlePanels.length <= itemsToShow) {
        $("#loadMore").remove();
    }
});


