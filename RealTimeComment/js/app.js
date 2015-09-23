/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function() {
  $('#commentform').submit(handleSubmit);
});

function handleSubmit() {
  var form = $(this);
  var data = {
    "comment_author": form.find('#comment_author').val(),
    "email": form.find('#email').val(),
    "comment": form.find('#comment').val(),
    "comment_post_ID": form.find('#comment_post_ID').val()
  };

  postComment(data);

  return false;
}

function postComment(data) {
  $.ajax({
    type: 'POST',
    url: 'post_comment.php',
    data: data,
    headers: {
      'X-Requested-With': 'XMLHttpRequest'
    },
    success: postSuccess,
    error: postError
  });
}

function postSuccess(data, textStatus, jqXHR) {
  // add comment to UI
  $('#commentform').get(0).reset();
  displayComment(data);
}

function postError(jqXHR, textStatus, errorThrown) {
  // display error
  
}

function displayComment(data) {
  var commentHtml = createComment(data);
  var commentEl = $(commentHtml);
  commentEl.hide();
  var postsList = $('#posts-list');
  postsList.addClass('has-comments');
  postsList.prepend(commentEl);
  commentEl.slideDown();
}

function createComment(data) {
  var html = '' +
  '<li><article id="' + data.id + '" class="hentry">' +
    '<footer class="post-info">' +
      '<abbr class="published" title="' + data.date + '">' +
        parseDisplayDate(data.date) +
      '</abbr>' +
      '<address class="vcard author">' +
        'By <a class="url fn" href="#">' + data.comment_author + '</a>' +
      '</address>' +
    '</footer>' +
    '<div class="entry-content">' +
      '<p>' + data.comment + '</p>' +
    '</div>' +
  '</article></li>';

  return html;
}

function parseDisplayDate(date) {
  date = (date instanceof Date? date : new Date( Date.parse(date) ) );
  var display = date.getDate() + ' ' +
                ['January', 'February', 'March',
                 'April', 'May', 'June', 'July',
                 'August', 'September', 'October',
                 'November', 'December'][date.getMonth()] + ' ' +
                date.getFullYear();
  return display;
}

$(function() {

  $(document).keyup(function(e) {
    e = e || window.event;
    if(e.keyCode === 85){
      displayComment({
        "id": "comment_1",
        "comment_post_ID": 1,
        "date":"Tue, 21 Feb 2012 18:33:03 +0000",
        "comment": "The realtime Web rocks!",
        "comment_author": "sensor 1 for IoT"
      });
    }
  });

});
