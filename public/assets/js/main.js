$(function () {
  /* loader */
  $(window).on("load", function () {
    $("#pgLoader").fadeOut("slow"); // Hide loader when page fully loaded
  });

  /* footer mobile view dropdown */
  $(document).on("click", "footer .heading", function () {
    // Check if the screen width is 767px or less
    if ($(window).width() <= 767) {
      var $list = $(this).siblings(".list"); // The corresponding .list for the clicked .heading
      var $icon = $(this).find(".fa-angle-down"); // The icon inside the clicked .heading

      // If the .list is already visible, close it
      if ($list.is(":visible")) {
        $list.slideUp(); // Close the list
        $icon.removeClass("rotate"); // Remove the rotation from the icon
      } else {
        // Otherwise, close all other open .list elements
        $("footer .list").slideUp(); // Close all other .list elements
        $("footer .fa-angle-down").removeClass("rotate"); // Reset rotation on all icons

        // Open the clicked .list
        $list.slideDown(); // Open the corresponding .list
        $icon.addClass("rotate"); // Add rotation to the clicked icon
      }
    }
  });

  // Detect scroll event
  $(window).on("scroll", function () {
    if ($(window).scrollTop() > 0) {
      $("header").addClass("header-scrolled"); // Add shadow when scrolled
    } else {
      $("header").removeClass("header-scrolled"); // Remove shadow when at the top
    }
  });

  // trusted-by logos
  $(".trusted-by .slider").slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1500,
    arrows: false,
    dots: false,
    pauseOnHover: false,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 4,
        },
      },
      {
        breakpoint: 520,
        settings: {
          slidesToShow: 3,
        },
      },
    ],
  });

  // Listen for a change event on the file input with id "uploadFile"
  $(document).on("change", "#uploadFile", function () {
    var fileInput = $("#uploadFile")[0]; // Reference the file input
    if (fileInput.files && fileInput.files[0]) {
      var fileName = fileInput.files[0].name; // Get the name of the selected file
      $('label[for="uploadFile"] p').text(fileName); // Update the text in the <p> inside the label
      $('.delete-icon').css('display', 'flex'); // Show the delete button
    }
  });

  $(document).on("click", ".delete-image-btn", function (e) {
    e.preventDefault();
    $("#uploadFile").val(""); // Clear the file input value
    $('label[for="uploadFile"] p').text("UPLOAD YOUR DOCUMENT FILE"); // Reset the label text
    $('.delete-icon').css('display', 'none');
  });

    // Listen for a change event on the file input with id "uploadFile"
    $(document).on("change", "#additionalFile", function () {
        var fileInput = $("#additionalFile")[0]; // Reference the file input
        if (fileInput.files && fileInput.files[0]) {
          var fileName = fileInput.files[0].name; // Get the name of the selected file
          $('label[for="additionalFile"] p').text(fileName); // Update the text in the <p> inside the label
          $('.delete-icon-2').css('display', 'flex'); // Show the delete button
        }
      });

      $(document).on("click", ".delete-image-btn-2", function (e) {
        e.preventDefault();
        $("#additionalFile").val(""); // Clear the file input value
        $('label[for="additionalFile"] p').text("UPLOAD ADDITIONAL DOCUMENTS"); // Reset the label text
        $('.delete-icon-2').css('display', 'none');
      });

  // When the value of the dropdown with id "contactCategory" changes
  $("#contactCategory").on("change", function () {
    // Check if the selected value is "other"
    if ($(this).val() === "other") {
      // If "other" is selected, show the input field with id "otherInput"
      $("#otherInput").show();
    } else {
      // If any other option is selected, hide the input field and clear its value
      $("#otherInput").hide().val("");
    }
  });

  // On scroll or resize event
  $(window).on("scroll resize", function () {
    // Calculate half of the document height
    var halfScreenHeight = $(document).height() / 2;

    // Check if the window width is greater than or equal to 992px (desktop view)
    if ($(window).width() >= 992) {
      // If scrolled more than half of the page height, show the "go up" button
      if ($(this).scrollTop() > halfScreenHeight) {
        $("#goUp").fadeIn();
      } else {
        // If scrolled less than half of the page height, hide the "go up" button
        $("#goUp").fadeOut();
      }
    } else {
      // On smaller screens, always hide the "go up" button
      $("#goUp").fadeOut();
    }
  });

  // On click of the "go up" button, animate scroll to the top of the page
  $("#goUp").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 200); // Scroll to the top in 200ms
    return false; // Prevent default action
  });

  $(document).on("click", ".sal-role", function() {
    let salRole = $(this).text();
    $(this).closest('.dropdown').find('.salutation').text(salRole);
    $(this).closest('.dropdown').find('.salutation').siblings('input').val(salRole);
  });
});
