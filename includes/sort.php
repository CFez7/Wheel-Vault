<!-- the actual filter form made up of drop down lists and a submit button. Submits to this page -->
<div class="sortbar">
    <form action="index.php" method="post" style="display:inline;">
        <select name="size">
            <option value="">Wheel Size</option>
            <option value="15">15"</option>
            <option value="16">16"</option>
            <option value="17">17"</option>
            <option value="18">18"</option>
            <option value="19">19"</option>
        </select>
        <select name="brand">
            <option value="">Brand</option>
            <option value="bbs">BBS</option>
            <option value="3sdm">3SDM</option>
            <option value="oem">OEM</option>
            <option value="oem">BMW</option>
            <option value="rotiform">Rotiform</option>
        </select>
        <select name="width">
            <option value="">Width</option>
            <option value="6.5">6.5j</option>
            <option value="7">7j</option>
            <option value="7.5">7.5j</option>
            <option value="8">8j</option>
            <option value="8.5">8.5j</option>
            <option value="9">9j</option>
            <option value="9.5">9.5j</option>
        </select>
        <select name="offset">
            <option value="">Offset</option>
            <option value="25">25</option>
            <option value="35">35</option>
            <option value="45">45</option>
            <option value="55">55</option>
        </select>
        <select name="studpattern">
            <option value="">Stud Pattern</option>
            <option value="4x100">4x100</option>
            <option value="5x100">5x100</option>
            <option value="5x110">5x110</option>
            <option value="5x112">5x112</option>
        </select>
        <input type="submit" name="filter" value="Filter Results" style="float:right;" />
    </form>
</div>