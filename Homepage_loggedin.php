<!DOCTYPE html>
<html>
  <head>
   </head>
  <body>
  <?PHP
  switch (select acctype from users where UID = $currentuser) {
    case 0:
        Require(iteminsert.php);
        $myitems = 'Select IID, IName, IDesc, Storer, ILocation from items where ((owner = '.$currentuser.') and (IStatus = 1)'
        Echo 'stored items:'
        mysqli_query($link,$myitems);
        $nyitems = 'Select IID, IName, IDesc, Storer, ILocation from items where ((owner = '.$currentuser.') and (IStatus = 0)'
        Echo 'current ads'
        mysqli_query($link,$nyitems);
        
        break;
    case 1:
        Require(storer.php);
        break;
    case 2:
        Require(transporter.php);
        break;
}
  ?>
</html>
