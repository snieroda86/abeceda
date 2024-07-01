jQuery(document).ready(function($) {
  // Boottrsap tooltip init
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

  /*
  ** cart sidebar close/open
  */
  $('.shopping-cart-icon-sidecart').click(openOrCloseNav);
  $('.sidebar-cart-overlay').click(closeNav);

  function openOrCloseNav() {
      if ($(this).hasClass('sidebar-open')) {
          closeNav();
      } else {
          openNav();
      }
  }

  function openNav() {
      $('.shopping-cart-icon-sidecart').addClass('sidebar-open');
      $("#shopping-cart-sidebar-sn").css("margin-right", "0");
      $('.sidebar-cart-overlay').addClass('cart-overlay-active');
      $('.cart-icon-hw').addClass('cart-active');
  }

  function closeNav() {
      $('.shopping-cart-icon-sidecart').removeClass('sidebar-open');
      $("#shopping-cart-sidebar-sn").css("margin-right", "-360px");
      $('.sidebar-cart-overlay').removeClass('cart-overlay-active');
      $('.cart-icon-hw').removeClass('cart-active');
  }
  /*
  ** Cart sidebar scroll to top on page scroll
  */

  var sidebar = $('.sidebar-sn');
  // sidebar-cart-overlay
  var sidebarOverlay = $('.sidebar-cart-overlay');

  var originalTop = parseInt(sidebar.css('top')); 

  $(window).scroll(function() {
      var scrollTop = $(this).scrollTop(); 
      var newTop = originalTop - scrollTop;

      if (newTop > 0) {
          sidebar.css('top', newTop + 'px');
          sidebarOverlay.css('top', newTop + 'px');

      } else {
          sidebar.css('top', '0');
          sidebarOverlay.css('top', '0');
          
      }
  });


})