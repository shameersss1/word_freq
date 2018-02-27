<?php
$file = fopen("http://terriblytinytales.com/test.txt","r");
$map = array();






while(!feof($file))
  {
     $text = fgets($file);
     
     

$subtext ="";

$text = strtolower($text);

for($i=0;$i<strlen($text);$i++){
    
    if($text[$i]==' '){
         if(strlen($subtext)>0){
        if(array_key_exists($subtext,$map)){
        $map[$subtext]++;}
        else{
            $map[$subtext]=1; }
        }
        
        
        
        $subtext="";
    }
    else{
        $subtext=$subtext.$text[$i];
    }
}
    if(strlen($subtext)>0){
  if(array_key_exists($subtext,$map)){
        $map[$subtext]++;}
        else{
            $map[$subtext]=1;
        }
    }
      
  }

fclose($file);

arsort($map);



?>

<!DOCTYPE html>
<html>
<body>

<TABLE BORDER="5"    WIDTH="50%"   CELLPADDING="4" CELLSPACING="3">
   <TR>
      <TH COLSPAN="2"><BR><H3>TOP WORDS</H3>
      </TH>
   </TR>
   <TR>
      <TH>Words</TH>
      <TH>Count</TH>
   </TR>
   
   <?php
     $i=0;
     $n=$_POST['val'];
     foreach($map as $key => $row) {
         
         if($i>=$n)
         break;
   if (ctype_alpha($key)){ $i++; 
    echo "<tr>";
       echo "<TD>" . $key . "</TD>";
       echo "<td>" . $row . "</td>";
     echo "</tr>";} } ?>
</TABLE>

</body>
</html>


