<?php


 function lang($phrase){
   static $langs = array(
       'admin page'   => 'CPanel',
       'category'     => 'catrgories',
       'editing'      => 'Edit profile',
       'settings'     => 'Settings',
       'logout'       => 'Logout',
       'Items'        => 'Items',
       'Members'      => 'Members',
       'STATISTICS'   => 'Statistics',
       'Logs'         => 'Logs',
       'comments'     => 'Comments',
       'visit shop'   => 'Go-2-Shop',
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