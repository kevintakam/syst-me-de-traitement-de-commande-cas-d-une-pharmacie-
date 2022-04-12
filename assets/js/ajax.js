     function envoyer()
         {
             $("#envoyer").click(function(){
                     var request = new XMLHttpRequest();
                     var don = documentgetElementById('textecommenter')value;
                     <?php //$done = <script> don </sript>?>
                   request.open('GET',<?php $e->commenter(1, $donnee['0']->getId(),'ok','ok')?>,true)
             request.send();
             });
         }