$(function(){
    $(".search-form").submit(function(){
        var $this = $(this), url = $this.attr("data-url"), keyword = $("#search-input").val();
        //$this.attr("action", url+"/"+keyword);
        location.href = url + "/" + keyword;
        return false;
    });
});