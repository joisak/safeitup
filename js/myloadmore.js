jQuery(function($) {
  $(document).ready(function() {
    var currentPage = 0;

    function ajaxCall(currentPage) {
      currentPage === 0
        ? $("#prev").addClass("disabled")
        : $("#prev").removeClass("disabled");
      currentPage >= load_more_params.max_page
        ? $("#next").addClass("disabled")
        : $("#next").removeClass("disabled");


      data = {
        action: "loadmore",
        query: load_more_params.posts, // that's how we get params from wp_localize_script() function
        page: currentPage
      };
      
      $.ajax({
        url: load_more_params.ajaxurl, // AJAX handler
        data: data,
        type: "POST",
        beforeSend: function(xhr) {
          $("#loading").addClass("spinner");
          $(".news-box").remove();
        },
        success: function(data) {
          $("#loading").removeClass("spinner");
          if (data) {
            $(".news-container").append(data);
          }
        },
        error: function(data) {
          console.log("no data...");
        }
      });
    }

    //Checks if its startpage
    if ($(".row").hasClass("news-container")) {
      ajaxCall(currentPage);
      $("#next, #prev").click(function() {
        currentPage =
          $(this).attr("id") == "next" ? currentPage + 1 : currentPage - 1;
        ajaxCall(currentPage);
      });
    }
  });
});
