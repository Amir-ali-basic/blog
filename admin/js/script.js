$(document).ready(function () {
  $('#summernote').summernote({
    height: 200,
  });
});

$(document).ready(function () {
  $('#selectAllBox').click(function (e) {
    if (this.checked) {
      $('.checkBoxes').each(function () {
        this.checked = true;
      });
    } else {
      this.checked = false;
    }
  });
  // var divBox = "<div id='load-screen'><div id='loading'></div></div>";
  // $('body').prepend(divBox);
  // $('#load-screen')
  //   .delay(700)
  //   .fadeOut(600, function () {
  //     $(this).remove;
  //   });
});
