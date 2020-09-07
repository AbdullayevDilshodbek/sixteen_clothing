<?php
// echo "<br><br><br><br><br><br>";
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin();
?>
<style>
    .label{
        border: 1px solid #E9ECEF;
        border-radius: 5px;
        height: 30px;
    }
    .btn1{
        background-color: #28A745;
        color: #ffffff;
        border: 1px solid #E9ECEF;
        border-radius: 5px;
        height: 30px;
    }
    .btn1:hover{
        background-color: #4fc46b !important;
    }
    .block1 {
        height: 300px;
        padding-left: 10px;
        /*background-color: red;*/
        float: left;
        width: 20%;
        box-sizing: border-box;
    }
    .block2 {
        height: 300px;
        padding-left: 10px;
        /*background-color: red;*/
        float: left;
        width: 50%;
        box-sizing: border-box;
    }
    .block3 {
        height: 300px;
        padding-left: 10px;
        /*background-color: red;*/
        float: left;
        width: 30%;
        box-sizing: border-box;
    }
</style>
<span style="padding-left: 120px"><br><br><br><br><br><br>
    <?foreach ($products as $product):?>
    <div class="blocks">
        <div class="block1" >
            <a href="#"><img style="height: 280px; width: 200px;border-radius: 20px; margin-righst: 90px" src="http://yii/sixteen_clothing/web/uploads/<?= $product->img ?>" alt=""></a>
             <hr>
        </div>
        <div class="block2" >

            <?=$form->field($product,'name')->textInput(['class'=>'label'])?>
            <?=$form->field($product,'price')->textInput(['class'=>'label'])?>
            <?=$form->field($product,'description')->textInput(['class'=>'label']) // bu desction orqali nechta olish jo'natilgan
            ->label('Miqdor')
                ->input('number',['id' => "$product->id.a",'oninput' =>"total_pay($product->price,$product->discount,$product->id)",
                    'value'=>'1', 'data-toggle'=>'tooltip', 'class'=>'label',
                    'data-placement'=>'top', 'title'=>"Maxsulotdan nechta xarid qilasiz ?"])?>
            <? if ($product->discount > 0):?>
                <?=$form->field($product,'discount')->label('Chegirma')
                    ->textInput(['readonly'=>true,'class'=>'label']);
                ?>
            <?endif;?>
            <?=
            $form->field($product,'price')->textInput(['id'=>"$product->id",'readonly' => true,'class'=>'label',
                'value'=> $product->price * ((100 - $product->discount)/100)])->label('Umumiy to`lov')
            ?>
            <?= Html::submitButton('Sale', ['class' => 'btn1', 'id' => 'sale']) ?>
        </div>
        <div class="block3">
            <?=$form->field($product,'id')->hiddenInput()?>
            <?=$form->field($product,'cost')->label('')
                ->textInput(['readonly'=>true])->hiddenInput();?>
            <? if ($product->discount == 0):?>
                <?=$form->field($product,'discount')->label('')->hiddenInput();?>
            <? endif;?>
        </div>
    </div>
    <?endforeach;?>
    <?php
    $script = "
    let chegirma = document.getElementById('discount').value
   document.getElementById('l_discount').innerText += chegirma
    let count = document.getElementById('miqdor')
        count.oninput = () =>{
        if(document.getElementById('miqdor').value < 1){
            document.getElementById('miqdor').value = 1
        }
        let count = document.getElementById('miqdor').value
        let price = '$product->price'
        document.getElementById('totalPay').value = price * count * ((100 - '$product->discount')/100)
        }
    ";
//    echo $this->registerJs($script);
    ?>
    <?php
    $this->registerJsFile("js/karzinka.js")
    ?>
    <?php ActiveForm::end();?>
