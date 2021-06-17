<h2>Калькулятор</h2>
<form action="" method="POST" id="calc">
    <input type="number" name="num1" value="<?=$calcData['num1']?>">
    <select name="operation">
        <option value="addition" <?php if ($calcData['operation'] == 'addition') echo 'selected';?>>+</option>
        <option value="subtraction" <?php if ($calcData['operation'] == 'subtraction') echo 'selected';?>>-</option>
        <option value="multiplication" <?php if ($calcData['operation'] == 'multiplication') echo 'selected';?>>*</option>
        <option value="division" <?php if ($calcData['operation'] == 'division') echo 'selected';?>>/</option>
    </select>
    <input type="number" name="num2" value="<?=$calcData['num2']?>">
    <input type="submit" value="=">
    <input type="text" value="<?=$calcData['result']?>" readonly>
</form>