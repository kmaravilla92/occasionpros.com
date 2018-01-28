$(function(){
   var MainApp = {

       AjaxifyForms: function(){
           $('.ajaxify').ajaxifyForm();
       },
       ToastifyForms: function(){
           toastr.options = {
               "closeButton": true,
               "debug": false,
               "newestOnTop": true,
               "progressBar": false,
               "positionClass": "toast-top-right",
               "preventDuplicates": false,
               "onclick": null,
               "tapToDismiss": false,
               "showDuration": "0",
               "hideDuration": "0",
               "timeOut": "0",
               "extendedTimeOut": "0",
               "showEasing": "swing",
               "hideEasing": "linear",
               "showMethod": "fadeIn",
               "hideMethod": "fadeOut"
           };

           window.showToaster = function(type, message) {
               toastr[type](message);
           }
       },
       Init: function(){
           MainApp.AjaxifyForms();
           MainApp.ToastifyForms();
       }
   }

   MainApp.Init();
});