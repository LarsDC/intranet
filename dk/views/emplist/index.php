<h1 class="header">EMPLOYEE LIST</h1>
<div class="linkbox">
    <table id="tablelist">
    <?php
            $count = 0;
            foreach($this->employees as $rows){
            echo '<tr>';
            echo '<td class="cell"><a href="Showemployeeprofile/showProfile/' . $rows['logon_name'] . '" class="frontboxlink" target="_self">' . $rows['employee_name'] . '</a></td>'; 
            echo '<td class="cell">' . $rows['department'] . '</td>';
            echo '<tr>';
            $count++;
            }
            echo 'A total of ' . $count . ' employees was found!';


    ?>
    </table>
</div>