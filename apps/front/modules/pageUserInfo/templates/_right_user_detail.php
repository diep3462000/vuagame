<div class="right-user">

    <h3>Chiến tích của <?php echo $g_user->getUsername();?></h3>

    <ul class="list-result">
        <?php  if($history):
            foreach($history as $detail_history) :?>
                <li>
                    <strong><?php echo $g_user->getUsername();?></strong>
                    <span class="col1"><?php echo ($detail_history['cash'] > 0)? __("Vừa thắng") : __("Vừa thua") ?></span>
                    <span class="col2 <?php echo ($detail_history['cash'] >0)? 'win' : 'lose' ?>"><?php echo number_format($detail_history['cash'])?> Mi</span>
                    <span class="col3"><?php echo VtHelper::reFormatDate($detail_history['time']) ?></span>
                </li>
            <?php endforeach;
        endif?>
    </ul>
</div>