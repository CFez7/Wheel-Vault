<!-- the actual filter form made up of drop down lists and a submit button. Submits to this page -->
<div class="sortbar">
    <form action="index.php" method="post" style="display:inline;">
        <select class="sortInput" name="size">
            <option value=""> Size </option>
            <?php
            
                // Populate dropdown lists ONLY with options that are in the database already to reduce blank search results
            
                $query = "SELECT DISTINCT size FROM listings ORDER BY size ASC";
                $result = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($result)) {
             ?>
            <option value="<?php echo $row['size']; ?>">
                      <?php echo ucfirst($row['size']); ?>
             </option>
             <?php
                }
              ?>
        </select>
        <select class="sortInput" name="brand">
            <option value=""> Brand </option>
            <?php
                $query = "SELECT DISTINCT brand FROM listings ORDER BY brand ASC";
                $result = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($result)) {
             ?>
            <option value="<?php echo $row['brand']; ?>">
                      <?php echo ucfirst($row['brand']); ?>
             </option>
             <?php
                }
              ?>
        </select>
        <select class="sortInput" name="width">
            <option value=""> Width </option>
            <?php
                $query = "SELECT DISTINCT frontwidth, rearwidth FROM listings ORDER BY frontwidth, rearwidth ASC";
                $result = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($result)) {
             ?>
            <option value="<?php echo $row['frontwidth']; ?>">
                      <?php echo ucfirst($row['frontwidth']); ?>
             </option>
            <option value="<?php echo $row['rearwidth']; ?>">
                      <?php echo ucfirst($row['rearwidth']); ?>
             </option>
             <?php
                }
              ?>
        </select>
        <select class="sortInput" name="offset">
            <option value=""> Offset </option>
            <?php
                $query = "SELECT DISTINCT frontoffset, rearoffset FROM listings ORDER BY frontoffset, rearoffset ASC";
                $result = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($result)) {
             ?>
            <option value="<?php echo $row['frontoffset']; ?>">
                      <?php echo ucfirst($row['frontoffset']); ?>
             </option>
            <option value="<?php echo $row['rearoffset']; ?>">
                      <?php echo ucfirst($row['rearoffset']); ?>
             </option>
             <?php
                }
              ?>
        </select>
        <select class="sortInput" name="studpattern">
            <option value=""> Stud Pattern </option>
            <?php
                $query = "SELECT DISTINCT studpattern FROM listings ORDER BY studpattern ASC";
                $result = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($result)) {
             ?>
            <option value="<?php echo $row['studpattern']; ?>">
                      <?php echo ucfirst($row['studpattern']); ?>
             </option>
             <?php
                }
              ?>
        </select>
        <input class="sortInput" id="sortSubmit" type="submit" name="filter" value="Filter Results" style="float:right;" />
    </form>
</div>
