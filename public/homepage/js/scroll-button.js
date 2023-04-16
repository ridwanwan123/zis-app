// $(document).ready(function () {
//   $("#scrollTo").click(function () {
//     $('html, body').animate({
//       scrollTop: $(".icon-box").offset().top - 80
//     }, 600);
//   });
// });

$("body #scrollTo").click(function () {
  $("html,body").animate({
    scrollTop: $(".icon-box").offset().top - 80,
    },
    "slow"
  );
});