<?php include 'header.php';
include '../netting/baglan.php';
if (isset($_POST['arama'])) {
  $aranan=$_POST['aranan'];
  $slidersor=$db->prepare("select * from slider where slider_ad LIKE '%$aranan%' order by slider_durum DESC, slider_sira ASC");
  $slidersor->execute();
  $say=$slidersor->rowCount();
  # code...
}
else{
  $slidersor=$db->prepare("select * from slider order by slider_durum DESC, slider_sira ASC");
  $slidersor->execute();
  $say=$slidersor->rowCount();

}
 
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Slider İşlemleri <small color="red"><?php echo $say; ?> kayıt listelendi...</small></h3> 
        
      </div>
      <div align="right" class="col-md-12">
        <a href="sliderekle.php"><button style="width: 80px; margin-top: -30px;" class="btn btn-danger btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> yeni ekle</button>
        </a> </div>

      </div>

    </div>

    <form action="" method="POST">
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" name="aranan" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit" name="arama">Ara!</button>
            </span>
          </div>
        </form>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">


            <div class="x_content">

              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">

                      <th class="column-title">Slider Resim </th>
                      <th class="column-title">Slider Ad </th>
                      <th class="column-title">Slider Sıra </th>
                      <th class="column-title">Slider Durum </th>
                      <th width="80" class="column-title"> </th>
                      <th width="80" class="column-title"> </th>
                      

                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <?php 

                      while ($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) {
                       ?>

                       <input type="hidden" name="slider_resimyol" value="<?php echo $slidercek ['slider_resimyol']; ?>" >

                       <td class=" " ><img width="200" height="100" src="../../<?php echo  $slidercek['slider_resimyol'];?>"></td>
                       <td class=" "><?php echo  $slidercek['slider_ad'];?></td>
                       <td class=" "><?php echo  $slidercek['slider_sira'];?></td>
                        <td class=" "><?php if ($slidercek['slider_durum']==1) {
                         echo "AKTİF";
                       } else{
                        echo "PASİF";
                       }


                       ?></td>
                       <td class=" "><a href="sliderduzenle.php?slider_id=<?php echo  $slidercek['slider_id'];?>"><button style="width:80px"  class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Düzenle</button></a></td>
                       <td class=" "> <a href="../netting/islem.php?slidersil=ok&slider_id=<?php echo  $slidercek['slider_id'];?>&slider_resimyol=<?php echo $slidercek['slider_resimyol']; ?>"> <button style="width:60px"class="btn btn-danger btn-xs"><i class="fa fa-pencil"  aria-hidden="true"></i>  Sil</button></a></td>



                     </tr>
                   <?php } ?>
                 </tbody>
               </table>
             </div>


           </div>
         </div>
       </div>
     </div>
   </div>
 </div>

 <!-- /page content -->

 <!-- /page content -->

 <?php include 'footer.php'; ?>