<nav class="table-of-contents">
    <h2>Table of Contents</h2>
    <ul>
    </ul>
 </nav>
<script>
jQuery(document).ready(function() {
    var tableOfContents = jQuery(".table-of-contents");
    var ulElement = tableOfContents.find("ul");
    ulElement.html('');
    var h2Elements = jQuery("h2.wp-block-heading");

    h2Elements.each(function(index, element) {
        var handle = generateHandle(jQuery(element).text());
        jQuery(element).attr('id', handle);
        ulElement.append("<li><a href='#" + handle + "/' onclick='onscrolltoc(\"" + handle + "\")'>" + jQuery(element).text() + "</a></li>");
    });
});

function generateHandle(text) {
    return text.trim()
               .toLowerCase()
               .replace(/[^a-z0-9\s-]/g, '')
               .replace(/\s+/g, '-')
               .replace(/-+/g, '-');
}

function onscrolltoc(handle) {
    var target = jQuery('#' + handle);
    jQuery('html, body').animate({
        scrollTop: target.offset().top - 150
    }, 500, function() {
        window.location.hash = handle + '/';
    });
}
</script>