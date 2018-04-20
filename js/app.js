$(".mobile-menu").click(function() {
  console.log('kotte');
  $(this).toggleClass("change");
  $(".top-menu").toggleClass("show");
});

$('.top-menu a').click(function(){
  console.log('hej');
  $('.show').removeClass('show');
  $('.change').removeClass('change');  

});

// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, "") ==
        this.pathname.replace(/^\//, "") &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $("html, body").animate(
          {
            scrollTop: target.offset().top
          },
          1000,
          function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) {
              // Checking if the target was focused
              return false;
            } else {
              $target.attr("tabindex", "-1"); // Adding tabindex for elements not focusable
              $target.focus(); // Set focus again
            }
          }
        );
      }
    }
  });

  // Adding class 'panel' to topbar after scrolling to sticky position
  let topbar = $('.header-nav'),
  offsetToBody = $('#hero');
  initalOffsetToTop = offsetToBody.offset().top;

  function checkTopBarOffset() {
    let topbarOffsetTop = topbar.offset().top;  
    topbarOffsetTop > initalOffsetToTop ? topbar.addClass('panel') : topbar.removeClass('panel');
  }
  checkTopBarOffset();
  $(window).on('scroll', checkTopBarOffset);






var contactForm = new Vue({
  el: "form",
  data: {
    name: "Joakim Isaksson",
    email: "joakim.isaksson@spinit.se",
    phone: 0704202624,
    message: "Hej! Jag tycker det låter jättespännande med den här produkten. Jag vill veta mer! Hör gärna av dig :)",
    errorName: false,
    errorEmail: false,
    errorPhone: false,
    errorMessage: false,
    errors: [],
    success: false
  },
  methods: {
    checkForm: function(e) {
      e.preventDefault();
      
      this.errors = [];

      if(!this.name) {
        this.errors.push("Name requered..."); 
        this.errorName = true;
      } else {
        this.errorName = false
      };

      if (!this.email) {
        this.errors.push("Need your email to wrote back...");
        this.errorEmail = true;
      } else if (!this.validEmail(this.email)) {
        this.errors.push("Valid email is required");
        this.errorEmail = true;
      } else {
        this.errorEmail = false;
      }

      if(!this.phone) {
        this.errors.push('Phone number please...')
        this.errorPhone = true;
      } else {
        this.errorPhone = false;
      };

      if(!this.message) {
        this.errors.push('Message please...') 
        this.errorMessage = true;
      } else  {
        this.errorMessage = false;
      };
      
      !this.errors.length ? this.ajaxCall(e) : console.log('nooo');

      e.preventDefault();
    },
    validEmail: function(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    },
    ajaxCall: function(e) {
     e.preventDefault();
      t = this;      
      var url=$('form').attr('action'),
          data= {name: t.name, email: t.email, message: t.message};
          debugger;
      $.ajax({
          url:url,
          type:'post',
          data:data,
          success:function(){
            console.log('success');
              t.success = true;
              alert(data);
              console.log(data);
             },
            error:function() {
              t.errors.push('Something went wrong...');
              console.log(data, 'fail');
              console.log(url);
            }
          });
  
   }
  }
});
