$(function () {
   // Table w/ data table    
  $(".table.data-table").DataTable();

  // Delete list item
  $(document).on('click','.delete-item',function(e){
      var conf = confirm('Are you sure you want to do this ?');
          if(conf){
              var itemId = $(e.currentTarget).attr('data-id');
                  $('.item-delete-form.' + itemId).submit();
          }

      return false;
  });

  // PACE
  $(document).ajaxStart(function() { Pace.restart(); });
  $('.ajax').click(function(){
      $.ajax({url: '#', success: function(result){
          $('.ajax-content').html('<hr>Ajax Request Completed !');
      }});
  });
});
