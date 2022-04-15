 <form action="" method="post">   
 <select name="buah">  
 <option value="">Silahkan Pilih</option>  
 <option value="Apel">Apel</option>  
 <option value="Jeruk">Jeruk</option>  
 <option value="Semangka">Semangka</option>  
 <option value="Salak">Salak</option>  
 </select>   
 <input type="submit" name="enter" value="Enter">   
 </form> 


   <?php   
  if(isset($_POST['enter']))   
  {   
   if(empty($_POST['buah']))  
   {  
   echo "Anda belum memilih!";  
   }  
   else echo "Pilihan anda: ".$_POST['buah'];  
  }   
  ?>  