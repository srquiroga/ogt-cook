<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

	
<div class='main dBlock w100 hidden'>
    <div id="content">
        <?php echo $content; ?>
    </div><!-- content -->


    <div id="sidebar">

       <ul class='dBlock w100 hidden mAuto'>
           <li><a href="#" id='ikea' class="dBlock hidden w100"><span class='fueraFlujo'>ikea</span></a></li>
            <li><a href="#" id='fagor' class="dBlock hidden w100" ><span class='fueraFlujo'>fagor</span></a></li>
            <li><a href="#" id='carrefour' class="dBlock hidden w100"><span class='fueraFlujo'>carrefour</span></a></li>
            <li><a href="#" id='kyocera' class="dBlock hidden w100" ><span class='fueraFlujo'>kyocera</span></a></li>
            <li><a href="#" id='lebanza' class="dBlock hidden w100"><span class='fueraFlujo'>lebanza</span></a> </li>
       </ul>

    </div><!-- sidebar -->
    
</div>
    

<?php $this->endContent(); ?>

