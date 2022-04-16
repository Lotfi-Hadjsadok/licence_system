const statusCheckbox = jQuery('.rv-licences .status-toggler')
statusCheckbox.on('change',function(e){
   var actif = e.target.checked
   const statusText = e.target.parentElement.parentElement.parentElement.querySelector('.licence-status')
   const licenceKey = e.target.parentElement.parentElement.parentElement.querySelector('.licence-key').innerText
   jQuery.post({
      url:wpData.ajaxurl,
      data:{
         action:'change_status',
         key:licenceKey            
      }
   })

   if(actif){
      statusText.innerText='actif'
   }else{
      statusText.innerText='inactive'
   }

})