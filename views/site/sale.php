<?php
  use yii\widgets\ActiveForm;
  use yii\helpers\Html;
    $form = ActiveForm::begin();
    ?>
<div style="margin: 0px 100px 100px 100px ; width: 200px">
<?=Html::img('http://yii/sixteen_clothing/web/uploads/'.$product->img,['style' => 'width: 200px; height:200; margin-top:85px'])?>
<?=$form->field($product,'id')->hiddenInput();?>
<?=$form->field($product,'name')->label('Nomi')
    ->textInput(['readonly'=>true]);?>
<?=$form->field($product,'category_id')->label("Kategorya: ".'<i class="btn btn-success">'.$product->category->name.'</i>')
    ->textInput(['readonly'=>true, 'style'=>'color: red'])
    ->hiddenInput();?>
<!--Bu yerda price ni total summa qilib controllerga jonatdim-->
<?=$form->field($product,'price')->label('Narxi')
    ->textInput(['readonly'=>true]);?>

    <?=$form->field($product,'cost')->label('Tan narx')
    ->textInput(['readonly'=>true])->hiddenInput();?>

<? if ($product->discount > 0):?>
    <span id="l_discount">Chegirma: </span>
    <?=$form->field($product,'discount')->label('')
        ->textInput(['readonly'=>true,'id'=>'discount','style'=>'display: none']);?>
<?else:?>
    <?=$form->field($product,'discount')->label('')
       ->hiddenInput(['id'=>'discount']);?>
<?endif;?>
    <?=$form->field($product,'description') // bu desction orqali nechta olish jo'natilgan
        ->label('Miqdor')
        ->input('number',['id' => 'miqdor','value'=>'1', 'data-toggle'=>'tooltip',
            'data-placement'=>'top', 'title'=>"Maxsulotdan nechta xarid qilasiz ?"])?>
    <?=
    $form->field($product,'price')->textInput(['id'=>'totalPay','readonly' => true,
        'value'=> $product->price * ((100 - $product->discount)/100)])->label('Umumiy to`lov')
    ?>
<?= Html::submitButton('Sale', ['class' => 'btn btn-success', 'id' => 'sale']) ?>
<?php
$script = "
    let chegirma = document.getElementById('discount').value
   document.getElementById('l_discount').innerText += chegirma
//    let count = document.getElementById('miqdor')
        document.getElementById('miqdor').oninput = () =>{
        if(document.getElementById('miqdor').value < 1){
            document.getElementById('miqdor').value = 1
        }
        let count = document.getElementById('miqdor').value
        const price = '$product->price'
        document.getElementById('totalPay').value = price * count * ((100 - chegirma)/100)
        }
    ";
$this->registerJs($script);
$this->registerJsFile("js/karzinka.js")
?>
</div>
<?php ActiveForm::end();?>
