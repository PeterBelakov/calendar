<form method="POST" action="./index.php">
    <label>
        <select name="month">
            <?php for ($m=1; $m<=12; $m++): ?>
            <option
                    <?php $month = date('F', mktime(0,0,0,$m, 1, date('Y'))); ?>
                <?php if(isset($_POST['month']) && $_POST['month'] == $m):?>
                    selected="selected"<?php endif;?>
                value="<?=$m;?>"><?= $month; ?>
            </option>
            <?php endfor;?>
        </select>
    </label>
    <label>
        <select name="year">
            <?php for ($y=1921; $y<=2051; $y++): ?>
                <option
                    <?php if(isset($_POST['year']) && $_POST['year'] == $y):?>
                        selected="selected"<?php endif;?>

                    value="<?=$y;?>"><?= $y; ?>
                </option>
            <?php endfor;?>
        </select>
    </label>

    <br><br>
    <div>Select category</div>
    <input type="submit" value="Select">
    <div class="well bs-component">

    </div>

</form>