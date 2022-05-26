<?php


 function lang($phrase){
   static $langs = array(
       'Home page'   => 'Home',
       'category'     => 'catrgories',
       'editing'      => 'Edit profile',
       'settings'     => 'Settings',
       'logout'       => 'Logout',
       'Items'        => 'Items',
       'Members'      => 'Members',
       'STATISTICS'   => 'Statistics',
       'Logs'         => 'Logs',
       'comments'     => 'Comments',
       ''=>'',
       ''=>'',
       ''=>'',
       ''=>'',
       ''=>'',
       ''=>'',
       ''=>'',
       ''=>''
   );
   return $langs[$phrase];
 }