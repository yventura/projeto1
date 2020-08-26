(function(win,doc){
   'use strict';

   function confirmDel(){
       event.preventDefault();
       console.log(event);
   }
   if(doc.querySelector('.js-del')){
        let btn=doc.querySelectorAll('.js-del');
        for(let i=0; i<btn.length; i++){
            btn[i].addEventListener('click',confirmDel,false);
        }
   }

})(window,document);